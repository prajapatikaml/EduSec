<?php
$this->breadcrumbs=array(
	'Employee Sms Emails'=>array('admin'),
	'Manage',
);
?>

<div class="portlet box blue">
<div class="portlet-title"><i class="fa fa-plus"></i><span class="box-title"> Manage Employee Sms Emails</span>
</div>
<div class="operation">
<?php echo CHtml::link('<i class="fa fa-file-pdf-o"></i>PDF', array('/site/export.exportPDF', 'model'=>get_class($model)), array('class'=>'btnyellow', 'target'=>'_blank'));
      echo CHtml::link('<i class="fa fa-file-excel-o"></i>Excel', array('/site/export.exportExcel', 'model'=>get_class($model)), array('class'=>'btnblue'));  ?>
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

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'employee-sms-email-details-grid',
	'dataProvider'=>$dataProvider,
	'afterAjaxUpdate' => 'reInstallDatepicker',
	'filter'=>$model,
	'selectionChanged'=>"function(id){
		window.location='" . Yii::app()->urlManager->createUrl('employee/employeeSmsEmailDetails/view', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);
	}",	
	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		 array(
		 'name' => 'employee_no',
	         'value' => '$data->rel_emp_sms_info->employee_no',
                     ),
		array(
		 'name' => 'employee_attendance_card_id',
	         'value' => '$data->rel_emp_sms_info->employee_attendance_card_id',
                     ),
		array(
		 'name' => 'employee_first_name',
	         'value' => '$data->rel_emp_sms_info->employee_first_name',
                     ),
		 array(
		'name' => 'department_id',
	        'value'=>'Department::model()->findByPk($data->department_id)->department_name',
		'filter' =>CHtml::listData(Department::model()->findAll(),'department_id','department_name'),
                 ),
		
		array(
		'name' => 'email_sms_status',
	        'value' => '($data->email_sms_status==1)?"sms":"email"',
		),
		array(
                        'name' => 'creation_date',
			 'value'=>'($data->creation_date == 0000-00-00) ? "Not Set" : date_format(new DateTime($data->creation_date), "d-m-Y")',
                         'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                'model' => $model, 
                                'attribute' => 'creation_date',
                                'options'=>array(
				'dateFormat'=>'dd-mm-yy',
				'changeYear'=>'true',
				'changeMonth'=>'true',
				'showAnim' =>'slide',
				'yearRange'=>'1900:'.(date('Y')+1),
				'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',			
		    ),
			'htmlOptions'=>array(
			'id'=>'creation_date',
		     ),
			
                        ), 
                        true),

                ),
		array(
		'class'=>'MyCButtonColumn',
	   ),

	),
		'pager'=>array(
		'class'=>'AjaxList',
		//'maxButtonCount'=>25,
		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),
)); ?>
<?php Yii::app()->clientScript->registerScript('for-date-picker',"
function reInstallDatepicker(id, data){
        $('#creation_date').datepicker({'dateFormat':'dd-mm-yy'});
}
"); 
?></div>

