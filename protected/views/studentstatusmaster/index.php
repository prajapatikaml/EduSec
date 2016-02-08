<?php
$this->breadcrumbs=array(
	'Studentstatusmasters',
);

$this->menu=array(
	array('label'=>'Create Studentstatusmaster', 'url'=>array('create')),
	array('label'=>'Manage Studentstatusmaster', 'url'=>array('admin')),
);
?>

<h1>Studentstatusmasters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
