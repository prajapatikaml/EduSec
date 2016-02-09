<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Country */

$this->params['breadcrumbs'][] = ['label' => 'Country List', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->country_name, 'url' => ['view', 'id' => $model->country_id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="col-xs-12">
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-edit"></i> Update Country</h3></div>

  <div class="col-xs-4"></div>

  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
	<div class="col-xs-4"></div>
	<div class="col-xs-4"></div>
	<div class="col-xs-4 left-padding">
	
	</div>
   </div>

</div>
  <div class="country-update">
     <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

  </div>
