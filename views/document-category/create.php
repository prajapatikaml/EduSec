<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DocumentCategory */

//$this->title = 'Create Document Category';
//$this->params['breadcrumbs'][] = ['label' => 'Configuration', 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Document Category List'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-xs-12">
  <div class="col-lg-12 col-sm-12 col-xs-12 no-padding edusecArLangCss"><h3 class="box-title"><i class="fa fa-plus"></i> <?php echo Yii::t('app', 'Add Document Category') ?></h3></div>
</div>

  <div class="document-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

  </div>

