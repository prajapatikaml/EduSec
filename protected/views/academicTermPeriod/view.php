<?php
$this->breadcrumbs=array(
	'Academic Year'=>array('admin'),
	$model->academic_term_period,
);
?>
<div class="portlet box blue view">
 <div class="portlet-title"><i class="fa fa-plus"></i>
<span class="box-title">View Academic Year</span>
</div>
<div class="operation">
<?php echo CHtml::link('<i class="fa fa-chevron-left"></i>Back', array('admin'), array('class'=>'btnyellow'));?>
<?php echo CHtml::link('<i class="fa fa-pencil-square-o"></i>Edit', array('update' ,'id'=>$model->academic_terms_period_id), array('class'=>'btn green'));?>
<?php echo CHtml::link('<i class="fa fa-minus-circle"></i>Delete', array('delete' ,'id'=>$model->academic_terms_period_id), array('class'=>'btnblue','onclick'=>"return confirm('Are you sure want to delete?');"));?>
</div>

<div class="detail-content">
 <div class="detail-bg">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'academic_term_period',
		array('name'=>'academic_terms_period_created_by',
			'value'=>User::model()->findByPk($model->academic_terms_period_created_by)->user_organization_email_id,
		),

		array(
                'name'=>'academic_terms_period_creation_date',
                'type'=>'raw',		
                'value'=>($model->academic_terms_period_creation_date == 0000-00-00) ? 'Not Set' : date_format(new DateTime($model->academic_terms_period_creation_date), 'd-m-Y'),
	        ),
		
	),
)); ?>
   </div>
</div>
</div>
