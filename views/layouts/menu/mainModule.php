<?php
use yii\bootstrap\Nav;
use yii\helpers\Html;
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
		if(!empty($stuMaster))
		      $stuInfo = app\modules\student\models\StuInfo::findOne($stuMaster->stu_master_stu_info_id);
		else
		      throw new app\web\NotFoundHttpException('The requested user login credentials does not exist.');
		$Photo = $stuInfo->getStuPhoto($stuInfo->stu_photo);
	}
	else if(isset($isEmployee))
	{
		$empMaster = app\modules\employee\models\EmpMaster::find()->andWhere(['emp_master_id' => $isEmployee])->one();
		if(!empty($empMaster))
		      $empInfo = app\modules\employee\models\EmpInfo::findOne($empMaster->emp_master_emp_info_id);
		else
		      throw new app\web\NotFoundHttpException('The requested user login credentials does not exist.');
		$Photo = $empInfo->getEmpPhoto($empInfo->emp_photo);
	}
	else {
		$Photo = Yii::getAlias('@web'). '/data/emp_images/no-photo.png';
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
                    <p> <?= Yii::t('app', 'Welcome') ?>, <?= @Yii::$app->user->identity->user_login_id ?></p>
                </div>
            </div>
        <?php endif; ?>

        <ul class="sidebar-menu">
            <li>
                <a href="#" class="navbar-link">
                    <i class="fa fa-angle-down"></i> <span class="text-info"><?= Yii::t('app', 'Menu'); ?></span>
                </a>
            </li>
	<?php if(Yii::$app->user->can('Configuration')) { ?>
	    <li><?= Html::a('<i class="fa fa-cogs"></i> <span>'.Yii::t('app', 'Configuration').'</span>', ['/default/index']); ?></li>
	<?php } 
	      if(Yii::$app->user->can('/dashboard/default/index')) {
	?>
	    <li><?= Html::a('<i class="fa fa-dashboard"></i> <span>'.Yii::t('dash', 'Dashboard').'</span>', ['/dashboard/default/index']); ?></li>
	<?php }
	      if(Yii::$app->user->can('/course/default/index')) {
	?>
	    <li><?= Html::a('<i class="fa fa-graduation-cap"></i> <span>'.Yii::t('course', 'Course Management').'</span>', ['/course/default/index']);?></li>
	<?php }
	      if(Yii::$app->user->can('/student/default/index')) {
	?>
	    <li><?= Html::a('<i class="fa fa-users"></i> <span>'.Yii::t('stu', 'Student').'</span>', ['/student/default/index']);  ?></li>
	<?php }
	      if(Yii::$app->user->can('/employee/default/index')) {
	?>
	    <li><?= Html::a('<i class="fa fa-user"></i> <span>'.Yii::t('emp', 'Employee').'</span>', ['/employee/default/index']);  ?></li>
	<?php }
	      if(Yii::$app->user->can('/fees/default/index')) {
	?>
	    <li><?= Html::a('<i class="fa fa-money"></i> <span>'.Yii::t('fees', 'Fees').'</span>', ['/fees/default/index']); ?></li>
	<?php }
	      if(Yii::$app->user->can('/report/default/index')) {
	?>
	    <li><?= Html::a('<i class="fa fa-bar-chart"></i> <span>'.Yii::t('report', 'Report Center').'</span>', ['/report/default/index']); ?></li>
	<?php }
	      if(Yii::$app->user->can('Rights')) {
	?>
	    <li><?= Html::a('<i class="fa fa-user-secret"></i> <span>'.Yii::t('urights', 'User Rights').'</span>', ['/rights/']); ?></li>
	<?php } ?>
        </ul>

	<!-- sidebar-menu. -- End -->

    </section>

</aside>
