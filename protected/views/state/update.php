<?php
$this->breadcrumbs=array(
	'State'=>array('admin'),
	//$model->state_name=>array('view','id'=>$model->state_id),
	$model->state_name=>array(),
	'Edit',
);

$this->menu=array(
	//array('label'=>'List State', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	array('label'=>'', 'url'=>array('view', 'id'=>$model->state_id),'linkOptions'=>array('class'=>'View','title'=>'View')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Edit State  <?php //echo $model->state_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
