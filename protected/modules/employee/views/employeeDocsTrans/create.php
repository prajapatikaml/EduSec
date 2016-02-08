<?php
$this->breadcrumbs=array(
	//'Employee Docs Trans'=>array('index'),
	'Add',
);

?>

<h1>Add Employee Document</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'emp_doc'=>$emp_doc)); ?>
