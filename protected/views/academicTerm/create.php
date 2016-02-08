<?php
$this->breadcrumbs=array(
	'Semester'=>array('admin'),
	'Add',
);

$this->menu=array(
//	array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Add Semester</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
