<?php
$this->breadcrumbs=array(
	'Semester'=>array('index'),
	//$model->academic_term_name=>array('view','id'=>$model->academic_term_id),
	$model->academic_term_name,
	'Edit',
);

$this->menu=array(
	array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'', 'url'=>array('view', 'id'=>$model->academic_term_id),'linkOptions'=>array('class'=>'View','title'=>'View')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Edit Semester <?php //echo $model->academic_term_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
