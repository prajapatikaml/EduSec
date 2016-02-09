<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\student\models\StuAddressSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stu-address-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'stu_address_id') ?>

    <?= $form->field($model, 'stu_cadd') ?>

    <?= $form->field($model, 'stu_cadd_city') ?>

    <?= $form->field($model, 'stu_cadd_state') ?>

    <?= $form->field($model, 'stu_cadd_country') ?>

    <?php // echo $form->field($model, 'stu_cadd_pincode') ?>

    <?php // echo $form->field($model, 'stu_cadd_house_no') ?>

    <?php // echo $form->field($model, 'stu_cadd_phone_no') ?>

    <?php // echo $form->field($model, 'stu_padd') ?>

    <?php // echo $form->field($model, 'stu_padd_city') ?>

    <?php // echo $form->field($model, 'stu_padd_state') ?>

    <?php // echo $form->field($model, 'stu_padd_country') ?>

    <?php // echo $form->field($model, 'stu_padd_pincode') ?>

    <?php // echo $form->field($model, 'stu_padd_house_no') ?>

    <?php // echo $form->field($model, 'stu_padd_phone_no') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
