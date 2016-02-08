<?php
$this->breadcrumbs=array(
	'Academic Record'=>array('/student/studentTransaction/studentacademicrecord', 'id'=>$_REQUEST['id']),
	'Add',
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
