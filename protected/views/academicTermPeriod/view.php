<?php
$this->breadcrumbs=array(
	'Academic Year'=>array('admin'),
	$model->academic_term_period,
);

?>

<h1>View Academic Year</h1>

<div class="operation">
<?php echo CHtml::link('Back', array('admin'), array('class'=>'btnback'));?>
<?php echo CHtml::link('Edit', array('update' ,'id'=>$model->academic_terms_period_id), array('class'=>'btnupdate'));?>
<?php echo CHtml::link('Delete', array('delete' ,'id'=>$model->academic_terms_period_id), array('class'=>'btndelete','onclick'=>"return confirm('Are you sure want to delete?');"));?>
</div>

<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">View Details
 </div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(

		'academic_term_period',

		array('name'=>'academic_terms_period_created_by',
			'value'=>User::model()->findByPk($model->academic_terms_period_created_by)->user_organization_email_id,
		),

		//'academic_terms_period_creation_date',
		array(
                'name'=>'academic_terms_period_creation_date',
                'type'=>'raw',		
                'value'=>($model->academic_terms_period_creation_date == 0000-00-00) ? 'Not Set' : date_format(new DateTime($model->academic_terms_period_creation_date), 'd-m-Y'),
	        ),
	),
	'htmlOptions'=> array('class'=>'custom-view'),
)); ?>
</div>
