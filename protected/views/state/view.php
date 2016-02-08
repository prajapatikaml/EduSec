<?php
$this->breadcrumbs=array(
	'State'=>array('admin'),
	$model->state_name,
);

?>

<h1>View State </h1>
<div class="operation">
<?php echo CHtml::link('Back', array('admin'), array('class'=>'btnback'));?>
<?php echo CHtml::link('Edit', array('update' ,'id'=>$model->state_id), array('class'=>'btnupdate'));?>
<?php echo CHtml::link('Delete', array('delete' ,'id'=>$model->state_id), array('class'=>'btndelete','onclick'=>"return confirm('Are you sure want to delete?');"));?>
</div>

<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">View Details
 </div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
//		'state_id',
		'state_name',
		array(
            	    'name'=>'country_id',
            	    'value'=>Country::model()->findByPk($model->country_id)->name,
        	),

	),
	'htmlOptions'=> array('class'=>'custom-view'),		
)); ?>
</div>
