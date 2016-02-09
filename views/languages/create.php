<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Languages */

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Language List'), 'url' => ['index']];

?>
<div class="col-xs-12">
  <div class="col-lg-12 col-sm-12 col-xs-12 no-padding edusecArLangCss"><h3 class="box-title"><i class="fa fa-plus"></i> <?php echo Yii::t('app', 'Add Language') ?></h3></div>
</div>
  <div class="languages-create">

       <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

  </div>

