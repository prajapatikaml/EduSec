<?php
$this->breadcrumbs=array(
	'Education Board'=>array('admin'),
	'Add',
);

$this->menu=array(
//	array('label'=>'', 'url'=>array('index'),'linkOptions'=>array('class'=>'List','title'=>'List')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Add Education Board</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
