<?php
$this->breadcrumbs=array(
	'Academic Year'=>array('index'),
	//$model->academic_term_period=>array('view','id'=>$model->academic_terms_period_id),
	$model->academic_term_period=>array(),
	'Edit',
);

$this->menu=array(
//	array('label'=>'List AcademicTermPeriod', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'', 'url'=>array('view', 'id'=>$model->academic_terms_period_id),'linkOptions'=>array('class'=>'View','title'=>'View')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Edit Academic Year<?php //echo $model->academic_terms_period_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
