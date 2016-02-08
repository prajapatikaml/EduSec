<?php
$this->breadcrumbs=array(
	'City'=>array('admin'),
	$model->city_name,
);
?>

<h1>View City </h1>
<div class="operation">
<?php echo CHtml::link('Back', array('admin'), array('class'=>'btnback'));?>
<?php echo CHtml::link('Edit', array('update' ,'id'=>$model->city_id), array('class'=>'btnupdate'));?>
<?php echo CHtml::link('Delete', array('delete' ,'id'=>$model->city_id), array('class'=>'btndelete','onclick'=>"return confirm('Are you sure want to delete?');"));?>
</div>

<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">View Details
 </div>
 
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
//		'city_id',
		'city_name',
		//'country_id',
		//'state_id',
//		'$data->state_id'.
               array(
		    'name'=>'state_id',
		    'value'=>State::model()->findByPk($model->state_id)->state_name,
        	),

		array(
            	    'name'=>'country_id',
            	    'value'=>Country::model()->findByPk($model->country_id)->name,
        	),
	),
	'htmlOptions'=> array('class'=>'custom-view'),		
)); ?>
</div>
