<?php

 //$branch_id and $stu_id
 $data = ExamResult::model()->findAll(array('condition'=>'exam_result_student_id='.$stu_id)); 
 $x = array();
 
 //for unique branch id
 foreach($data as $list)
 {
  $x[] = $list['exam_result_schedule_branch_id'];
 }
 $sb_id = array_unique($x);
 
 //for 
 foreach($sb_id as $list1)
 {
$m=1;
  $sem = ExamScheduleBranch::model()->findByPk($list1);
  $scid = ExamSchedule::model()->findByPk($sem['exam_schedule_id']);
  $name = ExamName::model()->findByPk($scid['exam_schedule_exam_name_id']);
  
  $sem = AcademicTerm::model()->findByPk($sem['exam_schedule_branch_term_period_id'])->academic_term_name;
  $cat = ExamCategory::model()->findByPk($name['exam_category_id'])->exam_category_name;
  $type = ExamType::model()->findByPk($scid['exam_type_id'])->exam_type_name;
  
  $data1 = ExamResult::model()->findAll(array('condition'=>'exam_result_schedule_branch_id='.$list1.' AND exam_result_student_id='.$stu_id));
  echo "<table class='table_data'>";
echo "<th colspan=\"12\" style=\"font-size:16px;\">";
	echo 'Sem:'.$sem.'    '.'Category:'.$cat.'    '.'Type:'.$type;
        echo "</th>";
echo"<tr class='table_header'><th>Subject</th><th>Gain Mark</th><th>Total Mark</th></tr>";
 		
  foreach($data1 as $list2)
  {
	 if(($m%2) == 0)
		{
		  $class = "odd";
		}
		else
		{
		  $class = "even";
		}
   echo "<tr  class=".$class."><td>".SubjectMaster::model()->findByPk($list2['exam_result_subject_id'])->subject_master_name."</td>";
   echo "<td>".$list2['exam_result_gain_mark']."</td>";
   echo "<td>".$list2['exam_result_total_mark']."</td></tr>";
   $m++;
  }
  
  echo "</table>";
  
 }
