<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\student\models\StuAddress */

$this->title = $model->stu_address_id;
$this->params['breadcrumbs'][] = ['label' => 'Stu Addresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stu-address-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->stu_address_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->stu_address_id], [
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
            'stu_address_id',
            'stu_cadd',
            'stu_cadd_city',
            'stu_cadd_state',
            'stu_cadd_country',
            'stu_cadd_pincode',
            'stu_cadd_house_no',
            'stu_cadd_phone_no',
            'stu_padd',
            'stu_padd_city',
            'stu_padd_state',
            'stu_padd_country',
            'stu_padd_pincode',
            'stu_padd_house_no',
            'stu_padd_phone_no',
        ],
    ]) ?>

</div>
