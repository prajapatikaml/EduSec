<?php
$this->breadcrumbs=array(
	'Courses'=>array('admin'),
	'Create',
);

?>

<?php echo $this->renderPartial('_form', array('model'=>$model,'batch'=>$batch)); ?>
