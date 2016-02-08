<?php
$this->breadcrumbs=array(
	'Nationality'=>array('admin'),
	'Add',
);

$this->menu=array(
//	array('label'=>'List Nationality', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Add Nationality</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
