<?php
$this->breadcrumbs=array(
	'Important Notices'=>array('admin'),
	//$model->notice=>array('view','id'=>$model->notice_id),
	//$model->notice,	
'Edit',
);

$this->menu=array(
//	array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'', 'url'=>array('view', 'id'=>$model->notice_id),'linkOptions'=>array('class'=>'View','title'=>'View')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Edit Important Notice <?php //echo $model->notice_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
