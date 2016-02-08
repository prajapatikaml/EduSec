<?php
$this->breadcrumbs=array(
	'Parent Logins',
);

$this->menu=array(
	array('label'=>'Create ParentLogin', 'url'=>array('create')),
	array('label'=>'Manage ParentLogin', 'url'=>array('admin')),
);
?>

<h1>Parent Logins</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
