<?php
$this->breadcrumbs=array(
	'Schedule Timings'=>array('admin'),
	'Manage',
);
?>
<div class="portlet box blue">
<i class="icon-reorder"></i>
<div class="portlet-title"><span class="box-title"> Manage Schedule Timings</span>
<div class="operation">
<?php echo CHtml::link('Add New', array('create', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'btn green'))?>
</div>
</div>
<?php
$dataProvider = $model->search();
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];
$dataProvider->getPagination()->setPageSize($pageSize);
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'schedule-timing-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'selectionChanged'=>"function(id){
		window.location='" . Yii::app()->urlManager->createUrl('/student/ScheduleTiming/View', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);
	}",
	'columns'=>array(
	array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		array(
		'name'=>'schedule_timing_minute',
		'value'=>'($data->schedule_timing_minute==60)?"*":$data->schedule_timing_minute',
		         
		),
		array(
		'name'=>'schedule_timing_hour',
		'value'=>'($data->schedule_timing_hour==24)?"*":$data->schedule_timing_hour',
		         
		),

		array(
		'name'=>'schedule_timing_date',
		'value'=>'($data->schedule_timing_date==32)?"*":$data->schedule_timing_date',
		         
		),
		array(
		'name'=>'schedule_timing_month',
		'value'=>'$data->schedule_timing_month',
		         
		),
		array(
		'name'=>'schedule_timing_day',
		'value'=>'$data->schedule_timing_day',
		         
		),
		'schedule_timing_name',
		
	),
	'pager'=>array(
		'class'=>'AjaxList',
		//'maxButtonCount'=>25,
		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),
	
)); ?></div>
