<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\student\models\StuAddressSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Stu Addresses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stu-address-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Stu Address', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'stu_address_id',
            'stu_cadd',
            'stu_cadd_city',
            'stu_cadd_state',
            'stu_cadd_country',
            // 'stu_cadd_pincode',
            // 'stu_cadd_house_no',
            // 'stu_cadd_phone_no',
            // 'stu_padd',
            // 'stu_padd_city',
            // 'stu_padd_state',
            // 'stu_padd_country',
            // 'stu_padd_pincode',
            // 'stu_padd_house_no',
            // 'stu_padd_phone_no',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
