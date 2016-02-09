<?php use yii\helpers\Html; ?>
<?php $empSession =  Yii::$app->session->get('emp_id');
$admin = array_keys(Yii::$app->AuthManager->getRolesByUser(Yii::$app->user->id) );
$role = Yii::$app->AuthManager->getRoles();
	
 ?>
<div class="row">
  <div class="col-xs-12">
	<h2 class="page-header">	
		<i class="fa fa-info-circle"></i> Address Info
		<?php if(Yii::$app->user->can("/employee/emp-master/update") && (Yii::$app->session->get('emp_id') == $_REQUEST['id']) || in_array('SuperAdmin',$admin) || Yii::$app->user->can("updateAllEmpInfo")) 			  { ?>
			<div class="pull-right"><?= Html::a('<i class="fa fa-pencil-square-o"></i> Edit', ['update', 'empid' => $model->emp_master_id, 'tab' => 'address'], ['class' => 'btn btn-primary btn-sm', 'id' => 'update-data']) ?></div>

		<?php } ?>
		
	</h2>
  </div><!-- /.col -->
</div>
<!---Start Current Address Block--->
<div class="row">
  <div class="col-xs-12">
	<h4 class="edusec-border-bottom-warning page-header edusec-profile-title-1">	
		<?= Html::encode('Current Address') ?>
	</h4>
  </div><!-- /.col -->
</div>

<div class="row">
	  <div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-3 col-sm-3 col-xs-6 edusec-profile-label"><?= $address->getAttributeLabel('emp_cadd') ?></div>
		<div class="col-md-9 col-sm-9 col-xs-6 edusec-profile-text"><?= ($address->emp_cadd) ? $address->emp_cadd : "" ?></div>
	  </div>

	 <div class="col-md-12 col-xs-12 col-sm-12">
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-md-6 col-sm-6 col-xs-6 edusec-profile-label"><?= $address->getAttributeLabel('emp_cadd_city') ?></div>
		<div class="col-md-6 col-sm-6 col-xs-6 edusec-profile-text"><?= ($address->emp_cadd_city) ? $address->empCaddCity->city_name : "" ?></div>
	  </div>
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-md-6 col-xs-6 edusec-profile-label"><?= $address->getAttributeLabel('emp_cadd_state') ?></div>
		<div class="col-md-6 col-xs-6 edusec-profile-text"><?= ($address->emp_cadd_state) ? $address->empCaddState->state_name : "" ?></div>
	  </div>
	</div>

	<div class="col-md-12 col-xs-12 col-sm-12">
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label"><?= $address->getAttributeLabel('emp_cadd_country') ?></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= ($address->emp_cadd_country) ? $address->empCaddCountry->country_name : "" ?></div>
	  </div>
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label"><?= $address->getAttributeLabel('emp_cadd_house_no') ?></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= ($address->emp_cadd_house_no) ? $address->emp_cadd_house_no : "" ?></div>
	  </div>
	</div>
	
	<div class="col-md-12 col-xs-12 col-sm-12">
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label"><?= $address->getAttributeLabel('emp_cadd_pincode') ?></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= $address->emp_cadd_pincode ?></div>
	  </div>
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label"><?= $address->getAttributeLabel('emp_cadd_phone_no') ?></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= $address->emp_cadd_phone_no ?></div>
	  </div>
	</div> 
 </div>


<!---Start Permenant Address Block--->
<div class="row">
  <div class="col-xs-12">
	<h4 class="edusec-border-bottom-warning page-header edusec-profile-title-1">	
		<?= Html::encode('Permenant Address') ?>
	</h4>
  </div><!-- /.col -->
</div>



<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-3 col-sm-3 col-xs-6 edusec-profile-label"><?= $address->getAttributeLabel('emp_padd') ?></div>
		<div class="col-md-9 col-sm-9 col-xs-6 edusec-profile-text"><?= ($address->emp_padd) ? $address->emp_padd : "" ?></div>

	</div>
	<div class="col-md-12  col-xs-12">
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label"><?= $address->getAttributeLabel('emp_padd_city') ?></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= $address->emp_padd_city?></div>
	  </div>
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label"><?= $address->getAttributeLabel('emp_padd_state') ?></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= ($address->emp_padd_state) ? $address->empPaddState->state_name : "" ?></div>
	  </div>
	</div>
	
	<div class="col-md-12 col-xs-12 col-sm-12">
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label"><?= $address->getAttributeLabel('emp_padd_country') ?></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= ($address->emp_padd_country) ? $address->empPaddCountry->country_name : "" ?></div>
	  </div>
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label"><?= $address->getAttributeLabel('emp_padd_house_no') ?></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= ($address->emp_padd_house_no) ? $address->emp_padd_house_no : "" ?></div>
	  </div>
	</div>

	<div class="col-md-12 col-xs-12 col-sm-12">
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label"><?= $address->getAttributeLabel('emp_padd_pincode') ?></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= ($address->emp_padd_pincode) ? $address->emp_padd_pincode : "" ?></div>
	  </div>
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label"><?= $address->getAttributeLabel('emp_padd_phone_no') ?></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= $address->emp_padd_phone_no ?></div>
	  </div>
	</div>
</div>

