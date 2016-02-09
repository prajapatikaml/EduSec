<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\employee\models\EmpInfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Emp Infos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="emp-info-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Emp Info', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'emp_info_id',
            'emp_unique_id',
            'emp_attendance_card_id',
            'emp_title',
            'emp_first_name',
            // 'emp_middle_name',
            // 'emp_last_name',
            // 'emp_name_alias',
            // 'emp_mother_name',
            // 'emp_gender',
            // 'emp_dob',
            // 'emp_religion',
            // 'emp_bloodgroup',
            // 'emp_joining_date',
            // 'emp_birthplace',
            // 'emp_email_id:email',
            // 'emp_maritalstatus',
            // 'emp_mobile_no',
            // 'emp_photo',
            // 'emp_languages',
            // 'emp_bankaccount_no',
            // 'emp_qualification',
            // 'emp_specialization',
            // 'emp_experience_year',
            // 'emp_experience_month',
            // 'emp_hobbies',
            // 'emp_reference',
            // 'emp_guardian_name',
            // 'emp_guardian_relation',
            // 'emp_guardian_qualification',
            // 'emp_guardian_occupation',
            // 'emp_guardian_income',
            // 'emp_guardian_homeadd',
            // 'emp_guardian_officeadd',
            // 'emp_guardian_mobile_no',
            // 'emp_guardian_phone_no',
            // 'emp_guardian_email_id:email',
            // 'emp_info_emp_master_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
