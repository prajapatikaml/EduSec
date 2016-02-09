<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\employee\models\EmpDepartment */

$this->params['breadcrumbs'][] = ['label' => Yii::t('emp', 'Employee Departments'), 'url' => ['index']];

?>
<div class="col-xs-12">
  <div class="col-lg-12 col-sm-12 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-plus"></i> <?php echo Yii::t('emp', 'Add Department'); ?> </h3></div>
</div>
<div class="emp-department-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
