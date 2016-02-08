<?php
$this->breadcrumbs=array(
	'Batches'=>array('admin'),
	$model->batch_name,
);
?>
<div class="portlet box blue view">
 <div class="portlet-title"><i class="fa fa-plus"></i><span class="box-title">View Batch</span>
</div>
<div class="operation">
<?php echo CHtml::link('<i class="fa fa-chevron-left"></i>Back', array('admin'), array('class'=>'btnyellow'));?>
<?php echo CHtml::link('<i class="fa fa-pencil-square-o"></i>Edit', array('update' ,'id'=>$model->batch_id), array('class'=>'btn green'));?>
<?php echo CHtml::link('<i class="fa fa-minus-circle"></i>Delete', array('delete' ,'id'=>$model->batch_id), array('class'=>'btnblue','onclick'=>"return confirm('Are you sure want to delete?');"));?>
</div>
<div class="detail-content">
 <div class="detail-bg">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'batch_name',
		array(
		'name'=>'course_id',
		'value'=>$model->course_id?$model->Rel_course->course_name:null,
		),
		array(
                'name'=>'batch_fees',
                'type'=>'raw',		
                'value'=>(empty($model->batch_fees) ? 'Not Set' : $model->batch_fees),
	        ),		
		array(
		'name'=>'batch_intake',
		'value'=>($model->batch_intake==0)?"Not Set":$model->batch_intake,
		),
		array(
		'name'=>'batch_start_date',
		'value'=>((empty($model->batch_start_date) || $model->batch_start_date == "0000-00-00") ? "Not Set" : date_format(new DateTime($model->batch_start_date), "d-m-Y")),
		),
		array(
		'name'=>'batch_end_date',
		'value'=>((empty($model->batch_end_date) || $model->batch_end_date == "0000-00-00") ? "Not Set" : date_format(new DateTime($model->batch_end_date), "d-m-Y")),
		),
		
		array('name'=>'batch_created_by',
			'value'=>(empty($model->Rel_user->user_organization_email_id) ? "Not Set" :$model->Rel_user->user_organization_email_id),
		),
		
		array(
                'name'=>'batch_creation_date',
                'type'=>'raw',		
                'value'=>($model->batch_creation_date == 0000-00-00) ? 'Not Set' : date_format(new DateTime($model->batch_creation_date), 'd-m-Y'),
	        ),
	),
	//'htmlOptions'=> array('class'=>'custom-view'),
)); ?>
 </div>
</div>
</div>
