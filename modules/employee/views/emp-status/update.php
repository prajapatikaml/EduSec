<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\employee\models\EmpStatus */

$this->title = 'Update Status: ' . ' ' . $model->emp_status_name;
$this->params['breadcrumbs'][] = ['label' => 'Employee', 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => 'Employee Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->emp_status_name, 'url' => ['view', 'id' => $model->emp_status_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="col-xs-12">
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-edit"></i> Update   Status</h3>
  </div>
  <div class="col-xs-4"></div>
    <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
	<div class="col-xs-4"></div>
	<div class="col-xs-4"></div>
	<div class="col-xs-4 left-padding">
	<?= Html::a('Back', ['index'], ['class' => 'btn btn-block btn-back']) ?>
	</div>
    </div>
 </div>
<div class="emp-status-update">

     <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
