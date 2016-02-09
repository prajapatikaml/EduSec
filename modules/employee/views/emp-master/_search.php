<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\employee\models\EmpMasterSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="emp-master-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'emp_master_id') ?>

    <?= $form->field($model, 'emp_master_emp_info_id') ?>

    <?= $form->field($model, 'emp_master_user_id') ?>

    <?= $form->field($model, 'emp_master_department_id') ?>

    <?= $form->field($model, 'emp_master_designation_id') ?>

    <?php // echo $form->field($model, 'emp_master_category_id') ?>

    <?php // echo $form->field($model, 'emp_master_nationality_id') ?>

    <?php // echo $form->field($model, 'emp_master_emp_address_id') ?>

    <?php // echo $form->field($model, 'emp_master_status_id') ?>

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
