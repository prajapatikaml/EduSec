<?php
$this->breadcrumbs=array(
	'Employee Certificate Details Tables'=>array('admin'),
	//$model->employee_certificate_details_table_id,
);

$this->menu=array(
//	array('label'=>'','url'=>array('index')),
	array('label'=>'','url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	array('label'=>'','url'=>array('update','id'=>$model->employee_certificate_details_table_id),'linkOptions'=>array('class'=>'Edit','title'=>'Update')),
	array('label'=>'','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->employee_certificate_details_table_id),'confirm'=>'Are you sure you want to delete this item?','confirm'=>'Are you sure you want to delete this item?', 'class'=>'Delete','title'=>'Delete')),
	array('label'=>'','url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>View Employee Certificate Details </h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'employee_certificate_details_table_id',
		//'employee_certificate_details_table_emp_id',
		//'employee_certificate_type_id',
		//'employee_certificate_created_by',
		//'employee_certificate_creation_date',
		//'employee_certificate_org_id',
		array(
                'name'=>'employee_first_name',
//                'type'=>'raw',		
                'value'=>EmployeeInfo::model()->findByAttributes(array('employee_info_transaction_id'=>$model->employee_certificate_details_table_emp_id))->employee_first_name,
	          ),
		array('name'=>'certificate_title',
			'value'=>$model->emp_certificate_name->certificate_title,
		), 
		array('name'=>'employee_certificate_created_by',
			'value'=>User::model()->findByPk($model->employee_certificate_created_by)->user_organization_email_id,
		),
		array(
                'name'=>'employee_certificate_creation_date',	
                'value'=>($model->employee_certificate_creation_date == 0000-00-00) ? 'Not Set' : date_format(new DateTime($model->employee_certificate_creation_date), 'd-m-Y'),
	        ),
		array('name'=>'Organization',
			'value'=>Organization::model()->findByPk($model->employee_certificate_org_id)->organization_name,
			'filter' => false,
		),
	),
)); ?>
