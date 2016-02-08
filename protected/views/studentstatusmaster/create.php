<?php
$this->breadcrumbs=array(
	'Student Status'=>array('admin'),
	'Add',
);

$this->menu=array(
	//array('label'=>'List Studentstatusmaster', 'url'=>array('index')),
	//array('label'=>'Manage Studentstatusmaster', 'url'=>array('admin')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Add Student Status</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
