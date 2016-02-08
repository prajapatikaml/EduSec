<?php
$this->breadcrumbs=array(
	'Role Masters'=>array('index'),
	$model->role_master_id,
);

$this->menu=array(
	array('label'=>'List RoleMaster', 'url'=>array('index')),
	array('label'=>'Create RoleMaster', 'url'=>array('create')),
	array('label'=>'Update RoleMaster', 'url'=>array('update', 'id'=>$model->role_master_id)),
	array('label'=>'Delete RoleMaster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->role_master_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RoleMaster', 'url'=>array('admin')),
);
?>

<h1>Role Master : <?php echo $model->role_master_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'role_master_id',
		'role_master_name',
	),
)); ?>
