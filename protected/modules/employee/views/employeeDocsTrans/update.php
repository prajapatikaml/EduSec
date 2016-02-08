<?php
$this->breadcrumbs=array(
	'Employee Docs Trans'=>array('index'),
	$model->employee_docs_trans_id=>array('view','id'=>$model->employee_docs_trans_id),
	'Update',
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
