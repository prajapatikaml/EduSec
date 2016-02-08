<?php
$this->breadcrumbs=array(
	'Country'=>array('admin'),
	//$model->name=>array('view','id'=>$model->id),
	$model->name,
	'Edit',
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
