<?php
$this->breadcrumbs=array(
	'Student Photoses'=>array('index'),
	$model->student_photos_id,
);

$this->menu=array(
	array('label'=>'List StudentPhotos', 'url'=>array('index')),
	array('label'=>'Create StudentPhotos', 'url'=>array('create')),
	array('label'=>'Update StudentPhotos', 'url'=>array('update', 'id'=>$model->student_photos_id)),
	array('label'=>'Delete StudentPhotos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->student_photos_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StudentPhotos', 'url'=>array('admin')),
);
?>

<h1>View StudentPhotos #<?php echo $model->student_photos_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'student_photos_id',
		'student_photos_desc',
		'student_photos_path',
	),
)); ?>
