<?php
$this->breadcrumbs=array(
	'Student Docs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List StudentDocs', 'url'=>array('index')),
	array('label'=>'Manage StudentDocs', 'url'=>array('admin')),
);
?>

<h1>Create StudentDocs</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>