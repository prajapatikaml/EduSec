<?php
$this->breadcrumbs=array(
	'Student'=>array('admin'),
	'Manage',
);

?>

<h1>Registered Students</h1>

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


 <div class="portlet-title"> Student List
 </div>

<?php echo CHtml::link('Add New +', array('studentTransaction/create'), array('class'=>'btn green'))?>


<?php
$dataProvider = $model->search();
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];
$dataProvider->getPagination()->setPageSize($pageSize);
?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-transaction-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'ajaxUpdate'=>false,
	'selectionChanged'=>"function(id){
		window.location='" . Yii::app()->urlManager->createUrl('student/studentTransaction/update', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);
	}",	

	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		 array(
			'name' => 'student_enroll_no',
	                'value' => '$data->Rel_Stud_Info->student_enroll_no',
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
			'name'=>'student_academic_term_period_tran_id',
			'value'=>'AcademicTermPeriod::model()->findByPk($data->student_academic_term_period_tran_id)->academic_term_period',
		), 


		array(
			'name' => 'status_name',
		        'value' => '$data->Rel_Status->status_name',
                ),

		array(
			'name' => 'student_transaction_course_id',
		        'value' => '!empty($data->student_transaction_course_id) ? $data->relCourse->course_name : "N/A"',
			'filter'=>CHtml::listData(CourseMaster::model()->findAll(), 'course_master_id','course_name'),

                ),
		array(
			'type'=>'raw',
                	'value'=>  'CHtml::image(Yii::app()->baseUrl."/college_data/stud_images/" . $data->Rel_Photos->student_photos_path, "No Image",array("width"=>"20px","height"=>"20px"))',
                 ),

	),
	'pager'=>array(
		'class'=>'AjaxList',
		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),

)); ?>
</div>
