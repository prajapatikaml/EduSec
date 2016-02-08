<?php
$this->breadcrumbs=array(
	'Student Academic Record Trans'=>array('index'),
	$model->student_academic_record_trans_id,
);

$this->menu=array(

	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
//	array('label'=>'', 'url'=>array('index'),'linkOptions'=>array('class'=>'List','title'=>'List')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
	array('label'=>'', 'url'=>array('update', 'id'=>$model->student_academic_record_trans_id),'linkOptions'=>array('class'=>'Edit','title'=>'Update')),
	array('label'=>'', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->student_academic_record_trans_id),'confirm'=>'Are you sure you want to delete this item?', 'class'=>'Delete','title'=>'Delete')),
);
?>

<h1>View Student Academic Record : <?php echo $model->student_academic_record_trans_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		
		//'student_academic_record_trans_id',
		//'student_academic_record_trans_stud_id',
		//'student_academic_record_trans_qualification_id',
		array('name' => 'student_academic_record_trans_qualification_id',
	              'value' => $model->Rel_student_qualification->qualification_name,
                     ),
		//'student_academic_record_trans_eduboard_id',
		//'student_academic_record_trans_record_trans_year_id',
		array('name' => 'student_academic_record_trans_eduboard_id',
			'value' => $model->Rel_student_eduboard->eduboard_name,
                     ),
		array('name' => 'student_academic_record_trans_record_trans_year_id',
			'value' => $model->Rel_student_year->year,
                     ),
		'theory_mark_obtained',
		'theory_mark_max',
		'theory_percentage',
		'practical_mark_obtained',
		'practical_mark_max',
		'practical_percentage',
	),
)); ?>
