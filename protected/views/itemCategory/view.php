<?php
$this->breadcrumbs=array(
	'Item Category'=>array('admin'),
	$model->cat_name,
);
?>
<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title"><span class="box-title">View Item Category</span>
<div class="operation">
<?php echo CHtml::link('Back', array('admin'), array('class'=>'btnback'));?>
<?php echo CHtml::link('Edit', array('update' ,'id'=>$model->id), array('class'=>'btnupdate'));?>
<?php echo CHtml::link('Delete', array('delete' ,'id'=>$model->id), array('class'=>'btndelete','onclick'=>"return confirm('Are you sure want to delete?');"));?>
</div>
</div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cat_name',
	),
	'htmlOptions'=> array('class'=>'custom-view'),
)); ?></div>
