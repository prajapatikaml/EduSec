<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\course\models\SectionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Manage Sections';
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
       <div class="section-index">
	<?php
	\yii\widgets\Pjax::begin(
	    [
		'id' => 'section-id',
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

		    'section_name',
		    [
			      'label' => 'Batch',
			      'attribute' => 'section_batch_id',
			      'value' => 'sectionBatch.batch_name',
			      'filter' => ArrayHelper::map(app\modules\course\models\Batches::find()->all(), 'batch_id', 'batch_name')
		    ],
		    'intake',
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
