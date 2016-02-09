<?php
use yii\bootstrap\Nav;
use yii\helpers\Html;
use yii\bootstrap\NavBar;

?>
   <?php
	$isStudent = $isEmployee = '';

	if(!Yii::$app->user->isGuest){
	      $isStudent = Yii::$app->session->get('stu_id');
	      $isEmployee = Yii::$app->session->get('emp_id');
	}
	if(isset($isStudent))
	{
		$stuMaster = app\modules\student\models\StuMaster::find()->where(['stu_master_id' => $isStudent, 'is_status' => 0])->one();
		if(!empty($stuMaster))
		      $stuInfo = app\modules\student\models\StuInfo::findOne($stuMaster->stu_master_stu_info_id);
		else
		      throw new NotFoundHttpException('The requested user login credentials does not exist.');

		$path = Yii::$app->homeUrl. 'data/stu_images/';
		$Photo = ($stuInfo->stu_photo) ? $path.$stuInfo->stu_photo : $path.'noStudent.png';
	}
	else if(isset($isEmployee))
	{
		$empMaster = app\modules\employee\models\EmpMaster::find()->where(['emp_master_id' => $isEmployee, 'is_status' => 0])->one();
		if(!empty($empMaster))
		      $empInfo = app\modules\employee\models\EmpInfo::findOne($empMaster->emp_master_emp_info_id);
		else
		      throw new NotFoundHttpException('The requested user login credentials does not exist.');

		$path = Yii::$app->homeUrl. 'data/emp_images/';
		$Photo = ($empInfo->emp_photo) ? $path.$empInfo->emp_photo : $path.'no-photo';
	}
	else {
		$Photo = Yii::$app->homeUrl. 'data/emp_images/no-photo';
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

        <!--form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i
                                        class="fa fa-search"></i></button>
                            </span>
            </div>
        </form-->

        <!-- sidebar-menu. -- Start -->

        <ul class="sidebar-menu">
            <li>
                <a href="<?= Yii::$app->request->baseUrl;?>" class="navbar-link">
                    <i class="fa fa-angle-down"></i> <span class="text-info">Menu</span>
                </a>
            </li>
	    <?= Nav::widget([
            		'options' => ['class' => 'nav nav-pills nav-stacked'],
            		'items' => [
				[
				    'label' => 'Home',
				    'url' => ['site/index'],
				],
				[
				    'label' => 'Home',
				    'url' => ['site/index'],
				],
				[
				    'label' => 'Home',
				    'url' => ['site/index'],
				],
				[
				    'label' => 'Home',
				    'url' => ['site/index'],
				],
				[
				    'label' => 'Home',
				    'url' => ['site/index'],
				],
			],
         	]); ?>
        </ul>

	<!-- sidebar-menu. -- End -->

    </section>

</aside>
