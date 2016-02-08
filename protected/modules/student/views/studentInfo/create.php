<?php
$this->breadcrumbs=array(
	'Student Infos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List StudentInfo', 'url'=>array('index')),
	array('label'=>'Manage StudentInfo', 'url'=>array('admin')),
);
?>

<h1>Create StudentInfo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>