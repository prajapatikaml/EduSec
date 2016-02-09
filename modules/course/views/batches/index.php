<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\modules\course\models\Courses;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\course\models\BatchesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Manage Batches';
$this->params['breadcrumbs'][] = ['label' => 'Course Management', 'url' => ['default/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-xs-12">
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-th-list"></i> <?= $this->title ?></h3></div>
  <div class="col-xs-4"></div>
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
	<div class="col-xs-4 left-padding">
        <?= Html::a('ADD', ['create'], ['class' => 'btn btn-block btn-success']) ?>
	</div>
	<div class="col-xs-4 left-padding">
	<?= Html::a('PDF', ['/export-data/export-to-pdf', 'model'=>get_class($searchModel)], ['class' => 'btn btn-block btn-warning', 'target'=>'_blank']) ?>
	</div>
	<div class="col-xs-4 left-padding">
	<?= Html::a('EXCEL', ['/export-data/export-excel', 'model'=>get_class($searchModel)], ['class' => 'btn btn-block btn-primary', 'target'=>'_blank']) ?>
	</div>
  </div>
</div>

<div class="col-xs-12" style="padding-top: 10px;">
   <div class="box">
      <div class="box-body table-responsive">
	<div class="batches-index">
	<?php
		\yii\widgets\Pjax::begin(
		    [
			'id' => 'batch-id',
			'enablePushState'=>false,
			'enableReplaceState' =>false,
		    ]
		); 
	?>
	    <?= GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'summary'=>'',
		'columns' => [
		    ['class' => 'yii\grid\SerialColumn'],

		    'batch_name',
		    'batch_alias',
		    [
			      'label' => 'Course',
			      'attribute' => 'batch_course_id',
			      'value' => 'batchCourse.course_name',
			      'filter' => ArrayHelper::map(app\modules\course\models\Courses::find()->all(), 'course_id', 'course_name')
		    ],
		    [
			'attribute' => 'start_date',
			'value' => function ($data) {
					return (!empty($data->start_date) ? Yii::$app->formatter->asDate($data->start_date) : ' - ');
				},
			'filter' => \yii\jui\DatePicker::widget([
		            'model'=>$searchModel,
		            'attribute'=>'start_date',
		            'clientOptions' =>[
		                'dateFormat' => 'dd-mm-yyyy',
		                'changeMonth'=> true,
		                'changeYear'=> true,
				'defaultValue'=>null,
				'yearRange'=>'1900:'.(date('Y')+1),
				'defaultDate'=> null,],
			     'options'=>[
				'id' => 'start_date',
		                'value' => NULL,
				'class'=>'form-control',
		                 ],
		        ]),
			'format' => 'html',	
		    ],
		    [
			'attribute' => 'end_date',
			'value' => function ($data) {
					return (!empty($data->end_date) ? Yii::$app->formatter->asDate($data->end_date) : ' - ');
				},
			'filter' => \yii\jui\DatePicker::widget([
		            'model'=>$searchModel,
		            'attribute'=>'end_date',
		            'clientOptions' =>[
		                'dateFormat' => 'dd-mm-yyyy',
		                'changeMonth'=> true,
		                'changeYear'=> true,
				'defaultValue'=>null,
				'defaultDate'=> null,
				'yearRange'=>'1900:'.(date('Y')+1),],
			     'options'=>[
				'id' => 'end_date',
		                'value' => NULL,
				'class'=>'form-control',
		                 ],
		        ]),
			'format' => 'html',	
		    ],
		    [
				'class' => '\pheme\grid\ToggleColumn',
				'contentOptions' => ['class' => 'text-center'],
				'attribute'=>'is_status',
				'enableAjax' => false,
				'filter'=>['1'=>'InActive', '0'=>'Active']
		    ], 
	    
		    ['class' => 'app\components\CustomActionColumn'],
		],
	    ]); ?>
	<?php \yii\widgets\Pjax::end(); ?>
	</div>
      </div>
    </div>
</div>
