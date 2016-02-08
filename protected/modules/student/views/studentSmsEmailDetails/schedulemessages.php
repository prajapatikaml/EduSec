<?php
$this->breadcrumbs=array(
	'Schedule Sms Emails'=>array('schedulemessages'),
	'Manage',
);
?>

<div class="portlet box blue">
<i class="icon-reorder"></i>
<div class="portlet-title"><span class="box-title">Manage Schedule Sms Details</span>
</div>
<?php
$dataProvider = $model->schedulesearch();
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];
$dataProvider->getPagination()->setPageSize($pageSize);
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-sms-email-details-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
		'selectionChanged'=>"function(id){
		window.location='" . Yii::app()->urlManager->createUrl('/student/StudentSmsEmailDetails/View', array('schedule'=>'schedule','id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);
	}",
	'columns'=>array(
		array(
		'header'=>'SN.',
		'class'=>'IndexColumn',
		),
			
		'student_sms_email_details_purpose',
		 array(
		'name' => 'schedule_timing_name',
	        'value' => '$data->rel_schedule_time->schedule_timing_name',
                     ),
	),
	'pager'=>array(
		'class'=>'AjaxList',
		//'maxButtonCount'=>25,
		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),
)); ?></div></div>
