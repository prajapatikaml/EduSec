<?php use yii\helpers\Html; ?>
<?php $empSession =  Yii::$app->session->get('emp_id');
$admin = array_keys(Yii::$app->AuthManager->getRolesByUser(Yii::$app->user->id) );
$role = Yii::$app->AuthManager->getRoles();
	
 ?>
<div class="row">
  <div class="col-xs-12">
	<h2 class="page-header">	
	<i class="fa fa-info-circle"></i> Other Info
	<?php if(Yii::$app->user->can("/employee/emp-master/update") && (Yii::$app->session->get('emp_id') == $_REQUEST['id']) || in_array('SuperAdmin',$admin) || Yii::$app->user->can("updateAllEmpInfo")){ ?>
	<div class="pull-right"><?= Html::a('<i class="fa fa-pencil-square-o"></i> Edit', ['update', 'empid' => $model->emp_master_id, 'tab' => 'otherinfo'], ['class' => 'btn btn-primary btn-sm', 'id' => 'update-data']) ?></div>
	<?php } ?>
	</h2>
  </div><!-- /.col -->
</div>

<div class="row">
	<div class="col-md-12  col-xs-12">
	   <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label"><?= $info->getAttributeLabel('emp_attendance_card_id') ?></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= ($info->emp_attendance_card_id) ? $info->emp_attendance_card_id : "" ?></div>
	    </div>
	    <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label"><?= $info->getAttributeLabel('emp_bankaccount_no') ?></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= ($info->emp_bankaccount_no) ? $info->emp_bankaccount_no : "" ?></div>
	    </div>
	</div>
	<div class="col-md-12  col-xs-12">
	   <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label"><?= $info->getAttributeLabel('emp_mother_name') ?></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= ($info->emp_mother_name) ? $info->emp_mother_name : "" ?></div>
	   </div>
	   <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label"><?= $info->getAttributeLabel('emp_reference') ?></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= ($info->emp_reference) ? $info->emp_reference : "" ?></div>
	    </div>
	</div>

	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-3 col-sm-3 col-xs-6 edusec-profile-label"><?= $info->getAttributeLabel('emp_specialization') ?></div>
		<div class="col-md-9 col-sm-9 col-xs-6 edusec-profile-text"><?= ($info->emp_specialization) ? $info->emp_specialization : "" ?></div>
	</div>

	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-3 col-sm-3 col-xs-6 edusec-profile-label"><?= $info->getAttributeLabel('emp_languages') ?></div>
		<div class="col-md-9 col-sm-9 col-xs-6 edusec-profile-text"><?= ($info->emp_languages) ? $info->emp_languages : "" ?></div>
	</div>

	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-3 col-sm-3 col-xs-6 edusec-profile-label"><?= $info->getAttributeLabel('emp_hobbies') ?></div>
		<div class="col-md-9 col-sm-9 col-xs-6 edusec-profile-text"><?= ($info->emp_hobbies) ? $info->emp_hobbies : "" ?></div>
	</div>
</div>
