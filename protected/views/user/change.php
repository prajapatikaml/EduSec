<?php
$this->breadcrumbs=array(
	'Change Password',
);

/*
$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'View User', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
*/
?>

<?php echo $this->renderPartial('_changeform', array('model'=>$model)); ?>
