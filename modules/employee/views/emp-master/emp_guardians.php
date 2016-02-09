<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\employee\models\EmpAddress */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Update : ' . ' ' . $model->empMasterEmpInfo->emp_first_name." ".$model->empMasterEmpInfo->emp_last_name;
$this->params['breadcrumbs'][] = ['label' => 'Employee', 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => 'Manage Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->empMasterEmpInfo->emp_first_name." ".$model->empMasterEmpInfo->emp_last_name, 'url' => ['view', 'id' => $model->emp_master_id]];
$this->params['breadcrumbs'][] = 'Update Guardian Details';
?>

<div class="col-xs-12">
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-edit"></i> <?= Html::encode($this->title) ?></h3>
  </div>
  <div class="col-xs-4"></div>
    <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
	<div class="col-xs-4"></div>
	<div class="col-xs-4"></div>
	<div class="col-xs-4 left-padding">
	<?= Html::a('Back', ['index'], ['class' => 'btn btn-block btn-back']) ?>
	</div>
    </div>
 </div>


<div class="col-xs-12 col-lg-12">
  <div class="box-info box view-item col-xs-12 col-lg-12">

<div class="emp-address-form">
<?php $form = ActiveForm::begin(['id' => 'emp-guardian-form']); ?>

<div class="box box-solid box-info col-xs-12 col-lg-12 no-padding edusec-form-bg">
  <div class="box-header with-border">
	<h4 class="box-title"><i class="fa fa-info-circle"></i> Guardian Details</h4>
  </div>
  <div class="box-body">

	<div class="col-xs-12 col-lg-12 col-lg-12">
		<div class = "col-sm-6">
	   	  <?= $form->field($info, 'emp_guardian_name')->textInput() ?>
		</div>
		<div class = "col-sm-6">
		     <?= $form->field($info, 'emp_guardian_relation')->textInput() ?>
		</div>
	</div>

	<div class="col-xs-12 col-sm-12 col-lg-12">
		<div class = "col-sm-6 col-xs-12">
		    <?= $form->field($info, 'emp_guardian_qualification')->textInput(['maxlength' => 25]) ?>
		</div>
		<div class = "col-sm-6 col-xs-12">
		   <?= $form->field($info, 'emp_guardian_occupation')->textInput(['maxlength' => 25])?>	
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-lg-12">
		<div class = "col-sm-6 col-xs-12">
		    <?= $form->field($info, 'emp_guardian_income')->textInput(['maxlength' => 25]) ?>	
		</div>
		<div class ="col-sm-6 col-xs-12">
		    <?= $form->field($info, 'emp_guardian_mobile_no')->textInput(['maxlength' => 12]) ?>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-lg-12">
		<div class = "col-sm-6 col-xs-12">
		    <?= $form->field($info, 'emp_guardian_phone_no')->textInput(['maxlength' => 25]) ?>
		</div>
		<div class ="col-sm-6 col-xs-12">
		    <?= $form->field($info, 'emp_guardian_email_id')->textInput(['maxlength' => 25]) ?>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-lg-12">
		<div class = "col-sm-6 col-xs-12">
		    <?= $form->field($info, 'emp_guardian_officeadd')->textArea(['maxlength' => 255]) ?>
		</div>
		<div class ="col-sm-6 col-xs-12">
		    <?= $form->field($info, 'emp_guardian_homeadd')->textArea(['maxlength' => 255]) ?>
		</div>
	</div>

</div><!---/end box-body--->
</div><!---/end box--->

<div class="form-group col-xs-12 col-sm-6 col-lg-4 no-padding">
	<div class="col-xs-6">
		<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $info->isNewRecord  ? 'btn btn-block btn-success' : 'btn btn-block btn-info']) ?>
	</div>
	<div class="col-xs-6">
		<?= Html::a('Cancel', ['view', 'id' => $model->emp_master_id], ['class' => 'btn btn-default btn-block']); ?>
	</div>
</div>

    <?php ActiveForm::end(); ?>

</div></div></div>
