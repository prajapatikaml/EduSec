<?php use yii\helpers\Html; ?>
<?php $empSession =  Yii::$app->session->get('emp_id');
$admin = array_keys(Yii::$app->AuthManager->getRolesByUser(Yii::$app->user->id) );
$role = Yii::$app->AuthManager->getRoles();
?>
<div class="row">
  <div class="col-xs-12">
	<h2 class="page-header">	
	<i class="fa fa-info-circle"></i> <?php echo Yii::t('emp', 'Personal Details'); ?>
	<div class="<?= (Yii::$app->language == 'ar') ? 'pull-left' : 'pull-right'; ?>">
	<?php if(Yii::$app->user->can("/employee/emp-master/update") && (Yii::$app->session->get('emp_id') == $_REQUEST['id']) || in_array('SuperAdmin',$admin) || Yii::$app->user->can("updateAllEmpInfo")) 
		{ ?>
		<?= Html::a('<i class="fa fa-pencil-square-o"></i> '. Yii::t('emp', 'Edit'), ['update', 'empid' => $model->emp_master_id, 'tab' => 'personal'], ['class' => 'btn btn-primary btn-sm', 'id' => 'update-data']) ?></div>
		<?php } ?>
	</h2>
  </div><!-- /.col -->
</div>


<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-3 col-sm-3 col-xs-6 edusec-profile-label edusecArLangCss"><?= $info->getAttributeLabel('emp_title') ?></div>
		<div class="col-md-9 col-sm-9 col-xs-6 edusec-profile-text"><?= ($info->emp_title) ? $info->emp_title : "Not Set" ?></div>
	</div>

	<div class="col-md-12 col-xs-12 col-sm-12">
		   <div class="col-lg-6 col-sm-6 col-xs-12 no-padding edusec-bg-row">
			<div class="col-lg-6 col-xs-6 edusec-profile-label edusecArLangCss"><?= $info->getAttributeLabel('emp_first_name') ?></div>
			<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= (!empty($info->emp_first_name) ? $info->emp_first_name : "") ?></div>
		   </div>
		   <div class="col-lg-6 col-sm-6 col-xs-12 no-padding edusec-bg-row">
			<div class="col-lg-6 col-xs-6 edusec-profile-label edusecArLangCss"><?= $info->getAttributeLabel('emp_last_name') ?></div>
			<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= (!empty($info->emp_last_name) ? $info->emp_last_name : "") ?></div>
		   </div>
	 </div>

	<div class="col-md-12 col-xs-12 col-sm-12">
		  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding edusec-bg-row">
			<div class="col-lg-6 col-xs-6 edusec-profile-label edusecArLangCss"><?= $info->getAttributeLabel('emp_middle_name') ?></div>
			<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= $info->emp_middle_name ?></div>
		  </div>
		  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding edusec-bg-row">
			<div class="col-lg-6 col-xs-6 edusec-profile-label edusecArLangCss"><?= $info->getAttributeLabel('emp_name_alias') ?></div>
			<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= $info->emp_name_alias ?></div>
		  </div>
	  
	</div>

	<div class="col-md-12 col-xs-12 col-sm-12">
		  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding edusec-bg-row">
			<div class="col-lg-6 col-xs-6 edusec-profile-label edusecArLangCss"><?= $info->getAttributeLabel('emp_joining_date') ?></div>
			<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= date('d-m-Y',strtotime($info->emp_joining_date)) ?></div>
		  </div>
		   <div class="col-lg-6 col-sm-6 col-xs-12 no-padding edusec-bg-row">	
			<div class="col-lg-6 col-xs-6 edusec-profile-label edusecArLangCss"><?= $info->getAttributeLabel('emp_dob') ?></div>
			<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= date('d-m-Y',strtotime($info->emp_dob)) ?></div>
		  </div>
	  
	</div>

	<div class="col-md-12 col-xs-12 col-sm-12">
		  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding edusec-bg-row">
			<div class="col-lg-6 col-xs-6 edusec-profile-label edusecArLangCss"><?= $info->getAttributeLabel('emp_gender') ?></div>
			<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= !empty($info->emp_gender) ? $info->emp_gender : "" ?></div>
		  </div>
		  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding edusec-bg-row">
			<div class="col-lg-6 col-xs-6 edusec-profile-label edusecArLangCss"><?= $info->getAttributeLabel('emp_birthplace') ?></div>
			<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= $info->emp_birthplace ?></div>
		  </div>
	</div>

	<div class="col-md-12 col-xs-12 col-sm-12">
		  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding edusec-bg-row">
			<div class="col-lg-6 col-xs-6 edusec-profile-label edusecArLangCss"><?= $model->getAttributeLabel('emp_master_department_id') ?></div>
			<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= (!empty($model->empMasterDepartment->emp_department_name) ? $model->empMasterDepartment->emp_department_name : "") ?></div>
		  </div>
		  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding edusec-bg-row">
			<div class="col-lg-6 col-xs-6 edusec-profile-label edusecArLangCss"><?= $model->getAttributeLabel('emp_master_designation_id') ?></div>
			<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= !empty($model->empMasterDesignation->emp_designation_name) ? $model->empMasterDesignation->emp_designation_name : "" ?></div>
		  </div>
	</div>

	<div class="col-md-12 col-xs-12 col-sm-12">
		  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding edusec-bg-row">
			<div class="col-lg-6 col-xs-6 edusec-profile-label edusecArLangCss"><?= $model->getAttributeLabel('emp_master_category_id') ?></div>
			<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= (!empty($model->empMasterCategory->emp_category_name) ? $model->empMasterCategory->emp_category_name : "") ?></div>
		  </div>
		  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding edusec-bg-row">
			<div class="col-lg-6 col-xs-6 edusec-profile-label edusecArLangCss"><?= $info->getAttributeLabel('emp_experience_year_temp') ?></div>
			<div class="col-lg-6 col-xs-6 edusec-profile-text">
				<?php if(!empty($info->emp_experience_year) || !empty($info->emp_experience_month)) : ?>
					<?= (!empty($info->emp_experience_year) ? $info->emp_experience_year : "0") ?> Year(s) 
					<?= (!empty($info->emp_experience_month) ? $info->emp_experience_month : "0") ?> Month(s)
				<?php else : ?>
					&nbsp;
				<?php endif; ?>
			</div>
		
		  </div>
	</div>

	<div class="col-md-12 col-xs-12 col-sm-12">
		  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding edusec-bg-row">
			<div class="col-lg-6 col-xs-6 edusec-profile-label edusecArLangCss"><?= $info->getAttributeLabel('emp_bloodgroup') ?></div>
			<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= $info->emp_bloodgroup ?></div>
		  </div>
		  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding edusec-bg-row">
			<div class="col-lg-6 col-xs-6 edusec-profile-label edusecArLangCss"><?= $info->getAttributeLabel('emp_maritalstatus') ?></div>
			<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= !empty($info->emp_maritalstatus) ? $info->emp_maritalstatus : "" ?></div>
		  </div>
	</div>

	<div class="col-md-12 col-xs-12 col-sm-12">
		  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding edusec-bg-row">
			<div class="col-lg-6 col-xs-6 edusec-profile-label edusecArLangCss"><?= $model->getAttributeLabel('emp_master_nationality_id') ?></div>
			<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= !empty($model->empMasterNationality->nationality_name) ? $model->empMasterNationality->nationality_name : "" ?></div>
		  </div>
		  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding edusec-bg-row">
			<div class="col-lg-6 col-xs-6 edusec-profile-label edusecArLangCss"><?= $info->getAttributeLabel('emp_religion') ?></div>
			<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= $info->emp_religion ?></div>
		  </div>
	</div>

</div> <!---Main Row Div--->
