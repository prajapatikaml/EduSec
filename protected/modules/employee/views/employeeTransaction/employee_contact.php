<?php
$this->breadcrumbs=array(
	'Employee'=>array('admin'),
	'Contact',
);
?>

<div class="portlet box blue">
<div class="portlet-title"><i class="fa fa-plus"></i><span class="box-title">Employee Contact</span>
</div>
<div class="operation">
<?php echo CHtml::link('<i class="fa fa-file-excel-o"></i>Excel', array('ExportToPDFExcel/employeecontactexcel', 'model'=>get_class($model)), array('class'=>'btnblue'));?>
</div>
<?php
$dataProvider = $model->search();
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
			'header'=>'Organization Number',
			'name'=>'employee_organization_mobile',
			'value'=>'$data->Rel_Emp_Info->employee_organization_mobile',
			'filter'=>false,
		),
		array(
			'header'=>'Private Number',
			'name'=>'employee_private_mobile',
			'value'=>'$data->Rel_Emp_Info->employee_private_mobile',
			'filter'=>false,
		),
		array(
			'class'=>'MyCButtonColumn',
		),
	),

	'pager'=>array(
			'class'=>'AjaxList',
			'maxButtonCount'=>$model->count(),
			'header'=>''
		   ),
)); ?>
</div>
