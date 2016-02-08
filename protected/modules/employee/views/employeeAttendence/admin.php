<?php
$this->breadcrumbs=array(
	'Employee Attendences'=>array('admin'),
	'Manage',
);

?>
<div class="portlet box blue">
<div class="portlet-title"><i class="fa fa-plus"></i><span class="box-title">Manage Employee Attendance</span>
<div class="operation">
<?php echo CHtml::link('PDF', array('/site/export.exportPDF', 'model'=>get_class($model)), array('class'=>'btnyellow', 'target'=>'_blank'));?>
<?php echo CHtml::link('Excel', array('/site/export.exportExcel', 'model'=>get_class($model)), array('class'=>'btnblue'));?>
</div>

<?php
$dataProvider = $model->search();
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];
$dataProvider->getPagination()->setPageSize($pageSize);
?>

</div><!-- search-form -->
<?php $months = array();

for( $i = 1; $i <= 12; $i++ ) {
    	$months[$i] = strftime( '%B', mktime( 0, 0, 0, $i, 1 ) );
     
}?>

<?php

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'employee-attendence-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'afterAjaxUpdate' => 'reInstallDatepicker',
	'filter'=>$model,
	'selectionChanged'=>"function(id){
		window.location='" . Yii::app()->urlManager->createUrl('employee/employeeAttendence/employeeupdate', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);
	}",
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
		
		array(
		'name'=>'employee_first_name',
		'value'=> '$data->Rel_Emp_Info->employee_first_name',
	          ),
		array(
		'name'=>'employee_last_name',
		'value'=> '$data->Rel_Emp_Info->employee_last_name',
	          ),	
		'attendence',			
		array(
                       'name'=>'date',
                       'header'=>'Date',
                       //'value'=>'date("d M Y",strtotime($data["work_date"]))'
                       'value'=>'date_format(date_create($data->date), "d-m-Y")',
		       'filter' =>$months,
                   ),		
		array(
			'name'=>'time1',
			'value'=>'($data->time1 == 00-00-00) ? "Not Set" : date("h:i:s A",strtotime($data->time1))',
		),
		array(
			'name'=>'time2',
			'value'=>'($data->time2 == 00-00-00) ? "Not Set" : date("h:i:s A",strtotime($data->time2))',
		),
		'total_hour',
		array(
                       'header'=>'Holiday Name',
                       'value'=>'(NationalHolidays::model()->findByAttributes(array("national_holiday_date"=>$data->date))) ? NationalHolidays::model()->findByAttributes(array("national_holiday_date"=>$data->date))->national_holiday_name :"Not Set"',
               ),
		//'overtime_hour',
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
</div>
