<?php
$this->breadcrumbs=array(
	'qualifications'=>array('admin'),
	//$model->qualification_name=>array('view','id'=>$model->qualification_id),
	$model->qualification_name=>array(),
	'Edit',
);

$this->menu=array(

	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
//	array('label'=>'', 'url'=>array('index'),'linkOptions'=>array('class'=>'List','title'=>'List')),
	array('label'=>'', 'url'=>array('view', 'id'=>$model->qualification_id),'linkOptions'=>array('class'=>'View','title'=>'View')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Edit Qualification  <?php //echo $model->qualification_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
