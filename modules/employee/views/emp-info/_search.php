<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\employee\models\EmpInfoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="emp-info-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'emp_info_id') ?>

    <?= $form->field($model, 'emp_unique_id') ?>

    <?= $form->field($model, 'emp_attendance_card_id') ?>

    <?= $form->field($model, 'emp_title') ?>

    <?= $form->field($model, 'emp_first_name') ?>

    <?php // echo $form->field($model, 'emp_middle_name') ?>

    <?php // echo $form->field($model, 'emp_last_name') ?>

    <?php // echo $form->field($model, 'emp_name_alias') ?>

    <?php // echo $form->field($model, 'emp_mother_name') ?>

    <?php // echo $form->field($model, 'emp_gender') ?>

    <?php // echo $form->field($model, 'emp_dob') ?>

    <?php // echo $form->field($model, 'emp_religion') ?>

    <?php // echo $form->field($model, 'emp_bloodgroup') ?>

    <?php // echo $form->field($model, 'emp_joining_date') ?>

    <?php // echo $form->field($model, 'emp_birthplace') ?>

    <?php // echo $form->field($model, 'emp_email_id') ?>

    <?php // echo $form->field($model, 'emp_maritalstatus') ?>

    <?php // echo $form->field($model, 'emp_mobile_no') ?>

    <?php // echo $form->field($model, 'emp_photo') ?>

    <?php // echo $form->field($model, 'emp_languages') ?>

    <?php // echo $form->field($model, 'emp_bankaccount_no') ?>

    <?php // echo $form->field($model, 'emp_qualification') ?>

    <?php // echo $form->field($model, 'emp_specialization') ?>

    <?php // echo $form->field($model, 'emp_experience_year') ?>

    <?php // echo $form->field($model, 'emp_experience_month') ?>

    <?php // echo $form->field($model, 'emp_hobbies') ?>

    <?php // echo $form->field($model, 'emp_reference') ?>

    <?php // echo $form->field($model, 'emp_guardian_name') ?>

    <?php // echo $form->field($model, 'emp_guardian_relation') ?>

    <?php // echo $form->field($model, 'emp_guardian_qualification') ?>

    <?php // echo $form->field($model, 'emp_guardian_occupation') ?>

    <?php // echo $form->field($model, 'emp_guardian_income') ?>

    <?php // echo $form->field($model, 'emp_guardian_homeadd') ?>

    <?php // echo $form->field($model, 'emp_guardian_officeadd') ?>

    <?php // echo $form->field($model, 'emp_guardian_mobile_no') ?>

    <?php // echo $form->field($model, 'emp_guardian_phone_no') ?>

    <?php // echo $form->field($model, 'emp_guardian_email_id') ?>

    <?php // echo $form->field($model, 'emp_info_emp_master_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
