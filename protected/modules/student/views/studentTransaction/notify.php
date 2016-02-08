<script>
$(document).ready(function(){
	//alert("hi1");
    $("#submitbtn").click(function(){
        var selected = $("#student-transaction-grid").selGridView("getAllSelection");
     
	      $("#selectedstudentid").val(selected);
			
    });
});
</script>
<?php
$this->breadcrumbs=array(
	'Student'=>array('admin'),
	'Manage',
);

$this->menu=array(
	//sarray('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	//array('label'=>'', 'url'=>array('ExportToPDFExcel/StudentTransactionExportPdf'),'linkOptions'=>array('class'=>'export-pdf','title'=>'Export To Pdf')),	
	//array('label'=>'', 'url'=>array('ExportToPDFExcel/StudentTransactionExportExcel'),'linkOptions'=>array('class'=>'export-excel','title'=>'Export To Excell')),
	
);

//echo CHtml::link('Export To Pdf',array('StudentTransaction/GeneratePdf'),array('style'=>'color:red'));

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('student-transaction-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Notify Students</h1>

<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->

<?php
 //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
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
<?php 
$form=$this->beginWidget('CActiveForm', array(
        'id'=>'book-search-form',
//        'enableAjaxValidation'=>true,
        'htmlOptions'=>array('enctype' => 'multipart/form-data')
));
?>

<?php
$dataProvider = $model->search();
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];

$dataProvider->getPagination()->setPageSize($pageSize);
?>
<?php $this->widget('ext.selgridview.SelGridView', array(
	'id'=>'student-transaction-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'selectableRows'=>2,
	//'ajaxUpdate'=>false,
	'columns'=>array(
		 array(
                'class'=>'CCheckBoxColumn',     		 
                ),
			 array('name' => 'student_enroll_no',
		     // 'filter' => CHtml::listData(TaskMaster::model()->findAll(), 'task_name', 'task_name'),  // Note: Put this line if you need dropdown in Grid 				for display list of entry from master table
	              'value' => '$data->Rel_Stud_Info->student_enroll_no',
                     ),
		array('name' => 'student_roll_no',
		     // 'filter' => CHtml::listData(TaskMaster::model()->findAll(), 'task_name', 'task_name'),  // Note: Put this line if you need dropdown in Grid 				for display list of entry from master table
	              'value' => '$data->Rel_Stud_Info->student_roll_no',
                     ),

		 array('name' => 'student_first_name',
		     // 'filter' => CHtml::listData(TaskMaster::model()->findAll(), 'task_name', 'task_name'),  // Note: Put this line if you need dropdown in Grid 				for display list of entry from master table
	              'value' => '$data->Rel_Stud_Info->student_first_name',
                     ),

		/*array('name' => 'student_middle_name',
		     // 'filter' => CHtml::listData(TaskMaster::model()->findAll(), 'task_name', 'task_name'),  // Note: Put this line if you need dropdown in Grid 				for display list of entry from master table
	              'value' => '$data->Rel_Stud_Info->student_middle_name',
                     ),*/

		array('name' => 'student_last_name',
		     // 'filter' => CHtml::listData(TaskMaster::model()->findAll(), 'task_name', 'task_name'),  // Note: Put this line if you need dropdown in Grid 				for display list of entry from master table
	              'value' => '$data->Rel_Stud_Info->student_last_name',
                     ),



		 array('name' => 'student_transaction_branch_id',
              //'value' => '$data->Rel_Branch->branch_id',
		'value' =>'Branch::item($data->student_transaction_branch_id)',
		'filter'=>  Branch::items(),

             ),
		
		
		array('name'=>'student_academic_term_period_tran_id',
			'value'=>'AcademicTermPeriod::model()->findByPk($data->student_academic_term_period_tran_id)->academic_term_period',
			'filter' =>CHtml::listData(AcademicTermPeriod::model()->findAll(array('condition'=>'academic_terms_period_organization_id='.Yii::app()->user->getState('org_id'))),'academic_terms_period_id','academic_term_period'),

		), 


		array('name' => 'student_academic_term_name_id',
		     // 'value' => '$data->Rel_student_academic_terms_name->academic_term_name',
			'value' =>'AcademicTerm::item($data->student_academic_term_name_id)',
			'filter'=>  AcademicTerm::items(),

                ),		array('name' => 'quota_name',
		      'value' => '$data->Rel_Quota->quota_name',
                ),
		
		/**/

		 array('name' => 'student_dtod_regular_status',
	         'value' => '$data->Rel_Stud_Info->student_dtod_regular_status',
                     ),
		array('name' => 'status_name',
		      'value' => '$data->Rel_Status->status_name',
                ),

	),
	'pager'=>array(
		'class'=>'AjaxList',
	//	'maxButtonCount'=>25,
		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),

)); ?>

<!--<div class="send-sms-email-div">
 <?php echo CHtml::button('Send SMS/Email',array('name'=>'btnsend','class'=>'send-all-button','submit' => array('DoChacked'))); ?>
</div>-->
<?php 
		echo CHtml::hiddenField('selectedstudentid');
                echo CHtml::button('Compose',array('id'=>'submitbtn','submit' => array('Messageform')));
?>
<?php $this->endWidget(); ?>




