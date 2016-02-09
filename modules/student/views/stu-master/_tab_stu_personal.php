
<?php
use yii\helpers\Html; 
$adminUser = array_keys(\Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId()));
?>

<div class="row">
  <div class="col-xs-12">
	<h2 class="page-header">	
	<i class="fa fa-info-circle"></i> Personal Details
	<div class="pull-right">
	<?php if((Yii::$app->user->can("/student/stu-master/update") && ($_REQUEST['id'] == Yii::$app->session->get('stu_id'))) || (in_array("SuperAdmin", $adminUser)) || Yii::$app->user->can("updateAllStuInfo")) { ?>
		<?= Html::a('<i class="fa fa-pencil-square-o"></i> Edit', ['update', 'sid' => $model->stu_master_id, 'tab' => 'personal'], ['class' => 'btn btn-primary btn-sm', 'id' => 'update-data']) ?>
	<?php } ?>
	</div>
	</h2>
  </div><!-- /.col -->
</div>






<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-3 col-sm-3 col-xs-6 edusec-profile-label"><?= $info->getAttributeLabel('stu_title') ?></div>
		<div class="col-md-9 col-sm-9 col-xs-6 edusec-profile-text"><?= ($info->stu_title) ? $info->stu_title : "Not Set" ?></div>
	</div>

	<div class="col-md-12 col-xs-12 col-sm-12">
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding edusec-bg-row">
		<div class="col-lg-6 col-xs-6 edusec-profile-label"><?= $info->getAttributeLabel('stu_first_name') ?></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= $info->stu_first_name ?></div>
	  </div>
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label"><?= $info->getAttributeLabel('stu_last_name') ?></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= $info->stu_last_name ?></div>
	  </div>
	</div>

	<div class="col-md-12 col-xs-12 col-sm-12">
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding edusec-bg-row">
		<div class="col-lg-6 col-xs-6 edusec-profile-label"><?= $info->getAttributeLabel('stu_middle_name') ?></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= $info->stu_middle_name ?></div>
	  </div>
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label"><?= $info->getAttributeLabel('stu_gender') ?></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= $info->stu_gender ?></div>
	  </div>
	</div>

	<div class="col-md-12 col-xs-12 col-sm-12">
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label"><?= $info->getAttributeLabel('stu_dob') ?></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= Yii::$app->formatter->asDate($info->stu_dob); ?></div>
	  </div>
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label"><?= $model->getAttributeLabel('stu_master_nationality_id') ?></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= !empty($model->stuMasterNationality->nationality_name) ? $model->stuMasterNationality->nationality_name : "Not Set" ?></div>
	  </div>
	</div>


	<div class="col-md-12 col-xs-12 col-sm-12">
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label"><?= $model->getAttributeLabel('stu_master_category_id') ?></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= !empty($model->stuMasterCategory->stu_category_name) ? $model->stuMasterCategory->stu_category_name : "Not Set" ?></div>
	  </div>
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label"><?= $info->getAttributeLabel('stu_religion') ?></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= $info->stu_religion ?></div>
	  </div>
	</div>

	<div class="col-md-12 col-xs-12 col-sm-12">
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label"><?= $info->getAttributeLabel('stu_bloodgroup') ?></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= $info->stu_bloodgroup ?></div>
	  </div>
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label"><?= $info->getAttributeLabel('stu_birthplace') ?></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= $info->stu_birthplace ?></div>
	  </div>
	</div>

	 <div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-3 col-sm-3 col-xs-6 edusec-profile-label"><?= $info->getAttributeLabel('stu_languages') ?></div>
		<div class="col-md-9 col-sm-9 col-xs-6 edusec-profile-text"><?= $info->stu_languages ?></div>
	</div>

</div> <!---Main Row Div--->
