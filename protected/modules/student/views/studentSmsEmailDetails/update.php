<?php
$this->breadcrumbs=array(
	'Student Sms Email Details'=>array('admin'),
	$model->rel_stud_sms_info->student_first_name=>array('view','id'=>$model->student_sms_email_id),
	'Edit',
);

$this->menu=array(
	//array('label'=>'List StudentSmsEmailDetails', 'url'=>array('index')),
	//array('label'=>'Create StudentSmsEmailDetails', 'url'=>array('create')),
	//array('label'=>'View StudentSmsEmailDetails', 'url'=>array('view', 'id'=>$model->student_sms_email_id)),
	//array('label'=>'Manage StudentSmsEmailDetails', 'url'=>array('admin')),

	array('label'=>'', 'url'=>array('index'),'linkOptions'=>array('class'=>'List','title'=>'List')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	array('label'=>'', 'url'=>array('View', 'id'=>$model->student_sms_email_id),'linkOptions'=>array('class'=>'View','title'=>'View')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Edit StudentSmsEmailDetails <?php //echo $model->student_sms_email_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
