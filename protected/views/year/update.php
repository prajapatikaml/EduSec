<?php
$this->breadcrumbs=array(
	'Years'=>array('admin'),
	$model->year,
	'Edit',
);

?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
