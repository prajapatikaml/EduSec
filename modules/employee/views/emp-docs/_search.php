<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\employee\models\EmpDocsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="emp-docs-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'emp_docs') ?>

    <?= $form->field($model, 'emp_docs_details') ?>

    <?= $form->field($model, 'emp_docs_category_id') ?>

    <?= $form->field($model, 'emp_docs_path') ?>

    <?= $form->field($model, 'emp_docs_submited_at') ?>

    <?php // echo $form->field($model, 'emp_docs_status') ?>

    <?php // echo $form->field($model, 'emp_docs_emp_master_id') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
