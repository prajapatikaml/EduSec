<?php use yii\helpers\Html; ?>
<?php $empSession =  Yii::$app->session->get('emp_id');
$admin = array_keys(Yii::$app->AuthManager->getRolesByUser(Yii::$app->user->id) );
$role = Yii::$app->AuthManager->getRoles();
	
 ?>
<div class="row">
  <div class="col-xs-12">
	<h2 class="page-header">	
	<i class="fa fa-info-circle"></i> Guardian Info
	<?php if(Yii::$app->user->can("/employee/emp-master/update") && (Yii::$app->session->get('emp_id') == $_REQUEST['id']) || in_array('SuperAdmin',$admin) || Yii::$app->user->can("updateAllEmpInfo")) 		
        { ?>
	<div class="pull-right"><?= Html::a('<i class="fa fa-pencil-square-o"></i> Edit', ['update', 'empid' => $model->emp_master_id, 'tab' => 'guardians'], ['class' => 'btn btn-primary btn-sm', 'id' => 'update-data']) ?></div>
	<?php } ?>
	</h2>
  </div><!-- /.col -->
</div>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-3 col-sm-3 col-xs-6 edusec-profile-label"><?= $info->getAttributeLabel('emp_guardian_name') ?></div>
		<div class="col-md-9 col-sm-9 col-xs-6 edusec-profile-text"><?= ($info->emp_guardian_name) ? $info->emp_guardian_name : "" ?></div>
	</div>
	
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-3 col-sm-3 col-xs-6 edusec-profile-label"><?= $info->getAttributeLabel('emp_guardian_qualification') ?></div>
		<div class="col-md-9 col-sm-9 col-xs-6 edusec-profile-text"><?= ($info->emp_guardian_qualification) ? $info->emp_guardian_qualification : "" ?></div>
	</div>

	<div class="col-md-12  col-xs-12 col-sm-12">
	    <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label"><?= $info->getAttributeLabel('emp_guardian_relation') ?></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= ($info->emp_guardian_relation) ? $info->emp_guardian_relation : "" ?></div>
	    </div>
	    <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label"><?= $info->getAttributeLabel('emp_guardian_occupation') ?></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= ($info->emp_guardian_relation) ? $info->emp_guardian_occupation : "" ?></div>
	    </div>
	</div>

	<div class="col-md-12  col-xs-12 col-sm-12">
	   <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
	       <div class="col-lg-6 col-xs-6 edusec-profile-label"><?= $info->getAttributeLabel('emp_guardian_income') ?></div>
	       <div class="col-lg-6 col-xs-6 edusec-profile-text"><?= ($info->emp_guardian_income) ? $info->emp_guardian_income : "" ?></div>
	    </div>
	    <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label"><?= $info->getAttributeLabel('emp_guardian_mobile_no') ?></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= ($info->emp_guardian_mobile_no) ? $info->emp_guardian_mobile_no : "" ?></div>
	    </div>
	</div>
	<div class="col-md-12  col-xs-12 col-sm-12">
	   <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
	       <div class="col-lg-6 col-xs-6 edusec-profile-label"><?= $info->getAttributeLabel('emp_guardian_phone_no') ?></div>
	       <div class="col-lg-6 col-xs-6 edusec-profile-text"><?= ($info->emp_guardian_phone_no) ? $info->emp_guardian_phone_no : "" ?></div>
	    </div>
	    <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label"><?= $info->getAttributeLabel('emp_guardian_email_id') ?></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= ($info->emp_guardian_email_id) ? $info->emp_guardian_email_id : "" ?></div>
	    </div>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-3 col-sm-3 col-xs-6 edusec-profile-label"><?= $info->getAttributeLabel('emp_guardian_officeadd') ?></div>
		<div class="col-md-9 col-sm-9 col-xs-6 edusec-profile-text"><?= ($info->emp_guardian_officeadd) ? $info->emp_guardian_officeadd : "" ?></div>

	</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-3 col-sm-3 col-xs-6 edusec-profile-label"><?= $info->getAttributeLabel('emp_guardian_homeadd') ?></div>
		<div class="col-md-9 col-sm-9 col-xs-6 edusec-profile-text"><?= ($info->emp_guardian_homeadd) ? $info->emp_guardian_homeadd : "" ?></div>

	</div>

</div>


