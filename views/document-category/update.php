<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DocumentCategory */

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Document Category List'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->doc_category_name, 'url' => ['view', 'id' => $model->doc_category_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="col-xs-12">
  <div class="col-lg-8 col-sm-8 col-xs-12 no-padding edusecArLangCss"><h3 class="box-title"><i class="fa fa-edit"></i> <?php echo Yii::t('app', 'Update Document Category') ?></h3>
  </div>
    <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
	<div class="col-xs-4 edusecArLangHide"></div>
	<div class="col-xs-4 edusecArLangHide"></div>
	<div class="col-xs-4 left-padding">
	<?= Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-block btn-back']) ?>
	</div>
    </div>
 </div>
  <div class="document-category-update">

      <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

  </div>


