<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\student\models\StuDocsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stu-docs-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'stu_docs_id') ?>

    <?= $form->field($model, 'stu_docs_details') ?>

    <?= $form->field($model, 'stu_docs_category_id') ?>

    <?= $form->field($model, 'stu_docs_path') ?>

    <?= $form->field($model, 'stu_docs_submited_at') ?>

    <?php // echo $form->field($model, 'stu_docs_status') ?>

    <?php // echo $form->field($model, 'stu_docs_stu_master_id') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
