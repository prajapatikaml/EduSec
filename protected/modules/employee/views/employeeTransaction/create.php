<?php
$this->breadcrumbs=array(
	'Employee'=>array('admin'),
	'Add',
);
?>

<?php echo $this->renderPartial('create_form', array('model'=>$model,'info'=>$info,'user'=>$user)); ?>
