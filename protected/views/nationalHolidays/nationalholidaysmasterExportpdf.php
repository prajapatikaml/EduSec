<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'national-holidays-grid',
	'dataProvider'=>$model,
	'summaryText'=>false,
	'enableSorting'=>false,
	'enablePagination' => false,
	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),		
		array(
                        'name' => 'national_holiday_date',
			'value'=>'($data->national_holiday_date == 0000-00-00) ? "Not Set" : date_format(new DateTime($data->national_holiday_date), "d-m-Y")',
                        ), 
		'national_holiday_name',
		array(
                'name'=>'national_holiday_remarks',
		'value'=>'($data->national_holiday_remarks == "") ? "Not Set" : $data->national_holiday_remarks',
               	),
	),
)); 
?>

