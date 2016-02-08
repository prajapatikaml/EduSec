<?php
$this->breadcrumbs=array(
	'Login Users'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List LoginUser', 'url'=>array('index')),
	array('label'=>'Create LoginUser', 'url'=>array('create')),
	array('label'=>'Update LoginUser', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete LoginUser', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LoginUser', 'url'=>array('admin')),
);
?>

<h1>View LoginUser #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'status',
		'log_in_time',
		'log_out_time',
	),
)); ?>
