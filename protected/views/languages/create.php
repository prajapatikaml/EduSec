<?php
$this->breadcrumbs=array(
	'Languages'=>array('admin'),
	'Add',
);

$this->menu=array(
	//array('label'=>'List Languages', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Add Language</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
