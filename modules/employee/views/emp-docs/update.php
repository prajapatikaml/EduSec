<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\employee\models\EmpDocs */

$this->title = 'Update Document: ' . ' ' . $model->emp_docs_id;
$this->params['breadcrumbs'][] = ['label' => 'Documents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->emp_docs_id, 'url' => ['view', 'id' => $model->emp_docs_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="emp-docs-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
