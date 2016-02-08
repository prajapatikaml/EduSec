<?php
$this->breadcrumbs=array(
	'Document'=>array('/student/studentTransaction/studentdocs', 'id'=>$_REQUEST['id']),
	'Add',
);

?>
<?php echo $this->renderPartial('_form', array('model'=>$model,'stud_doc'=>$stud_doc)); ?>
