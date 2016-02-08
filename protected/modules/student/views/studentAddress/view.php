<?php
$this->breadcrumbs=array(
	'Student Addresses'=>array('index'),
	$model->student_address_id,
);

$this->menu=array(
	array('label'=>'List StudentAddress', 'url'=>array('index')),
	array('label'=>'Create StudentAddress', 'url'=>array('create')),
	array('label'=>'Update StudentAddress', 'url'=>array('update', 'id'=>$model->student_address_id)),
	array('label'=>'Delete StudentAddress', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->student_address_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StudentAddress', 'url'=>array('admin')),
);
?>

<h1>Student Address : <?php echo $model->student_address_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'student_address_id',
		'student_address_c_line1',
		'student_address_c_line2',
		'student_address_c_country',
		'student_address_c_city',
		'student_address_c_pin',
		'student_address_c_state',
		'student_address_p_line1',
		'student_address_p_line2',
		'student_address_p_city',
		'student_address_p_pin',
		'student_address_p_state',
		'student_address_p_country',
		'student_address_phone',
		'student_address_mobile',
	),
)); ?>
