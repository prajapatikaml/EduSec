<?php
$this->breadcrumbs=array(
	'Employee Experience Trans'=>array('index'),
	'Add',
);

?>
<h1>Add Employee Experience</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'emp_exp'=>$emp_exp)); ?>
