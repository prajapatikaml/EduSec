<?php
$this->breadcrumbs=array(
	'Student Sms Emails'=>array('admin'),
	'Manage',
);
?>
<style>
.grid-view table.items tr td a{
  color: #555555;
  cursor:default; 
  text-decoration:none;
  pointer-events: none;
  text-align:center;
  min-width:60px;
}
.grid-view .button-column a{
   pointer-events: auto !important;
   cursor:pointer !important;
}

</style>
<div class="portlet box blue">
<i class="icon-reorder"></i>
<div class="portlet-title"><span class="box-title">Manage Student Sms Emails</span>
<div class="operation">
<?php echo CHtml::link('PDF', array('/site/export.exportPDF', 'model'=>get_class($model)), array('class'=>'btnyellow', 'target'=>'_blank'));
      echo CHtml::link('Excel', array('/site/export.exportExcel', 'model'=>get_class($model)), array('class'=>'btnblue'));  ?>
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
	'id'=>'student-sms-email-details-grid',
	'dataProvider'=>$dataProvider,
	'afterAjaxUpdate' => 'reInstallDatepicker',
	'filter'=>$model,
	'selectionChanged'=>"function(id){
		window.location='" . Yii::app()->urlManager->createUrl('/student/StudentSmsEmailDetails/View', array('schedule'=>"all",'id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);
	}",
	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		 array(
		 'name' => 'student_first_name',
	         'value' => '($data->student_id == 0) ? "Not Set" : $data->rel_stud_sms_info->student_first_name', 
                     ),
		 array(
		 'name' => 'student_mobile_no',
	         'value' =>'($data->student_id == 0) ? "Not Set" : $data->rel_stud_sms_info->student_mobile_no',                    
		 ),
	
		array(
		'name' => 'email_sms_status',
	        'value' => '($data->email_sms_status==1)?"sms":"email"',
		     ),
	
		array(
                    'class'=>'JToggleColumn',
                    'name'=>'student_sms_email_details_schedule_flag', // boolean model attribute (tinyint(1) with values 0 or 1)
                    'filter' => array('1' => 'Schedule','0' => 'Sent'), // filter
		    'action'=>'', // other action, default is 'toggle' action
		    'checkedButtonLabel'=>'Schedule', // tooltip
                    'uncheckedButtonLabel'=>'Sent',
		    'labeltype'=>'text',
                    'htmlOptions'=>array('style'=>'')
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
?>
</div>
