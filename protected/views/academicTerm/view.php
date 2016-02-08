<?php
$this->breadcrumbs=array(
	'Semester'=>array('admin'),
	$model->academic_term_name,
);
?>
<div class="portlet box blue view">
 <div class="portlet-title"><i class="fa fa-plus"></i><span class="box-title">View Semester</span>
</div>
<div class="operation">
<?php echo CHtml::link('<i class="fa fa-chevron-left"></i>Back', array('admin'), array('class'=>'btnyellow'));?>
<?php echo CHtml::link('<i class="fa fa-pencil-square-o"></i>Edit', array('update' ,'id'=>$model->academic_term_id, 'page'=>Yii::app()->request->getParam('page')), array('class'=>'btn green'));?>
<?php echo CHtml::link('<i class="fa fa-minus-circle"></i>Delete', array('delete' ,'id'=>$model->academic_term_id), array('class'=>'btnblue','onclick'=>"return confirm('Are you sure want to delete?');"));?>
</div>

<div class="detail-content">
 <div class="detail-bg">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'academic_term_id',
		'academic_term_name',
		array(
                'name'=>'academic_term_start_date',
                'type'=>'raw',		
                'value'=>$model->academic_term_start_date,
	        ),
		array(
                'name'=>'academic_term_end_date',
                'type'=>'raw',		
                'value'=>$model->academic_term_end_date,
	        ),
		array(
                'name'=>'course_id',
                'type'=>'raw',		
                'value'=>($model->course_id==0) ? "Not Set" : $model->Rel_course->course_name,
	        ),
//		'academic_term_period_id',
		array('name'=>'academic_term_period_id',
			'value'=>AcademicTermPeriod::model()->findByPk($model->academic_term_period_id)->academic_term_period,
		),
		array(
			'name'=>'current_sem',
			'value'=>($model->current_sem == 1) ?  "YES" : "NO",
		),
		
	),
	//'htmlOptions'=> array('class'=>'report-table'),
)); ?>
 </div>
</div>
</div>
