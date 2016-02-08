<?php
$this->breadcrumbs=array(
	'City'=>array('admin'),
	//$model->city_name=>array('view','id'=>$model->city_id),
	$model->city_name=>array(),
	'Edit',
);

$this->menu=array(
	//array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'', 'url'=>array('view', 'id'=>$model->city_id),'linkOptions'=>array('class'=>'View','title'=>'View')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Edit City  <?php //echo $model->city_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
