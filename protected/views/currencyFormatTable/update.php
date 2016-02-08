<?php
$this->breadcrumbs=array(
	'Currency Format'=>array('admin'),
	$model->currency_format_name=>array(),
	'Edit',
);

$this->menu=array(
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->currency_format_id),'confirm'=>'Are you sure you want to delete this item?', 'class'=>'Delete','title'=>'Delete')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Update Currency Format </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
