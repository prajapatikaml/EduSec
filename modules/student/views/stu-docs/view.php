<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\student\models\StuDocs */

$this->title = $model->stu_docs_id;
$this->params['breadcrumbs'][] = ['label' => 'Student Docs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stu-docs-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->stu_docs_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->stu_docs_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'stu_docs_id',
            'stu_docs_details',
            'stu_docs_category_id',
            'stu_docs_path',
            'stu_docs_submited_at',
            'stu_docs_status',
            'stu_docs_stu_master_id',
            'created_by',
        ],
    ]) ?>

</div>
