<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\fees\models\FeesPaymentTransaction */

$this->title = 'Update Fees Receipt : ' . ' ' . $model->fees_pay_tran_id;
$this->params['breadcrumbs'][] = ['label' => 'Fees', 'url' => ['/fees']];
$this->params['breadcrumbs'][] = "Fees Collection : ".$FccModel->fees_collect_name;
$this->params['breadcrumbs'][] = 'Update';
$this->params['breadcrumbs'][] = ['label' => "Receipt - ".$model->fees_pay_tran_id, 'url' => ['view', 'id' => $model->fees_pay_tran_id]];
?>
<div class="col-xs-12">
  <div class="col-lg-4 col-sm-8 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-edit"></i> <?= $this->title ?></h3></div>
</div>

<div class="fees-payment-transaction-update">
    <?= $this->render('_form', [
        'model' => $model,
	'stuData' => $stuData,
	'FccModel' => $FccModel,
    ]) ?>
</div>
