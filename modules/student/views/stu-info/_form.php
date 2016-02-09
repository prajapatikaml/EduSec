<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\student\models\StuInfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stu-info-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'stu_unique_id')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'stu_title')->textInput(['maxlength' => 5]) ?>

    <?= $form->field($model, 'stu_first_name')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'stu_middle_name')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'stu_last_name')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'stu_gender')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'stu_dob')->textInput() ?>

    <?= $form->field($model, 'stu_email_id')->textInput(['maxlength' => 65]) ?>

    <?= $form->field($model, 'stu_bloodgroup')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'stu_birthplace')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'stu_religion')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'stu_admission_date')->textInput() ?>

    <?= $form->field($model, 'stu_photo')->textInput(['maxlength' => 150]) ?>

    <?= $form->field($model, 'stu_languages')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'stu_mobile_no')->textInput(['maxlength' => 12]) ?>

    <?= $form->field($model, 'stu_info_stu_master_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
