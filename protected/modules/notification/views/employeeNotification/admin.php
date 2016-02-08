<?php
$this->breadcrumbs=array(
	'Employee Notices'=>array('admin'),
	'Manage',
);
?>
<div class="portlet box blue">
<i class="icon-reorder"></i>
<div class="portlet-title"><span class="box-title">Manage Employee Notices</span>
<div class="operation">
<?php echo CHtml::link('Add New', array('employeeNotification/notify', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'btn green'))?>
<?php echo CHtml::link('PDF', array('/site/export.exportPDF', 'model'=>get_class($model)), array('class'=>'btnyellow', 'target'=>'_blank'));?>
<?php echo CHtml::link('Excel', array('/site/export.exportExcel', 'model'=>get_class($model)), array('class'=>'btnblue'));?>
</div>
</div>

<?php $dataProvider = $model->search();
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];
$dataProvider->getPagination()->setPageSize($pageSize);
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'employee-notification-grid',
	'dataProvider'=>$dataProvider,
	'afterAjaxUpdate' => 'reInstallDatepicker',
	'filter'=>$model,
	'selectionChanged'=>"function(id){
		window.location='" . Yii::app()->urlManager->createUrl('notification/employeeNotification/view', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);
	}",
	'columns'=>array(
	array(
		'header'=>'SN.',
		'class'=>'IndexColumn',
		),
		array(
			'name'=>'title',
			'value'=>'$data->title',
			'filter'=>false,
		),
		
		array(
		'name'=>'employee_first_name',
		'value'=>'$data->rel_emp_id->employee_first_name',
		),
		array(
		'name'=>'employee_last_name',
		'value'=>'$data->rel_emp_id->employee_last_name',
		),
		array(
		'name'=>'employee_attendance_card_id',
		'value'=>'$data->rel_emp_id->employee_attendance_card_id',
		),
		array(
                'name' => 'employee_notification_creation_date',
		'value'=>'($data->employee_notification_creation_date == 0000-00-00) ? "Not Set" : date_format(new DateTime($data->employee_notification_creation_date), "d-m-Y")',
                 'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'model' => $model, 
                        'attribute' => 'employee_notification_creation_date',
                        'options'=>array(
			'dateFormat'=>'dd-mm-yy',
			'changeYear'=>'true',
			'changeMonth'=>'true',
			'showAnim' =>'slide',
			'yearRange'=>'1900:'.(date('Y')+1),
			'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',			
	    	),
		    'htmlOptions'=>array(
			'id'=>'employee_notification_creation_date',
		     ),
	
			), 
			true),

		),
		array(
                    'class'=>'JToggleColumn',
                    'name'=>'employee_notification_read', // boolean model attribute (tinyint(1) with values 0 or 1)
                    'filter' => array('1' => 'Read','0' => 'Unread'), // filter
		    'action'=>'toggle', // other action, default is 'toggle' action
		    'checkedButtonLabel'=>'Read', // tooltip
                    'uncheckedButtonLabel'=>'Unread',
	            'labeltype'=>'Text',
                    'htmlOptions'=>array('style'=>'text-align:center;min-width:60px;')
                ),
		
	),
	'pager'=>array(
		'class'=>'AjaxList',

		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),
));
Yii::app()->clientScript->registerScript('for-date-picker',"
function reInstallDatepicker(id, data){
        $('#employee_notification_creation_date').datepicker({'dateFormat':'dd-mm-yy'});
        
}
");?></div>
