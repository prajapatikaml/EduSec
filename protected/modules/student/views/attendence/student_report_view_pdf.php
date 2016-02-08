<style>
table, th, td {
  vertical-align: middle;
}
th, td, caption {
  padding: 4px 0 10px;
  text-align: center;
}
</style>
<h5></h5>

<?php


$i=0;


if($subject_data)
{
	echo '<table border="1" >';

$org_data = Organization::model()->findByPk(Yii::app()->user->getState('org_id'));
/*echo "<tr class='table_data'> <th  colspan =10 style=text-align:left;> ".CHtml::image(Yii::app()->controller->createUrl('/site/loadImage', array('id'=>Yii::app()->user->getState('org_id'))),'No Image',array('width'=>80,'height'=>55,'style'=>'float:left;margin-left:400px;')) ."
	 <big> <b>".$org_data->organization_name ."</big><br>". $org_data->address_line1." ".$org_data->address_line2."</br>" 
 . City::model()->findBypk(Organization::model()->findByPk(Yii::app()->user->getState('org_id'))->city)->city_name.", ".State::model()->findBypk(Organization::model()->findByPk(Yii::app()->user->getState('org_id'))->state)->state_name.", ".Country::model()->findBypk(Organization::model()->findByPk(Yii::app()->user->getState('org_id'))->country)->name."." ." </th> <br>	 </tr>";*/
echo "<tr> <td colspan=8 align=center><big> Student Attendence Report </big> </td></tr>";
$student_tran = StudentTransaction::model()->findByAttributes(array('student_transaction_student_id'=>$student_data->student_id));
echo "<b>";
echo "<tr> <td colspan=2><b>Current Semester </td>";
echo "<td colspan=6 align=left>" ;
 echo AcademicTerm::model()->findByPk($student_tran->student_academic_term_name_id)->academic_term_name; 
echo "</td></tr> ";
echo "<tr><td colspan=2 align=left><b> Student Name </td><td colspan=6><b>";
echo $student_data->student_first_name;
echo "</td></tr>";
echo "<tr><td colspan=2><b> From-Date </td><td colspan=6><b>" ;
 echo date("d-m-Y", strtotime($start)); 
echo "</td></tr> <tr><td colspan=2><b> To-Date </td> <td colspan=6><b>";
echo date("d-m-Y", strtotime($end));
echo "</td></tr>";
 echo "<tr><td colspan=2><b>Student Roll No";
 echo "</td><td colspan=6><b>";
echo $student_data->student_roll_no; 
echo "</td> </tr>";
echo "<tr><td colspan=2><b>Student Enroll No";
  echo "</td><td colspan=6 align=left><b>";
echo $student_data->student_enroll_no;
echo"</td></tr><tr><td colspan=8></td></tr>";


?>
<tr ><th>Sr No.</th>
<th colspan=3>Subject Name</th>
<th>Semester</th>
<th>Total</th>
<th>Present</th>
<th>Attendance %</th>
</tr>
<?php
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
			echo '<tr align=center><td >'.++$i.'</td>';
echo '<td colspan=3 align=left>'.$list['subject_master_name'].'('.SubjectType::model()->findByPk($list['subject_master_type_id'])->subject_type_name.")".'</td>';
echo '<td>'.$sem_name.'</td><td>'.$totalcount.'</td><td>'.$precount.'</td><td>'.$percentage.'%</td></tr>';
			
		}
		else
		{
			$percentage = ($precount*100)/$totalcount;
			echo '<tr align=center ><td>'.++$i.'</td><td align=left colspan=3>'.$list['subject_master_name'].'('.SubjectType::model()->findByPk($list['subject_master_type_id'])->subject_type_name.')'.'</td><td>'.$sem_name.'</td><td>'.$totalcount.'</td><td>'.$precount.'</td><td>'.round($percentage,2).'%</td></tr>';
			
		}
		

}
echo '</table>';
}
else
{
	print  "<h1 style=\"color:red;text-align:center\">No Record To Display</h1>";

}


?>
