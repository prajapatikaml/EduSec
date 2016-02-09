<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MsgOfDaySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Message of Day List';
$this->params['breadcrumbs'][] = ['label' => 'Dashboard', 'url' => ['default/index']];
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
	<div class="msg-of-day-index">
	<?php Pjax::begin([
		'enablePushState' => false,
		]); ?>
	    <?= GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'summary'=>'',
		'columns' => [
		    ['class' => 'yii\grid\SerialColumn'],
		  
		    'msg_details',
		    [
			'attribute' => 'msg_user_type',
			'value' => function ($model) {
						return (($model->msg_user_type == 'S') ? 'Student' : (($model->msg_user_type == 'E') ? "Employee" : "General" )); 
					},
			'filter' => ['S' => 'Student', 'E' => 'Employee', '0' => 'General'],
		   ],
		   [
				'class' => '\pheme\grid\ToggleColumn',
				'attribute'=>'is_status',
				'enableAjax' => true,
				'filter'=>['0'=>'Active', '1'=>'Deactive']
		   ],

		   ['class' => 'app\components\CustomActionColumn'],
		],
	    ]); 
	   Pjax::end();
	  ?>
	</div>
      </div>
   </div>
</div>
