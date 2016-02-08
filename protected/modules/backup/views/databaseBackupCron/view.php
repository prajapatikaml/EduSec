<?php
$this->breadcrumbs=array(
	'Schedule Database Backup'=>array('admin'),
	$model->database_backup_cron_id,
);
?>
<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title"><span class="box-title">View Schedule Database Backup</span>
<div class="operation">
<?php echo CHtml::link('Back', array('admin'), array('class'=>'btnback'));?>
<?php echo CHtml::link('Edit', array('update' ,'id'=>$model->database_backup_cron_id), array('class'=>'btnupdate'));?>
<?php echo CHtml::link('Delete', array('delete' ,'id'=>$model->database_backup_cron_id), array('class'=>'btndelete','onclick'=>"return confirm('Are you sure want to delete?');"));?>
</div>
 </div>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
		  'name'=>'database_backup_cron_schedule_time_id',
		  'value'=>ScheduleTiming::model()->findByPk($model->database_backup_cron_schedule_time_id)->schedule_timing_name,
		),
		array(
		   'name'=>'database_backup_cron_created_by',
		   'value'=>User::model()->findByPk($model->database_backup_cron_created_by)->user_organization_email_id,
	),	
		array(
		   'name'=>'database_backup_cron_creation_date',
		   'value'=>($model->database_backup_cron_creation_date == 0000-00-00) ? 'Not Set' : date_format(new DateTime($model->database_backup_cron_creation_date), 'd-m-Y'),
	),
	),
	'htmlOptions'=> array('class'=>'custom-view'),
)); ?>
