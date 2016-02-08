<?php
$this->breadcrumbs=array(
	'Employee Qualification'=>array('index'),
	'Add',
);

$this->menu=array(

//	array('label'=>'', 'url'=>array('index'),'linkOptions'=>array('class'=>'List','title'=>'List')),
	//array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),

);
?>

<h1>Add Employee Qualification</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
