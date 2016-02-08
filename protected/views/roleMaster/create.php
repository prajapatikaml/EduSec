<?php
$this->breadcrumbs=array(
	'Role Masters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RoleMaster', 'url'=>array('index')),
	array('label'=>'Manage RoleMaster', 'url'=>array('admin')),
);
?>

<h1>Create RoleMaster</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>