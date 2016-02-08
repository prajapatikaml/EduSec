<?php
$this->breadcrumbs=array(
	'Course Unit Tables',
);

$this->menu=array(
	array('label'=>'Create CourseUnitTable', 'url'=>array('create')),
	array('label'=>'Manage CourseUnitTable', 'url'=>array('admin')),
);
?>

<h1>Course Unit Tables</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
