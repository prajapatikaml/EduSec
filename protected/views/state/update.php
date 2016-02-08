<?php
$this->breadcrumbs=array(
	'State'=>array('admin'),
	//$model->state_name=>array('view','id'=>$model->state_id),
	$model->state_name,
	'Edit',
);

?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
