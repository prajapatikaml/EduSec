<?php
$this->breadcrumbs=array(
	'Student Addresses'=>array('index'),
	$model->student_address_id=>array('view','id'=>$model->student_address_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List StudentAddress', 'url'=>array('index')),
	array('label'=>'Create StudentAddress', 'url'=>array('create')),
	array('label'=>'View StudentAddress', 'url'=>array('view', 'id'=>$model->student_address_id)),
	array('label'=>'Manage StudentAddress', 'url'=>array('admin')),
);
?>

<h1>Update Student Address : <?php echo $model->student_address_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
