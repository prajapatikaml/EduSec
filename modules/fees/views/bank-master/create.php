<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\fees\models\BankMaster */

//$this->title = 'Bank';
//$this->params['breadcrumbs'][] = ['label' => 'Bank ', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-xs-12">
  <div class="col-lg-4 col-sm-6 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-plus"></i> Add Bank</h3></div>
</div>

<div class="bank-master-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
