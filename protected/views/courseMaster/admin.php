<?php
$this->breadcrumbs=array(
	'Course Master'=>array('admin'),
	'Manage',
);
?>
<h1>Manage Courses</h1>
 <div class="operation">
<?php echo CHtml::link('PDF', array('exportToPDFExcel/courseExportToPdf'), array('class'=>'btnyellow', 'target'=>'_blank'));?>
<?php echo CHtml::link('Excel', array('exportToPDFExcel/courseExportToExcel'), array('class'=>'btnblue'));?>
</div>
<div class="portlet box blue">
 <div class="portlet-title"> Course Master
 </div>
<?php echo CHtml::link('Add New +', array('courseMaster/create'), array('class'=>'btn green'))?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'course-master-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'selectionChanged'=>"function(id){
		window.location='" . Yii::app()->urlManager->createUrl('courseMaster/view', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);
	}",	

	'columns'=>array(
		array(
		'header'=>'No',
		'class'=>'IndexColumn',
		),	
		'course_name',
		array(
		  'name'=>'course_category_id',
		  'value'=>'$data->relCat->qualification_type_name',
		  'filter'=>CHtml::listData(QualificationType::model()->findAll(), 'qualification_type_id', 'qualification_type_name'), 
		),
		'course_level',
		'course_completion_hours',
		'course_code',
		array(
		   'name'=>'course_cost',
		   'value'=>'$data->concated',
		)
		/*'course_desc',
		'course_created_by',
		'course_creation_date',
		*/

	),
	'pager'=>array(
		'class'=>'AjaxList',
		//'maxButtonCount'=>25,
		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),
)); ?>


</div>
