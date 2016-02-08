<?php
$this->breadcrumbs=array(
	'Student Infos',
);

$this->menu=array(
	array('label'=>'Create StudentInfo', 'url'=>array('create')),
	array('label'=>'Manage StudentInfo', 'url'=>array('admin')),
);
?>

<h1>Student Infos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
