<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MsgOfDay */

$this->title = 'Update Message of Day: ' . ' ' . $model->msg_details;
$this->params['breadcrumbs'][] = ['label' => 'Dashboard', 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => 'Message of Day List', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->msg_details, 'url' => ['view', 'id' => $model->msg_of_day_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="col-xs-12">
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-edit"></i> Update Message of Day</h3></div>
  <div class="col-xs-4"></div>
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
	<div class="col-xs-4"></div>
	<div class="col-xs-4"></div>
	<div class="col-xs-4 left-padding">
	<?= Html::a('Back', ['index'], ['class' => 'btn btn-block btn-back']) ?>
	</div>
   </div>
</div>

<div class="msg-of-day-update">
      <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
