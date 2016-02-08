<?php
$this->breadcrumbs=array(
	'Student Docs Trans'=>array('index'),
	$model->student_docs_trans_id=>array('view','id'=>$model->student_docs_trans_id),
	'Update',
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
