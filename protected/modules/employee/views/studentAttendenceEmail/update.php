<?php
$this->breadcrumbs=array(
	'Student Attendance Emails'=>array('admin'),
	$model->student_attendence_email_id,
	'Edit',
);

$this->menu=array(
//	array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'', 'url'=>array('view', 'id'=>$model->student_attendence_email_id),'linkOptions'=>array('class'=>'View','title'=>'View')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Edit Daily Attendence Email</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
