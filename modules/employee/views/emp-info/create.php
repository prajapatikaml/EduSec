<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\employee\models\EmpInfo */

$this->title = 'Create Employee';
$this->params['breadcrumbs'][] = ['label' => 'Employee ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="emp-info-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
