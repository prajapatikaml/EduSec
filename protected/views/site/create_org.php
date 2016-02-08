<?php
$this->breadcrumbs=array(
	'Organizations'=>array('admin'),
	'Create',
);

$this->menu=array(
//	array('label'=>'List Organization', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<?php echo $this->renderPartial('org_form', array('model'=>$model)); ?>
