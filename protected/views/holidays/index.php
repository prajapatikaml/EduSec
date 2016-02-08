<?php
$this->breadcrumbs=array(
	'Holidays',
);

$this->menu=array(
	array('label'=>'Create Holidays', 'url'=>array('create')),
	array('label'=>'Manage Holidays', 'url'=>array('admin')),
);
?>

<h1>Holidays</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
