<?php
$this->breadcrumbs=array(
	'Student Status'=>array('admin'),
	$model->status_name=>array(),
	'Edit',
);

$this->menu=array(
	//array('label'=>'List Studentstatusmaster', 'url'=>array('index')),
	//array('label'=>'Create Studentstatusmaster', 'url'=>array('create')),
	//array('label'=>'View Studentstatusmaster', 'url'=>array('view', 'id'=>$model->id)),
	//array('label'=>'Manage Studentstatusmaster', 'url'=>array('admin')),


	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'', 'url'=>array('view', 'id'=>$model->id),'linkOptions'=>array('class'=>'View','title'=>'View')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Edit Student Status  <?php //echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
