<?php
$this->breadcrumbs=array(
	'Schedule Timings'=>array('admin'),
	$model->schedule_timing_id,
	'Edit',
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
