<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\fees\models\FeesCategoryDetails */

$this->title = Yii::t('fees', 'Update Fees Category Detail: ') . ' ' . $model->fees_details_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('fees', 'Fees'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('fees', 'Fees Category Details'),];
$this->params['breadcrumbs'][] = ['label' => $model->fees_details_name,];
$this->params['breadcrumbs'][] = Yii::t('fees', 'Update');
?>
<div class="col-xs-12">
  <div class="col-lg-12 col-sm-12 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-plus"></i> <?php echo Yii::t('fees', 'Update Fees Category Detail'); ?></h3></div>
</div>

<div class="fees-category-details-update">
    <?= $this->render('_form', ['model' => $model,]) ?>
</div>
