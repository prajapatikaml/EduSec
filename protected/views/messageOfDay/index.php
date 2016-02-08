<?php
$this->breadcrumbs=array(
	'Message Of Days',
);

$this->menu=array(
	array('label'=>'Create MessageOfDay', 'url'=>array('create')),
	array('label'=>'Manage MessageOfDay', 'url'=>array('admin')),
);
?>

<h1>Message Of Days</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
