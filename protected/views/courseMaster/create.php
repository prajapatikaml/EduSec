<?php
$this->breadcrumbs=array(
	'Course Masters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Create Course</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
