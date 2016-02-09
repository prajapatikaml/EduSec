<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\fees\models\FeesCategoryDetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fees Category Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fees-category-details-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Fees Category Details', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'fees_category_details_id',
            'fees_details_name',
            'fees_details_category_id',
            'fees_details_description',
            'fees_details_amount',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',
            // 'is_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
