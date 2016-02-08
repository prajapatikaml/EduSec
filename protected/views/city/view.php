<?php
$this->breadcrumbs=array(
	'City'=>array('admin'),
	$model->city_name,
);
?>
<div class="portlet box blue view">
 <div class="portlet-title"><i class="fa fa-plus"></i><span class="box-title">View City</span>
</div>
<div class="operation">
<?php echo CHtml::link('<i class="fa fa-chevron-left"></i>Back', array('admin'), array('class'=>'btnyellow'));?>
<?php echo CHtml::link('<i class="fa fa-pencil-square-o"></i>Edit', array('update' ,'id'=>$model->city_id, 'page'=>Yii::app()->request->getParam('page')), array('class'=>'btn green'));?>
<?php echo CHtml::link('<i class="fa fa-minus-circle"></i>Delete', array('delete' ,'id'=>$model->city_id), array('class'=>'btnblue','onclick'=>"return confirm('Are you sure want to delete?');"));?>
</div>
<div class="detail-content">
 <div class="detail-bg">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'city_name',
               array(
		    'name'=>'state_id',
		    'value'=>State::model()->findByPk($model->state_id)->state_name,
        	),
		array(
            	    'name'=>'country_id',
            	    'value'=>Country::model()->findByPk($model->country_id)->name,
        	),
	),
	//'htmlOptions'=> array('class'=>'custom-view'),
)); ?></div>
</div>
</div>
