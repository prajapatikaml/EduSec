<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\fees\models\BankMaster */

//$this->title = 'Update Bank : ' . ' ' . $model->bank_alias;
//$this->params['breadcrumbs'][] = ['label' => 'Fees', 'url' => ['default/index']];
//$this->params['breadcrumbs'][] = ['label' => 'Manage Banks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bank_alias, 'url' => ['view', 'id' => $model->bank_master_id]];
$this->params['breadcrumbs'][] = Yii::t('fees', 'Update');
?>

<div class="col-xs-12">
  <div class="col-lg-12 col-sm-12 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-edit"></i> <?php echo Yii::t('fees', 'Update Bank'); ?></h3></div>
</div>

<div class="bank-master-update">
    <?= $this->render('update_form', [
        'model' => $model,
    ]) ?>
</div>
