<?php
$this->breadcrumbs=array(
	'Idcard Field Formats'=>array('admin'),
	$model->idcard_id,
);

$this->menu=array(
//	array('label'=>'','url'=>array('index')),
	array('label'=>'','url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	array('label'=>'','url'=>array('update','id'=>$model->idcard_id),'linkOptions'=>array('class'=>'Edit','title'=>'Update')),
	array('label'=>'','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idcard_id),'confirm'=>'Are you sure you want to delete this item?','confirm'=>'Are you sure you want to delete this item?', 'class'=>'Delete','title'=>'Delete')),
	array('label'=>'','url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>View IdcardFieldFormat</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idcard_id',
		'stud_emp_type',
		'idtemplate_name',
		'selected_field_name',
		'selected_field_label',
		'label_priority',
		'idcard_org_id',
		'idcard_created_by',
		'idcard_creation_date',
	),
)); ?></div>
