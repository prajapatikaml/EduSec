<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\State */

$this->params['breadcrumbs'][] = ['label' => 'States/Province List', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->state_name, 'url' => ['view', 'id' => $model->state_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="col-xs-12">
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-edit"></i> Update   State/Province</h3>
  </div>
  <div class="col-xs-4"></div>
    <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
	<div class="col-xs-4"></div>
	<div class="col-xs-4"></div>
	<div class="col-xs-4 left-padding">
	<?= Html::a('Back', ['index'], ['class' => 'btn btn-block btn-back']) ?>
	</div>
    </div>
 </div>
  
 <div class="state-update">

   <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

  </div>

