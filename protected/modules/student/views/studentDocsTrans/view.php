<?php
$this->breadcrumbs=array(
	'Student Docs Trans'=>array('index'),
	$model->student_docs_trans_id,
);

$this->menu=array(
	array('label'=>'List StudentDocsTrans', 'url'=>array('index')),
	array('label'=>'Create StudentDocsTrans', 'url'=>array('create')),
	array('label'=>'Update StudentDocsTrans', 'url'=>array('update', 'id'=>$model->student_docs_trans_id)),
	array('label'=>'Delete StudentDocsTrans', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->student_docs_trans_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StudentDocsTrans', 'url'=>array('admin')),
);
?>

<h1>View StudentDocsTrans #<?php echo $model->student_docs_trans_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'student_docs_trans_id',
		'student_docs_trans_user_id',
		'student_docs_trans_stud_docs_id',
	),
)); ?>
