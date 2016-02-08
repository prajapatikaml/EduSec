<?php
$this->breadcrumbs=array(
	'Employee'=>array('admin'),
	'Add',
);
?>

<h1> Add Employee </h1>

<?php echo $this->renderPartial('create_form', array('model'=>$model,'info'=>$info,'user'=>$user)); ?>
