<?php
$this->breadcrumbs=array(
	'Currency Formats'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Add Currency Format</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
