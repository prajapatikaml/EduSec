<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\employee\models\EmpInfo */

$this->title = Yii::t('emp', 'Update Employee: ') . ' ' . $model->emp_info_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('emp', 'Employee'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->emp_info_id, 'url' => ['view', 'id' => $model->emp_info_id]];
$this->params['breadcrumbs'][] = Yii::t('emp', 'Update');
?>
<div class="emp-info-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
