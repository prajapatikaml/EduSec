<?php
$this->breadcrumbs=array(
	'Student Docs Trans'=>array('index'),
	$model->student_docs_trans_id=>array('view','id'=>$model->student_docs_trans_id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List StudentDocsTrans', 'url'=>array('index')),
	//array('label'=>'Create StudentDocsTrans', 'url'=>array('create')),
	//array('label'=>'View StudentDocsTrans', 'url'=>array('view', 'id'=>$model->student_docs_trans_id)),
	//array('label'=>'Manage StudentDocsTrans', 'url'=>array('admin')),
);
?>

<h1>Update Student Docs : <?php echo $model->student_docs_trans_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
