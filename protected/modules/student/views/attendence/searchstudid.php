<?php
$this->breadcrumbs=array(
	'Attendences'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List Attendence', 'url'=>array('index')),
	//array('label'=>'Manage Attendence', 'url'=>array('admin')),
);
?>

<h1>Create Attendence</h1>

<?php echo $this->renderPartial('searchid', array('model'=>$model,'row1'=>$row1)); ?>
