<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\fees\models\FeesPaymentTransactionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fees-payment-transaction-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'fees_pay_tran_id') ?>

    <?= $form->field($model, 'fees_pay_tran_collect_id') ?>

    <?= $form->field($model, 'fees_pay_tran_stu_id') ?>

    <?= $form->field($model, 'fees_pay_tran_batch_id') ?>

    <?= $form->field($model, 'fees_pay_tran_course_id') ?>

    <?php // echo $form->field($model, 'fees_pay_tran_section_id') ?>

    <?php // echo $form->field($model, 'fees_pay_tran_mode') ?>

    <?php // echo $form->field($model, 'fees_pay_tran_cheque_no') ?>

    <?php // echo $form->field($model, 'fees_pay_tran_bank_id') ?>

    <?php // echo $form->field($model, 'fees_pay_tran_amount') ?>

    <?php // echo $form->field($model, 'fees_pay_tran_date') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'is_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
