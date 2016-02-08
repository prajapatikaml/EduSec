<?php
$this->breadcrumbs=array(
	'Country'=>array('admin'),
	$model->name,
);
?>
<div class="portlet box blue view">
 <div class="portlet-title"><i class="fa fa-plus"></i><span class="box-title">View Country</span>
</div>
<div class="operation">
<?php echo CHtml::link('<i class="fa fa-chevron-left"></i>Back', array('admin'), array('class'=>'btnyellow'));?>
<?php echo CHtml::link('<i class="fa fa-pencil-square-o"></i>Edit', array('update' ,'id'=>$model->id, 'page'=>Yii::app()->request->getParam('page')), array('class'=>'btn green'));?>
<?php echo CHtml::link('<i class="fa fa-minus-circle"></i>Delete', array('delete' ,'id'=>$model->id), array('class'=>'btnblue','onclick'=>"return confirm('Are you sure want to delete?');"));?>
</div>
<div class="detail-content">
 <div class="detail-bg">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
	),
	//'htmlOptions'=> array('class'=>'custom-view'),
)); ?></div> 
</div>
</div>
