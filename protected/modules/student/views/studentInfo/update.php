<?php
$this->breadcrumbs=array(
	'Student Infos'=>array('index'),
	$model->student_id=>array('view','id'=>$model->student_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List StudentInfo', 'url'=>array('index')),
	array('label'=>'Create StudentInfo', 'url'=>array('create')),
	array('label'=>'View StudentInfo', 'url'=>array('view', 'id'=>$model->student_id)),
	array('label'=>'Manage StudentInfo', 'url'=>array('admin')),
);
?>

<h1>Update StudentInfo <?php echo $model->student_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>