<?php
$this->breadcrumbs=array(
	'Student Archive Tables'=>array('admin'),
	$model->student_archive_id,
	'Update',
);

$this->menu=array(
	//array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	array('label'=>'', 'url'=>array('view', 'id'=>$model->student_archive_id),'linkOptions'=>array('class'=>'View','title'=>'View')),	
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Update Student Archive Table <?php //echo $model->student_archive_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
