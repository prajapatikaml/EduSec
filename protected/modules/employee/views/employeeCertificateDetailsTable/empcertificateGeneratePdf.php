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
		array('name'=>'employee_first_name',
			'value'=>'$data->cer_employee_id->employee_first_name.\'----\'.$data->cer_employee_id->employee_attendance_card_id',
			//'value'=>'$data->a.\' \'.$data->b.\' \'.$data->c',
		),		

		array('name'=>'employee_certificate_type_id',
			'value'=>'Certificate::model()->findByPk($data->employee_certificate_type_id)->certificate_title',
			'filter' =>Certificate::items1(),

		),
	),
)); ?>
