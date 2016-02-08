<style>
	table{
		display: table;
		border-collapse: collapse;
		border:1.5px solid #74b9f0;
		font-size: 12.5px;
		width:100%;
	}
	.no_border tr,td{
		border:none;
		border:hidden;
		/* background:none; */
		border:1.5px solid white; 
	}
	table tr:nth-child(even) { /*(even) or (2n 0)*/
		background: #f1f6ff;
	}
	table tr:nth-child(odd) { /*(odd) or (2n 1)*/
		background: white;
	}
	th{text-align:left;font-weight:normal;color:#990a10;width:110px;border:0.4px solid #74b9f0;height:24px;}
	.title{color:seagreen;}
	td{border:0.4px solid #74b9f0;height:24px;}
	.label{text-align:left;font-weight:normal;color:#990a10;width:110px;height:24px;}
	
	
	
</style>
<?php
$StudentInfo = StudentInfo::model()->findByPk($student_transaction[0]->student_transaction_student_id);
$AcademicTermPeriod = AcademicTermPeriod::model()->findByPk($student_transaction[0]->academic_term_period_id);
$AcademicTerm = AcademicTerm::model()->findByPk($student_transaction[0]->academic_term_id);
if($student_transaction[0]->student_transaction_nationality_id != null)
$Nationality = Nationality::model()->findByPk($student_transaction[0]->student_transaction_nationality_id);
else
$Nationality = new Nationality;
$Batch = Batch::model()->findByPk($student_transaction[0]->student_transaction_batch_id);
$Course = Course::model()->findByPk($student_transaction[0]->course_id);
if($student_transaction[0]->student_transaction_languages_known_id != null)
$LanguagesKnown = LanguagesKnown::model()->findByPk($student_transaction[0]->student_transaction_languages_known_id);
if($student_transaction[0]->student_transaction_student_address_id != null)
$StudentAddress = StudentAddress::model()->findByPk($student_transaction[0]->student_transaction_student_address_id);
else
$StudentAddress = new StudentAddress;
if($student_transaction[0]->student_transaction_parent_id != null || $student_transaction[0]->student_transaction_parent_id != 0)
$parent = ParentLogin::model()->findByPk($student_transaction[0]->student_transaction_parent_id);
else
$parent = new ParentLogin;
?>
<h3 class="title">Student Detail</h3>

<table class="no_border">

	<tr>

		<td  rowspan='4' width="135px" align="center" style="border:1px solid #74b9f0;">
<img src="college_data/stud_images/<?php echo StudentPhotos::model()->findBypk($student_transaction[0]->student_transaction_student_photos_id)->student_photos_path; ?>" height="147px" width="129px" class="photo" />
		</td>

		<td class="label" style="border:1.5px solid white;"><b>Name</b></td><td><?php echo $StudentInfo->title." ". $StudentInfo->student_first_name." ".$StudentInfo->student_middle_name." ".$StudentInfo->student_last_name;?></td>
		
	</tr>
	<tr style="background:none">
		<td  class="label" style = "border:1.5px solid white;width:18%;"><b>Student Unique ID<b></td><td><?php echo $StudentInfo->student_roll_no;?></td>
	</tr>
	<tr>
		<td class="label" style="border:1.5px solid white;"><b>Student Email<b></td><td><?php echo $StudentInfo->student_email_id_1;?></td>
	</tr>
	<tr style="background:none">
		<td class="label" style="border:1.5px solid white;"><b>Course</b></td><td><?php echo $Course->course_name;?>
	</tr>

</table>
<h4 class="title">Personal Profile</h4>
<table>
<tr>
	<td class="label">Gender</td><td><?php echo $StudentInfo->student_gender;?></td>
	<td class="label">Date of Birth</td><td><?php 
		if($StudentInfo->student_dob != NULL)
		echo date('d-m-Y',strtotime($StudentInfo->student_dob));		
		?></td>
</tr>	
<tr>
	
	<td class="label">Nationality</td><td><?php 
		if($Nationality)
		echo $Nationality->nationality_name;
		else
		echo "";
		?></td>
	<td class="label">Contact No</td><td><?php echo $StudentInfo->student_mobile_no;?></td>
</tr>	
<tr>
	
	
</tr>
</table>



<h4 class="title">Academic Details</h4>
<table>

<tr>
	<td class="label">Student No</td><td><?php echo $StudentInfo->student_roll_no;?></td>
	<!--td class="label">Year</td><td><?php //echo (empty($AcademicTermPeriod->academic_term_period) ? "Not Set" : $AcademicTermPeriod->academic_term_period);?></td-->
	<td class="label">Batch</td><td><?php echo $Batch->batch_name;?></td>
</tr>
<!--tr>
	<!--td class="label">Semester</td><td><?php echo (empty($AcademicTerm->academic_term_name) ? "Not Set" : $AcademicTerm->academic_term_name);?></td>
</tr-->

</table>


</br></br>


<h4 class="title">Guardian Info</h4>
<table>
<tr>
	<td class="label">Name</td><td><?php echo $StudentInfo->student_guardian_name;?></td>
	<td class="label">Relation</label></td><td><?php echo $StudentInfo->student_guardian_relation;?></td>
</tr>

<tr>
	<td class="label">Qualification</td><td><?php echo $StudentInfo->student_guardian_qualification;?></td>
	<td class="label">Occupation</td><td><?php echo $StudentInfo->student_guardian_occupation;?></td>
</tr>
<tr>
	<td class="label">Annual Income</td><td><?php echo $StudentInfo->student_guardian_income;?></td>

<?php if(isset(Yii::app()->modules['parents'])) { ?>
	<td class="label">Parent Email</td><td><?php echo $parent->parent_user_name;?></td>
</tr>
<?php } ?>
<tr>
	<td class="label">Home Address</td><td colspan="3"><?php echo $StudentInfo->student_guardian_home_address;?></td>
</tr>
<tr>
	<td class="label">Occupation Address</td><td colspan="3"><?php echo $StudentInfo->student_guardian_occupation_address;?></td>
</tr>
<tr>
	<td class="label">Phone</td><td><?php echo $StudentInfo->student_guardian_phoneno;?></td>
	<td class="label">Mobile</td><td><?php echo $StudentInfo->student_guardian_mobile;?></td>
</tr>
</table>

</br></br>

<h4  class="title">Other Info</h4>
<table>
<tr>
	<td class="label">Emergency Contact Name</td><td><?php echo $StudentInfo->emergency_cont_name;?></td>
	<td class="label">Emergency Contact No</td><td><?php echo $StudentInfo->emergency_cont_no;?></td>
</tr>
<tr>
	<td class="label">Passport No</td><td><?php echo $StudentInfo->passport_no;?></td>
	<td class="label">Visa Expiry Date</td><td><?php echo $StudentInfo->visa_exp_date;?></td>
</tr>
<tr>
	<td class="label">Passport Expiry Date</td><td><?php echo $StudentInfo->passport_exp_date;?></td>
	<td class="label">Language Known</td>
	<td><?php 
		if(!empty($LanguagesKnown->languages_known1))
			echo $LanguagesKnown->languages_known1;
		else
			echo "";
		?>
	</td>
</tr>
</table>

</br></br>

<h4 class="title">Address Info</h4>
<table>
<tr>
<td class="label" colspan="4" align="center"><b>Current Address</b></td>
</tr>
<tr>	
	<td class="label">Street 1</td><td colspan="3"><?php echo $StudentAddress->student_address_c_line1;?></td>
</tr>
<tr>	
	<td class="label">Street 2</td><td colspan="3"><?php echo $StudentAddress->student_address_c_line2;?></td>
</tr>
<tr>	
	<td class="label">Country</td><td><?php 
		if($StudentAddress->student_address_c_country!=0)
		echo  Country::model()->findByPk($StudentAddress->student_address_c_country)->name;
		else
		echo "";
		?></td>
	<td class="label">State</td><td><?php 
		if($StudentAddress->student_address_c_state !=0)
		echo State::model()->findByPk($StudentAddress->student_address_c_state)->state_name;
		else
		echo "";
		?></td>
</tr>
<tr>	
	<td class="label">Town</td><td><?php echo $StudentAddress->student_address_c_city;?></td>
	<td class="label">Postcode</td><td><?php echo $StudentAddress->student_address_c_pin;?></td>
</tr>
<tr>	
	<td class="label">Mobile No</label></td><td><?php echo $StudentAddress->student_address_c_mobile;?></td>
	<td class="label">Phone No</td><td><?php echo $StudentAddress->student_address_c_phone;?></td>
</tr>
<tr>	
	<td class="label">House No</td><td colspan="3"><?php echo $StudentAddress->student_c_house_no;?></td>
</tr>
<tr>
<td class="label" colspan="4" align="center"><b>Permanent Address</b></td>
</tr>
<tr>	
	<td class="label">Street 1</td><td colspan="3"><?php echo $StudentAddress->student_address_p_line1;?></td>
</tr>
<tr>	
	<td class="label">Street 2</td><td colspan="3"><?php echo $StudentAddress->student_address_p_line2;?></td>
</tr>
<tr>	
	<td class="label">Country</td><td><?php 
		if($StudentAddress->student_address_p_country!=0)
		echo  Country::model()->findByPk($StudentAddress->student_address_p_country)->name;
		else
		echo "";
		?></td>
	<td class="label">State</td><td><?php 
		if($StudentAddress->student_address_p_state !=0)
		echo State::model()->findByPk($StudentAddress->student_address_p_state)->state_name;
		else
		echo "";
		?></td>
</tr>
<tr>	
	<td class="label">Town</td><td><?php echo $StudentAddress->student_address_p_city;?></td>
	<td class="label">Postcode</td><td><?php echo $StudentAddress->student_address_p_pin;?></td>
</tr>
<tr>	
	<td class="label">Mobile No</label></td><td><?php echo $StudentAddress->student_address_p_mobile;?></td>
	<td class="label">Phone No</td><td><?php echo $StudentAddress->student_address_p_phone;?></td>
</tr>
<tr>	
	<td class="label">House No</label></td><td colspan="3"><?php echo $StudentAddress->student_p_house_no;?></td>
</tr>

</table>
</br></br>
<?php echo "</br></br>"; ?>
<h4 class="title">Documents</h4>

<?php $k=0;

if ($student_docs != null){
?>
<table>

	<tr>
		<th>
		      SN.		
		</th>
		<th>
		      Title
		</th>
		<th>
		      Document Category
		</th>
		<th width="70px">
		      Description		
		</th>
		<th>
		      Submit Date
		</th>
 		
 	</tr>
	<?php 
	
	foreach($student_docs as $m=>$v) {
		
		$StudentDocs = StudentDocs::model()->findByPk($v['student_docs_trans_stud_docs_id']);
            ?>	<tr>
			<td>
			      <?php echo ++$k; ?>		
			</td>
			<td>
			      <?php echo $StudentDocs->title;?>
			</td>
			<td>
			      <?php echo DocumentCategoryMaster::model()->findByPk($StudentDocs->doc_category_id)->doc_category_name; ?>
			</td>
			<td width="70px">
			      <?php echo $StudentDocs->student_docs_desc; ?>		
			</td>
			<td>
			      <?php $docdate = date_create($StudentDocs->student_docs_submit_date);
				echo date_format($docdate,'d-m-Y');?>
			</td>
 		</tr> 
       <?php
    
     }// end for loop
	
?>
</table>
<?php }
	else 
		echo "No document available";
	

 ?>
</br></br>
<h4 class="title">Qualification</h4>

<?php $k=0;
//print_r($model);exit;
if ($studentqualification != null){
?>
<table style="font-size:20;">

	<tr>
		<th>
		      SN.		
		</th>
		<th>
		     Course
		</th>
		<th>
		     Eduboard
		</th>
		<th>
		     Academic Year
		</th>
		<th>
		     Theory Mark Max
		</th>
		<th>
		     Theory Mark Obtained
		</th>
		<th>
		    Theory Percentage
		</th>
		<th>
		    Practical Mark Max
		</th>

		<th>
		    Practical Mark Obtained
		</th>
		<th>
		   Practical Percentage
		</th>
		
 	</tr>
	<?php 
	foreach($studentqualification as $m=>$v) {
            ?>	<tr>
			<td>
			      <?php echo ++$k; ?>		
			</td>
			<td>
			      <?php echo Qualification::model()->findByPk($v['student_academic_record_trans_qualification_id'])->qualification_name; ?>
			</td>
			<td>
			      <?php echo Eduboard::model()->findByPk($v['student_academic_record_trans_eduboard_id'])->eduboard_name; ?>
			</td>
			<td>
			      <?php echo $v['student_academic_record_trans_record_trans_year_id']; ?>
			</td>
			<td>
			      <?php echo $v['theory_mark_max']; ?>
			</td>

			<td>
			      <?php echo $v['theory_mark_obtained']; ?>
			</td>
			<td>
			      <?php echo $v['theory_percentage']; ?>
			</td>
			<td>
			      <?php echo $v['practical_mark_max']; ?>
			</td>
			<td>
			      <?php echo $v['practical_mark_obtained']; ?>
			</td>
			<td>
			      <?php echo $v['practical_percentage']; ?>
			</td>
 		</tr> 
       <?php

     }// end for loop
	
?>
</table>
<?php }
	else
		echo "No data available";
?>

