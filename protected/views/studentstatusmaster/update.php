<?php
$this->breadcrumbs=array(
	'Student Status'=>array('admin'),
	$model->status_name=>array(),
	'Edit',
);

?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
