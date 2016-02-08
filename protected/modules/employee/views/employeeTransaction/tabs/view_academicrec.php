<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'employee-academic-record-trans-grid',
	'dataProvider'=>$emp_record->mysearch(),
	//'filter'=>$model,
	'enableSorting'=>false,
	'summaryText'=>'',
	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		
		array('name' => 'employee_academic_record_trans_qualification_id',
	              'value' => '$data->Rel_employee_qualification->qualification_name',
                     ),
		array('name' => 'employee_academic_record_trans_eduboard_id',
			'value' => '$data->Rel_employee_eduboard->eduboard_name',
                     ),
		array('name' => 'employee_academic_record_trans_year_id',
			'value' => '$data->employee_academic_record_trans_year_id',
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
		'maxButtonCount'=>$emp_record->count(),
		'header'=>''
	    ),
));
?>
