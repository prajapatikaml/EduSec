<?php
$this->breadcrumbs=array(
	'Student Registration Information',
);

$this->menu=array(
	'linkOptions'=>array('class'=>'Create','title'=>'Add')
	array('label'=>'Manage', 'url'=>array('admin')),
);
?>

<h1>Student Registration Information</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
