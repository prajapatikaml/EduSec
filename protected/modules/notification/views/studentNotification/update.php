<?php
$this->breadcrumbs=array(
	'Student Notices'=>array('admin'),
	$model->student_notification_id,
	'Edit',
);

$this->menu=array(
//	array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	array('label'=>'', 'url'=>array('view', 'id'=>$model->student_notification_id),'linkOptions'=>array('class'=>'View','title'=>'View')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Edit Student Notice</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
