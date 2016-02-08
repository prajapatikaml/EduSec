<?php
$this->breadcrumbs=array(
	'Education Board'=>array('admin'),
	//$model->eduboard_name=>array('view','id'=>$model->eduboard_id),
	$model->eduboard_name,	
	'Edit',
);

?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
