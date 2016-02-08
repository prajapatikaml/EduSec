<?php
$this->breadcrumbs=array(
	'Document Category Masters',
);

$this->menu=array(
	array('label'=>'Create DocumentCategoryMaster', 'url'=>array('create')),
	array('label'=>'Manage DocumentCategoryMaster', 'url'=>array('admin')),
);
?>

<h1>Document Category Masters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
