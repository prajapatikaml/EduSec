<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\student\models\StuGuardians */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stu-guardians-form">

    <?php $form = ActiveForm::begin([
			'id' => 'stu-guardians-form',
			//'enableAjaxValidation' => true,
			'options' => ['class' => 'form-horizontal',  'enctype' => 'multipart/form-data'],
			'fieldConfig' => [
			    'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-7\"><span class='status'>&nbsp;</span>{error}</div>",
			    'labelOptions' => ['class' => 'col-lg-2 control-label'],
			],
    ]); ?>

    <?= $form->field($model, 'guardian_name')->textInput(['maxlength' => 65]) ?>

    <?= $form->field($model, 'guardian_relation')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'guardian_mobile_no')->textInput(['maxlength' => 12]) ?>

    <?= $form->field($model, 'guardian_phone_no')->textInput(['maxlength' => 25]) ?>

    <?= $form->field($model, 'guardian_qualification')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'guardian_occupation')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'guardian_income')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'guardian_email')->textInput(['maxlength' => 65]) ?>

    <?= $form->field($model, 'guardian_home_address')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'guardian_office_address')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'is_emg_contact')->textInput() ?>

    <div class="form-group col-sm-offset-1 col-lg-10">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
