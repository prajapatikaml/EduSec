<?php
$this->breadcrumbs=array(
	'Attendences'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>' ', 'url'=>array('index')),
	array('label'=>' ', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	array('label'=>'', 'url'=>array('update', 'id'=>$model->id),'linkOptions'=>array('class'=>'Update','title'=>'Update')),
	array('label'=>'', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?','class'=>'Delete','title'=>'Delete')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>View Attendence #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
		'name'=>'student_first_name',
//                'type'=>'raw',		
                'value'=> $model->rel_atd_student->student_first_name,
	          ),
		//'id',
		//'st_id',
		//'shift_id',
		//'branch_id',
		//'sem_id',
		//'div_id',
		//'sub_id',
		//'batch_id',

		'attendence',		
		array(
		'name'=>'shift_type',
//                'type'=>'raw',		
                'value'=> $model->rel_atd_shift->shift_type,
	          ),
		array(
		'name'=>'branch_name',
//                'type'=>'raw',		
                'value'=> $model->rel_atd_branch->branch_name,
	          ),
		array(
		'name'=>'academic_term_period',
//                'type'=>'raw',		
                'value'=> $model->rel_atd_sem->academic_term_period,
		),
	       array(
		'name'=>'division_name',
//                'type'=>'raw',		
                'value'=> $model->rel_atd_division->division_name,
	          ),
		 array(
		'name'=>'subject_master_name',
//                'type'=>'raw',		
                'value'=> $model->rel_atd_subject->subject_master_name,
	          ),
		array(
		'name'=>'batch_name',
//                'type'=>'raw',		
                'value'=> $model->rel_atd_batch->batch_name,
	          ),
				'timetable_id',
	),
)); ?>

