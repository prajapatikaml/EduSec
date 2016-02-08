<?php
$this->breadcrumbs=array(
	'Course Masters',
);

$this->menu=array(
	array('label'=>'Create CourseMaster', 'url'=>array('create')),
	array('label'=>'Manage CourseMaster', 'url'=>array('admin')),
);
?>

<h1>Course Masters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
