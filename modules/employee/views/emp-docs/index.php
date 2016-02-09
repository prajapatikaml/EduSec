<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\employee\models\EmpDocsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Documents';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="emp-docs-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Document', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'emp_docs_details',
	    [
		'label' => 'Category',
		'attribute' => 'emp_docs_category_id',
		'value' => 'empDocsCategory.doc_category_name',
 	    ],
	     [
		'attribute' => 'emp_docs_emp_master_id',
		'value' => function ($data) {
				return $data->empDocsEmpMaster->empMasterEmpInfo->emp_first_name." ".$data->empDocsEmpMaster->empMasterEmpInfo->emp_last_name;
			   }
 	    ],	
            'emp_docs_path',
            'emp_docs_submited_at',
           
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
