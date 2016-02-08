<?php
$this->breadcrumbs=array(
	'Monthwise Student Attendance Report',
	
);

$this->menu=array(
	//array('label'=>'List Attendence', 'url'=>array('index')),
	//array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Monthwise Report</h1>

<?php echo $this->renderPartial('monthwise_stud_report', array('model'=>$model,)); ?>
