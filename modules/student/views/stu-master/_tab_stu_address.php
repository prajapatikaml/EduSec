<?php 
use yii\helpers\Html;
$adminUser = array_keys(\Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId()));
 ?>

<div class="row">
  <div class="col-xs-12">
	<h2 class="page-header">	
	<i class="fa fa-info-circle"></i> Address Info
	<div class="pull-right">
	<?php if(Yii::$app->user->can("/student/stu-master/update") && ($_REQUEST['id'] == Yii::$app->session->get('stu_id')) || (in_array("SuperAdmin", $adminUser)) || Yii::$app->user->can("updateAllStuInfo")) { ?>
	    <?= Html::a('<i class="fa fa-pencil-square-o"></i> Edit', ['update', 'sid' => $model->stu_master_id, 'tab' => 'address'], ['class' => 'btn btn-primary btn-sm', 'id' => 'update-data']) ?>
	<?php } ?>
	</div>
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
		<div class="col-md-3 col-sm-3 col-xs-6 edusec-profile-label"><?= $address->getAttributeLabel('stu_cadd') ?></div>
		<div class="col-md-9 col-sm-9 col-xs-6 edusec-profile-text"><?= ($address->stu_cadd) ? $address->stu_cadd : "" ?></div>
	  </div>

	<div class="col-md-12 col-xs-12 col-sm-12">
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-md-6 col-sm-6 col-xs-6 edusec-profile-label"><?= $address->getAttributeLabel('stu_cadd_city') ?></div>
		<div class="col-md-6 col-sm-6 col-xs-6 edusec-profile-text"><?= ($address->stu_cadd_city) ? $address->stuCaddCity->city_name : "" ?></div>
	  </div>
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-md-6 col-xs-6 edusec-profile-label"><?= $address->getAttributeLabel('stu_cadd_state') ?></div>
		<div class="col-md-6 col-xs-6 edusec-profile-text"><?= ($address->stu_cadd_state) ? $address->stuCaddState->state_name : "" ?></div>
	  </div>
	</div>

	<div class="col-md-12  col-xs-12">
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label"><?= $address->getAttributeLabel('stu_cadd_country') ?></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= ($address->stu_cadd_country) ? $address->stuCaddCountry->country_name : "" ?></div>
	  </div>
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label"><?= $address->getAttributeLabel('stu_cadd_house_no') ?></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= ($address->stu_cadd_house_no) ? $address->stu_cadd_house_no : "" ?></div>
	  </div>
	</div>

	<div class="col-md-12  col-xs-12">
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label"><?= $address->getAttributeLabel('stu_cadd_pincode') ?></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= $address->stu_cadd_pincode ?></div>
	  </div>
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label"><?= $address->getAttributeLabel('stu_cadd_phone_no') ?></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= $address->stu_cadd_phone_no ?></div>
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
		<div class="col-md-3 col-sm-3 col-xs-6 edusec-profile-label"><?= $address->getAttributeLabel('stu_padd') ?></div>
		<div class="col-md-9 col-sm-9 col-xs-6 edusec-profile-text"><?= ($address->stu_padd) ? $address->stu_padd : "" ?></div>
	</div>

	<div class="col-md-12  col-xs-12">
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label"><?= $address->getAttributeLabel('stu_padd_city') ?></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= ($address->stu_padd_city) ? $address->stuPaddCity->city_name : "" ?></div>
	  </div>
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label"><?= $address->getAttributeLabel('stu_padd_state') ?></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= ($address->stu_padd_state) ? $address->stuPaddState->state_name : "" ?></div>
	  </div>
	</div>


	<div class="col-md-12  col-xs-12">
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label"><?= $address->getAttributeLabel('stu_padd_country') ?></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= ($address->stu_padd_country) ? $address->stuPaddCountry->country_name : "" ?></div>
	  </div>
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label"><?= $address->getAttributeLabel('stu_padd_house_no') ?></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= ($address->stu_padd_house_no) ? $address->stu_padd_house_no : "" ?></div>
	  </div>
	</div>

	<div class="col-md-12  col-xs-12">
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label"><?= $address->getAttributeLabel('stu_padd_pincode') ?></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= $address->stu_padd_pincode ?></div>
	  </div>
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label"><?= $address->getAttributeLabel('stu_padd_phone_no') ?></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= $address->stu_padd_phone_no ?></div>
	  </div>
	</div>
</div>


