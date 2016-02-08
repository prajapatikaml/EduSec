<?php
$this->breadcrumbs=array(
	'Batches'=>array('admin'),
	//$model->batch_name=>array('view','id'=>$model->batch_id),
	$model->batch_name,
	'Edit',
);
?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
