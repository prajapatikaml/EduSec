<?php
$this->breadcrumbs=array(
	'Qualifications',
);

$this->menu=array(
	//array('label'=>'Create Qualification', 'url'=>array('create')),
	//array('label'=>'Manage Qualification', 'url'=>array('admin')),

	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Qualifications</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
