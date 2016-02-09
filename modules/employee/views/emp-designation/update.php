<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\employee\models\EmpDesignation */

$this->params['breadcrumbs'][] = ['label' => Yii::t('emp', 'Employee Designations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->emp_designation_name, 'url' => ['view', 'id' => $model->emp_designation_id]];
$this->params['breadcrumbs'][] = Yii::t('emp', 'Update');
?>
<div class="col-xs-12">
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding edusecArLangCss"><h3 class="box-title"><i class="fa fa-edit"></i> <?php echo Yii::t('emp', 'Update Designation'); ?></h3>
  </div>
 </div>
<div class="emp-designation-update">

	<?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
