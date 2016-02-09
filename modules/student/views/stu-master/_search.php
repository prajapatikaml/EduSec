<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\student\models\StuMasterSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stu-master-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'stu_master_id') ?>

    <?= $form->field($model, 'stu_master_stu_info_id') ?>

    <?= $form->field($model, 'stu_master_user_id') ?>

    <?= $form->field($model, 'stu_master_nationality_id') ?>

    <?= $form->field($model, 'stu_master_category_id') ?>

    <?php // echo $form->field($model, 'stu_master_course_id') ?>

    <?php // echo $form->field($model, 'stu_master_batch_id') ?>

    <?php // echo $form->field($model, 'stu_master_section_id') ?>

    <?php // echo $form->field($model, 'stu_master_stu_status_id') ?>

    <?php // echo $form->field($model, 'stu_master_stu_address_id') ?>

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
