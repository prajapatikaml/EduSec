<?php
$this->breadcrumbs=array(
	'Eduboards',
);

$this->menu=array(
	//array('label'=>'Create Eduboard', 'url'=>array('create')),
	//array('label'=>'Manage Eduboard', 'url'=>array('admin')),

	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Eduboards</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
