<?php
$this->breadcrumbs=array(
	'Bank'=>array('admin'),
	//$model->bank_full_name=>array('view','id'=>$model->bank_id),
	$model->bank_full_name,
	'Edit',
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
