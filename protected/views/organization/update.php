<?php
$this->breadcrumbs=array(
	'Institute'=>array('view', 'id'=>$model->organization_id),
	//$model->organization_name=>array('view','id'=>$model->organization_id),
	$model->organization_name=>array(),
	'Edit',
);

?>

<h1>Edit Institute </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
