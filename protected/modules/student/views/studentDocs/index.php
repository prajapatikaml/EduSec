<?php
$this->breadcrumbs=array(
	'Student Docs',
);

$this->menu=array(
	array('label'=>'Create StudentDocs', 'url'=>array('create')),
	array('label'=>'Manage StudentDocs', 'url'=>array('admin')),
);
?>

<h1>Student Docs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
