<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\employee\models\EmpAddressSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Addresses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="emp-address-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Address', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'emp_address_id',
            'emp_cadd',
            'emp_cadd_city',
            'emp_cadd_state',
            'emp_cadd_country',
            // 'emp_cadd_pincode',
            // 'emp_cadd_house_no',
            // 'emp_cadd_phone_no',
            // 'emp_padd',
            // 'emp_padd_city',
            // 'emp_padd_state',
            // 'emp_padd_country',
            // 'emp_padd_pincode',
            // 'emp_padd_house_no',
            // 'emp_padd_phone_no',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
