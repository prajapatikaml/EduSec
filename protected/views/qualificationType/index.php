<?php
$this->breadcrumbs=array(
	'Qualification Types',
);

$this->menu=array(
	array('label'=>'Create QualificationType', 'url'=>array('create')),
	array('label'=>'Manage QualificationType', 'url'=>array('admin')),
);
?>

<h1>Qualification Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
