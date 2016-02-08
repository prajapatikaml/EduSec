<?php
$this->breadcrumbs=array(
	'Departments'=>array('admin'),
	$model->department_name,
);

?>

<h1>View Department </h1>

<div class="operation">
<?php echo CHtml::link('Back', array('admin'), array('class'=>'btnback'));?>
<?php echo CHtml::link('Edit', array('update' ,'id'=>$model->department_id), array('class'=>'btnupdate'));?>
<?php echo CHtml::link('Delete', array('delete' ,'id'=>$model->department_id), array('class'=>'btndelete', 'onclick'=>"return confirm('Are you sure want to delete?');"));?>
</div>

<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">View Details
 </div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
//		'department_id',
		'department_name',

		array('name'=>'department_created_by',
			'value'=>User::model()->findByPk($model->department_created_by)->user_organization_email_id,
		),

		//'department_created_date',
		array(
                'name'=>'department_created_date',
                'type'=>'raw',		
                'value'=>($model->department_created_date == 0000-00-00) ? 'Not Set' : date_format(new DateTime($model->department_created_date), 'd-m-Y'),
	        ),

	),
	'htmlOptions'=> array('class'=>'custom-view'),
)); ?>
</div>
