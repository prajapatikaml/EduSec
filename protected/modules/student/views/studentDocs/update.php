<?php
$this->breadcrumbs=array(
	'Student Docs'=>array('index'),
	$model->student_docs_id=>array('view','id'=>$model->student_docs_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List StudentDocs', 'url'=>array('index')),
	array('label'=>'Create StudentDocs', 'url'=>array('create')),
	array('label'=>'View StudentDocs', 'url'=>array('view', 'id'=>$model->student_docs_id)),
	array('label'=>'Manage StudentDocs', 'url'=>array('admin')),
);
?>

<h1>Update StudentDocs <?php echo $model->student_docs_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>