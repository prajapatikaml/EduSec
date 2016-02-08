<?php
$this->breadcrumbs=array(
	'Organizations'=>array('admin'),
	//$model->organization_name=>array('view','id'=>$model->organization_id),
	$model->organization_name,
	'Edit',
);

?>

<?php echo $this->renderPartial('_uform', array('model'=>$model)); ?>
