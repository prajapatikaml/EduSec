<?php
$this->breadcrumbs=array(
	'GTU Notices'=>array('admin'),
);
?>
<div class="portlet box blue">
<i class="icon-reorder"></i>
<div class="portlet-title"><span class="box-title">View GTU Notice</span>
<div class="operation">
<?php echo CHtml::link('Back', array('admin'), array('class'=>'btnback'));?>
<?php echo CHtml::link('Edit', array('update' ,'id'=>$model->ID), array('class'=>'btnupdate'));?>
<?php echo CHtml::link('Delete', array('delete' ,'id'=>$model->ID), array('class'=>'btndelete','onclick'=>"return confirm('Are you sure want to delete?');"));?>
</div>
</div>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Description',
		'Link',
		array('name'=>'Created_By',
			'value'=>User::model()->findByPk($model->Created_By)->user_organization_email_id,
		),
		array(
                'name'=>'Created_date',
                'value'=>($model->Created_date == 0000-00-00) ? 'Not Set' : date_format(new DateTime($model->Created_date), 'd-m-Y'),
	        ),
	),
	'htmlOptions'=> array('class'=>'custom-view'),
)); ?></div>
