<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$model,
	'summaryText'=>false,
	'enableSorting'=>false,
	'enablePagination' => false,
	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		'batch_name',
		array(
		'name'=>'course_id',
		'value'=>'$data->course_id?$data->Rel_course->course_name:null',
		),
		'batch_fees',
		array(
		'name'=>'batch_start_date',
		'value'=>'(empty($data->batch_start_date) ? "Not Set" : date_format(new DateTime($data->batch_start_date), "d-m-Y"))',
		),
		array(
		'name'=>'batch_end_date',
		'value'=>'(empty($data->batch_end_date) ? "Not Set" : date_format(new DateTime($data->batch_end_date), "d-m-Y"))',
		),
		array('name'=>'batch_intake',

			'value'=>'($data->batch_intake==0)?"Not Set":$data->batch_intake',
		), 
	),
)); ?>
