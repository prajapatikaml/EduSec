<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\employee\models\EmpInfo */

$this->title = $model->emp_first_name;
$this->params['breadcrumbs'][] = ['label' => 'Employee', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="emp-info-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->emp_info_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->emp_info_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'emp_info_id',
            'emp_unique_id',
            'emp_attendance_card_id',
            'emp_title',
            'emp_first_name',
            'emp_middle_name',
            'emp_last_name',
            'emp_name_alias',
            'emp_mother_name',
            'emp_gender',
            'emp_dob',
            'emp_religion',
            'emp_bloodgroup',
            'emp_joining_date',
            'emp_birthplace',
            'emp_email_id:email',
            'emp_maritalstatus',
            'emp_mobile_no',
            'emp_photo',
            'emp_languages',
            'emp_bankaccount_no',
            'emp_qualification',
            'emp_specialization',
            'emp_experience_year',
            'emp_experience_month',
            'emp_hobbies',
            'emp_reference',
            'emp_guardian_name',
            'emp_guardian_relation',
            'emp_guardian_qualification',
            'emp_guardian_occupation',
            'emp_guardian_income',
            'emp_guardian_homeadd',
            'emp_guardian_officeadd',
            'emp_guardian_mobile_no',
            'emp_guardian_phone_no',
            'emp_guardian_email_id:email',
            'emp_info_emp_master_id',
        ],
    ]) ?>

</div>
