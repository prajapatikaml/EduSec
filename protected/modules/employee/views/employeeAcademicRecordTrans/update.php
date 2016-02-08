<?php
$this->breadcrumbs=array(
	'Employee Qualification'=>array('admin'),
	$model->employee_academic_record_trans_id=>array('view','id'=>$model->employee_academic_record_trans_id),
	'Update',
);

$this->menu=array(

	//array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	//array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
//	//array('label'=>'', 'url'=>array('index'),'linkOptions'=>array('class'=>'List','title'=>'List')),
	//array('label'=>'', 'url'=>array('view', 'id'=>$model->employee_academic_record_trans_id),'linkOptions'=>array('class'=>'View','title'=>'View')),

);
?>

<h1>Update Employee Qualification  <?php //echo $model->employee_academic_record_trans_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
