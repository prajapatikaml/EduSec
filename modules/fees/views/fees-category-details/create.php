<?php

use yii\helpers\Html;
use app\modules\fees\models\FeesCollectCategory;

/* @var $this yii\web\View */
/* @var $model app\modules\fees\models\FeesCategoryDetails */

$this->title = 'Add Fees Category Detail';
$this->params['breadcrumbs'][] = ['label' => 'Fees', 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => 'Manage Fees Categories', 'url' => ['fees-collect-category/index']];
$this->params['breadcrumbs'][] = ['label' => FeesCollectCategory::findOne($_REQUEST['fcc_id'])->fees_collect_name, 'url' => ['fees-collect-category/view', 'id' => $_REQUEST['fcc_id']]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-xs-12">
  <div class="col-lg-4 col-sm-8 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-plus"></i> Add Fees Category Detail</h3></div>
</div>

<div class="fees-category-details-create">
    <?= $this->render('_form', ['model' => $model,]) ?>
</div>
