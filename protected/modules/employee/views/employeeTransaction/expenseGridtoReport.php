
<?php 
$k=0;
if ($model != null):
?>
<table border="1">

	<tr>
		<th>SN.</th>
		<th>Employee No</th>
 		<th>Attendance Card</th>
		<th>Name</th>
		<th>Surname</th>		
		<th>Designation</th>
		<th>Department</th>
		<th>Shift</th>
		<th>Organization</th>
 	</tr>
	<?php 
	foreach($model as $m=>$v) {
          if($m <> 0) {
            ?>	<tr>
		<td>
		      <?php echo ++$k; ?>		
		</td>
		<td>
		      <?php echo EmployeeInfo::model()->findByPk($v['employee_transaction_employee_id'])->employee_no; ?>		
		</td>
		<td>
		      <?php echo EmployeeInfo::model()->findByPk($v['employee_transaction_employee_id'])->employee_attendance_card_id; ?>		
		</td>
		<td>
		      <?php echo EmployeeInfo::model()->findByPk($v['employee_transaction_employee_id'])->employee_first_name; ?>		
		</td>
		<td>
		      <?php echo EmployeeInfo::model()->findByPk($v['employee_transaction_employee_id'])->employee_last_name; ?>		
		</td>
				
		<td>
		      <?php echo EmployeeDesignation::model()->findByPk($v['employee_transaction_designation_id'])->employee_designation_name; ?>		
		</td>
		<td>
		      <?php echo Department::model()->findByPk($v['employee_transaction_department_id'])->department_name; ?>		
		</td>
		<td>
		      <?php echo Shift::model()->findByPk($v['employee_transaction_shift_id'])->shift_type; ?>		
		</td>
		<td>
		      <?php echo Organization::model()->findByPk($v['employee_transaction_organization_id'])->organization_name; ?>		
		</td>
 	   </tr> 
       <?php
    
       }// end if
     }// end for loop
	
?>
</table>
<?php endif; ?>
