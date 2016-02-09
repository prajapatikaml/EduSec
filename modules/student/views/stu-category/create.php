<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\student\models\StuCategory */


$this->params['breadcrumbs'][] = ['label' => 'Admission Categories', 'url' => ['index']];
?>

<div class="col-xs-12">
  <div class="col-lg-4 col-sm-6 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-plus"></i> Add Admission Category</h3></div>
</div>

<div class="stu-category-create">
     <?= $this->render('_form', ['model' => $model,]) ?>
</div>
