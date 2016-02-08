<?php
$this->breadcrumbs=array(
	'Student Photoses'=>array('index'),
	'Create',
);

/*$this->menu=array(
	array('label'=>'List StudentPhotos', 'url'=>array('index')),
	array('label'=>'Manage StudentPhotos', 'url'=>array('admin')),
);*/
?>

<h1>Create StudentPhotos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
