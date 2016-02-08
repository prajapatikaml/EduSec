<?php
$this->breadcrumbs=array(
	'Employee'=>array('admin'),
	'Manage',
);

?>

<div class="portlet box blue">
<div class="portlet-title"><i class="fa fa-reorder"></i>
<span class="box-title">Manage Employees</span>
</div>
<div class="operation">
<?php if(Yii::app()->user->checkAccess('Employee.EmployeeTransaction.Create')) { ?>
<?php echo CHtml::link('<i class="fa fa-plus-square"></i>Add', array('employeeTransaction/create'), array('class'=>'btn green'))?>
 <?php echo CHtml::link('<i class="fa fa-file-pdf-o"></i>PDF', array('/site/export.exportPDF', 'model'=>get_class($model)), array('class'=>'btnyellow', 'target'=>'_blank'));?>
 <?php echo CHtml::link('<i class="fa fa-file-excel-o"></i>Excel', array('/site/export.exportExcel', 'model'=>get_class($model)), array('class'=>'btnblue')); } ?>
</div>
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
	'selectionChanged'=>"function(id){
		if($.fn.yiiGridView.getSelection(id) != '')
		  window.location='" . Yii::app()->urlManager->createUrl('employee/employeeTransaction/update', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);
	}",
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
