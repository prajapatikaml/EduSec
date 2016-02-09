<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\student\models\StuGuardiansSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stu-guardians-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'stu_guardian_id') ?>

    <?= $form->field($model, 'guardian_name') ?>

    <?= $form->field($model, 'guardian_relation') ?>

    <?= $form->field($model, 'guardian_mobile_no') ?>

    <?= $form->field($model, 'guardian_phone_no') ?>

    <?php // echo $form->field($model, 'guardian_qualification') ?>

    <?php // echo $form->field($model, 'guardian_occupation') ?>

    <?php // echo $form->field($model, 'guardian_income') ?>

    <?php // echo $form->field($model, 'guardian_email') ?>

    <?php // echo $form->field($model, 'guardian_home_address') ?>

    <?php // echo $form->field($model, 'guardian_office_address') ?>

    <?php // echo $form->field($model, 'guardia_stu_master_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
