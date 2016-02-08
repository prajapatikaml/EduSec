<?php
$this->breadcrumbs=array(
	'Student '=>array('admin'),
	'Enroll Student',
);

$this->menu=array(
	
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>


<?php echo $this->renderPartial('create_form', array('model'=>$model,'info'=>$info,'user'=>$user)); ?>
