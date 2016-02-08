<?php
$this->breadcrumbs=array(
	'Document Category'=>array('index'),
	//$model->doc_category_id=>array('view','id'=>$model->doc_category_id),
	$model->doc_category_name,
	'Edit',
);

?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
