<?php
$this->breadcrumbs=array(
	'Schedule Database Backups'=>array('admin'),
	$model->database_backup_cron_id,
	'Edit',
);

?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
