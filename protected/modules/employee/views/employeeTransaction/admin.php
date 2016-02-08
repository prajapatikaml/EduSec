<?php
$this->breadcrumbs=array(
	'Employee'=>array('admin'),
	'Manage',
);

$this->menu=array(
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'', 'url'=>array('ExportToPDFExcel/EmployeeExportToPdf'),'linkOptions'=>array('class'=>'export-pdf','title'=>'Export To PDF','target'=>'_blank')),
	array('label'=>'', 'url'=>array('ExportToPDFExcel/EmployeeExportToExcel'),'linkOptions'=>array('class'=>'export-excel','title'=>'Export To Excel','target'=>'_blank')),
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

<h1>Manage Employees</h1>

<?php
    Yii::app()->clientScript->registerScript(
   'myHideEffect',
   '$(".flash-error").animate({opacity: 1.0}, 3000).fadeOut("slow");',
 CClientScript::POS_READY
);

    Yii::app()->clientScript->registerScript(
   'myHideEffect1',
   '$(".flash-success").animate({opacity: 1.0}, 3000).fadeOut("slow");',
 CClientScript::POS_READY
);


?>
<div id="statusMsg">
<?php
	if(Yii::app()->user->hasFlash('error')) { ?>
	<div class="flash-error">
		<?php echo Yii::app()->user->getFlash('error'); ?>
	</div>
<?php } ?>
<?php
	if(Yii::app()->user->hasFlash('success')) { ?>
	<div class="flash-success">
		<?php echo Yii::app()->user->getFlash('success'); ?>
	</div>
<?php } ?>

</div>

<div class="portlet box blue">
 <div class="portlet-title"> Employee List
 </div>

<?php echo CHtml::link('Add New +', array('employeeTransaction/create'), array('class'=>'btn green'))?>

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
	'selectionChanged'=>"function(id){
		window.location='" . Yii::app()->urlManager->createUrl('employee/employeeTransaction/update', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);
	}",		
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
				'filter' =>CHtml::listData(Department::model()->findAll(), 'department_id','department_name'),

		), 

		array(
		'type'=>'raw',
                'value'=>'CHtml::image(Yii::app()->baseUrl."/college_data/emp_images/" . $data->Rel_Photo->employee_photos_path, "No Image",array("width"=>"20px","height"=>"20px"))',
                 ),
	),

	'pager'=>array(
			'class'=>'AjaxList',
			'maxButtonCount'=>$model->count(),
			'header'=>''
		   ),
)); ?>
</div>
