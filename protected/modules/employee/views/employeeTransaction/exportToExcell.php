
<?php 

if ($model != null):
?>
<table border="1">

	<tr>
		<th>
		      Employee No		
		</th>
		<th width="80px">
		      Employee Attendance Card		
		</th>
		<th>
		      Name Alias		
		</th>
		<th>
		      Joining date		
		</th>
		<th>
		     Probation Period		
		</th>
		<th>
		     Designation		
		</th>
 		<th>
		     Department		
		</th>
		<th>
		      Shift Type		
		</th>
		<th>
		      Title		
		</th>
		<th>
		      Branch		
		</th>
		<th>
		      Employee First Name		
		</th>
		<th>
		      Category Name		
		</th>
		<th>
		      Department Name		
		</th>
		
 	</tr>
	<?php 
	foreach($model as $m=>$v) {
          if($m <> 0) {
            ?>	<tr>
		<td>
		      <?php echo EmployeeInfo::model()->findByPk($v['employee_transaction_employee_id'])->employee_no; ?>		
		</td>
		<td>
		      <?php echo EmployeeInfo::model()->findByPk($v['employee_transaction_employee_id'])->employee_attendance_card_id; ?>		
		</td>
		<td>
		      <?php echo EmployeeInfo::model()->findByPk($v['employee_transaction_employee_id'])->employee_name_alias; ?>		
		</td>
		<td>
		      <?php echo EmployeeInfo::model()->findByPk($v['employee_transaction_employee_id'])->employee_joining_date; ?>		
		</td>
		<td>
		      <?php echo EmployeeInfo::model()->findByPk($v['employee_transaction_employee_id'])->employee_probation_period; ?>		
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
		      <?php echo EmployeeInfo::model()->findByPk($v['employee_transaction_employee_id'])->title; ?>		
		</td>
		<td>
		      <?php echo EmployeeInfo::model()->findByPk($v['employee_transaction_employee_id'])->employee_first_name; ?>		
		</td>
		<td>
		      <?php echo Category::model()->findByPk($v['employee_transaction_category_id'])->category_name; ?>		
		</td>
		<td>
		      <?php echo Department::model()->findByPk($v['employee_transaction_department_id'])->department_name; ?>		
		</td>
		
 	   </tr> 
       <?php
    
       }// end if
     }// end for loop
	
?>
</table>
<?php endif; ?>
