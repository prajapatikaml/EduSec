<?php
$this->breadcrumbs=array(
	'Employee Addresses'=>array('index'),
	$model->employee_address_id,
);

$this->menu=array(
//	array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	array('label'=>'', 'url'=>array('update', 'id'=>$model->employee_address_id),'linkOptions'=>array('class'=>'Edit','title'=>'Update')),
	array('label'=>'', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->employee_address_id),'confirm'=>'Are you sure you want to delete this item?', 'class'=>'Delete','title'=>'Delete')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>View Employee Address : <?php echo $model->employee_address_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'employee_address_id',
		'employee_address_c_line1',
		'employee_address_c_line2',
		'employee_address_c_city',
		'employee_address_c_pincode',
		'employee_address_c_state',
		'employee_address_c_country',
		'employee_address_p_line1',
		'employee_address_p_line2',
		'employee_address_p_city',
		'employee_address_p_pincode',
		'employee_address_p_state',
		'employee_address_p_country',
		'employee_address_phone',
		'employee_address_mobile',
	),
)); ?>
