<?php
$this->breadcrumbs=array(
	'Student Attendence Emails'=>array('admin'),
	$model->student_attendence_email_id,
);

$this->menu=array(
//	array('label'=>'','url'=>array('index')),
	array('label'=>'','url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'','url'=>array('update','id'=>$model->student_attendence_email_id),'linkOptions'=>array('class'=>'Edit','title'=>'Edit')),
	array('label'=>'','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->student_attendence_email_id),'confirm'=>'Are you sure you want to delete this item?','confirm'=>'Are you sure you want to delete this item?', 'class'=>'Delete','title'=>'Delete')),
	array('label'=>'','url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>View Daily Attendence Email</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'student_attendence_email_id',
		array(
                'name'=>'employee_first_name',
	        'value'=> EmployeeInfo::model()->findByAttributes(array(
						'employee_info_transaction_id' => $model->student_attendence_email_emp_id))->employee_first_name,
		),
		array(
                'name'=>'employee_last_name',
	        'value'=> EmployeeInfo::model()->findByAttributes(array(
						'employee_info_transaction_id' => $model->student_attendence_email_emp_id))->employee_last_name,
		),
		array(
                'name'=>'branch_name',
	        'value'=> ($model->student_attendence_email_branch_id==0)?"All Branch":Branch::model()->findByPk($model->student_attendence_email_branch_id)->branch_name,
		),

		array(
                'name'=>'employee_transaction_designation_id',
	        'value'=> EmployeeDesignation::model()->findByPk($model->rel_emp_tran->employee_transaction_designation_id)->employee_designation_name,
		),
		'student_attendence_email_minute',
		'student_attendence_email_hour',

		array(
                'name'=>'student_attendence_email_org_id',
		'value'=> Organization::model()->findByPk($model->student_attendence_email_org_id)->organization_name,
		),
		array(
                'name'=>'student_attendence_email_created_by',
		'value'=> User::model()->findByPk($model->student_attendence_email_created_by)->user_organization_email_id,
		),
		array(
		'name'=>'student_attendence_email_creation_date',
		'value'=>date_format(new DateTime($model->student_attendence_email_creation_date), 'd-m-Y'),
		),
		),
)); ?></div>
