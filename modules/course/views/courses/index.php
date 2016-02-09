<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\course\models\CoursesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('course', 'Manage Courses');
$this->params['breadcrumbs'][] = ['label' => Yii::t('course', 'Course Management'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-xs-12">
  <div class="col-lg-8 col-sm-8 col-xs-12 no-padding edusecArLangCss"><h3 class="box-title"><i class="fa fa-th-list"></i> <?php echo Yii::t('course', 'Manage Courses') ?></h3></div>
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
	<div class="col-xs-4 left-padding">
	 <?php if(Yii::$app->user->can("/course/courses/create")) { ?>
             <?= Html::a(Yii::t('course', 'ADD'), ['create'], ['class' => 'btn btn-block btn-success']) ?>
	 <?php } ?>
	</div>
	<div class="col-xs-4 left-padding">
	<?php if(Yii::$app->user->can("/export-data/export-to-pdf")) { ?>
	    <?= Html::a(Yii::t('course', 'PDF'), ['/export-data/export-to-pdf', 'model'=>get_class($searchModel)], ['class' => 'btn btn-block btn-warning', 'target'=>'_blank']) ?>
	<?php } ?>
	</div>
	<div class="col-xs-4 left-padding">
	<?php if(Yii::$app->user->can("/export-data/export-excel")) { ?>
	    <?= Html::a(Yii::t('course', 'EXCEL'), ['/export-data/export-excel', 'model'=>get_class($searchModel)], ['class' => 'btn btn-block btn-primary', 'target'=>'_blank']) ?>
	<?php } ?>
	</div>
  </div>
</div>

<div class="col-xs-12" style="padding-top: 10px;">
   <div class="box">
      <div class="box-body table-responsive">
	<div class="courses-index">
	<?php $visible = Yii::$app->user->can("/course/courses/create") ? true : false; ?>
	<?php
	\yii\widgets\Pjax::begin(
	    [
		'id' => 'course-id',
		'enablePushState'=>false,
		'enableReplaceState' =>false,
	    ]
	); ?>
	    <?= GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'summary'=>'',
		'columns' => [
		    ['class' => 'yii\grid\SerialColumn'],

		    'course_name',
		    'course_code',
		    'course_alias',
		    [
			'class' => '\pheme\grid\ToggleColumn',
			'contentOptions' => ['class' => 'text-center'],
			'attribute'=>'is_status',
			'enableAjax' => false,
			'filter'=>['0'=>'Active', '1'=>'Inactive']
		    ],
		    [
			'class' => 'app\components\CustomActionColumn',
			'visible' => $visible,
		    ],
		],
	    ]); ?>
	<?php \yii\widgets\Pjax::end(); ?>
       </div>
     </div>
   </div>
</div>
