<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\fees\models\FeesCollectCategory */

$this->title = Yii::t('fees', 'Update Fees Category: ') . ' ' . $model->fees_collect_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('fees', 'Fees'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('fees', 'Fees Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fees_collect_name, 'url' => ['view', 'id' => $model->fees_collect_category_id]];
$this->params['breadcrumbs'][] = Yii::t('fees', 'Update');
?>
<div class="col-xs-12">
  <div class="col-lg-8 col-sm-8 col-xs-12 no-padding edusecArLangCss"><h3 class="box-title"><i class="fa fa-plus"></i> <?php echo Yii::t('fees', 'Update Fees Category'); ?></h3></div>
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
	<div class="col-xs-4 edusecArLangHide"></div>
	<div class="col-xs-4 edusecArLangHide"></div>
	<div class="col-xs-4 left-padding">
	<?= Html::a(Yii::t('fees', 'Back'), ['index'], ['class' => 'btn btn-block btn-back']) ?>
	</div>
   </div>
</div>

<div class="fees-collect-category-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
