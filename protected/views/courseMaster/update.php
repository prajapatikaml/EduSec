<?php
$this->breadcrumbs=array(
	'Course Masters'=>array('index'),
	//$model->course_master_id=>array('view','id'=>$model->course_master_id),
	$model->course_name=>array(),
	'Update',
);

$this->menu=array(
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'', 'url'=>array('view', 'id'=>$model->course_master_id),'linkOptions'=>array('class'=>'View','title'=>'View')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),

);
?>

<h1>Update Course <?php //echo $model->course_master_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
