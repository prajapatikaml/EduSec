<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\employee\models\EmpCategory */
$this->params['breadcrumbs'][] = ['label' => Yii::t('emp', 'Employee Categores'), 'url' => ['index']];
$this->title = Yii::t('emp', 'Add Category');

?>
<div class="col-xs-12">
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-plus"></i> <?php echo Yii::t('emp', 'Add Category') ?> </h3></div>

  <div class="col-xs-4"></div>

  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
	<div class="col-xs-4"></div>
	<div class="col-xs-4"></div>
	<div class="col-xs-4 left-padding">
	
	</div>
   </div>

</div>
<div class="emp-category-create">

       <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
