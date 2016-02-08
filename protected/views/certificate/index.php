<?php
$this->breadcrumbs=array(
	'Certificates',
);

$this->menu=array(
	array('label'=>'Create Certificate', 'url'=>array('create')),
	array('label'=>'Manage Certificate', 'url'=>array('admin')),
);
?>

<h1>Certificates</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
