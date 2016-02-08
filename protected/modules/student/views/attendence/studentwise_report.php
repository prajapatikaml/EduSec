<?php
$this->breadcrumbs=array(
	'Student Attendance Report',
	
);

$this->menu=array(
	//array('label'=>'List Attendence', 'url'=>array('index')),
	//array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>


<h2 style='color:black'>Student Attendance Report</h2>
<?php echo $this->renderPartial('stud_report', array('model'=>$model)); ?>
