<?php
$this->breadcrumbs=array(
	'Currency Format Tables',
);

$this->menu=array(
	array('label'=>'Create CurrencyFormatTable', 'url'=>array('create')),
	array('label'=>'Manage CurrencyFormatTable', 'url'=>array('admin')),
);
?>

<h1>Currency Format Tables</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
