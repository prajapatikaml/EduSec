<?php
$this->breadcrumbs=array(
	//'Student Registration Information'=>array('admin'),
	'Student Registration',
);

$this->menu=array(
	//array('label'=>'List StudentRegistrationInfo', 'url'=>array('index')),
	//array('label'=>'Manage', 'url'=>array('admin')),
);
?>

<h1>Student Registration Information</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'acdmInfoModel'=>$acdmInfoModel)); ?>
