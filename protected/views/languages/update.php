<?php
$this->breadcrumbs=array(
	'Languages'=>array('admin'),
	//$model->languages_name=>array('view','id'=>$model->languages_id),
	$model->languages_name,
	'Edit',
);

?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
