<?php
$this->breadcrumbs=array(
	'Document Category'=>array('admin'),
	'Add',
);

$this->menu=array(
	//array('label'=>'List DocumentCategoryMaster', 'url'=>array('index')),
	//array('label'=>'Manage DocumentCategoryMaster', 'url'=>array('admin')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Add Document Category</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
