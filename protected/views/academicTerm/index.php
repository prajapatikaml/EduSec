<?php
$this->breadcrumbs=array(
	'Academic Terms',
);

$this->menu=array(
//	array('label'=>'Create AcademicTerm', 'url'=>array('create')),
	array('label'=>'Manage AcademicTerm', 'url'=>array('admin')),
);
?>

<h1>Academic Terms</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
