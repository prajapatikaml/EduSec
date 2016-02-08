<style>
table, th, td {
  vertical-align: middle;
}
th, td, caption {
  padding: 4px 0 10px;
  text-align: center;
}

.topic-covered th {
`  -moz-transform-origin:0 50%;
  -ms-transform:rotate(270deg); /* IE 9 */
  -moz-transform:rotate(270deg); /* Firefox */
  -webkit-transform:rotate(270deg); /* Safari and Chrome */
  -o-transform:rotate(270deg); /* Opera */
 filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
writing-mode: lr-tb;
 width:100%;
 overflow:inherit;
    }
</style>
<?php 
if(isset($div_id))
{
 
$month_value = $month;
$div_model = Division::model()->findByPk($div_id);
$num = cal_days_in_month(CAL_GREGORIAN, $month_value, date('Y')); 
$colspan=$num+7;
$branch_model=Branch::model()->findByPk($branch_id);
 $acd_model = AcademicTerm::model()->findByPk($sem);
$sub = SubjectMaster::model()->findByPk($selsub);
?>
<?php
 $org = Organization::model()->findAll();
 $org_data=$org[0];

echo '<table border="2" > ';
	echo "<tr align=center> <th  colspan = 15 style=text-align:left;> ".CHtml::image(Yii::app()->controller->createUrl('/site/loadImage', array('id'=>$org_data->organization_id)),'No Image',array('width'=>80,'height'=>55,'style'=>'float:left;margin-left:200px;')) ."
	 <big> <b>".$org_data->organization_name ."</big><br>". $org_data->address_line1." ".$org_data->address_line2."</br>"  . City::model()->findBypk($org_data->city)->city_name.", ".State::model()->findBypk($org_data->state)->state_name.", ".Country::model()->findBypk($org_data->country)->name."." ." </th> <br>	 </tr>";
?>

<?php //echo "<td colspan=$colspan>";
echo "<tr><th colspan=20><h3> Branch  of ".$branch_model->branch_name." Students of Semester-".$acd_model->academic_term_name." , Subject-".$sub->subject_master_name ."  In Month - ". date("F", mktime(0,0,0,$month)) ." Attendence Report</h3></th> </tr>";


 }?>


<?php 
$i=0;
$m=1;
if($month)
{
$year=date('Y');
$sub = SubjectMaster::model()->findByPk($selsub);

?>
<tr>

<tr class="topic-covered"  style="height:220px;background:#FFF;">
       <th colspan=6 style="color:#990A10;"><b>Topic Covered</b></th>
      <?php

        for($i = 1; $i<=$num; $i++) {
		   if(strlen($i) == 1)
		   	$i = "0".$i;	
		   if(strlen($month_value) == 1) 
			$month_value="0".$month_value;	
		   $date = date('Y').'-'.$month_value.'-'.$i;	
		   if(array_key_exists($date,$deleivered_topic))
		        print '<th>'.$deleivered_topic[$date].'</th>';
		   else 
		        print '<th></th>';	
	}
	 
       ?>
    <th></th><th></th><th></th></tr>
</table>
<?php
$month_value = $month;
$m=0;
$num = cal_days_in_month(CAL_GREGORIAN, $month_value, date('Y')); ?>
<table  border=1 >
    <tr ><h4>
       <th>SI No.</th>
       <th> Enroll.No.</th>
       <th colspan=4>Student Name</th>
	
  <?php		for($i = 1; $i<=$num; $i++) {
		    print '<th>'.$i.'</th>';
		}
		print '<th>No.of <br> Lectures <br>Taken  </th>';
		print '<th> No. of <br>Lectures <br>Attended </th>';
		print '<th> <br>Percentage </th>';
		
		foreach($student_id as $stud_tran_id)
		{		  	
		   echo '<tr align=center >';
		   echo '<center>';
		   echo '<td>';
		   echo ++$m;
		   echo '</td>';
		   $a = 1;
		 $stud_name=StudentInfo::model()->findByAttributes(array('student_info_transaction_id'=>$stud_tran_id));
		  print "<td>";
		  if(!empty($stud_name->student_enroll_no))	
    			echo $stud_name->student_enroll_no;
		  else
			echo 'Not Set';
		  print "</td>";
	   	   print "<td colspan=4 align=left>";
		   echo $stud_name->student_first_name.' '.$stud_name->student_last_name.'('.$stud_name->student_roll_no.')';
		   print "</td>";
		
		   for($j = 1; $j<=$num; $j++)
		   {
		    	if(strlen($j) == 1)
			  $j = "0".$j;
			$date = $j.'-'.$month_value.'-'.date('Y');
			$attend_date = date("Y-m-d", strtotime($date));	
			$stud_no=0;
			$result1 = Attendence::model()->findAll(array('condition'=>'month(attendence_date)='.$month_value.' AND st_id='.$stud_tran_id.' AND sub_id='.$selsub.' AND day(attendence_date)='.$j.' AND year(attendence_date)='.$year));
		        	  
					
			if(count($result1) !=0)		
			{	
				print "<td >";
				foreach($result1 as $result)
				{
				$myclass = ($result->attendence == 'P' )? 'green' : 'red'; 
				if($a == count($result1))
				print "<b >"."<font color=".$myclass.">".$result->attendence."</font>"."</b>";
				else
				print "<b >"."<font color=".$myclass.">".$result->attendence."</font>"."</b>";
				$a+=1;
				
				}
				print "</td>";
				
			}
			else
			{?>
				<td> -- </td>
		<?php	}
		$stud_no++;	
	
	}
	// total & present.
	$all_attendance = Attendence::model()->findAll(array('condition'=>'month(attendence_date)='.$month_value.' AND st_id='.$stud_tran_id.' AND sub_id='.$selsub.' AND year(attendence_date)='.$year));	
	$percentage=0;
			$present_attendance = Attendence::model()->findAll(array('condition'=>'month(attendence_date)='.$month_value.' AND st_id='.$stud_tran_id.' AND sub_id='.$selsub.' AND year(attendence_date)='.$year.' AND attendence = "P"'));	
			$total=count($all_attendance);
			$present=count($present_attendance);
			if($total!=0)
			$percentage = ($present*100)/$total;
			print "<td>";
				 echo $total;
			print "</td>";
			print "<td>";
				 echo $present;
			print "</td>";
			print "<td>";
				 echo round($percentage,2).'%';
			print "</td>";
	
		 echo '</center>';		
		print "</tr>";
	

	}
	print "</table>";
			
}
?>
