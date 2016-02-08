<?php
$this->breadcrumbs=array(
	'Document Category'=>array('index'),
	//$model->doc_category_id=>array('view','id'=>$model->doc_category_id),
	$model->doc_category_name=>array(),
	'Edit',
);

$this->menu=array(
	//array('label'=>'List DocumentCategoryMaster', 'url'=>array('index')),
	//array('label'=>'Create DocumentCategoryMaster', 'url'=>array('create')),
	//array('label'=>'View DocumentCategoryMaster', 'url'=>array('view', 'id'=>$model->doc_category_id)),
	//array('label'=>'Manage DocumentCategoryMaster', 'url'=>array('admin')),
);
?>

<h1>Edit Document Category <?php //echo $model->doc_category_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
