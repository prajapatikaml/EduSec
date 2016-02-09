<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Country */

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Country List'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->country_name, 'url' => ['view', 'id' => $model->country_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>

<div class="col-xs-12">
  <div class="col-lg-12 col-sm-12 col-xs-12 no-padding edusecArLangCss"><h3 class="box-title"><i class="fa fa-edit"></i> <?php echo Yii::t('app', 'Update Country') ?></h3></div>
</div>
  <div class="country-update">
     <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

  </div>
