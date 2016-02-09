<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\fees\models\FeesPaymentTransaction */

$this->title = 'Fees Collection';
$this->params['breadcrumbs'][] = ['label'=>'Fees', 'url'=>['/fees']];
$this->params['breadcrumbs'][] = ['label' => 'Fees Collection', 'url' => ['collect']];
$this->params['breadcrumbs'][] = $FccModel->fees_collect_name;
$this->params['breadcrumbs'][] = $stuData->stuMasterStuInfo->name;
?>
<div class="col-xs-12">
  <div class="col-lg-4 col-sm-8 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-plus"></i> <?= $this->title ?></h3></div>
</div>

<div class="fees-payment-transaction-create">
    <?= $this->render('_form', [
        'model' => $model,
	'stuData' => $stuData,
	'FccModel' => $FccModel,
    ]) ?>
</div>
