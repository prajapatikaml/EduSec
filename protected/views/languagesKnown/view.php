<?php
$this->breadcrumbs=array(
	'Languages Knowns'=>array('index'),
	$model->languages_known_id,
);

$this->menu=array(
	array('label'=>'List LanguagesKnown', 'url'=>array('index')),
	array('label'=>'Create LanguagesKnown', 'url'=>array('create')),
	array('label'=>'Update LanguagesKnown', 'url'=>array('update', 'id'=>$model->languages_known_id)),
	array('label'=>'Delete LanguagesKnown', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->languages_known_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LanguagesKnown', 'url'=>array('admin')),
);
?>

<h1>View LanguagesKnown #<?php echo $model->languages_known_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'languages_known_id',
		'languages_known1',
		'languages_known2',
		'languages_known3',
		'languages_known4',
	),
)); ?>
