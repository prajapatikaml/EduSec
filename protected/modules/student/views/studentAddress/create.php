<?php
$this->breadcrumbs=array(
	'Student Addresses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List StudentAddress', 'url'=>array('index')),
	array('label'=>'Manage StudentAddress', 'url'=>array('admin')),
);
?>

<h1>Create StudentAddress</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>