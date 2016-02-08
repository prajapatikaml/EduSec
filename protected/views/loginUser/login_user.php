<?php
$this->breadcrumbs=array(
	'Login History',
);
$dataProvider = $model->search();
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];
$dataProvider->getPagination()->setPageSize($pageSize);
?>

<div class="portlet box blue">
 <div class="portlet-title"> Login Users
 </div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'login-user-grid',
	'dataProvider'=>$dataProvider,
	'enableSorting'=>false,
	//'filter'=>$model,
	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		array('name'=>'user_id',
			'value'=>'User::model()->findByPk($data->user_id)->user_organization_email_id',
		     ),
		array(
                'name'=>'log_in_time',
                'value'=>'date_format(date_create($data->log_in_time), "d-m-Y H:i:s")',
	        ),
		array(
                'name'=>'log_out_time',
                'value'=>'($data->log_out_time == null) ? " " :date_format(date_create($data->log_out_time), "d-m-Y H:i:s")',
	        ),
		'user_ip_address',
		array(
		'type'=>'raw',
		'value'=>'($data->status == 1) ? CHtml::image("../images/success.png") : CHtml::image("../images/error.png")',
                 ),
		
	),
	'pager'=>array(
		'class'=>'AjaxList',
		//'maxButtonCount'=>25,
		'maxButtonCount'=>$model->count(),
		'header'=>'',
	    ),

)); ?>
</div>
