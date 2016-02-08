<?php
$this->breadcrumbs=array(
	'Item Category'=>array('admin'),
	//$model->cat_name=>array('view','id'=>$model->id),
	$model->cat_name,
	'Edit',
);

?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
