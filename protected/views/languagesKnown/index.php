<?php
$this->breadcrumbs=array(
	'Languages Knowns',
);

$this->menu=array(
	array('label'=>'Create LanguagesKnown', 'url'=>array('create')),
	array('label'=>'Manage LanguagesKnown', 'url'=>array('admin')),
);
?>

<h1>Languages Knowns</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
