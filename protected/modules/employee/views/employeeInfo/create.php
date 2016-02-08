<?php
$this->breadcrumbs=array(
	'Employee Infos'=>array('index'),
	'Add',
);

$this->menu=array(
//	array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Add Employee Info</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'user'=>$user)); ?>
