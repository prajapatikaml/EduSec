<?php
$this->breadcrumbs=array(
	'Employee Experience Trans',
);

$this->menu=array(
	array('label'=>'Create EmployeeExperienceTrans', 'url'=>array('create')),
	array('label'=>'Manage EmployeeExperienceTrans', 'url'=>array('admin')),
);
?>

<h1>Employee Experience Trans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
