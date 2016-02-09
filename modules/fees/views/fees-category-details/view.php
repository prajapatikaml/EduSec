<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\fees\models\FeesCategoryDetails */

$this->title = $model->fees_category_details_id;
$this->params['breadcrumbs'][] = ['label' => 'Fees Category Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fees-category-details-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->fees_category_details_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->fees_category_details_id], [
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
            'fees_category_details_id',
            'fees_details_name',
            'fees_details_category_id',
            'fees_details_description',
            'fees_details_amount',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
            'is_status',
        ],
    ]) ?>

</div>
