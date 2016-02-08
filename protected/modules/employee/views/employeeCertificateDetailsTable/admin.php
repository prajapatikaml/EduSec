<?php
$this->breadcrumbs=array(
	'Employee Certificate'=>array('admin'),
	'Manage',
);

$this->menu=array(
//	array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('/certificate/EmployeeCertificategeneration'),'linkOptions'=>array('class'=>'Create','title'=>'Generate Employee Certificate')),
	array('label'=>'', 'url'=>array('ExportToPDFExcel/EmpcertificateGeneratePdf'),'linkOptions'=>array('class'=>'export-pdf','title'=>'Export To Pdf','target'=>'_blank')),
	array('label'=>'', 'url'=>array('ExportToPDFExcel/EmpcertificateGenerateExcel'),'linkOptions'=>array('class'=>'export-excel','title'=>'Export To Excel','target'=>'_blank')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('employee-certificate-details-table-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Employee Certificate</h1>

<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
-->
<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php
$dataProvider = $model->search();
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];
$dataProvider->getPagination()->setPageSize($pageSize);
?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'employee-certificate-details-table-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(
	array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		array('name'=>'employee_first_name',
			'value'=>'$data->cer_employee_id->employee_first_name.\'----\'.$data->cer_employee_id->employee_attendance_card_id',
			//'value'=>'$data->a.\' \'.$data->b.\' \'.$data->c',
		),		

		array('name'=>'employee_certificate_type_id',
			'value'=>'Certificate::model()->findByPk($data->employee_certificate_type_id)->certificate_title',
			'filter' =>Certificate::items1(),

		),
		array('name'=>'Organization',
			'value'=>'Organization::model()->findByPk($data->employee_certificate_org_id)->organization_name',
			'filter' => false,
		),
		array(
			'class'=>'MyCButtonColumn',
			'template' => '{view} {delete}',
			 'buttons'=>array(
			'view' => array(
				'url'=>'Yii::app()->createUrl("certificate/EmployeeCertificategeneration", array("id"=>$data->employee_certificate_type_id,"eno"=>EmployeeInfo::model()->findByAttributes(array("employee_info_transaction_id"=>$data->employee_certificate_details_table_emp_id))->employee_attendance_card_id))',
			 'options' => array('target'=>'_blank'),
                        ),
		),
	),),
	'pager'=>array(
		'class'=>'AjaxList',
		'maxButtonCount'=>$model->count(),
//		'maxButtonCount'=>25,
		'header'=>''
	    ),
)); ?>
