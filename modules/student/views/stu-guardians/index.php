<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\student\models\StuGuardiansSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Stu Guardians';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stu-guardians-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Stu Guardians', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'stu_guardian_id',
            'guardian_name',
            'guardian_relation',
            'guardian_mobile_no',
            'guardian_phone_no',
            // 'guardian_qualification',
            // 'guardian_occupation',
            // 'guardian_income',
            // 'guardian_email:email',
            // 'guardian_home_address',
            // 'guardian_office_address',
            // 'guardia_stu_master_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
