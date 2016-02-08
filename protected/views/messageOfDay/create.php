<?php
$this->breadcrumbs=array(
	'Message Of The Day'=>array('admin'),
	'Add',
);

$this->menu=array(
//	array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Add Message Of The Day</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
