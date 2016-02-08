<?php
$this->breadcrumbs=array(
	'Role Masters',
);

$this->menu=array(
	array('label'=>'Create RoleMaster', 'url'=>array('create')),
	array('label'=>'Manage RoleMaster', 'url'=>array('admin')),
);
?>

<h1>Role Masters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
