<?php
use yii\bootstrap\Nav;
use yii\helpers\Html;
use yii\web\NotFoundHttpException;
?>
   <?php
	$isStudent = $isEmployee = NULL;

	if(!Yii::$app->user->isGuest){
	    $isStudent = Yii::$app->session->get('stu_id');
	    $isEmployee = Yii::$app->session->get('emp_id');
	}
	if(isset($isStudent))
	{
		$stuMaster = app\modules\student\models\StuMaster::find()->andWhere(['stu_master_id' => $isStudent])->one();
	    $stuInfo = app\modules\student\models\StuInfo::findOne($stuMaster->stu_master_stu_info_id);
		$Photo = $stuInfo->getStuPhoto($stuInfo->stu_photo);
	}
	else if(isset($isEmployee))
	{
		$empMaster = app\modules\employee\models\EmpMaster::find()->andWhere(['emp_master_id' => $isEmployee])->one();
	    $empInfo = app\modules\employee\models\EmpInfo::findOne($empMaster->emp_master_emp_info_id);
		$Photo = $empInfo->getEmpPhoto($empInfo->emp_photo);
	}
	else {
		$Photo = Yii::getAlias('@web').'/data/emp_images/no-photo.png'; 
	}
   ?>
<aside class="left-side sidebar-offcanvas">

    <section class="sidebar">

        <?php if (!Yii::$app->user->isGuest) : ?>
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?= $Photo ?>" class="img-circle" alt="User Image"/>
                </div>
                <div class="pull-left info">
                    <p> Welcome, <?= @Yii::$app->user->identity->user_login_id ?></p>
                </div>
            </div>
        <?php endif; ?>

        <!-- sidebar-menu. -- Start -->

        <ul class="sidebar-menu">
            <li>
                <a href="<?= Yii::$app->homeUrl ?>" class="navbar-link">
                    <i class="fa fa-angle-down"></i> <span class="text-info">Menu</span>
                </a>
            </li>
	<?php

	    if($this->context->module->id == 'student')
		 echo $this->render('menu/student');
	    else if($this->context->module->id == 'employee') 
	    	 echo $this->render('menu/employee');
	    else if($this->context->module->id == 'course') 
	    	 echo $this->render('menu/course');
	    else if($this->context->module->id == 'fees') 
	    	 echo $this->render('menu/fees');
	    else if($this->context->module->id == 'admission') 
	    	 echo $this->render('menu/admission');
	    else if($this->context->module->id == 'report' || get_class($this->context) == 'app\controllers\LoginDetailsController') 
	    	 echo $this->render('menu/report');
	    else if ($this->context->module->id == 'dashboard')
	         echo $this->render('menu/dashboard');
	    else if ($this->context->action->id == 'resetstudloginid' || $this->context->action->id == 'resetstudpassword' || $this->context->action->id == 'updatestudloginid')
		 echo $this->render('menu/student');
	    else if ($this->context->action->id == 'resetemploginid' || $this->context->action->id == 'resetemppassword' || $this->context->action->id == 'updateemploginid')
		 echo $this->render('menu/employee');
	    else if ($this->context->action->id == 'error' || $this->context->action->id == 'change')
		 echo $this->render('menu/Modules');
	    else if ($this->context->module->id == 'rights' || $this->context->module->id == 'admin')
	         echo $this->render('menu/rights');
	    else
		 echo $this->render('menu/config');
	?>
        </ul>

	<!-- sidebar-menu. -- End -->

    </section>

</aside>
