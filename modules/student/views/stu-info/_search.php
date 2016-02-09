<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\student\models\StuInfoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stu-info-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'stu_info_id') ?>

    <?= $form->field($model, 'stu_unique_id') ?>

    <?= $form->field($model, 'stu_title') ?>

    <?= $form->field($model, 'stu_first_name') ?>

    <?= $form->field($model, 'stu_middle_name') ?>

    <?php // echo $form->field($model, 'stu_last_name') ?>

    <?php // echo $form->field($model, 'stu_gender') ?>

    <?php // echo $form->field($model, 'stu_dob') ?>

    <?php // echo $form->field($model, 'stu_email_id') ?>

    <?php // echo $form->field($model, 'stu_bloodgroup') ?>

    <?php // echo $form->field($model, 'stu_birthplace') ?>

    <?php // echo $form->field($model, 'stu_religion') ?>

    <?php // echo $form->field($model, 'stu_admission_date') ?>

    <?php // echo $form->field($model, 'stu_photo') ?>

    <?php // echo $form->field($model, 'stu_languages') ?>

    <?php // echo $form->field($model, 'stu_mobile_no') ?>

    <?php // echo $form->field($model, 'stu_info_stu_master_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
