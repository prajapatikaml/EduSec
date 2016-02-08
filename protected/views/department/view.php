<?php
$this->breadcrumbs=array(
	'Departments'=>array('admin'),
	$model->department_name,
);
?>
<div class="portlet box blue view">
 <div class="portlet-title"><i class="fa fa-plus"></i><span class="box-title">View Department</span>
</div>
<div class="operation">
<?php echo CHtml::link('<i class="fa fa-chevron-left"></i>Back', array('admin'), array('class'=>'btnyellow'));?>
<?php echo CHtml::link('<i class="fa fa-pencil-square-o"></i>Edit', array('update' ,'id'=>$model->department_id, 'page'=>Yii::app()->request->getParam('page')), array('class'=>'btn green'));?>
<?php echo CHtml::link('<i class="fa fa-minus-circle"></i>Delete', array('delete' ,'id'=>$model->department_id), array('class'=>'btnblue','onclick'=>"return confirm('Are you sure want to delete?');"));?>
</div>
<div class="detail-content">
 <div class="detail-bg">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'department_name',
		array('name'=>'department_created_by',
			'value'=>User::model()->findByPk($model->department_created_by)->user_organization_email_id,
		),
		array(
                'name'=>'department_created_date',
                'type'=>'raw',		
                'value'=>($model->department_created_date == 0000-00-00) ? 'Not Set' : date_format(new DateTime($model->department_created_date), 'd-m-Y'),
	        ),
	),
	//'htmlOptions'=> array('class'=>'custom-view'),
)); ?>
 </div>
</div>
</div>
