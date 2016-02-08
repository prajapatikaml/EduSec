<?php
$this->breadcrumbs=array(
	'Student Addresses',
);

$this->menu=array(
	array('label'=>'Create StudentAddress', 'url'=>array('create')),
	array('label'=>'Manage StudentAddress', 'url'=>array('admin')),
);
?>

<h1>Student Addresses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
