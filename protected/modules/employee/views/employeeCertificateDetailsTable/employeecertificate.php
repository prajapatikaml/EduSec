
<div id="form8" class="info-form">
<fieldset>
	<legend>Certificates</legend>
<?php 

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'employee-certificate-details-table-grid',
	'dataProvider'=> $employeecertificate->EmployeeSearch(),
	//'filter'=>$model,
	'columns'=>array(
	array(
		'header'=>'SN.',
		'class'=>'IndexColumn',
		),
		array('name'=>'employee_first_name',
			'value'=>'$data->cer_employee_id->employee_first_name',
			//'value'=>'$data->a.\' \'.$data->b.\' \'.$data->c',
		),		

		array('name'=>'employee_certificate_type_id',
			'value'=>'Certificate::model()->findByPk($data->employee_certificate_type_id)->certificate_title',
			'filter' =>CHtml::listData(Certificate::model()->findAll(array('condition'=>'certificate_organization_id='.Yii::app()->user->getState('org_id'))),'certificate_id','certificate_title'),

		),
		array('name'=>'Organization',
			'value'=>'Organization::model()->findByPk($data->employee_certificate_org_id)->organization_name',
			'filter' => false,
		),
		array(
			'class'=>'CButtonColumn',
			'template' => '{view}',
			 'buttons'=>array(
			'view' => array(
				'url'=>'Yii::app()->createUrl("certificate/EmployeeCertificategeneration", array("id"=>$data->employee_certificate_type_id,"eno"=>EmployeeInfo::model()->findByAttributes(array("employee_info_transaction_id"=>$data->employee_certificate_details_table_emp_id))->employee_attendance_card_id,"empid"=>$data->employee_certificate_details_table_emp_id))',
                        ),
		),
	),),
	'pager'=>array(
		'class'=>'AjaxList',
		'maxButtonCount'=>$employeecertificate->count(),
//		'maxButtonCount'=>25,
		'header'=>''
	    ),
)); ?>
</fieldset>
</div>

