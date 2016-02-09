<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\student\models\StuInfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Stu Infos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stu-info-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Stu Info', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'stu_info_id',
            'stu_unique_id',
            'stu_title',
            'stu_first_name',
            'stu_middle_name',
            // 'stu_last_name',
            // 'stu_gender',
            // 'stu_dob',
            // 'stu_email_id:email',
            // 'stu_bloodgroup',
            // 'stu_birthplace',
            // 'stu_religion',
            // 'stu_admission_date',
            // 'stu_photo',
            // 'stu_languages',
            // 'stu_mobile_no',
            // 'stu_info_stu_master_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
