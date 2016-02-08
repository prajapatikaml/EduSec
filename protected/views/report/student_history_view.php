<?php
$this->breadcrumbs=array(
	'Student History',	
);
?>
	<div class="operation">
	<?php
		if(empty($_REQUEST['id']))
		     echo CHtml::link('Back', array('studenthistory'), array('class'=>'btnback'));
		else
		     echo CHtml::link('Back', array('student/studentTransaction/update','id'=>$_REQUEST['id']), array('class'=>'btnback'));
		  
	?>
	</div>
<b>
 <div class="portlet box yellow" style="width:100%;margin-top:20px;">
    <i class="icon-reorder"></i>
    <div class="portlet-title"><span class="box-title"> Student History Report</span>
    </div>
<table class="report-table" border="2" > 
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
<tr class="row">
	<td class="col1">Current Status </td> 
	<td class="col2"><?php echo Studentstatusmaster::model()->findByPk($stud_trans[0]['student_transaction_detain_student_flag'])->status_name;?></td>
</tr>	
</table>
</div>

<div class="portlet box gray" style="margin-top:20px;width:100%">
<i class="icon-reorder"></i>
 <div class="portlet-title"><span class="box-title">Student History Record</span>
</div>
<table  class="report-table">
	<tr class="table_header">
		<th>SI No.</th>
		<th>Academic Year</th>
		<th>Semester</th>
		<th>Student Status</th>
	</tr>
<?php	

$i = 0;
$m = 1;  
	$academic = AcademicTerm::model()->findAll(array('order'=>'academic_term_period_id,academic_term_id'));
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
		<?php $m++; 
		}
		$if_stud_arch = StudentArchiveTable::model()->findByAttributes(array('student_archive_stud_tran_id'=>$stud_trans[0]['student_transaction_id'],'student_archive_ac_t_n_id'=>$data['academic_term_id']));
		if($if_stud_arch)
		{
			$st = Studentstatusmaster::model()->findByPk($if_stud_arch->student_archive_status)->status_name;	
		?>
			<tr class="<?php echo $class;?>">
				<td><?php echo ++$i; ?></td>
				<td><?php echo AcademicTermPeriod::model()->findByPk($if_stud_arch['student_archive_ac_t_p_id'])->academic_term_period; ?></td>
				<td><?php echo "Sem-".AcademicTerm::model()->findByPk($if_stud_arch['student_archive_ac_t_n_id'])->academic_term_name; ?></td>
				<td><?php echo $st;?></td>
			</tr>
				
		<?php $m++; }
	
	}
	

?>

</table></div>

<?php 

$branch_id = $stud_trans[0]['student_transaction_branch_id'];
$stu_id = $stud_trans[0]['student_id'];
?>
<?php $this->renderPartial('studentResults', array('branch_id'=>$branch_id, 'stu_id'=>$stu_id)); ?>
