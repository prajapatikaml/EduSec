<?php
$this->breadcrumbs=array(
	'Student'=>array('admin'),
	'Manage',
);
?>

<?php
    Yii::app()->clientScript->registerScript(
   'myHideEffect',
   '$(".flash-error").animate({opacity: 1.0}, 5000).fadeOut("slow");',
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
<div class="portlet-title"><i class="fa fa-list"></i><span class="box-title">Manage Student</span>
</div>
<div class="operation">
<?php echo CHtml::link('<i class="fa fa-plus-square"></i>Add', array('studentTransaction/create'), array('class'=>'btn green'))?>
<?php echo CHtml::link('<i class="fa fa-file-pdf-o"></i>PDF', array('/site/export.exportPDF', 'model'=>get_class($model)), array('class'=>'btnyellow', 'target'=>'_blank'));?>
<?php echo CHtml::link('<i class="fa fa-file-excel-o"></i>Excel', array('/site/export.exportExcel', 'model'=>get_class($model)), array('class'=>'btnblue'));?>
</div>
<?php
$dataProvider = $model->search();
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];
$dataProvider->getPagination()->setPageSize($pageSize);
?>

<?php $visible=Yii::app()->user->checkAccess("Student.StudentTransaction.Update")? true : false; ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-transaction-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'selectionChanged'=>"function(id){
		if($.fn.yiiGridView.getSelection(id) != '')
		window.location='" . Yii::app()->urlManager->createUrl('student/studentTransaction/update', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);
	}",
	'ajaxUpdate'=>false,
	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		
		array(
			'name' => 'student_roll_no',
	                'value' => '$data->Rel_Stud_Info->student_roll_no',
                     ),

		 array(
			'name' => 'student_first_name', 
 	                'value' => '$data->Rel_Stud_Info->student_first_name',
                     ),

		array(
			'name' => 'student_last_name',
	                'value' => '$data->Rel_Stud_Info->student_last_name',
                     ),
		array(
			'name' => 'course_id',
	                'value' => '!empty($data->course_id) ? $data->Rel_course->course_name : "Not Set"',
                     ),
		array(
			'name' => 'student_transaction_batch_id',
	                'value' => '!empty($data->student_transaction_batch_id) ? $data->Rel_Batch->batch_name : "Not Set"',
                     ),
		array(
			'type'=>'raw',
                	'value'=>  'CHtml::image(Yii::app()->baseUrl."/college_data/stud_images/" . $data->Rel_Photos->student_photos_path, "No Image",array("width"=>"20px","height"=>"20px"))',
                 ),
		array(
		'class'=>'MyCButtonColumn',
		'visible'=>$visible,
	   ),

	),
	'pager'=>array(
		'class'=>'AjaxList',
		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),

)); ?>
</div>
