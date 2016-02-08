<?php
$this->breadcrumbs=array(
	'Employee Attendences'=>array('admin'),
	'Manage',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('employee-attendence-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Employee Attendences</h1>


<?php

$dataProvider = $model->month_empattendance($emp_id,$month);
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];
$dataProvider->getPagination()->setPageSize($pageSize);
?>

</div><!-- search-form -->

<?php

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'employee-attendence-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'afterAjaxUpdate' => 'reInstallDatepicker',
	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		array(
		'name'=>'employee_no',		
                'value'=> '$data->Rel_Emp_Info->employee_no',
	          ),
		array(
		'name'=>'employee_attendance_card_id',
		'value'=> '$data->Rel_Emp_Info->employee_attendance_card_id',
	          ),
		'attendence',		
		array(
		'name'=>'employee_first_name',
		'value'=> '$data->Rel_Emp_Info->employee_first_name',
	          ),		
		array(
                        'name' => 'date',
			'value'=>'($data->date == 0000-00-00) ? "Not Set" : date_format(new DateTime($data->date), "d-m-Y")',
                         'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                'model' => $model, 
                                'attribute' => 'date',
				//'id'=>'date',
                                'options'=>array(
				'dateFormat'=>'dd-mm-yy',
				'changeYear'=>'true',
				'changeMonth'=>'true',
				'showAnim' =>'slide',
				'yearRange'=>'1900:'.(date('Y')+1),
				'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',			
		    ),
		    'htmlOptions'=>array(
			'id'=>'date',
		     ),
			
                        ), 
                        true),

                ),
		array(
                       'header'=>'Holiday Name',
                       'value'=>'(NationalHolidays::model()->findByAttributes(array("national_holiday_date"=>$data->date))) ? NationalHolidays::model()->findByAttributes(array("national_holiday_date"=>$data->date))->national_holiday_name :"Not Set"',
               ),
		'total_hour',
		array(
			'name'=>'time1',
			'value'=>'($data->time1 == 00-00-00) ? "Not Set" : date("h:i:s A",strtotime($data->time1))',
		),
		array(
			'name'=>'time2',
			'value'=>'($data->time2 == 00-00-00) ? "Not Set" : date("h:i:s A",strtotime($data->time2))',
		),
		'overtime_hour',
		array(
			'class'=>'MyCButtonColumn',
			'template' => '{update}',
			 'buttons'=>array(
                        
                        'update' => array(
				'url'=>'Yii::app()->createUrl("Employee_attendence/employeeupdate", array("id"=>$data->employee_attendence_id))',
                        ),
                ),
			
		),
		
		
	),
		'pager'=>array(
		'class'=>'AjaxList',
		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),
)); 
Yii::app()->clientScript->registerScript('for-date-picker',"
function reInstallDatepicker(id, data){
        $('#date').datepicker({'dateFormat':'dd-mm-yy'});
}
");?>

