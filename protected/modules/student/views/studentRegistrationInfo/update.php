<?php
$this->breadcrumbs=array(
	'Student Registration Information'=>array('admin'),
	$model->student_first_name=>array('view','id'=>$model->student_registration_id),
	'Update',
);

$this->menu=array(
	array('label'=>'', 'url'=>array('view', 'id'=>$model->student_registration_id),'linkOptions'=>array('class'=>'View','title'=>'View')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Update Student Registration Information <?php //echo $model->student_registration_id; ?></h1>

<?php echo $this->renderPartial('_update', array('model'=>$model,'acdmInfoModel'=>$acdmInfoModel,)); ?>
