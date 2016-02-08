
<?php 
//print_r($model);exit;
if ($model != null):
$k=0;
?>
<table border="1">

	<tr>
		<th>
		     SN.	
		</th>
		<th>
		     Student Enroll No.	
		</th>
 		<th>
		     Student First Name		
		</th>
		<th>
		     Attendence	
		</th>
		<th>
		     Faculty Name
		</th>
		<th>
		     Branch Name		
		</th>
		<th>
		     Subject Name		
		</th>
		<th>
		     Academic Year	
		</th>
		<th>
		     Semester
		</th>
		<th>
		     Date
		</th>
 	</tr>
	<?php 
	foreach($model as $m=>$v) {
          if($m <> 0) {
		$StudentInfo =  StudentInfo::model()->findBypk($v['st_id']);
            ?>	<tr>
		<td>
		      <?php echo ++$k; ?>		
		</td>
		<td>
		      <?php echo $StudentInfo->student_enroll_no; ?>		
		</td>
		<td>
		      <?php echo $StudentInfo->student_first_name;?>		
		</td>
		<td>
		      <?php echo $v['attendence']; ?>		
		</td>
		<td>
		      <?php echo EmployeeInfo::model()->find(' 	employee_info_transaction_id='.$v['employee_id'])->employee_first_name; ?>		
		</td>
		<td>
		      <?php echo Branch::model()->findByPk($v['branch_id'])->branch_name; ?>		
		</td>
		<td>
		      <?php echo SubjectMaster::model()->findByPk($v['sub_id'])->subject_master_name; ?>		
		</td>
		
		<td>
		      <?php echo AcademicTermPeriod::model()->findByPk($v['sem_id'])->academic_term_period; ?>		
		</td>
		<td>
		      <?php echo "Sem-".AcademicTerm::model()->findByPk($v['sem_name_id'])->academic_term_name; ?>		
		</td>
		<td>
		      <?php echo $v['attendence_date']; ?>		
		</td>
 	   </tr> 
       <?php
    
       }// end if
     }// end for loop
	
?>
</table>
<?php endif; ?>
