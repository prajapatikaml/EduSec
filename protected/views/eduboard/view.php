<?php
$this->breadcrumbs=array(
	'Education Board'=>array('admin'),
	$model->eduboard_name,
);

?>

<h1>View Education Board <?php //echo $model->eduboard_id; ?></h1>
<div class="operation">
<?php echo CHtml::link('Back', array('admin'), array('class'=>'btnback'));?>
<?php echo CHtml::link('Edit', array('update' ,'id'=>$model->eduboard_id), array('class'=>'btnupdate'));?>
<?php echo CHtml::link('Delete', array('delete' ,'id'=>$model->eduboard_id), array('class'=>'btndelete','onclick'=>"return confirm('Are you sure want to delete?');"));?>
</div>

<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">View Details
 </div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
//		'eduboard_id',
		'eduboard_name',
//		'eduboard_organization_id',
//		'eduboard_created_by',
		array('name'=>'eduboard_created_by',
			'value'=>User::model()->findByPk($model->eduboard_created_by)->user_organization_email_id,
		),

		//'eduboard_created_date',
		array(
                'name'=>'eduboard_created_date',
                'type'=>'raw',		
                'value'=>($model->eduboard_created_date == 0000-00-00) ? 'Not Set' : date_format(new DateTime($model->eduboard_created_date), 'd-m-Y'),
	        ),
		/*
		array('name'=>'Organization:',
			'value'=>Organization::model()->findByPk($model->eduboard_organization_id)->organization_name,
			'filter' => false,

		),*/
	),
	'htmlOptions'=> array('class'=>'custom-view'),			
)); ?>
</div>
