<?php
$this->breadcrumbs=array(
	'Country'=>array('admin'),
	'Add',
);

$this->menu=array(
	//array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Add Country</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
