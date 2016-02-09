<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\employee\models\EmpAddress */

$this->title = $model->emp_address_id;
$this->params['breadcrumbs'][] = ['label' => 'Addresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="emp-address-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
	<?= Html::a('<i class="fa fa-chevron-left"></i> Back', ['index'], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->emp_address_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->emp_address_id], [
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
           // 'emp_address_id',
            'emp_cadd',
            'emp_cadd_city',
            'emp_cadd_state',
            'emp_cadd_country',
            'emp_cadd_pincode',
            'emp_cadd_house_no',
            'emp_cadd_phone_no',
            'emp_padd',
            'emp_padd_city',
            'emp_padd_state',
            'emp_padd_country',
            'emp_padd_pincode',
            'emp_padd_house_no',
            'emp_padd_phone_no',
        ],
    ]) ?>

</div>
