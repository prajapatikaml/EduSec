<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrganizationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="organization-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'org_id') ?>

    <?= $form->field($model, 'org_name') ?>

    <?= $form->field($model, 'org_alias') ?>

    <?= $form->field($model, 'org_address_line1') ?>

    <?= $form->field($model, 'org_address_line2') ?>

    <?php // echo $form->field($model, 'org_phone') ?>

    <?php // echo $form->field($model, 'org_email') ?>

    <?php // echo $form->field($model, 'org_website') ?>

    <?php // echo $form->field($model, 'org_logo') ?>

    <?php // echo $form->field($model, 'org_logo_type') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
