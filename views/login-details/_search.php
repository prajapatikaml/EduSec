<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LoginDetailsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="login-details-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'login_detail_id') ?>

    <?= $form->field($model, 'login_user_id') ?>

    <?= $form->field($model, 'login_status') ?>

    <?= $form->field($model, 'login_at') ?>

    <?= $form->field($model, 'logout_at') ?>

    <?php // echo $form->field($model, 'user_ip_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
