<?php
$this->breadcrumbs=array(
	'State'=>array('admin'),
	'Add',
);

$this->menu=array(
	//array('label'=>'List State', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Add State</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
