<?php
$this->breadcrumbs=array(
	'Login History',
);
$this->menu=array(
//	
	array('label'=>'', 'url'=>array('ExportToPDFExcel/loginExportToPdf'),'linkOptions'=>array('class'=>'export-pdf','title'=>'Export To PDF','target'=>'_blank')),
	array('label'=>'', 'url'=>array('ExportToPDFExcel/loginExportToExcel'),'linkOptions'=>array('class'=>'export-excel','title'=>'Export To Excel','target'=>'_blank')),
);
$dataProvider = $model->search();
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];
$dataProvider->getPagination()->setPageSize($pageSize);
?>

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
		//'user_id',
		array('name'=>'user_id',
			'value'=>'(empty(User::model()->findByPk($data->user_id)->user_organization_email_id) ? " " : (User::model()->findByPk($data->user_id)->user_organization_email_id))',
		     ),
		//'status',
		//'log_in_time',
		array(
                'name'=>'log_in_time',
             //   'type'=>'raw',		
               'value'=>'($data->log_in_time == null || $data->log_in_time == \'0000-00-00\') ? " " :date_format(date_create($data->log_in_time), "d-m-Y H:i:s")',
	        ),
		array(
                'name'=>'log_out_time',
             //   'type'=>'raw',		
               'value'=>'($data->log_out_time == null || $data->log_out_time == \'0000-00-00\') ? " " :date_format(date_create($data->log_out_time), "d-m-Y H:i:s")',
	        ),
		'user_ip_address',
		//'status',
		/* array(
		'type'=>'raw',
		//'value'=>  'CHtml::image("../diploma_new/images/ok1.png", "No Image")',
		'value'=>'($data->status == 1) ? CHtml::image("../images/ok1.png") : CHtml::image("../images/delete1.png")', 
                 ), */
		
	),
	'pager'=>array(
		'class'=>'AjaxList',
		//'maxButtonCount'=>25,
		'maxButtonCount'=>$model->count(),
		'header'=>'',
	    ),

)); ?>
