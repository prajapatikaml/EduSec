<?php
$this->breadcrumbs=array(
	'Attendences',
);

$this->menu=array(
	array('label'=>'Create Attendence', 'url'=>array('create')),
	array('label'=>'Manage Attendence', 'url'=>array('admin')),
);
?>

<h1>Attendences</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
