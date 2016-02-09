<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\student\models\StuDocsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Student Docs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stu-docs-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Student Docs', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'stu_docs_details',
	    [
		'label' => 'Category',
		'attribute' => 'stu_docs_category_id',
		'value' => 'stuDocsCategory.doc_category_name',
 	    ],
            'stu_docs_path',
	    [
		'attribute' => 'stu_docs_stu_master_id',
		'value' => function ($data) {
				return $data->stuDocsStuMaster->stuMasterStuInfo->stu_first_name." ".$data->stuDocsStuMaster->stuMasterStuInfo->stu_last_name;
			   }
 	    ],
            'stu_docs_submited_at',
            // 'stu_docs_status',
            // 'stu_docs_stu_master_id',
            // 'created_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
