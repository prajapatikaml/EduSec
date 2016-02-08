<?php
$this->breadcrumbs=array(
	'Courses'=>array('admin'),
	'Manage',
);?>
<div class="portlet box blue">
<div class="portlet-title"><i class="fa fa-plus"></i><span class="box-title">Manage Course</span>
</div>
<div class="operation">
<?php if(Yii::app()->user->checkAccess('Course.Create'))
	{
?>
<?php echo CHtml::link('<i class="fa fa-plus-square"></i>Add', array('course/create'), array('class'=>'btn green')); ?>
<?php echo CHtml::link('<i class="fa fa-file-pdf-o"></i>PDF', array('site/export.exportPDF', 'model'=>get_class($model)), array('class'=>'btnyellow', 'target'=>'_blank'));?>
<?php echo CHtml::link('<i class="fa fa-file-excel-o"></i>Excel', array('site/export.exportExcel', 'model'=>get_class($model)), array('class'=>'btnblue'));?>
<?php  } ?>
</div>

<?php $visible=Yii::app()->user->checkAccess("Course.Update")? true : false; ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'course-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'selectionChanged'=>"function(id){
	window.location='" . Yii::app()->urlManager->createUrl('course/view', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);
	}",
	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		//'course_id',
		'course_name',
		'course_code',
		//'section_name',
		array(
		'name'=>'section_name',
		'value'=>'(empty($data->section_name) ? "Not Set" : $data->section_name)',
		),
		/*array(
		'name'=>'academic_term_period_id',
		'value'=>'(empty($data->academic_term_period_id) ? "Not Set" : $data->Rel_academic_year->academic_term_period)',
		),*/
		//'course_fees',
		//'created_by',
		//'created_date',
		 array(
		'class'=>'MyCButtonColumn',
		'visible'=>$visible,
	   ),
	),
)); ?>
</div>
