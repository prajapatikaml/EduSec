<?php
$this->breadcrumbs=array(
	'Holidays'=>array('admin'),
	$model->national_holiday_name,
);
?>

<div class="portlet box blue view">
<div class="portlet-title"><i class="fa fa-plus"></i><span class="box-title">View National Holiday</span>
</div>
<div class="operation">
<?php echo CHtml::link('<i class="fa fa-chevron-left"></i>Back', array('admin'), array('class'=>'btnyellow'));?>
<?php echo CHtml::link('<i class="fa fa-pencil-square-o"></i>Edit', array('update' ,'id'=>$model->national_holiday_id, 'page'=>Yii::app()->request->getParam('page')), array('class'=>'btn green'));?>
<?php echo CHtml::link('<i class="fa fa-minus-circle"></i>Delete', array('delete' ,'id'=>$model->national_holiday_id), array('class'=>'btnblue','onclick'=>"return confirm('Are you sure want to delete?');"));?>
</div>
<div class="detail-content">
 <div class="detail-bg">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
                'name'=>'national_holiday_date',
                'type'=>'raw',		
                'value'=>($model->national_holiday_date == 0000-00-00) ? 'Not Set' : date_format(new DateTime($model->national_holiday_date), 'd-m-Y'),
	        ),
		'national_holiday_name',
		//'national_holiday_remarks',
		array(
                'name'=>'national_holiday_remarks',
                'type'=>'raw',		
                'value'=>($model->national_holiday_remarks == null) ? 'Not Set' : $model->national_holiday_remarks,
	        ),
	),
	//'htmlOptions'=> array('class'=>'custom-view'),
)); ?></div>
</div>
</div>
