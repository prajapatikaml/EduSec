<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\City */

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'City/Town List'), 'url' => ['index']];

?>
<div class="col-xs-12">
  <div class="col-lg-12 col-sm-12 col-xs-12 no-padding edusecArLangCss"><h3 class="box-title"><i class="fa fa-plus"></i> <?php echo Yii::t('app', 'Add City/Town') ?></h3></div>
</div>


  <div class="city-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
  </div>

