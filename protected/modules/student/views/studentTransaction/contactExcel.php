
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
		      Roll No.		
		</th>
		<th>
		      Name		
		</th>
		
		<th>
		      Surname		
		</th>
		<th>
		      Student Mobile No.
		</th>
		<th>
			Guardian Mobile No.
		</th>

		
 	</tr>
	<?php 
	foreach($model as $m=>$v) {
          if($m <> 0) {
            ?>	<tr>
		<td >
		      <?php echo ++$k; ?>		
		</td>
		<td>
		      <?php $inf = StudentInfo::model()->findByPk($v['student_transaction_student_id']); ?>	
		      <?php echo $inf->student_roll_no; ?>		
		</td>
		<td>
		      <?php echo $inf->student_first_name; ?>		
		</td>
		
		<td>
		      <?php echo $inf->student_last_name; ?>		
		</td>
			<td>
		      <?php echo $inf->student_mobile_no; ?>		
		</td>
		<td>
		      <?php echo $inf->student_guardian_mobile; ?>		
		</td>
		
 	   </tr> 
       <?php
    
       }// end if
     }// end for loop
	
?>
</table>
<?php endif; ?>
