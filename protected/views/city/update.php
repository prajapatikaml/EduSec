<?php
$this->breadcrumbs=array(
	'City'=>array('admin'),
	$model->city_name,
	'Edit',
);

?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
