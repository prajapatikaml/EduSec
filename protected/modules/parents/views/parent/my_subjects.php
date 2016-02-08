<?php
$this->breadcrumbs=array(
	'Subject List',	
);
?>
<style>
#content{
    width: 95%;
}
</style>
<?php  
	echo CHtml::link('GO BACK','studentprofile?id='.$_REQUEST['id']); 

	echo '<table class="table_data" >';
	 echo "<th colspan=\"4\" style=\"font-size: 18px; color: rgb(255, 255, 255);\">Current Semester Subjects List</th>";
	echo '<tr class="table_header"><th>SI No.</th><th>Subject Name</th><th>Subject Type</th><th>Teaching Employees Name</th></tr>';
	$m = 0;
	foreach($sub_model as $list) { 

		if(($m%2) == 0)
		   $class = "odd";
		else
		   $class = "even";
					
		echo '<tr class='.$class.'>'; ?>
		   <td>
			<?php echo ++$m;?>
		   </td>
		   <td>
			<?php echo $list['subject_master_name']; ?>
		   </td>
		   <td>
			<?php echo SubjectType::model()->findByPk($list['subject_master_type_id'])->subject_type_name; ?>
		   </td>
		   <td>
			<?php echo $emp_str_array[$list['subject_master_id']];?>
		   </td>
		</tr>	
		
   <?php } ?>
</table>

