<?php
$this->breadcrumbs=array(
	'Student Archive Tables',
);

$this->menu=array(
	array('label'=>'Create StudentArchiveTable', 'url'=>array('create')),
	array('label'=>'Manage StudentArchiveTable', 'url'=>array('admin')),
);
?>

<h1>Student Archive Tables</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
