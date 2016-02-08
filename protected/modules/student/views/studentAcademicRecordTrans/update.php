<?php
$this->breadcrumbs=array(
	'Student Student Qualification'=>array('index'),
	$model->student_academic_record_trans_id=>array('view','id'=>$model->student_academic_record_trans_id),
	'Edit',
);

?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
