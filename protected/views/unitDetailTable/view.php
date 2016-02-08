<?php
$this->breadcrumbs=array(
	'Course Lesson'=>array('/courseUnitTable/view','id'=>$model->unit_detail_unit_master_id),
	$model->unit_detail_title,
);
?>
<div class="operation">
<?php echo CHtml::link('Back', array('/courseUnitTable/view','id'=>$model->unit_detail_unit_master_id), array('class'=>'btnback'));?>
<?php echo CHtml::link('Edit', array('update' ,'id'=>$model->unit_detail_id), array('class'=>'btnupdate'));?>
<?php echo CHtml::link('Delete', array('delete' ,'id'=>$model->unit_detail_id), array('class'=>'btndelete','onclick'=>"return confirm('Are you sure want to delete?');"));?>
</div>

<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">View Lesson
 </div>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'unit_detail_id',
		//'unit_detail_unit_master_id',
		//'unit_detail_course_id',
		//'unit_detail_title',
		array(
		'name'=>'Title',
		'value'=>$model->unit_detail_title,
			),
		array(
		'name'=>'Description',
		'type'=>'raw',
		'value'=>$model->unit_detail_desc,
			),
		array(
		'name'=>'Lesson Date',
		'value'=>date('d-m-Y',strtotime($model->unit_lec_date)),
			),
		array('name'=>'unit_detail_created_by',
			'value'=>User::model()->findByPk($model->unit_detail_created_by)->user_organization_email_id,
		),

	),
	'htmlOptions'=> array('class'=>'custom-view'),
)); ?>
</div>
