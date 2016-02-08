
<?php 

if ($model != null):
?>
<table>

	<tr>
		<th>
		      Employee No		
		</th>
		<th width="80px">
		      Employee Attendance Card		
		</th>
		<th>
		      Name		
		</th>
		<th>
		     Designation		
		</th>
 		<th>
		     Department		
		</th>
		<th>
		      Organization Mobile		
		</th>
		<th>
		      Private Number	
		</th>
		
 	</tr>
	<?php 
	foreach($model as $m=>$v) {
          if($m <> 0) {
            ?>	<tr>
		<td>
		      <?php $inf = EmployeeInfo::model()->findByPk($v['employee_transaction_employee_id']); ?>
		      <?php echo $inf->employee_no; ?>		
		</td>
		<td>
		      <?php echo $inf->employee_attendance_card_id; ?>		
		</td>
		<td>
		      <?php echo $inf->employee_first_name.' '.$inf->employee_middle_name.' '.$inf->employee_last_name; ?>		
		</td>
		<td>
		      <?php echo EmployeeDesignation::model()->findByPk($v['employee_transaction_designation_id'])->employee_designation_name; ?>		
		</td>
		<td>
		      <?php echo Department::model()->findByPk($v['employee_transaction_department_id'])->department_name; ?>		
		</td>
		<td>
		      <?php echo $inf->employee_organization_mobile; ?>		
		</td>
		<td>
		      <?php echo $inf->employee_private_mobile; ?>		
		</td>
		
 	   </tr> 
       <?php
    
       }// end if
     }// end for loop
	
?>
</table>
<?php endif; ?>
