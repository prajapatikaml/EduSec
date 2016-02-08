<?php
$this->breadcrumbs=array(
	'Student Photoses',
);

$this->menu=array(
	array('label'=>'Create StudentPhotos', 'url'=>array('create')),
	array('label'=>'Manage StudentPhotos', 'url'=>array('admin')),
);
?>

<h1>Student Photoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
