<?php $this->widget('ext.selgridview.SelGridView', array(
	'dataProvider'=>$model,
	'summaryText'=>false,
	'enableSorting'=>false,
	'enablePagination' => false,
	'columns'=>array(
		 array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		array('name'=>'student_first_name',
			'value'=>'$data->cer_student_id->student_first_name',
		), 
		array('name'=>'student_last_name',
			'value'=>'$data->cer_student_id->student_last_name',
		), 
		array('name'=>'student_certificate_type_id',
			'value'=>'Certificate::model()->findByPk($data->student_certificate_type_id)->certificate_title',
			'filter' =>Certificate::items(),

		),
		'certificate_reference_number',
	),
)); ?>

