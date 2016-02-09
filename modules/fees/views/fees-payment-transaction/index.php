<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\fees\models\FeesPaymentTransactionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fees Payment Transactions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fees-payment-transaction-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Fees Payment Transaction', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'fees_pay_tran_id',
            'fees_pay_tran_collect_id',
            'fees_pay_tran_stu_id',
            'fees_pay_tran_batch_id',
            'fees_pay_tran_course_id',
            // 'fees_pay_tran_section_id',
            // 'fees_pay_tran_mode',
            // 'fees_pay_tran_cheque_no',
            // 'fees_pay_tran_bank_id',
            // 'fees_pay_tran_amount',
            // 'fees_pay_tran_date',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',
            // 'is_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
