<?php
$this->breadcrumbs=array(
	'Bank'=>array('admin'),
	$model->bank_full_name,
);

?>

<div class="portlet box blue">
 <div class="portlet-title"><i class="fa fa-list-alt"></i><span class="box-title">View Details</span>
</div>
<div class="operation">
<?php echo CHtml::link('<i class="fa fa-chevron-left"></i>Back', array('admin'), array('class'=>'btnyellow'));?>
<?php echo CHtml::link('<i class="fa fa-pencil-square-o"></i>Edit', array('update' ,'id'=>$model->bank_id, 'page'=>Yii::app()->request->getParam('page')), array('class'=>'btn green'));?>
<?php echo CHtml::link('<i class="fa fa-minus-circle"></i>Delete', array('delete' ,'id'=>$model->bank_id), array('class'=>'btnblue','onclick'=>"return confirm('Are you sure want to delete?');"));?>
</div> 
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'bank_full_name',
		'bank_short_name',
		
	),
	//'htmlOptions'=> array('class'=>'custom-view'),
)); ?></div>
