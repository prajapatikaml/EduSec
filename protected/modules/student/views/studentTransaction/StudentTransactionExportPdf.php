
<?php $k=0;
//print_r($model);exit;
if ($model != null):
?>
<style type="text/css">

table.example2 tr th, table.example2 tr td {
  
  width: 40px;
  text-align: center;
  vertical-align: middle;
  border: 1px solid black;
  font-size: 0.9em;
  padding: 0.3em;
}

caption, th, td {
  float: none !important;
  font-weight: normal;
}
</style>

<table class="example2">

	<tr>
		<th>
		      SI.No.		
		</th>
		<th> 
		      Enroll No.		
		</th>
		<th>
		      Name		
		</th>
		
		<th>
		      Surname		
		</th>
		<th>
		      Academic Year		
		</th>
		<th>
		      Semester		
		</th>
		<th>
		      Regular/Detain Status		
		</th>
		<th>
		      Course		
		</th>

 	</tr>
	<?php 
	foreach($model as $m=>$v) {
          if($m <> 0) {
            ?>	<tr>
		<td >
		      <?php echo ++$k; ?>		
		</td>
		<td >
		      <?php echo StudentInfo::model()->findByPk($v['student_transaction_student_id'])->student_enroll_no; ?>		
		</td>
 		<td>
		      <?php echo StudentInfo::model()->findByPk($v['student_transaction_student_id'])->student_first_name; ?>		
		</td>
		
		<td>
		      <?php echo StudentInfo::model()->findByPk($v['student_transaction_student_id'])->student_last_name; ?>		
		</td>
		
		<td>
		      <?php echo AcademicTermPeriod::model()->findByPk($v['student_academic_term_period_tran_id'])->academic_term_period; ?>		
		</td>
		<td>
		      <?php 
			if(isset($v['student_academic_term_name_id']))
			echo "Sem-".AcademicTerm::model()->findByPk($v['student_academic_term_name_id'])->academic_term_name;
			else
			echo "N/A"; 
		      ?>		
		</td>
	
		<td>
		      <?php echo StudentStatusMaster::model()->findByPk($v['student_transaction_detain_student_flag'])->	status_name; ?>		
		</td>
		<td>
		      <?php echo CourseMaster::model()->findByPk($v['student_transaction_course_id'])->course_name; ?>		
		</td>
 	   </tr> 
       <?php
    
       }// end if
     }// end for loop
	
?>
</table>
<?php endif; ?>
