<div id="form">

	
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-academic-record-trans-grid',
	'dataProvider'=>$stud_qua->mysearch(),
	//'filter'=>$model,
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
		'student_academic_record_trans_record_trans_year_id',
		array('name' => 'theory_mark_obtained',
			'value' => '$data->theory_mark_obtained',
                     ),
		array('name' => 'theory_mark_max',
			'value' => '$data->theory_mark_max',
                     ),
		array('name' => 'theory_percentage',
			'value' => '$data->theory_percentage',
                     ),
		array('name' => 'practical_mark_obtained',
			'value' => '$data->practical_mark_obtained',
                     ),
		array('name' => 'practical_mark_max',
			'value' => '$data->practical_mark_max',
                     ),
		array('name' => 'practical_percentage',
			'value' => '$data->practical_percentage',
                     ),
		
		array(
			'class'=>'MyCButtonColumn',
			'template' => '{update}{delete}',
	                'buttons'=>array(
				'update' => array(
					'url'=>'Yii::app()->createUrl("/student/studentAcademicRecordTrans/update", array("id"=>$data->student_academic_record_trans_id))',
					'options'=>array('id'=>'update-qualification'),
		                ),
				'delete' => array(
					'url'=>'Yii::app()->createUrl("/student/studentAcademicRecordTrans/delete", array("id"=>$data->student_academic_record_trans_id))',
				
		                ),
			),
		),
	),
	'pager'=>array(
		'class'=>'AjaxList',
	//	'maxButtonCount'=>25,
		'maxButtonCount'=>$stud_qua->count(),
		'header'=>''
	    ),
)); 

?>
</div>
