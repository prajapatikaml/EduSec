<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $guard app\modules\student\models\StuGuardians */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-xs-12 col-lg-12">
  <div class="<?php echo $guard->isNewRecord ? 'box-success' : 'box-info'; ?> box view-item col-xs-12 col-lg-12">
   <div class="stu-guardians-form">
    <?php $form = ActiveForm::begin([
			'id' => 'stu-guardians-form',
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

    <div class="form-group col-xs-12 col-sm-6 col-lg-4 no-padding">
	<div class="col-xs-6">
        <?= Html::submitButton($guard->isNewRecord ? 'Add' : 'Update', ['class' => $guard->isNewRecord  ? 'btn btn-block btn-success' : 'btn btn-block btn-info']) ?>
	</div>
	<div class="col-xs-6">
	    <?= Html::a('Cancel', ['stu-master/view', 'id' => $model->stu_master_id, '#' => 'guardians'], ['class' => 'btn btn-default btn-block']); ?>
	</div>
    </div>
    <?php ActiveForm::end(); ?>
   </div>
  </div>
</div>
