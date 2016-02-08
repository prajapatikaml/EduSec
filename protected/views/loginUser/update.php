<?php
$this->breadcrumbs=array(
	'Login Users'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List LoginUser', 'url'=>array('index')),
	array('label'=>'Create LoginUser', 'url'=>array('create')),
	array('label'=>'View LoginUser', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage LoginUser', 'url'=>array('admin')),
);
?>

<h1>Update LoginUser <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>