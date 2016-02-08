<style>
div.student-result table{
   width:65%;
   border-spacing:1px;	
}
div.student-result  th{
   background:#CDCDCD;
   color:#807BAD;
}
div.student-result td{
  background:#EEEEEE;	
}
.subject_name{
   padding-left: 10px;
   text-align: left;
}
div.student-result.student-data{
   background:#E8EEFA;
   width:40%;
   float:left;
   font-weight:bold;
   line-height:2;
   margin-bottom:20px;
   margin-top:20px;
   padding-left:10px;
   border:1px solid #CDCDCD
}
.table-header{
   color:#22465E !important;
   font-family: sans-serif;
   font-size: 16px;
   padding-top:10px;
   background: 	#FFF8DC!important;
}
</style>

<div class="student-result">

<?php

	$exam_data  = Yii::app()->db->createCommand()
			->selectDistinct('exam_attendance_branch_schedule_id')
			->from('exam_student_attendance')
			->join('exam_student_result','id IN(select exam_student_attendance_id from exam_student_result)')
			->where('exam_attendance_student_id='.$stu_id)
			->queryAll();
/*		$exam_array = CHtml::listData($exam_data,'exam_attendance_branch_schedule_id','exam_attendance_branch_schedule_id');
		$str = implode(',',$exam_array);
		$exam_list = ExamScheduled::model()->findAll(array('condition'=>'scheduled_exam_id in('.$str.')'));
		$exam_list = CHtml::listData($exam_list,'scheduled_exam_id','scheduled_exam_name','Rel_Year.academic_term_period');

		if(isset($_POST['ExamStudentResult']))
			
*/
		
	foreach($exam_data as $l){

			$exam_name = ExamScheduled::model()->findByPk($l['exam_attendance_branch_schedule_id']);

			$student_result = Yii::app()->db->createCommand()
					->select('*')
					->from('exam_student_result') 
					->join('exam_student_attendance','exam_student_attendance_id=id')
					->join('branch_subjectwise_scheduling','exam_attendance_subject_id=subject_id and branch_scheduled_exam_id=exam_attendance_branch_schedule_id')
					->join('subject_master','subject_master_id=exam_attendance_subject_id')
					->join('student_info','exam_result_student_id=student_info_transaction_id')
					->where('student_info_transaction_id='.$stu_id.' and exam_attendance_branch_schedule_id='.$l['exam_attendance_branch_schedule_id'])
					->queryAll();


if($student_result){
?>
	</br></br>
<!--	
	<div class="student-data">
		Name : <?php echo $student_result[0]['student_first_name'].' '.$student_result[0]['student_middle_name'].' '.$student_result[0]['student_last_name'];  ?></br>
		Enrollment No : <?php echo $student_result[0]['student_enroll_no']; ?></br>
		Seat No : </br>
		Exam : <?php echo ExamScheduled::model()->findByPk($student_result[0]['exam_attendance_branch_schedule_id'])->scheduled_exam_name;?></br>
		Branch : <?php echo Branch::model()->findByPk($student_result[0]['exam_attendance_branch_id'])->branch_name; ?></br>
	</div>
-->	
	<table class="report-table" border="2" > 
		<tr>
		<th class="table-header" colspan="5"><?php echo $exam_name['scheduled_exam_name'];?></th>
		</tr>
		<tr>
			<th>Subject Code</th>
			<th>Subject Name</th>
			<th>Total Marks</th>
			<th>Passing Marks</th>
			<th>Obtained Marks</th>
		</tr>
<?		foreach($student_result as $list)
		{
		
		echo 	"<tr>".
			"<td>".$list['subject_master_code']."</td>".
			"<td class=\"subject_name\">".$list['subject_master_name']."</td>".
			"<td>".$list['maximum_marks']."</td>".
			"<td>".$list['passing_marks']."</td>".
			"<td>".$list['obtained_marks']."</td></tr>";
		}
?>		
	</table>
<?php	}

}
?>	
</div><!-- form -->


