<?php
$this->breadcrumbs=array(
	'Currency Format'=>array('admin'),
	$model->currency_format_name,
);

?>
<h1>View Currency Format</h1>
<div class="operation">
<?php echo CHtml::link('Back', array('admin'), array('class'=>'btnback'));?>
<?php echo CHtml::link('Edit', array('update' ,'id'=>$model->currency_format_id), array('class'=>'btnupdate'));?>
<?php echo CHtml::link('Delete', array('delete' ,'id'=>$model->currency_format_id), array('class'=>'btndelete','onclick'=>"return confirm('Are you sure want to delete?');"));?>
</div>


<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">View Details
 </div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'currency_format_name',
		'currency_format',
	),
	'htmlOptions'=> array('class'=>'custom-view'),	
)); ?>
</div>
