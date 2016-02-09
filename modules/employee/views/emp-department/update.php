<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\employee\models\EmpDepartment */

$this->params['breadcrumbs'][] = ['label' => Yii::t('emp', 'Employee Departments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->emp_department_name, 'url' => ['view', 'id' => $model->emp_department_id]];
$this->params['breadcrumbs'][] = Yii::t('emp', 'Update');
?>
<div class="col-xs-12">
  <div class="col-lg-12 col-sm-12 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-edit"></i> <?php echo Yii::t('emp', 'Update Department'); ?></h3>
  </div>
 </div>

<div class="emp-department-update">

      <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
