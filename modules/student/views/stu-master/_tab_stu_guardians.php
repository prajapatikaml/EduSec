<?php 
 use yii\helpers\Html;
$adminUser = array_keys(\Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId()));

	$stu_guard = new \yii\db\Query();
	$stu_guard -> select('*')
	        ->from('stu_guardians sg')
		->where('sg.guardia_stu_master_id = '.$_REQUEST['id']);

	$command = $stu_guard->createCommand();
	$stu_data = $command->queryAll();
?>

<div class="row">
  <div class="col-xs-12 col-md-12 col-lg-12">
	<h2 class="page-header">	
	<i class="fa fa-info-circle"></i> <?= Html::encode('Guardians Details') ?>
	<div class="pull-right">
	<?php if(Yii::$app->user->can('/student/stu-master/addguardian')) { ?>
		<?= Html::a('<i class="fa fa-user-plus"></i> Add Guardian', ['addguardian', 'sid' => $model->stu_master_id], ['class' => 'btn-sm btn btn-primary text-warning', 'id' => 'update-guard-data']) ?>
	<?php } ?>
	</div>
	</h2>
  </div><!-- /.col -->
</div>

<?php
     if(!empty($stu_data))
     {	
	$i = 1;
	foreach($stu_data as $sd)
	{	
		if($sd['is_emg_contact'] == 1)
			$check = true; 
		else
			$check = false;
?>

<div class="row">
  <div class="col-xs-12 col-md-12 col-lg-12">
	<h2 class="page-header edusec-border-bottom-warning">
	<?= $i."-".$sd['guardian_name'] ?>
	<div class="pull-right">
		<?php if(Yii::$app->user->can("/student/stu-master/update") && ($_REQUEST['id'] == Yii::$app->session->get('stu_id')) || (in_array("SuperAdmin", $adminUser)) || Yii::$app->user->can("updateAllStuInfo")) { ?>
		    <?= Html::a('<i class="fa fa-pencil-square-o"></i> Edit', '#', ['class' => 'btn btn-primary btn-sm', 'onclick' => "updateGuard(".$sd['stu_guardian_id'].",".$model->stu_master_id.", 'guardians');return false;"]) ?>
		<?php } ?>
		<?php if(Yii::$app->user->can('/student/stu-guardians/delete') && ($_REQUEST['id'] == Yii::$app->session->get('stu_id')) || (in_array("SuperAdmin", $adminUser)) || Yii::$app->user->can("updateAllStuInfo")) { ?>
		    <?= Html::a('<i class="fa fa-trash-o"></i> Delete', ['stu-guardians/delete', 'id' => $sd['stu_guardian_id'], 'sid'=>$model->stu_master_id], [
			'class' => 'btn btn-danger btn-sm',
			'data' => [
				'confirm' => 'Are you sure you want to delete this item?',
				'method' => 'post',
			],
		    ]) ?> 
		<?php } ?>
        </div>
	</h2>
  </div><!-- /.col -->
</div>

<?php
// **** Update Status of is_emp_contact on student Guardian tab ****
$url = yii\helpers\Url::toRoute(["stu-master/emg-change-status"]);
$JSClick = <<<EOF
function(event, state) {
	var st_id = this.value;
	var sid = $( this ).attr( "sid" );
	var guard_id = $( this ).attr( "guard_id" );	
	$.ajax({
		type: "POST",
		url: "{$url}",
		data: { sid: sid, guard_id: guard_id },
		success: function(result){
			//window.location = 'index';
		}
	});
}
EOF;
?>
<div class="row">
  <div class="col-xs-12 col-md-12 col-lg-12">
	<div class="pull-right edusec-stu-emg-gur">
		<span class="edusec-emg-ct-label">Is Emergency Contact</span>
		<?php if((Yii::$app->user->can('/student/stu-master/emg-change-status') && ($_REQUEST['id'] == Yii::$app->session->get('stu_id'))) || ( $adminUser == "SuperAdmin" ) || Yii::$app->user->can("updateAllStuInfo")) { ?>
		   <?= \dosamigos\switchinput\SwitchRadio::widget([
			    'name' => 'is_emg_contact',
			    'inline' => true,
			    'checked' => $check,
			    'id' => 'emg-contact-'.$i,
			    'items' => [
				[
				    'value' => 1,
				    'options' => ['data-size' => 'small', 'data-off-color' => 'warning', 'data-on-color' => 'success', 'data-on-text' => 'Yes', 'data-off-text' => 'No', 'sid' => $model->stu_master_id, 'guard_id' => $sd['stu_guardian_id'], 'class' => 'emg_emg',]
				],
			    ],
			    'clientOptions' => [ 'onSwitchChange' => new \yii\web\JsExpression($JSClick), ],	
			    'labelOptions' => ['style' => 'font-size:14px;']
		   ]);?>
		<?php } else { 
			echo (($sd['is_emg_contact'] == 1) ? "<span class='label label-success'>Yes</span>" : "<span class='label label-warning'>No</span>");
		}?>
        </div>
  </div><!-- /.col -->
</div>

<div class="row">
	  <div class="col-lg-12 col-sm-12 col-xs-12">
		<div class="col-lg-3 col-sm-3 col-xs-6 edusec-profile-label"><?= $guardian->getAttributeLabel('guardian_name') ?></div>
		<div class="col-lg-9 col-sm-9 col-xs-6 edusec-profile-text"><?= $sd['guardian_name'] ?></div>
	  </div>

	<div class="col-md-12 col-xs-12 col-sm-12">
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label"><?= $guardian->getAttributeLabel('guardian_relation') ?></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= $sd['guardian_relation'] ?></div>
	  </div>
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label"><?= $guardian->getAttributeLabel('guardian_occupation') ?></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= $sd['guardian_occupation'] ?></div>
	  </div>
	</div>

	<div class="col-md-12 col-xs-12 col-sm-12">
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label"><?= $guardian->getAttributeLabel('guardian_mobile_no') ?></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= $sd['guardian_mobile_no'] ?></div>
	  </div>
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label"><?= $guardian->getAttributeLabel('guardian_phone_no') ?></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= $sd['guardian_phone_no'] ?></div>
	  </div>
	</div>

	<div class="col-md-12 col-xs-12 col-sm-12">
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label"><?= $guardian->getAttributeLabel('guardian_income') ?></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= $sd['guardian_income'] ?></div>
	  </div>
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label"><?= $guardian->getAttributeLabel('guardian_email') ?></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= $sd['guardian_email'] ?></div>
	  </div>
	</div>

	 <div class="col-md-12 col-xs-12 col-sm-12">
		<div class="col-md-3 col-xs-6 col-sm-3 edusec-profile-label"><?= $guardian->getAttributeLabel('guardian_qualification') ?></div>
		<div class="col-md-9 col-xs-6 col-sm-9 edusec-profile-text"><?= $sd['guardian_qualification'] ?></div>
	 </div>


	<div class="col-md-12 col-xs-12 col-sm-12">
		<div class="col-md-3 col-xs-6 col-sm-3 edusec-profile-label"><?= $guardian->getAttributeLabel('guardian_home_address') ?></div>
		<div class="col-md-9 col-xs-6 col-sm-9 edusec-profile-text"><?= $sd['guardian_home_address'] ?></div>
	</div>

	<div class="col-md-12 col-xs-12 col-sm-12">
		<div class="col-md-3 col-xs-6 col-sm-3 edusec-profile-label"><?= $guardian->getAttributeLabel('guardian_office_address') ?></div>
		<div class="col-md-9 col-xs-6 col-sm-9 edusec-profile-text"><?= $sd['guardian_office_address'] ?></div>
	</div>
</div>
<?php
	$i++;	
	}
    }
    else
    {
?>
<table width="100%" cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover table-responsive">
	<tr>
		<th class="table-cell-title text-center" colspan = 4><?= "No Data Available" ?></th>
	</tr>
</table>
<?php
    }
?>
