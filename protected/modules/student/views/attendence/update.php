<?php
$this->breadcrumbs=array(
	'Student Attendences'=>array('admin'),
	StudentInfo::model()->findByAttributes(array('student_info_transaction_id'=>$model->st_id))->student_first_name,
	'Edit',
);

$this->menu=array(
	//array('label'=>'List Attendence', 'url'=>array('index')),
	//array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	//array('label'=>'', 'url'=>array('view', 'id'=>$model->id),'linkOptions'=>array('class'=>'View','title'=>'View')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Edit Student Attendence <?php //echo $model->id; ?></h1>

<?php echo $this->renderPartial('update_atten_form', array('model'=>$model)); ?>
