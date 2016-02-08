<?php
$this->breadcrumbs=array(
	'Qualification'=>array('admin'),
	$model->qualification_name,
);
?>
<div class="portlet box blue view">
 <div class="portlet-title"><i class="fa fa-plus"></i><span class="box-title">View Qualification</span>
</div>
<div class="operation">
<?php echo CHtml::link('<i class="fa fa-chevron-left"></i>Back', array('admin'), array('class'=>'btnyellow'));?>
<?php echo CHtml::link('<i class="fa fa-pencil-square-o"></i>Edit', array('update' ,'id'=>$model->qualification_id, 'page'=>Yii::app()->request->getParam('page')), array('class'=>'btn green'));?>
<?php echo CHtml::link('<i class="fa fa-minus-circle"></i>Delete', array('delete' ,'id'=>$model->qualification_id), array('class'=>'btnblue','onclick'=>"return confirm('Are you sure want to delete?');"));?>
</div>
<div class="detail-content">
 <div class="detail-bg">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'qualification_name',
		array('name'=>'qualification_created_by',
			'value'=>User::model()->findByPk($model->qualification_created_by)->user_organization_email_id,
		),
		array(
                'name'=>'qualification_created_date',
                'type'=>'raw',		
                'value'=>($model->qualification_created_date == 0000-00-00) ? 'Not Set' : date_format(new DateTime($model->qualification_created_date), 'd-m-Y'),
	        ),
	),
	//'htmlOptions'=> array('class'=>'custom-view'),	
)); ?></div>
</div>
</div>
