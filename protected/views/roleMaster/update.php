<?php
$this->breadcrumbs=array(
	'Role Masters'=>array('index'),
	$model->role_master_id=>array('view','id'=>$model->role_master_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RoleMaster', 'url'=>array('index')),
	array('label'=>'Create RoleMaster', 'url'=>array('create')),
	array('label'=>'View RoleMaster', 'url'=>array('view', 'id'=>$model->role_master_id)),
	array('label'=>'Manage RoleMaster', 'url'=>array('admin')),
);
?>

<h1>Update Role Master : <?php echo $model->role_master_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
