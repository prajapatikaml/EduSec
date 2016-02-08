<?php
$this->breadcrumbs=array(
	'Employee Document'=>array('employeeTransaction/update','id'=>$_REQUEST['id']),
	'Add',
);

?>

<?php echo $this->renderPartial('_form', array('model'=>$model,'emp_doc'=>$emp_doc)); ?>
