<div class="form">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'employee-academic-record-trans-grid',
	'dataProvider'=>$employeerecords->mysearch(),
	//'filter'=>$model,
	'enableSorting'=>false,
	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		
		array('name' => 'employee_academic_record_trans_qualification_id',
	              'value' => '(!empty($data->Rel_employee_qualification->qualification_name) ? $data->Rel_employee_qualification->qualification_name : "Not Set")',
                     ),
		array('name' => 'employee_academic_record_trans_eduboard_id',
			'value' => '(!empty($data->Rel_employee_eduboard->eduboard_name) ? $data->Rel_employee_eduboard->eduboard_name : "Not Set")',
                     ),
		array('name' => 'employee_academic_record_trans_year_id',
			'value' => '(!empty($data->Rel_employee_year->year_name) ? $data->Rel_employee_year->year_name : "Not Set")',
                     ),
		 //'employee_academic_record_trans_year_id',
                array('name' => 'theory_mark_obtained',
			'value' => '(!empty($data->theory_mark_obtained) ? $data->theory_mark_obtained : "Not Set")',
                     ),
		array('name' => 'theory_mark_max',
			'value' => '(!empty($data->theory_mark_max) ? $data->theory_mark_max : "Not Set")',
                     ),
		array('name' => 'theory_percentage',
			'value' => '(!empty($data->theory_percentage) ? $data->theory_percentage : "Not Set")',
                     ),
		array('name' => 'practical_mark_obtained',
			'value' => '(!empty($data->practical_mark_obtained) ? $data->practical_mark_obtained : "Not Set")',
                     ),
		array('name' => 'practical_mark_max',
			'value' => '(!empty($data->practical_mark_max) ? $data->practical_mark_max : "Not Set")',
                     ),
		array('name' => 'practical_percentage',
			'value' => '(!empty($data->practical_percentage) ? $data->practical_percentage : "Not Set")',
                     ),
		
		array(
			'class'=>'CButtonColumn',
			'template' => '{update}{delete}',
	                'buttons'=>array(
			'update' => array(
				'url'=>'Yii::app()->createUrl("employee/employeeAcademicRecordTrans/update", array("id"=>$data->employee_academic_record_trans_id))',
				'options'=>array('id'=>'update-qualification'),
                        ),
			'delete' => array(
				'url'=>'Yii::app()->createUrl("employee/employeeAcademicRecordTrans/delete", array("id"=>$data->employee_academic_record_trans_id))',
                        ),
			),
		),
	),
	'pager'=>array(
		'class'=>'AjaxList',
	//	'maxButtonCount'=>25,
		'maxButtonCount'=>$employeerecords->count(),
		'header'=>''
	    ),
));
?>
</div>
