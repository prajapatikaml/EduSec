<?php
$this->breadcrumbs=array(
	'Certificates'=>array('admin'),
	//$model->certificate_title=>array('view','id'=>$model->certificate_id),
	$model->certificate_title,
	'Edit',
);

?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
