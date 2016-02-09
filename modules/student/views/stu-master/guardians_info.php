<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\student\models\StuMaster */
/*
*/

$this->title = 'Update Guardian : ' . ' ' . $guard->guardian_name;
?>
<script>
$(document).ready(function(){
	$('.modal-header').html('<div class="row"><div class="col-xs-12"><button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button><div class="col-lg-8 col-sm-10 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-edit"></i> <?= Html::encode($this->title) ?> </h3></div></div></div>');
});

</script>

<div class="col-xs-12 col-lg-12 no-padding">
  <div class="box-info box view-item col-xs-12 col-lg-12">
   <div class="stu-master-update">

    <?php $form = ActiveForm::begin([
			'id' => 'stu-master-update',
			'enableAjaxValidation' => true,
			'fieldConfig' => [
			    'template' => "{label}{input}{error}",
			],	
    ]); ?>

   <div class="col-xs-12 col-sm-12 col-lg-12 no-padding">
    <div class="col-xs-12 col-sm-6 col-lg-6">
    <?= $form->field($guard, 'guardian_name')->textInput(['maxlength' => 65]) ?>
    </div>

    <div class="col-xs-12 col-sm-6 col-lg-6">
    <?= $form->field($guard, 'guardian_relation')->textInput(['maxlength' => 30]) ?>
    </div>
   </div>

   <div class="col-xs-12 col-sm-12 col-lg-12 no-padding">
    <div class="col-xs-12 col-sm-6 col-lg-6">
    <?= $form->field($guard, 'guardian_mobile_no')->textInput(['maxlength' => 12]) ?>
    </div>

    <div class="col-xs-12 col-sm-6 col-lg-6">
    <?= $form->field($guard, 'guardian_phone_no')->textInput(['maxlength' => 25]) ?>
    </div>
   </div>

   <div class="col-xs-12 col-sm-12 col-lg-12 no-padding">
    <div class="col-xs-12 col-sm-6 col-lg-6">
    <?= $form->field($guard, 'guardian_qualification')->textArea(['maxlength' => 50]) ?>
    </div>

    <div class="col-xs-12 col-sm-6 col-lg-6">
    <?= $form->field($guard, 'guardian_occupation')->textArea(['maxlength' => 50]) ?>
    </div>
   </div>

   <div class="col-xs-12 col-sm-12 col-lg-12 no-padding">
    <div class="col-xs-12 col-sm-6 col-lg-6">
    <?= $form->field($guard, 'guardian_income')->textInput(['maxlength' => 50]) ?>
    </div>

    <div class="col-xs-12 col-sm-6 col-lg-6">
    <?= $form->field($guard, 'guardian_email')->textInput(['maxlength' => 65]) ?>
    </div>
   </div>

   <div class="col-xs-12 col-sm-12 col-lg-12 no-padding">
    <div class="col-xs-12 col-sm-6 col-lg-6">
    <?= $form->field($guard, 'guardian_home_address')->textArea(['maxlength' => 255]) ?>
    </div>

    <div class="col-xs-12 col-sm-6 col-lg-6">
    <?= $form->field($guard, 'guardian_office_address')->textArea(['maxlength' => 255]) ?>
    </div>
   </div>

    <div class="form-group col-xs-12 col-sm-6 col-lg-6 no-padding">
	<div class="col-xs-6 col-sm-6">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord  ? 'btn btn-block btn-success' : 'btn btn-block btn-info']) ?>
	</div>
	<!--div class="col-xs-6">
	    <?php // Html::a('Cancel', ['view', 'id' => $model->stu_master_id], ['class' => 'btn btn-default btn-block']); ?>
	</div-->
    </div>

    <?php ActiveForm::end(); ?>
   </div>
  </div>
</div>
