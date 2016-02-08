<?php
$this->breadcrumbs=array(
	'Organizations'=>array('admin'),
	'Add',
);

$this->menu=array(
//	array('label'=>'List Organization', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Add Organization</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
