<?php 
use yii\helpers\Html; 
$adminUser = array_keys(\Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId()));
?>


<div class="row">
  <div class="col-xs-12 col-md-12 col-lg-12">
	<h2 class="page-header">	
	<i class="fa fa-info-circle"></i> <?= Html::encode('Academic Details') ?>
	<div class="pull-right">
	<?php if(Yii::$app->user->can("/student/stu-master/update") && ($_REQUEST['id'] == Yii::$app->session->get('stu_id'))  || (in_array("SuperAdmin", $adminUser)) || Yii::$app->user->can("updateAllStuInfo")) { ?>
		<?= Html::a('<i class="fa fa-pencil-square-o"></i> Edit', ['update', 'sid' => $model->stu_master_id, 'tab' => 'academic'], ['class' => 'btn-sm btn btn-primary text-warning', 'id' => 'update-data']) ?>
	<?php } ?>
	</div>
	</h2>
  </div><!-- /.col -->
</div>

<div class="row">
  <div class="col-xs-12 col-md-12 col-lg-12">
	<div class="col-md-4 col-xs-4 edusec-profile-label"><?= $model->getAttributeLabel('stu_master_course_id') ?></div>
	<div class="col-md-8 col-xs-8 edusec-profile-text"><?= $model->stuMasterCourse->course_name ?></div>
  </div>
</div>

<div class="row">
  <div class="col-xs-12 col-md-12 col-lg-12">
	<div class="col-md-4 col-xs-4 edusec-profile-label"><?= $model->getAttributeLabel('stu_master_batch_id') ?></div>
	<div class="col-md-8 col-xs-8 edusec-profile-text"><?= $model->stuMasterBatch->batch_name ?></div>
  </div>
</div>

<div class="row">
  <div class="col-xs-12 col-md-12 col-lg-12">
	<div class="col-md-4 col-xs-4 edusec-profile-label"><?= $model->getAttributeLabel('stu_master_section_id') ?></div>
	<div class="col-md-8 col-xs-8 edusec-profile-text"><?= $model->stuMasterSection->section_name ?></div>
  </div>
</div>

<div class="row">
  <div class="col-xs-12 col-md-12 col-lg-12 col-md-12 col-lg-12">
	<div class="col-md-4 col-xs-4 edusec-profile-label"><?= $info->getAttributeLabel('stu_admission_date') ?></div>
	<div class="col-md-8 col-xs-8 edusec-profile-text"><?= Yii::$app->formatter->asDate($info->stu_admission_date) ?></div>
  </div>
</div>

<div class="row">
  <div class="col-xs-12 col-md-12 col-lg-12">
	<div class="col-md-4 col-xs-4 edusec-profile-label"><?= $model->getAttributeLabel('stu_master_stu_status_id') ?></div>
	<div class="col-md-8 col-xs-8 edusec-profile-text"><?= ($model->stu_master_stu_status_id == 0) ? "General/Default" : $model->stuMasterStuStatus->stu_status_name; ?></div>
  </div>
</div>

<div class="row">
  <div class="col-xs-12 col-md-12 col-lg-12">
	<div class="col-md-4 col-xs-4 edusec-profile-label"><?= $model->getAttributeLabel('is_status') ?></div>
	<div class="col-md-8 col-xs-8 edusec-profile-text"><?= ($model->is_status == 0) ? "Active" : "InActive"; ?></div>
  </div>
</div>
