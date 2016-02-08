<?php
$this->breadcrumbs=array(
	'qualification'=>array('admin'),
	'Add',
);

$this->menu=array(
	//array('label'=>'List Qualification', 'url'=>array('index')),
	//array('label'=>'Manage Qualification', 'url'=>array('admin')),
	array('label'=>'', 'url'=>array('index'),'linkOptions'=>array('class'=>'List','title'=>'List')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
	
	
);
?>
<h1>Add Qualification</h1>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
