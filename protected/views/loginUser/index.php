<?php
$this->breadcrumbs=array(
	'Login Users',
);

$this->menu=array(
	array('label'=>'Create LoginUser', 'url'=>array('create')),
	array('label'=>'Manage LoginUser', 'url'=>array('admin')),
);
?>

<h1>Login Users</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
