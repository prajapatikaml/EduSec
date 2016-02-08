<?php
$this->breadcrumbs=array(
	'Unit Detail Tables',
);

$this->menu=array(
	array('label'=>'Create UnitDetailTable', 'url'=>array('create')),
	array('label'=>'Manage UnitDetailTable', 'url'=>array('admin')),
);
?>

<h1>Unit Detail Tables</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
