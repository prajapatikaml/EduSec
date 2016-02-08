<?php
$this->breadcrumbs=array(
	'Student History',	
);
?>
	<?php
		if(empty($_REQUEST['id']))
		  echo CHtml::link('GO BACK',array('studenthistory'));
		else
		  echo CHtml::link('GO BACK',array('student/studentTransaction/update','id'=>$_REQUEST['id']));
	?>
	<br/><br/>
<b>
<table  border="2px" id="twoColThinTable">
<tr class="row">
	<td class="col1">Name </td>
	<td class="col2"><?php echo $stud_trans[0]['student_first_name'].' '.$stud_trans[0]['student_middle_name'].' '.$stud_trans[0]['student_last_name'];?></td>
</tr>	
<tr class="row">
	<td class="col1">ACPC Admission Date </td> 
	<td class="col2"> <?php echo date('d-m-Y',strtotime($stud_trans[0]['student_adm_date'])) ;?></td>
</tr>
<tr class="row">	
	<td class="col1">Enrollment No. </td> 
	<td class="col2"><?php echo $stud_trans[0]['student_enroll_no'];?></td>
</tr>	
<tr class="row">
	<td class="col1">Roll No. </td> 
	<td class="col2"> <?php echo $stud_trans[0]['student_roll_no'];?></td>
</tr>	
<tr class="row">
	<td class="col1">Branch </td> 
	<td class="col2"><?php echo Branch::model()->findByPk($stud_trans[0]['student_transaction_branch_id'])->branch_name;?></td>
</tr>	
<tr class="row">
	<td class="col1">
	<?php 
		$sem = AcademicTerm::model()->findByPk($stud_trans[0]['student_academic_term_name_id'])->academic_term_name;
		$acdm_period = AcademicTermPeriod::model()->findByPk($stud_trans[0]['student_academic_term_period_tran_id'])->academic_term_period;?>
	Current/Last Semester </td> 
	<td class="col2"> <?php echo "Sem-".$sem; ?></td>
</tr>	
<tr class="row">	
	<td class="col1">Current/Passing Academic Year </td> 
	<td class="col2"><?php echo $acdm_period ?></td>
</tr>	
<tr class="row">
	<td class="col1">Quota </td> 
	<td class="col2"><?php echo Quota::model()->findByPk($stud_trans[0]['student_transaction_quota_id'])->quota_name;?></td>
</tr>	
</table>
<div>&nbsp;</div>
<?php
if(!empty($stud_archive))
{			
?>
<table  class="table_data">
<th colspan="4" style="font-size: 18px; color: rgb(255, 255, 255);">
Student History Record
</th>
	<tr class="table_header">
		<th>SI No.</th>
		<th>Academic Year</th>
		<th>Semester</th>
		<th>Student Status</th>
	</tr>
	<?php	
	$i=0;
/*  Please dont remove following code
	foreach($stud_archive as $list)
	{
	?>	<tr><td><?php echo ++$i;?></td>
	<?php
		$acd_period = AcademicTermPeriod::model()->findByPk($list['student_archive_ac_t_p_id'])->academic_term_period;
		$acd_name = AcademicTerm::model()->findByPk($list['student_archive_ac_t_n_id'])->academic_term_name;
	?>	<td><?php echo $acd_period;?></td>
		<td><?php echo "Sem-".$acd_name;?></td>
		</tr>
	<?php	
	}*/?>
<?php 
$m=1;  
	$academic = AcademicTerm::model()->findAll(array('condition'=>'academic_term_organization_id='.Yii::app()->user->getState('org_id'),'order'=>'academic_term_period_id'));
	$st = "Regular";
	foreach($academic as $data)
	{
		if(($m%2) == 0)
		{
		  $class = "odd";
		}
		else
		{
		  $class = "even";
		}

		$if_detain = LeftDetainedPassStudentTable::model()->findByAttributes(array('student_id'=>$stud_trans[0]['student_transaction_id'],'sem'=>$data['academic_term_id']));
		if(!empty($if_detain))
		{?>
			<tr class="<?php echo $class;?>">
				<td><?php echo ++$i;?></td>
				<td><?php echo AcademicTermPeriod::model()->findByPk($if_detain['academic_term_period_id'])->academic_term_period; ?></td>
				<td><?php echo "Sem-".AcademicTerm::model()->findByPk($if_detain['sem'])->academic_term_name; ?></td>
				<td>Detain</td>
			</tr>
		<?php $m++; $st="Rejoin/Regular";
		}
		$if_stud_arch = StudentArchiveTable::model()->findByAttributes(array('student_archive_stud_tran_id'=>$stud_trans[0]['student_transaction_id'],'student_archive_ac_t_n_id'=>$data['academic_term_id']));
		if($if_stud_arch)
		{?>
			<tr class="<?php echo $class;?>">
				<td><?php echo ++$i;?></td>
				<td><?php echo AcademicTermPeriod::model()->findByPk($if_stud_arch['student_archive_ac_t_p_id'])->academic_term_period; ?></td>
				<td><?php echo "Sem-".AcademicTerm::model()->findByPk($if_stud_arch['student_archive_ac_t_n_id'])->academic_term_name; ?></td>
				<td><?php echo $st;?></td>
			</tr>
				
		<?php $m++; }
	
	}
	

?>

</table>

<?php } ?>
<?php
/*   $stud_inf_id = $stud_trans[0]['student_id'];
   $branch = $stud_trans[0]['student_transaction_branch_id'];
   
   $sch_branch = ExamScheduleBranch::model()->findAll(array('condition'=>'exam_schedule_branch_id='.$branch.' and exam_schedule_branch_term_period_id='.$stud_trans[0]['student_academic_term_name_id']));
   if($sch_branch)
   {
	   foreach($sch_branch as $data)
	   {
		$sch = ExamSchedule::model()->findByPk($data['exam_schedule_id']);
       		$exm_name = ExamName::model()->findByPk($sch->exam_schedule_exam_name_id);
		$cat = ExamCategory::model()->findByPk($exm_name['exam_category_id']);
		
		if($cat->exam_category_name == "External")
		{
		   $exam_data = ExamResult::model()->findAll(array('condition'=>'exam_result_student_id='.$stud_inf_id.' and exam_result_exam_schedule_id='.$data['exam_schedule_id']));	
		}
	   }
   }
   else
   {
   }
 */  

/*
   $exam_data = ExamResult::model()->findAll(array('condition'=>'exam_result_student_id='.$stud_inf_id));

   if($exam_data)
   {
	foreach($exam_data as $list)
	{
	   if($list['exam_result_exam_schedule_id'])
	}
   }
   else
   {
	echo "No result available for this student";
   }
   var_dump($exam_data);exit;*/


$branch_id = $stud_trans[0]['student_transaction_branch_id'];
$stu_id = $stud_trans[0]['student_id'];
?>

<?php $this->renderPartial('all_result', array('branch_id'=>$branch_id, 'stu_id'=>$stu_id));?>
