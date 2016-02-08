<?php
$this->breadcrumbs=array(
	'Employee Qualification'=>array('index'),
	$model->employee_academic_record_trans_id,
);

$this->menu=array(

	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
//	array('label'=>'', 'url'=>array('index'),'linkOptions'=>array('class'=>'List','title'=>'List')),
	array('label'=>'', 'url'=>array('update', 'id'=>$model->employee_academic_record_trans_id),'linkOptions'=>array('class'=>'Edit','title'=>'Update')),
	array('label'=>'', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->employee_academic_record_trans_id),'confirm'=>'Are you sure you want to delete this item?', 'class'=>'Delete','title'=>'Delete')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),

);
?>

<h1>View Employee Qualification : <?php echo $model->employee_academic_record_trans_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
//		'employee_academic_record_trans_id',
//		'employee_academic_record_trans_user_id',
//		'employee_academic_record_trans_qualification_id',
		array('name' => 'employee_academic_record_trans_qualification_id',
	              'value' => $model->Rel_employee_qualification->qualification_name,
                     ),
//		'employee_academic_record_trans_eduboard_id',
//		'employee_academic_record_trans_year_id',
		array('name' => 'employee_academic_record_trans_eduboard_id',
			'value' => $model->Rel_employee_eduboard->eduboard_name,
                     ),
		array('name' => 'employee_academic_record_trans_year_id',
			'value' => $model->Rel_employee_year->year,
                     ),

		'theory_mark_obtained',
		'theory_mark_max',
		'theory_percentage',
		'practical_mark_obtained',
		'practical_mark_max',
		'practical_percentage',
	),
)); ?>
