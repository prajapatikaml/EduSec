<?php
$this->breadcrumbs=array(
	'Parent Logins'=>array('admin'),
	$model->parent_id,
);

$this->menu=array(
//	array('label'=>'','url'=>array('index')),
	array('label'=>'','url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'','url'=>array('update','id'=>$model->parent_id),'linkOptions'=>array('class'=>'Edit','title'=>'Edit')),
	array('label'=>'','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->parent_id),'confirm'=>'Are you sure you want to delete this item?','confirm'=>'Are you sure you want to delete this item?', 'class'=>'Delete','title'=>'Delete')),
	array('label'=>'','url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>View ParentLogin</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'parent_id',
		'parent_user_name',
		'parent_password',
		'created_by',
		'creation_date',
	),
)); ?>
