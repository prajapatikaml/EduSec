<?php
$this->breadcrumbs=array(
	//'Student Photoses'=>array('index'),
	//$model->student_photos_id=>array('view','id'=>$model->student_photos_id),
	'Update Photo',
);

/*$this->menu=array(
	array('label'=>'List StudentPhotos', 'url'=>array('index')),
	array('label'=>'Create StudentPhotos', 'url'=>array('create')),
	array('label'=>'View StudentPhotos', 'url'=>array('view', 'id'=>$model->student_photos_id)),
	array('label'=>'Manage StudentPhotos', 'url'=>array('admin')),
);*/
?>

<h1>Update Student Photos <?php //echo $model->student_photos_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
