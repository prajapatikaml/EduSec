<style>
.unit-block {
  float: left;
  margin-left: 30px;
  width: 50%;
}

.course-block {
  float: left;
  width: 45%;
}

</style>
<?php
$this->breadcrumbs=array(
	'Course Details',	
);
?>

<?php echo CHtml::link('GO BACK', array('student/studentTransaction/update', 'id'=>$_REQUEST['id']), array('style'=>'float:left; width:100%; margin-bottom: 15px;'))?>

<?php if(!isset($noCourse)) { ?>
<div class= "course-block">
<h1> Course Details </h1>
<?php
	echo '<table class="detail-view">';
	echo '<tr class="odd"><th>Course Code</th><td>'.$courseDetails->course_code.'</td></tr>';
	echo '<tr class="even"><th>Course Name</th><td>'.$courseDetails->course_name.'</td></tr>';
	echo '<tr class="odd"><th>Level</th><td>'.$courseDetails->course_level.'</td></tr>';
	echo '<tr class="even"><th>Completion Hours</th><td>'.$courseDetails->course_completion_hours.'</td></tr>';
	echo '<tr class="odd"><th>Cost</th><td>'.$courseDetails->course_cost.'</td></tr>';
	echo '</table>';

?>
</div>

<div class="unit-block">
<h1> Course Units</h1>

<?php 
	echo '<table class="table_data" >
	<tr class="table_header">
	  <th>SI No.</th>
	  <th>Reference Code</th>
	  <th>Name of Units</th>
	  <th>Level</th>
	  <th>Credits</th>
	  <th>Completion Hours</th>
	</tr>';
	$m = 0;
	foreach($courseUnits as $units) { 

		if(($m%2) == 0)  
		 echo '<tr class="even">';
		else
		 echo '<tr class="odd">';
		echo '<td>'. ++$m .'</td>';
		echo '<td>'.$units['course_unit_ref_code'].'</td>';
		echo '<td>'.$units['course_unit_name'].'</td>';
		echo '<td>'.$units['course_unit_level'].'</td>';
		echo '<td>'.$units['course_unit_credit'].'</td>';
		echo '<td>'.$units['course_unit_hours'].'</td>';

		echo '</tr>';	
		
    	}
	echo '</table>';
?>
</div>
<?php } 
else 
    echo "Course details not avilable.";
?>
