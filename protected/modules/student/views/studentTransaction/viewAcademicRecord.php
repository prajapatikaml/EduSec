
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-docs-final_view',
	'dataProvider'=>$stud_qua->mysearch(),
	//'filter'=>$model,
	'summaryText'=>'',
	'enableSorting'=>false,
	'nullDisplay'=>'N/A',
	'columns'=>array(
	
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		
		array('name' => 'student_academic_record_trans_qualification_id',
	              'value' => '$data->Rel_student_qualification->qualification_name',
                     ),
		array('name' => 'student_academic_record_trans_eduboard_id',
			'value' => '$data->Rel_student_eduboard->eduboard_name',
                     ),
		array('name' => 'student_academic_record_trans_record_trans_year_id',
			'value' => '$data->student_academic_record_trans_record_trans_year_id',
                     ),
		array('name' => 'theory_percentage',
			'value' => '$data->theory_percentage',
                     ),
		array('name' => 'practical_percentage',
			'value' => '$data->practical_percentage',
                     ),
		
		
	),
	'pager'=>array(
		'class'=>'AjaxList',
		'maxButtonCount'=>$stud_qua->count(),
		'header'=>''
	    ),
	
)); 

?>

