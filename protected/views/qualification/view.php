<?php
$this->breadcrumbs=array(
	'qualification'=>array('admin'),
	$model->qualification_name,
);
?>

<h1>View Qualification <?php //echo $model->qualification_id; ?></h1>
<div class="operation">
<?php echo CHtml::link('Back', array('admin'), array('class'=>'btnback'));?>
<?php echo CHtml::link('Edit', array('update' ,'id'=>$model->qualification_id), array('class'=>'btnupdate'));?>
<?php echo CHtml::link('Delete', array('delete' ,'id'=>$model->qualification_id), array('class'=>'btndelete','onclick'=>"return confirm('Are you sure want to delete?');"));?>
</div>

<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">View Details
 </div>
 
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
//		'qualification_id',
		'qualification_name',
//		'qualification_organization_id',
//		'qualification_created_by',
		array('name'=>'qualification_created_by',
			'value'=>User::model()->findByPk($model->qualification_created_by)->user_organization_email_id,
		),
		array(
                'name'=>'qualification_created_date',
                'type'=>'raw',		
                'value'=>($model->qualification_created_date == 0000-00-00) ? 'Not Set' : date_format(new DateTime($model->qualification_created_date), 'd-m-Y'),
	        ),
		//'qualification_created_date',
		/*
		array('name'=>'Organization:',
			'value'=>Organization::model()->findByPk($model->qualification_organization_id)->organization_name,
			'filter' => false,
		),*/
	),
	'htmlOptions'=> array('class'=>'custom-view'),	
)); ?>
</div>
