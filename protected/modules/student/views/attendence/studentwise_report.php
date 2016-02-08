<?php
$this->breadcrumbs=array(
	'Student Attendance Report',
	
);

$this->menu=array(
	//array('label'=>'List Attendence', 'url'=>array('index')),
	//array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>



<?php echo $this->renderPartial('stud_report', array('model'=>$model)); ?>
