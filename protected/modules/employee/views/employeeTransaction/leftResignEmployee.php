<?php
$this->breadcrumbs=array(
	'Employee'=>array('leftresignemployee'),
	'Manage',
);
?>
<div class="portlet box blue">
<i class="icon-reorder"></i>
<div class="portlet-title"><span class="box-title">Transfer Employees</span>
<div class="operation">
<?php echo CHtml::link('Excel', array('/site/export.exportExcel','model'=>'EmployeeTransaction','transfer'=>'transfer'), array('class'=>'btnblue'));?>
</div>
</div>

<?php
$dataProvider = $model->leftresignsearch();
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
		      'header' => 'Employee No',
		      'name' => 'employee_no',
	              'value' => '$data->Rel_Emp_Info->employee_no',
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
		
		
		array('header'=>'Transfer Date',
			'value'=>'date_format(new DateTime($data->Rel_Emp_Info->employee_left_transfer_date),"d-m-Y")',
			'filter' =>false,
		),
		array('header'=>'Remarks/Reason',
			'value'=>'$data->Rel_Emp_Info->transfer_left_remarks',
			'filter' =>false,
		),
		
	),

	'pager'=>array(
			'class'=>'AjaxList',
			'maxButtonCount'=>$model->count(),
			'header'=>''
		   ),
)); ?>

