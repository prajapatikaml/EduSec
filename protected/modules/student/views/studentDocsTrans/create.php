<?php
$this->breadcrumbs=array(
	'Student Document'=>array('/studentTransaction/update','id'=>$_REQUEST['id']),
	'Add',
);

?>

<?php echo $this->renderPartial('_form', array('model'=>$model,'stud_doc'=>$stud_doc)); ?>
