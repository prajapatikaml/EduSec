<?php
$this->breadcrumbs=array(
	'Student Attendences'=>array('admin'),
	'Add',
);

$this->menu=array(
	//array('label'=>'List Attendence', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Add Student Attendence</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'row1'=>$row1)); ?>
