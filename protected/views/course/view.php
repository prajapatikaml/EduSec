<?php
$this->breadcrumbs=array(
	'Courses'=>array('admin'),
	$model->course_id,
);?>

<div class="portlet box blue view">
<div class="portlet-title"><i class="fa fa-plus"></i><span class="box-title">View Course</span>
</div>
<div class="operation">
<?php // echo CHtml::link('Add Batch', array('batch/create', 'courseId'=>$model->course_id), array('class'=>'btn green'));?>
<?php // echo CHtml::link('Add Subject', array('coursewiseSubjectTable/create', 'courseId'=>$model->course_id), array('class'=>'btn green'));
?>
<?php echo CHtml::link('<i class="fa fa-chevron-left"></i>Back', array('admin'), array('class'=>'btnyellow'));?>

<?php 
if(Yii::app()->user->checkAccess('Course.Update'))
{
echo CHtml::link('<i class="fa fa-pencil-square-o"></i>Edit', array('update' ,'id'=>$model->course_id), array('class'=>'btn green'));?>
<?php echo CHtml::link('<i class="fa fa-minus-circle"></i>Delete', array('delete' ,'id'=>$model->course_id), array('class'=>'btnblue','onclick'=>"return confirm('Are you sure want to delete?');"));
}
?>
</div>
<div class="detail-content">
 <div class="detail-bg">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'course_name',
		'course_code',
		'section_name',
		/* array(
		'name'=>'academic_terms_period_id',
		'value'=>(empty($model->academic_term_period_id) ? "Not Set" : $model->Rel_academic_year->academic_term_period),
		), */
	),
)); ?>
</div>
</div>
</div>

<div class="portlet box blue view" style="margin-top:50px;">
<div class="portlet-title"><span class="box-title"><i class="fa fa-sitemap"></i> Batch(s) of Course</span>
</div>
<div class="operation">
<?php if(Yii::app()->user->checkAccess('Batch.Create')) { ?>
<?php echo CHtml::link('<i class="fa fa-plus-square"></i>Add Batch', array('batch/create', 'courseId'=>$model->course_id), array('class'=>'btn green'));
}
?>

</div>
<?php 
$visible=Yii::app()->user->checkAccess("Batch.Update")? true : false; ?>
<?php 
	$batch = new Batch;
	$dataProvider = $batch->search1($model->course_id);
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'batch-grid',
	'dataProvider'=>$dataProvider,
	//'filter'=>$batch,
	//'selectionChanged'=>"function(id){
	//window.location='" . Yii::app()->urlManager->createUrl('batch/view', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);
	//}",
	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		//'course_id',
		array(
		'name'=>'batch_name',
		'value'=>empty($batch->batch_name) ? $batch->batch_name : "Not Set",
		),
		array(
		'name'=>'batch_fees',
		'value'=>empty($batch->batch_fees) ? $batch->batch_fees : "Not Set",
		),
		//'created_by',
		//'created_date',
		array(
			'class'=>'MyCButtonColumn',
			'template' => '{update}{delete}',
			'buttons'=>array(
			'update' => array(
                               'url'=>'Yii::app()->createUrl("batch/update", array("id"=>$data->batch_id,"flag"=>"course"))',
                       ),
                       'delete' => array(
                               'url'=>'Yii::app()->createUrl("batch/delete", array("id"=>$data->batch_id))',
                        ),
				
                        ),
			'visible'=>$visible,
			),
	),
)); ?>
</div>
