<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\fees\models\FeesPaymentTransaction */

$this->title = Yii::t('fees', 'Fees Collection');
$this->params['breadcrumbs'][] = ['label'=>Yii::t('fees', 'Fees'), 'url'=>['/fees']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('fees', 'Fees Collection'), 'url' => ['collect']];
$this->params['breadcrumbs'][] = $FccModel->fees_collect_name;
$this->params['breadcrumbs'][] = $stuData->stuMasterStuInfo->name;
?>
<div class="col-xs-12">
  <div class="col-lg-12 col-sm-12 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-plus"></i> <?= $this->title ?></h3></div>
</div>

<div class="fees-payment-transaction-create">
    <?= $this->render('_form', [
        'model' => $model,
	'stuData' => $stuData,
	'FccModel' => $FccModel,
    ]) ?>
</div>
