<?php
$this->breadcrumbs=array(
	'Student Docs'=>array('index'),
	$model->student_docs_id,
);

$this->menu=array(
	array('label'=>'List StudentDocs', 'url'=>array('index')),
	array('label'=>'Create StudentDocs', 'url'=>array('create')),
	array('label'=>'Update StudentDocs', 'url'=>array('update', 'id'=>$model->student_docs_id)),
	array('label'=>'Delete StudentDocs', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->student_docs_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StudentDocs', 'url'=>array('admin')),
);
?>

<h1>View StudentDocs #<?php echo $model->student_docs_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'student_docs_id',
		'student_docs_desc',
		'student_docs_path',
	),
)); ?>
