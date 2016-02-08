<?php
$this->breadcrumbs=array(
	'Nationality'=>array('admin'),
	//$model->nationality_name=>array('view','id'=>$model->nationality_id),
	$model->nationality_name=>array(),
	'Edit',
);

$this->menu=array(
//	array('label'=>'List Nationality', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	array('label'=>'', 'url'=>array('view', 'id'=>$model->nationality_id),'linkOptions'=>array('class'=>'View','title'=>'View')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Edit Nationality  <?php //echo $model->nationality_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
