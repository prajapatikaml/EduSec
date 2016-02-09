<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\employee\models\EmpAddress */

$this->title = 'Update Address: ' . ' ' . $model->emp_address_id;
$this->params['breadcrumbs'][] = ['label' => 'Addresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->emp_address_id, 'url' => ['view', 'id' => $model->emp_address_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="emp-address-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
