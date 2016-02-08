<?php
$this->breadcrumbs=array(
	'Qualification'=>array('index'),
	//$model->qualification_name=>array('view','id'=>$model->qualification_id),
	$model->qualification_name,
	'Edit',
);

?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
