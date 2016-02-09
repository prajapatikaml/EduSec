<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\fees\models\FeesCollectCategorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fees-collect-category-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'fees_collect_category_id') ?>

    <?= $form->field($model, 'fees_collect_name') ?>

    <?= $form->field($model, 'fees_collect_batch_id') ?>

    <?= $form->field($model, 'fees_collect_details') ?>

    <?= $form->field($model, 'fees_collect_start_date') ?>

    <?php // echo $form->field($model, 'fees_collect_end_date') ?>

    <?php // echo $form->field($model, 'fees_collect_due_date') ?>

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
