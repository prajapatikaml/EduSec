<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\employee\models\EmpDocs */

$this->title = $model->emp_docs_id;
$this->params['breadcrumbs'][] = ['label' => 'Documents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="emp-docs-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
	<?= Html::a('<i class="fa fa-chevron-left"></i> Back', ['index'], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->emp_docs_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->emp_docs_id], [
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
          //  'emp_docs_id',
            'emp_docs_details',
           // 'emp_docs_category_id',
	     [
		'attribute' => 'emp_docs_category_id',
		'value' =>$model->empDocsCategory->doc_category_name 	
			 
 	    ],	
            'emp_docs_path',
            'emp_docs_submited_at',
            'emp_docs_status',
            [
		'attribute' => 'emp_docs_emp_master_id',
		'value' =>$model->empDocsEmpMaster->empMasterEmpInfo->emp_first_name." ".$model->empDocsEmpMaster->empMasterEmpInfo->emp_last_name
			 
 	    ],
            [
		'label' => 'Created By',
		'attribute' => 'createdBy.user_login_id',
	    ],
        ],
    ]) ?>

</div>
