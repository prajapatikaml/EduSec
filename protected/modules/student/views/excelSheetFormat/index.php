<?php
$this->breadcrumbs=array(
	'Excel Sheet Formats',
);

$this->menu=array(
	array('label'=>'Create ExcelSheetFormat', 'url'=>array('create')),
	array('label'=>'Manage ExcelSheetFormat', 'url'=>array('admin')),
);
?>

<h1>Excel Sheet Formats</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
