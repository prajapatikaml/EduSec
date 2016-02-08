<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Add',
);

$this->menu=array(
//	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Add Admin</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
