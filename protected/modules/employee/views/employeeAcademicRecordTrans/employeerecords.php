<?php
$this->breadcrumbs=array(
	'Employee List'=>array('admin'),
	'Academic Details',
);?>
<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Academic Records
 </div>

<div class="profile-tab profile-edit ui-tabs ui-widget ui-widget-content ui-corner-all ui-tabs-collapsible">

<ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
<li class="ui-state-default ui-corner-top">
  <?php echo CHtml::link('Personal Profile', array('updateTab1', 'id'=>$_REQUEST['id'])); ?></li>
<li class="ui-state-default ui-corner-top">
  <?php echo CHtml::link('Gaurdian Info', array('updateprofiletab2', 'id'=>$_REQUEST['id'])); ?></li>
<li class="ui-state-default ui-corner-top">
   <?php echo CHtml::link('Address Info', array('updateprofiletab3', 'id'=>$_REQUEST['id'])); ?></li>
<li class="ui-state-default ui-corner-top ui-tabs-selected ui-state-active">
   <?php echo CHtml::link('Academic Record', array('EmployeeAcademicRecords', 'id'=>$_REQUEST['id'])); ?></li>
<li class="ui-state-default ui-corner-top">
   <?php echo CHtml::link('Document', array('Employeedocs', 'id'=>$_REQUEST['id'])); ?></li>
</ul>

</ul>

<div class="ui-tabs-panel form">

<?php  if(Yii::app()->user->checkAccess('EmployeeTransaction.UpdateEmployeeData')  && (Yii::app()->user->getState('emp_id') == $_REQUEST['id']) || Yii::app()->user->checkAccess('EmployeeTransaction.UpdateAllEmployeeData')) { 

echo CHtml::link('Add New+',array('/employee/employeeAcademicRecordTrans/create','id'=>$_REQUEST['id']),array('class'=>'btn green','style'=>'text-decoration:none;'));
}
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'employee-academic-record-trans-grid',
	'dataProvider'=>$emp_record->mysearch(),
	//'filter'=>$model,
	'enableSorting'=>false,
	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		
		array('name' => 'employee_academic_record_trans_qualification_id',
	              'value' => '$data->Rel_employee_qualification->qualification_name',
                     ),
		array('name' => 'employee_academic_record_trans_eduboard_id',
			'value' => '$data->Rel_employee_eduboard->eduboard_name',
                     ),
		array('name' => 'employee_academic_record_trans_year_id',
			'value' => '$data->employee_academic_record_trans_year_id',
                     ),
		array('name' => 'theory_mark_obtained',
			'value' => '$data->theory_mark_obtained',
                     ),
		array('name' => 'theory_mark_max',
			'value' => '$data->theory_mark_max',
                     ),
		array('name' => 'theory_percentage',
			'value' => '$data->theory_percentage',
                     ),
		array('name' => 'practical_mark_obtained',
			'value' => '$data->practical_mark_obtained',
                     ),
		array('name' => 'practical_mark_max',
			'value' => '$data->practical_mark_max',
                     ),
		array('name' => 'practical_percentage',
			'value' => '$data->practical_percentage',
                     ),
	),
	'pager'=>array(
		'class'=>'AjaxList',
		'maxButtonCount'=>$emp_record->count(),
		'header'=>''
	    ),
));
?>
</div>
</div>
