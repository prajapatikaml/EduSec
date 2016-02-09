<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\student\models\StuMasterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('stu', 'Manage Students');
$this->params['breadcrumbs'][] = ['label' => Yii::t('stu', 'Student'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="col-xs-12">
  <div class="col-lg-8 col-sm-8 col-xs-12 no-padding edusecArLangCss"><h3 class="box-title"><i class="fa fa-th-list"></i> <?= $this->title ?></h3></div>
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
	<div class="col-xs-4 left-padding">
	<?php if(Yii::$app->user->can("/student/stu-master/create")) { ?>
            <?= Html::a(Yii::t('stu', 'ADD'), ['create'], ['class' => 'btn btn-block btn-success']) ?>
	<?php } ?>
	</div>
	<div class="col-xs-4 left-padding">
	<?php if(Yii::$app->user->can("/export-data/export-to-pdf")) { ?>
	<?= Html::a(Yii::t('stu', 'PDF'), ['/export-data/export-to-pdf', 'model'=>get_class($searchModel)], ['class' => 'btn btn-block btn-warning', 'target'=>'_blank']) ?>
	<?php } ?>
	</div>
	<div class="col-xs-4 left-padding">
	<?php if(Yii::$app->user->can("/export-data/export-excel")) { ?>
	<?= Html::a(Yii::t('stu', 'EXCEL'), ['/export-data/export-excel', 'model'=>get_class($searchModel)], ['class' => 'btn btn-block btn-primary', 'target'=>'_blank']) ?>
	<?php } ?>
	</div>
  </div>
</div>

<div class="col-xs-12" style="padding-top: 10px;">
   <div class="box">
      <div class="box-body table-responsive">
	<div class="stu-master-index">
	<?php $visible = Yii::$app->user->can("/student/stu-master/view") ? true : false; ?>
	<?php Pjax::begin([ 'enablePushState' => false ]); ?>
	    <?= GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'summary'=>'',
		'columns' => [
		    ['class' => 'yii\grid\SerialColumn'],

		    [
			'label' => Yii::t('stu', 'Student ID'),
			'attribute' => 'stu_unique_id',
			'value' => 'stuMasterStuInfo.stu_unique_id',
	 	    ],
	
		    [
			'label' => Yii::t('stu', 'First Name'),
			'attribute' => 'stu_first_name',
			'value' => 'stuMasterStuInfo.stu_first_name',
	 	    ],
		    [
			'label' => Yii::t('stu', 'Last Name'),
			'attribute' => 'stu_last_name',
			'value' => 'stuMasterStuInfo.stu_last_name',
	 	    ],
		 
		    [
			'label' => Yii::t('stu', 'Section'),
			  'attribute' => 'stu_master_section_id',
			'value' => 'stuMasterSection.section_name',
			'filter' => ArrayHelper::map(app\modules\course\models\Section::find()->where(['is_status' => 0])->all(), 'section_id', 'section_name', 'sectionBatch.batch_name')
		    ],
	    
		    [
			'label' => Yii::t('stu', 'Batch'),
			'attribute' => 'stu_master_batch_id',
			'value' => 'stuMasterBatch.batch_name',
			'filter' => ArrayHelper::map(app\modules\course\models\Batches::find()->where(['is_status' => 0])->all(), 'batch_id', 'batch_name', 'batchCourse.course_name')
		    ],
	 
		    [
			'label' => Yii::t('stu', 'Course'),
			'attribute' => 'stu_master_course_id',
			'value' => 'stuMasterCourse.course_name',
			'filter' => ArrayHelper::map(app\modules\course\models\Courses::find()->where(['is_status' => 0])->all(), 'course_id', 'course_name')
		    ],

		    [
			'class' => 'app\components\CustomActionColumn',
			'template' => '{view} {delete}',
			'buttons' => [
				'view' => function ($url, $model) {
				        return ((Yii::$app->user->can("/student/stu-master/view")) ? Html::a('<span class="glyphicon glyphicon-search"></span>', $url, ['title' => Yii::t('stu', 'View'),]) : '');
				    },
				'delete' => function ($url, $model) {
				        return ((Yii::$app->user->can("/student/stu-master/delete")) ? Html::a('<span class="glyphicon glyphicon-remove"></span>', $url, ['title' => Yii::t('stu', 'Delete'), 'data' => ['confirm' => Yii::t('stu', 'Are you sure you want to delete this item?'),'method' => 'post'],]) : '');
				    }
			],
			'visible' => $visible,
		    ],
		],
	    ]); ?>
	<?php Pjax::end(); ?>
   	</div>
      </div>
    </div>
</div>
