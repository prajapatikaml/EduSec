<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\fees\models\FeesPaymentTransaction */

$this->title = Yii::t('fees', 'Update Fees Receipt : ') . ' ' . $model->fees_pay_tran_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('fees', 'Fees'), 'url' => ['/fees']];
$this->params['breadcrumbs'][] = Yii::t('fees', 'Fees Collection : ').$FccModel->fees_collect_name;
$this->params['breadcrumbs'][] = Yii::t('fees', 'Update');
$this->params['breadcrumbs'][] = ['label' => Yii::t('fees', 'Receipt - ').$model->fees_pay_tran_id, 'url' => ['view', 'id' => $model->fees_pay_tran_id]];
?>
<div class="col-xs-12">
  <div class="col-lg-12 col-sm-12 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-edit"></i> <?= $this->title ?></h3></div>
</div>

<div class="fees-payment-transaction-update">
    <?= $this->render('_form', [
        'model' => $model,
	'stuData' => $stuData,
	'FccModel' => $FccModel,
    ]) ?>
</div>
