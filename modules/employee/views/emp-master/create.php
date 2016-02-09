<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\employee\models\EmpMaster */

$this->title = 'Add Employee';
$this->params['breadcrumbs'][] = ['label' => 'Employee', 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => 'Manage Employee', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-xs-12">
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-plus"></i> 
	<?= Html::encode($this->title) ?></h3>
  </div>
</div>

<div class="emp-master-create">
    <?= $this->render('_form', ['model' => $model, 'info' => $info, 'empno'=>$empno]) ?>
</div>
  
