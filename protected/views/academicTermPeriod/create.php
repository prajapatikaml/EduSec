<?php
$this->breadcrumbs=array(
	'Academic Year'=>array('admin'),
	'Add',
);

$this->menu=array(
//	array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>



<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
