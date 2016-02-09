<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>

   <div class="col-lg-12 header">
    <h3><?= Html::encode($this->title) ?></h3>
    <div class="operation">
        <?= Html::a('ADD', ['create'], ['class' => 'btn add']) ?>
    </div>
</div>

<div class="col-lg-12">
<div class="content-area" style="margin-top: 20px;">

<div class="user-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'user_id',
            'user_login_id',
            'user_type',
            'is_block',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div></div></div>
