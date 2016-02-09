<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DocumentCategory */

//$this->title = 'Create Document Category';
//$this->params['breadcrumbs'][] = ['label' => 'Configuration', 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => 'Document Category List', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-xs-12">
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-plus"></i> Add Document Category</h3></div>

  <div class="col-xs-4"></div>

  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
	<div class="col-xs-4"></div>
	<div class="col-xs-4"></div>
	<div class="col-xs-4 left-padding">
	
	</div>
   </div>

</div>

  <div class="document-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

  </div>

