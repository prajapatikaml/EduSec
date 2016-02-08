<style>
table, th, td {
  vertical-align: middle;
}
th, td, caption {
  padding: 4px 0 10px;
  text-align: center;
}
</style>
<h5><?php  echo '<span style=text-transform:capitalize;>'.strtolower($student_data->student_first_name).' attendance report</span>'; ?>  From-Date: <?php echo date("d-m-Y", strtotime($start));?> To-Date: <?php echo date("d-m-Y", strtotime($end));?></h5>
<h5>Student Roll No. : <?php echo $student_data->student_roll_no;?></h5>
<h5> Student Enroll No. : <?php echo $student_data->student_enroll_no;?></h5>

<?php

$student_tran = StudentTransaction::model()->findByAttributes(array('student_transaction_student_id'=>$student_data->student_id));?>
<h5>Current Semester : Sem-<?php echo AcademicTerm::model()->findByPk($student_tran->student_academic_term_name_id)->academic_term_name;?></h5>
<?php 
$i=0;


if($subject_data)
{
echo '<table border="1" >
<tr class="table_header"><th>Sr No.</th><th>Subject Name</th><th>Semester</th><th>Total</th><th>Present</th><th>Attendance %</th></tr>';
foreach($subject_data as $list) {
		
	
		
		/*if($start==null && $end==null)
		{	
			$total_att = Attendence::model()->findAll(array('condition'=>'st_id='.$student_tran->student_transaction_id.' AND sub_id='.$list->subject_master_id));
			$pre_att = Attendence::model()->findAll(array('condition'=>'st_id='.$student_tran->student_transaction_id.' AND attendence="P"'.' AND sub_id='.$list->subject_master_id));
			
		}
		else
		{*/
			
			$total_att = Attendence::model()->findAll(array('condition'=>'st_id='.$student_tran->student_transaction_id.' AND sub_id='.$list['subject_master_id'].' AND attendence_date BETWEEN "'.$start.'" AND "'.$end.'"'));
			$pre_att = Attendence::model()->findAll(array('condition'=>'st_id='.$student_tran->student_transaction_id.' AND attendence="P"'.' AND sub_id='.$list['subject_master_id'].' AND attendence_date BETWEEN "'.$start.'" AND "'.$end.'"'));

			
			
		//}
		$sem_name = AcademicTerm::model()->findByPk($list['subject_master_academic_terms_name_id'])->academic_term_name;		
		$percentage=0;
		$totalcount=count($total_att);
		$precount=count($pre_att);
		if($totalcount==0)
		{
			
			echo '<tr><td>'.++$i.'</td><td>'.$list['subject_master_name'].'('.SubjectType::model()->findByPk($list['subject_master_type_id'])->subject_type_name.")".'</td><td>'.$sem_name.'</td><td>'.$totalcount.'</td><td>'.$precount.'</td><td>'.$percentage.'%</td></tr>';
			
		}
		else
		{
			$percentage = ($precount*100)/$totalcount;
			echo '<tr ><td>'.++$i.'</td><td>'.$list['subject_master_name'].'('.SubjectType::model()->findByPk($list['subject_master_type_id'])->subject_type_name.')'.'</td><td>'.$sem_name.'</td><td>'.$totalcount.'</td><td>'.$precount.'</td><td>'.round($percentage,2).'%</td></tr>';
			
		}
		

}
echo '</table>';
}
else
{
	print  "<h1 style=\"color:red;text-align:center\">No Record To Display</h1>";

}


?>
