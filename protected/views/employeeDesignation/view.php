<?php
$this->breadcrumbs=array(
	'Designations'=>array('admin'),
	$model->employee_designation_name,
);
?>

<h1>View Designation </h1>

<div class="operation">
<?php echo CHtml::link('Back', array('admin'), array('class'=>'btnback'));?>
<?php echo CHtml::link('Edit', array('update' ,'id'=>$model->employee_designation_id), array('class'=>'btnupdate'));?>
<?php echo CHtml::link('Delete', array('delete' ,'id'=>$model->employee_designation_id), array('class'=>'btndelete','onclick'=>"return confirm('Are you sure want to delete?');"));?>
</div>
<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">View Details
 </div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
//		'employee_designation_id',
		'employee_designation_name',
		'employee_designation_level',
//		'employee_designation_organization_id',
//		'employee_designation_created_by',
		array('name'=>'employee_designation_created_by',
			'value'=>User::model()->findByPk($model->employee_designation_created_by)->user_organization_email_id,
		),

		//'employee_designation_created_date',
		array(
                'name'=>'employee_designation_created_date',
                'type'=>'raw',		
                'value'=>($model->employee_designation_created_date == 0000-00-00) ? 'Not Set' : date_format(new DateTime($model->employee_designation_created_date), 'd-m-Y'),
	        ),
		/*
		array('name'=>'Organization:',
			'value'=>Organization::model()->findByPk($model->employee_designation_organization_id)->organization_name,
			'filter' => false,

		),*/ 
	),
	'htmlOptions'=> array('class'=>'custom-view'),
)); ?>
</div>
