<?php
$this->breadcrumbs=array(
	'Important Notices'=>array('admin'),
	'Add',
);

$this->menu=array(
	//array('label'=>'List ImportantNotice', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<!--h1>Add Important Notice</h1-->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
