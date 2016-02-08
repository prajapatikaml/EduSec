<?php
$this->breadcrumbs=array(
	'Courses'=>array('admin'),
	//$model->course_id=>array('view','id'=>$model->course_id),
	'Update',
);
?>


<?php echo $this->renderPartial('_form', array('model'=>$model,'batch'=>$batch)); ?>
