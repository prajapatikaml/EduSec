<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\student\models\StuMaster */

$this->title = $model->stuMasterStuInfo->stu_first_name." ".$model->stuMasterStuInfo->stu_last_name;
$this->params['breadcrumbs'][] = ['label' => 'Stu Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stu-master-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p style = "float:right">

	<?= Html::a('Guardian Info', ['adguardian', 'stu_id'=>$_REQUEST['id']], ['class'=>'btn btn-info']);?>
        <?= Html::a('Update', ['update', 'id' => $model->stu_master_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->stu_master_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
	<?php // Html::a('Guardian Info', ['adguardian', 'stu_id'=>$_REQUEST['id']], ['class'=>'btn btn-info']);?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
	    [
		'label' => 'Unique ID',
		'attribute' => 'stu_unique_id',
		'value' => $model->stuMasterStuInfo->stu_unique_id,
 	    ],
	
	    [
		'label' => 'First Name',
		'attribute' => 'stu_first_name',
		'value' => $model->stuMasterStuInfo->stu_first_name,
 	    ],
            [
		'label' => 'Last Name',
		'attribute' => 'stu_last_name',
		'value' => $model->stuMasterStuInfo->stu_last_name,
 	    ],

	    [
		'label' => 'Section',
		'attribute' => 'stu_master_section_id',
		'value' => $model->stuMasterSection->section_name,
 	    ],
    
	    [
		'label' => 'Batch',
		'attribute' => 'stu_master_batch_id',
		'value' => $model->stuMasterBatch->batch_name,
                ],
 
	    [
		'label' => 'Course',
		'attribute' => 'stu_master_course_id',
		'value' => $model->stuMasterCourse->course_name,
                ],
	    [
		'label' => 'Nationality',
		'attribute' => 'stu_master_nationality_id',
		'value' => $model->stuMasterNationality->nationality_name,
 	    ],
	
            [
		'label' => 'Category',
		'attribute' => 'stu_master_category_id',
		'value' => $model->stuMasterCategory->stu_category_name,
 	    ],
        ],
    ]) ?>

</div>
