<?php
$this->breadcrumbs=array(
	'Employee'=>array('leftresignemployee'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'', 'url'=>array('ExportToPDFExcel/resignemployeeexcel'),'linkOptions'=>array('class'=>'export-excel','title'=>'Export To Excel','target'=>'_blank')),
	
	array('label'=>'', 'url'=>array('Resignemployee','sbrexportexcel'=>'excel'),'linkOptions'=>array('class'=>'export-excel','title'=>'Export to Excel','target'=>'_blank')),	

);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('employee-transaction-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Resign Employees</h1>


<?php
$dataProvider = $model->resignsearch();
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];

$dataProvider->getPagination()->setPageSize($pageSize);
?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'employee-transaction-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'ajaxUpdate'=>false,
	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		array(
		      'header' => 'Attendence Card No',
		      'name' => 'employee_attendance_card_id',
	              'value' => '$data->Rel_Emp_Info->employee_attendance_card_id',
                     ),
		 array(
		      'header' => 'Name',
		      'name' => 'employee_first_name',
	              'value' => '$data->Rel_Emp_Info->employee_first_name',
                     ),

		 array(
		      'header' => 'Surname',
		      'name' => 'employee_last_name',
	              'value' => '$data->Rel_Emp_Info->employee_last_name',
                     ),
		 
		 array(
			'header' => 'Designation',
			'name'=>'employee_transaction_designation_id',
			'value'=>'EmployeeDesignation::model()->findByPk($data->employee_transaction_designation_id)->employee_designation_name',
		'filter' =>CHtml::listData(EmployeeDesignation::model()->findAll(),
	'employee_designation_id','employee_designation_name'),

		),
		array(
			'header' => 'Department',		
			'name'=>'employee_transaction_department_id',
			'value'=>'Department::model()->findByPk($data->employee_transaction_department_id)->department_name',
				'filter' =>CHtml::listData(Department::model()->findAll(),'department_id','department_name'),

		), 
		array(  
			'header' => 'Shift',
			'name'=>'employee_transaction_shift_id',
			'value'=>'Shift::model()->findByPk($data->employee_transaction_shift_id)->shift_type',
			'filter' =>CHtml::listData(Shift::model()->findAll(),'shift_id','shift_type'),

		), 
		
		array('header'=>'Resign Application Date',
			'value'=>'date_format(new DateTime(EmployeeExitDetails::model()->findByAttributes(array("employee_exit_details_employee_id"=>$data->employee_transaction_id,"reporting_employee_review_status"=>2))->employee_resign_approve_date),"d-m-Y")',
			'filter' =>false,
		),
		array('header'=>'Resign Approve Date',
			'value'=>'date_format(new DateTime($data->Rel_Emp_Info->employee_left_transfer_date),"d-m-Y")',
			'filter' =>false,
		),
		
	
	),

	'pager'=>array(
			'class'=>'AjaxList',
			'maxButtonCount'=>$model->count(),
			'header'=>''
		   ),
)); ?>
