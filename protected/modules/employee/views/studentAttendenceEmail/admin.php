<?php
$this->breadcrumbs=array(
	'Student Attendance Emails'=>array('admin'),
	'Manage',
);

?>

<div class="portlet box blue">
<div class="portlet-title"><i class="fa fa-plus"></i><span class="box-title">Manage Student Daily Attendance Emails</span>
</div>
 <div class='operation'>
  <?php echo CHtml::link('Add New', array('create'), array('class'=>'btn green'))?>
 </div>

<?php $dataProvider = $model->search();
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];
$dataProvider->getPagination()->setPageSize($pageSize);
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-attendence-email-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(
	array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		array(
		     'name'=>'employee_first_name',
		     'value'=>'$data->rel_emp_info->employee_first_name',	
		),
		array(
		     'name'=>'employee_last_name',
		     'value'=>'$data->rel_emp_info->employee_last_name',	
		),
		array(
		     'name'=>'employee_attendance_card_id',
		     'value'=>'$data->rel_emp_info->employee_attendance_card_id',	
		),
		array(
		     'name'=>'employee_transaction_designation_id',
		     'value'=>'EmployeeDesignation::model()->findByPk($data->rel_emp_tran->employee_transaction_designation_id)->employee_designation_name',
		     'filter'=>CHtml::listData(EmployeeDesignation::model()->findAll(),'employee_designation_id','employee_designation_name'),	
		),
		'student_attendence_email_minute',
		'student_attendence_email_hour',
		
		array(
			'class'=>'MyCButtonColumn',
		),
	),
		'pager'=>array(
		'class'=>'AjaxList',
		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),
	
)); ?></div>
