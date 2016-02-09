<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\student\models\StuDocs */

$this->title = 'Update Student Docs: ' . ' ' . $model->stu_docs_id;
$this->params['breadcrumbs'][] = ['label' => 'Student Docs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->stu_docs_id, 'url' => ['view', 'id' => $model->stu_docs_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="stu-docs-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
