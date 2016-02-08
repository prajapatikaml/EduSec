<?php
$this->breadcrumbs=array(
	'Nationality'=>array('admin'),
	//$model->nationality_name=>array('view','id'=>$model->nationality_id),
	$model->nationality_name,
	'Edit',
);
?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
