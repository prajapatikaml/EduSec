<?php
$this->breadcrumbs=array(
	'Student Certificate Details Tables'=>array('admin'),
	//$model->student_certificate_details_table_id,
);

$this->menu=array(
	array('label'=>'','url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>View Student Certificate Details</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array('name'=>'student_first_name',
			'value'=>StudentInfo::model()->findByPk($model->student_certificate_details_table_student_id)->student_first_name,
		),
		array('name'=>'certificate_title',
			'value'=>$model->stu_certificate_name->certificate_title,
		), 
		array('name'=>'student_certificate_created_by',
			'value'=>User::model()->findByPk($model->student_certificate_created_by)->user_organization_email_id,
		),
		array(
                'name'=>'student_certificate_creation_date',	
                'value'=>($model->student_certificate_creation_date == 0000-00-00) ? 'Not Set' : date_format(new DateTime($model->student_certificate_creation_date), 'd-m-Y'),
	        ),
		array('name'=>'Organization',
			'value'=>Organization::model()->findByPk($model->student_certificate_org_id)->organization_name,
			'filter' => false,
		),
	),
)); ?>
