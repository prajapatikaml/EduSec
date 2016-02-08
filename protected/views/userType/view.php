<?php
$this->breadcrumbs=array(
	'User Types'=>array('admin'),
	$model->user_type_name,
);
?>
<div class="portlet box blue view">
 <div class="portlet-title"><i class="fa fa-plus"></i><span class="box-title">View User Type</span>
</div>
<div class="operation">
<?php echo CHtml::link('<i class="fa fa-chevron-left"></i>Back', array('admin'), array('class'=>'btnyellow'));?>
<?php echo CHtml::link('<i class="fa fa-pencil-square-o"></i>Edit', array('update' ,'id'=>$model->user_type_id, 'page'=>Yii::app()->request->getParam('page')), array('class'=>'btn green'));?>
<?php echo CHtml::link('<i class="fa fa-minus-circle"></i>Delete', array('delete' ,'id'=>$model->user_type_id), array('class'=>'btnblue','onclick'=>"return confirm('Are you sure want to delete?');"));?>
</div>
<div class="detail-content">
 <div class="detail-bg">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'user_type_name',
		array('name'=>'created_by',
			'value'=>User::model()->findByPk($model->created_by)->user_organization_email_id,
		),
		array(
                        'name'=>'creation_date',
                        'value'=>date_format(date_create($model->creation_date), "d-m-Y"),

                    ),
	),
	//'htmlOptions'=> array('class'=>'custom-view'),
)); ?></div>
</div>
</div>
