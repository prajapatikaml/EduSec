<?php
$this->breadcrumbs=array(
	'Employee'=>array('admin'),
	'Contact',
);

$this->menu=array(
	//array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	//array('label'=>'', 'url'=>array('Importationinstruction'),'linkOptions'=>array('class'=>'remaining_employee','title'=>'Importation Instruction')),
	//array('label'=>'', 'url'=>array('ExportToPDFExcel/EmployeeExportToPdf'),'linkOptions'=>array('class'=>'export-pdf','title'=>'Export To PDF','target'=>'_blank')),
	//array('label'=>'', 'url'=>array('ExportToPDFExcel/EmployeeExportToExcel'),'linkOptions'=>array('class'=>'export-excel','title'=>'Export To Excel','target'=>'_blank')),
);

?>

<h1>Employees Contact</h1>


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
		      //'type'=>'html',
    			/*'value'=>function($data){
        			return CHtml::tag('div', array('title'=>'Hover text'), 'Cell content');
    				},*/
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
		'filter' =>CHtml::listData(EmployeeDesignation::model()->findAll(array('condition'=>'employee_designation_organization_id='.Yii::app()->user->getState('org_id'))),
	'employee_designation_id','employee_designation_name'),

		),
		array(
			'header' => 'Department',		
			'name'=>'employee_transaction_department_id',
			'value'=>'Department::model()->findByPk($data->employee_transaction_department_id)->department_name',
				'filter' =>CHtml::listData(Department::model()->findAll(array('condition'=>'	department_organization_id='.Yii::app()->user->getState('org_id'))),'department_id','department_name'),

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
		
	),

	'pager'=>array(
			'class'=>'AjaxList',
			//'maxButtonCount'=>25,
			'maxButtonCount'=>$model->count(),
			'header'=>''
		   ),
)); ?>
