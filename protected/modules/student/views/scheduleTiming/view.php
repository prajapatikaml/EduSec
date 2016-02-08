<?php
$this->breadcrumbs=array(
	'Schedule Timings'=>array('admin'),
	$model->schedule_timing_id,
);
?>
<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title"><span class="box-title"> View Schedule Timing</span>
 <div class="operation">
<?php echo CHtml::link('Back',array('admin'), array('class'=>'btnback'));?>
<?php echo CHtml::link('Edit',array('update','id'=>$model->schedule_timing_id), array('class'=>'btnupdate'));?>

</div>
</div>

<?php $this->widget('application.extensions.DetailView4Col', array(
	'data'=>$model,
	'attributes'=>array(
		array(
		'name'=>'schedule_timing_minute',
		'value'=>($model->schedule_timing_minute==60)?"*":$model->schedule_timing_minute,
		),
		array(
		'name'=>'schedule_timing_hour',
		'value'=>($model->schedule_timing_hour==24)?"*":$model->schedule_timing_hour,
      		),
		array(
		'name'=>'schedule_timing_date',
		'value'=>($model->schedule_timing_date==32)?"*":$model->schedule_timing_date,
		),
		'schedule_timing_day',
		'schedule_timing_month',
	),
	'htmlOptions'=> array('class'=>'custom-view'),
)); ?></div>
