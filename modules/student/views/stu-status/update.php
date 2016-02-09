<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\student\models\StuStatus */

$this->params['breadcrumbs'][] = ['label' => 'Student Status', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->stu_status_name, 'url' => ['view', 'id' => $model->stu_status_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="col-xs-12">
  <div class="col-lg-4 col-sm-6 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-edit"></i> Update Student Status</h3></div>
</div>

<div class="stu-status-update">
    <?= $this->render('_form', ['model' => $model,]) ?>
</div>
