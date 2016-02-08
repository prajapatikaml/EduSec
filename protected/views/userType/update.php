<?php
$this->breadcrumbs=array(
	'User Types'=>array('admin'),
	//$model->user_type_id=>array('view','id'=>$model->user_type_id),
	$model->user_type_name,
	'Edit',
);

?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
