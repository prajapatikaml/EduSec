<?php
$this->breadcrumbs=array(
	'Schedule Database Backup'=>array('admin'),
	'Manage',
);
?>
<div class="portlet box blue">
<div class="portlet-title"><i class="icon-reorder"></i>
<span class="box-title">Manage Schedule Database Backup</span>
<div class="operation">
<?php echo CHtml::link('Add New', array('create'), array('class'=>'btn green'));?>
<?php echo CHtml::link('Back', array('/backup/default/index'), array('class'=>'btnback'));?>
</div>

</div>
<?php $dataProvider = $model->search();
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
$dataProvider->getPagination()->setPageSize($pageSize);?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'database-backup-cron-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'selectionChanged'=>"function(id){
		window.location='" . Yii::app()->urlManager->createUrl('/backup/databaseBackupCron/view', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);
	}",
	'columns'=>array(
	        array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		array(
		'name' => 'schedule_timing_name',
	        'value' => '$data->rel_schedule_time->schedule_timing_name',
                ),		
		array('name'=>'database_backup_cron_created_by',
			'value'=>'User::model()->findByPk($data->database_backup_cron_created_by)->user_organization_email_id',
		),

		array(
                'name'=>'database_backup_cron_creation_date',
                'value'=>'date_format(new DateTime($data->database_backup_cron_creation_date), "d-m-Y")',
	        ),
	),
	
)); ?></div>
