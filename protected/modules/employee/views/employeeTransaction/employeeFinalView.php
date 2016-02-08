<?php 
$EmployeeInfo = EmployeeInfo::model()->findByPk($employee_transaction[0]->employee_transaction_employee_id);

if($employee_transaction[0]->employee_transaction_category_id != null)
$Category = Category::model()->findByPk($employee_transaction[0]->employee_transaction_category_id);
else
$Category = new Category;

if($employee_transaction[0]->employee_transaction_religion_id != null)
$Religion = Religion::model()->findByPk($employee_transaction[0]->employee_transaction_religion_id);
else
$Religion = new Religion;

$Shift = Shift::model()->findByPk($employee_transaction[0]->employee_transaction_shift_id);

$EmployeeDesignation = EmployeeDesignation::model()->findByPk($employee_transaction[0]->employee_transaction_designation_id);

if($employee_transaction[0]->employee_transaction_nationality_id != null)
$Nationality = Nationality::model()->findByPk($employee_transaction[0]->employee_transaction_nationality_id);
else
$Nationality = new Nationality;

$Department = Department::model()->findByPk($employee_transaction[0]->employee_transaction_department_id);

if($employee_transaction[0]->employee_transaction_languages_known_id != null)
$LanguagesKnown = LanguagesKnown::model()->findByPk($employee_transaction[0]->employee_transaction_languages_known_id);

$Organization = Organization::model()->findByPk($employee_transaction[0]->employee_transaction_organization_id);

if($employee_transaction[0]->employee_transaction_emp_address_id != null)
$EmployeeAddress = EmployeeAddress::model()->findByPk($employee_transaction[0]->employee_transaction_emp_address_id);
else
$EmployeeAddress = new EmployeeAddress;

?>
<h3>Employee Detail</h3>
<h4>Personal Info</h4>
<table border="1" width="200px">
<tr>
	<td>
	<label> Employee ID   </label>
	</td>
	<td>
		<?php echo $EmployeeInfo->employee_no;?>
	</td>
</tr>
<tr>
	<td>
	<label> Employee AICTE Id </label></td>
	<td><?php echo $EmployeeInfo->employee_aicte_id;?>
	</td>
</tr>
<tr>
	<td>
	<label> Employee GTU Id  </label></td>
	<td><?php echo $EmployeeInfo->employee_gtu_id;?>
	</td>
</tr>

<tr>
	<td>
	<label> Name </label></td>
	<td><?php echo $EmployeeInfo->employee_first_name;?>
	</td>
</tr>	
<tr>
	<td>
	<label> Husband/Father Name</label></td>
	<td><?php echo $EmployeeInfo->employee_middle_name;?>
	</td>
</tr>	
<tr>
	<td>
	<label> Surname</label></td>
	<td><?php echo $EmployeeInfo->employee_last_name;?>
	</td>
</tr>	
<tr>
	<td>
	<label> Mother Name</label></td>
	<td><?php echo $EmployeeInfo->employee_mother_name;?>
	</td>
</tr>	
<tr>
	<td>
	<label> Alias Name</label></td>
	<td><?php echo $EmployeeInfo->employee_name_alias;?>
	</td>
</tr>	
<tr>
	<td>
	<label> DOB</label></td>
	<td><?php 
	if($EmployeeInfo->employee_dob != NULL)
		echo date('d-m-Y',strtotime($EmployeeInfo->employee_dob));?>
	</td>
</tr>	
<tr>
	<td>
	<label> Birthplace</label></td>
	<td><?php echo $EmployeeInfo->employee_birthplace;?>
	</td>
</tr>	
<tr>
	<td>
	<label> Gender</label></td>
	<td><?php echo $EmployeeInfo->employee_gender;?>
	</td>
</tr>
<tr>
	<td>
	<label>Bloodgroup</label></td><td><?php echo $EmployeeInfo->employee_bloodgroup;?>
	</td>
</tr>
<tr>
	<td>
	<label>Marital Status</label></td><td><?php echo $EmployeeInfo->employee_marital_status;?>
	</td>
</tr>
<tr>
	<td>
	<label>Private Mobile</label></td><td><?php echo $EmployeeInfo->employee_private_mobile;?>
	</td>
</tr>	
<tr>
	<td>
	<label>Pancard No</label></td><td><?php echo $EmployeeInfo->employee_pancard_no;?>
	</td>
</tr>
<tr>
	<td>
	<label> Account No</label></td><td><?php echo $EmployeeInfo->employee_account_no;?>
	</td>
</tr>	
<tr>
	<td>
	<label> Joining Date</label></td>
	<td><?php 
		echo date('d-m-Y',strtotime($EmployeeInfo->employee_joining_date));?>
	</td>
</tr>
<tr>
	<td>
	<label> Probation Period</label></td><td><?php echo $EmployeeInfo->employee_probation_period;?>
	</td>
</tr>	
<tr>
	<td>
	<label> Private Email</label></td><td><?php echo $EmployeeInfo->employee_private_email;?>
	</td>
</tr>	
<tr>
	<td>
	<label> Category</label></td><td><?php 
		echo $Category->category_name;
		?>
	</td>
</tr>	
<tr>
	<td>
	<label> Employee Type</label></td><td><?php  
		if($EmployeeInfo->employee_type==1)
			echo "Teaching";
		else 
			echo "Non-Teaching";?>
	</td>
</tr>	
<tr>
	<td>
	<label> Religion </label></td><td><?php 
		echo $Religion->religion_name;
		?>
	</td>
</tr>	
<tr>
	<td>
	<label> Shift</label></td><td><?php echo $Shift->shift_type;?>
	</td>
</tr>	
<tr>
	<td>
	<label> Designation</label></td><td><?php echo $EmployeeDesignation->employee_designation_name;?>
	</td>
</tr>	
		
<tr>
	<td>
	<label> Nationality</label></td><td><?php 
		echo $Nationality->nationality_name;
		?>
	</td>
</tr>	

<tr>
	<td>
	<label> Department</label></td><td><?php echo $Department->department_name;?>
	</td>
</tr>	

<tr>
	<td>
	<label> Organization Mobile</label></td><td><?php echo $EmployeeInfo->employee_organization_mobile;?>
	</td>
</tr>	
</table>
</br></br>


<h4>Guardian Info</h4>
<table border="1" width="200px">
<tr>
	<td>
	<label> Guardian Name </label></td><td><?php echo $EmployeeInfo->employee_guardian_name;?>
	</td>
</tr>
<tr>
	<td>
	<label> Relation </label></td><td><?php echo $EmployeeInfo->employee_guardian_relation;?>
	</td>
</tr>
<tr>
	<td>
	<label> Qualification </label></td><td><?php echo $EmployeeInfo->employee_guardian_qualification;?>
	</td>
</tr>
<tr>
	<td>
	<label> Occupation </label></td><td><?php echo $EmployeeInfo->employee_guardian_occupation;?>
	</td>
</tr>
<tr>
	<td>
	<label> Income </label></td><td><?php echo $EmployeeInfo->employee_guardian_income;?>
	</td>
</tr>

<tr>
	<td>
	<label> Home Address </label></td><td><?php echo $EmployeeInfo->employee_guardian_home_address;?>
	</td>
</tr>
<tr>
	<td>
	<label> Occupation Address </label></td><td><?php echo $EmployeeInfo->employee_guardian_occupation_address;?>
	</td>
</tr>
<tr>
	<td>
	<label> Occupation City </label></td><td>
<?php 
		if($EmployeeInfo->employee_guardian_occupation_city !=0)
		echo City::model()->findByPk($EmployeeInfo->employee_guardian_occupation_city)->city_name;
		else
		echo "";
		
		?>

	</td>
</tr>
<tr>
	<td>
	<label> City Pincode </label></td><td><?php echo $EmployeeInfo->employee_guardian_city_pin;?>
	</td>
</tr>

<tr>
	<td>
	<label> Phone No </label></td><td><?php echo $EmployeeInfo->employee_guardian_phone_no;?>
	</td>
</tr>
<tr>
	<td>
	<label> Mobile 1 </label></td><td><?php echo $EmployeeInfo->employee_guardian_mobile1;?>
	</td>
</tr>
<tr>
	<td>
	<label> Mobile 2  </label></td><td><?php echo $EmployeeInfo->employee_guardian_mobile2;?>
	</td>
</tr>

</table>
</br></br>


<h4>Other Info</h4>
<table border="1" width="200px">
<tr>
	<td>
	<label> Attendance Card Id  </label></td><td><?php echo $EmployeeInfo->employee_attendance_card_id;?>
	</td>
</tr>

<tr>
	<td>
	<label> Course  </label></td><td><?php echo $EmployeeInfo->employee_faculty_of;?>
	</td>
</tr>
<tr>
	<td>
	<label> Curricular </label></td><td><?php echo $EmployeeInfo->employee_curricular;?>
	</td>
</tr>

<tr>
	<td>
	<label> Reference </label></td><td><?php echo $EmployeeInfo->employee_reference;?>
	</td>
</tr>
<tr>
	<td>
	<label> Refer Designation </label></td><td><?php echo $EmployeeInfo->employee_refer_designation;?>
	</td>
</tr>
<tr>
	<td>
	<label> Hobbies </label></td><td><?php echo $EmployeeInfo->employee_hobbies;?>
	</td>
</tr>
<tr>
	<td>
	<label> Technical Skills  </label></td><td><?php echo $EmployeeInfo->employee_technical_skills;?>
	</td>
</tr>
<tr>
	<td>
	<label> Project Details  </label></td><td><?php echo $EmployeeInfo->employee_project_details?>
	</td>
</tr>
<tr>
	<td>
	<label> Language 1  </label></td><td><?php 
		if($LanguagesKnown->languages_known1 != 0)
			echo Languages::model()->findByPk($LanguagesKnown->languages_known1)->languages_name;
		else
			echo "";
		?>
	</td>
</tr>
<tr>
	<td>
	<label> Language 2  </label></td><td><?php 
		if($LanguagesKnown->languages_known2 != 0)
			echo Languages::model()->findByPk($LanguagesKnown->languages_known2)->languages_name;

		else
			echo "";
		?>
	</td>
</tr>
<tr>
	<td>
	<label> Language 3  </label></td><td><?php 
		if($LanguagesKnown->languages_known3 != 0)
			echo Languages::model()->findByPk($LanguagesKnown->languages_known3)->languages_name;
		else
			echo "";
		?>
	</td>
</tr>
<tr>
	<td>
	<label> Language 4  </label></td><td><?php 
		if($LanguagesKnown->languages_known4 != 0)
			echo Languages::model()->findByPk($LanguagesKnown->languages_known4)->languages_name;
		else
			echo "";
		?>
	</td>
</tr>
<tr>
	<td>
	<label> Organization  </label></td><td><?php echo $Organization->organization_name;?>
	</td>
</tr>

</table>
</br></br>

<h4>Address Info</h4>
<table border="1" width="200px">
<tr>
<td colspan="2" align="center">Current Address</td>
</tr>
<tr>	
	<td>
	<label> Line1  </label></td><td><?php 
		echo $EmployeeAddress->employee_address_c_line1;
		?>
	</td>
</tr>
<tr>	
	<td>
	<label> Line2  </label></td><td><?php 
		echo $EmployeeAddress->employee_address_c_line2;
		?>
	</td>
</tr>
<tr>	
	<td>
	<label> Taluka  </label></td><td><?php 
		echo $EmployeeAddress->employee_address_c_taluka;
		?>
	</td>
</tr>
<tr>	
	<td>
	<label> District  </label></td><td><?php 
		echo $EmployeeAddress->employee_address_c_district;
		?>
	</td>
</tr>
<tr>	
	<td>
	<label> City </label></td><td><?php 
		if($EmployeeAddress->employee_address_c_city !=0)
		echo City::model()->findByPk($EmployeeAddress->employee_address_c_city)->city_name;
		else
		echo "";
		
		?>
	</td>
</tr>
<tr>	
	<td>
	<label> Pincode </label></td><td><?php
		echo $EmployeeAddress->employee_address_c_pincode;
		?>
	</td>
</tr>
<tr>	
	<td>
	<label> State </label></td><td><?php 
		if($EmployeeAddress->employee_address_c_state != 0)
		echo State::model()->findByPk($EmployeeAddress->employee_address_c_state)->state_name;
		else
		echo "";
?>		
	</td>
</tr>
<tr>	
	<td>
	<label> Country </label></td><td><?php 
		if($EmployeeAddress->employee_address_c_country !=0)
		echo Country::model()->findByPk($EmployeeAddress->employee_address_c_country)->name;
		else
		echo "";
		?>
	</td>
</tr>

<tr>
<td colspan="2" align="center">Permanent Address</td>
</tr>
<tr>	
	<td>
	<label> Line1  </label></td><td><?php 
		echo $EmployeeAddress->employee_address_p_line1;
		?>
	</td>
</tr>
<tr>	
	<td>
	<label> Line2  </label></td><td><?php 
		echo $EmployeeAddress->employee_address_p_line2;?>
	</td>
</tr>
<tr>	
	<td>
	<label> Taluka  </label></td><td><?php 
		echo $EmployeeAddress->employee_address_p_taluka;
		?>
	</td>
</tr>
<tr>	
	<td>
	<label> District  </label></td><td><?php 
		echo $EmployeeAddress->employee_address_p_district;
		?>
	</td>
</tr>
<tr>	
	<td>
	<label> City </label></td><td><?php 
		if($EmployeeAddress->employee_address_p_city !=0)
		echo City::model()->findByPk($EmployeeAddress->employee_address_p_city)->city_name;
		else
		echo "";
		
		?>
	</td>
</tr>
<tr>	
	<td>
	<label> Pincode </label></td><td><?php 
		echo $EmployeeAddress->employee_address_p_pincode;
		?>
	</td>
</tr>
<tr>	
	<td>
	<label> State </label></td><td><?php 
		if($EmployeeAddress->employee_address_p_state != 0)
		echo State::model()->findByPk($EmployeeAddress->employee_address_p_state)->state_name;
		else
		echo "";
		?>
	</td>
</tr>
<tr>	
	<td>
	<label> Country </label></td><td><?php 
		if($EmployeeAddress->employee_address_p_country !=0)
		echo Country::model()->findByPk($EmployeeAddress->employee_address_p_country)->name;
		else
		echo "";
		
		?>
	</td>
</tr>
</table>
</br></br>
<h3>Employee Attached Documents</h3>

<?php $k=0;
if ($employee_docs != null){
?>
<table border="1">

	<tr>
		<th>
		      SN.		
		</th>
		<th width="70px">
		      Document Title		
		</th>
		<th width="70px">
		       Document	Description	
		</th>
 		<th width="70px">
		       Document	Category	
		</th>
 		<th width="70px">
		       Submit Date	
		</th>
 		
 	</tr>
	<?php 
	foreach($employee_docs as $m=>$v) {
		$EmployeeDocs = EmployeeDocs::model()->findByPk($v['employee_docs_trans_emp_docs_id']);
            ?>	<tr>
			<td>
			      <?php echo ++$k; ?>		
			</td>
			<td width="70px">
			      <?php echo $EmployeeDocs->title;?>
 			</td>
			<td width="70px">
			      <?php echo $EmployeeDocs->employee_docs_desc; ?>		
			</td>
			<td width="70px">
			      <?php echo DocumentCategoryMaster::model()->findByPk($EmployeeDocs->doc_category_id)->doc_category_name; ?>		
			</td>
				<td>
				<?php $date=date_create($EmployeeDocs->employee_docs_submit_date);
				echo date_format($date, 'd-m-Y');?>
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
<h3>Employee Certificate</h3>

<?php $k=0;
$certificate = EmployeeCertificateDetailsTable::model()->findAll("employee_certificate_details_table_emp_id=".$_REQUEST['id']);

if ($certificate != null){
?>
<table border="1">

	<tr>
		<th>
		      SN.		
		</th>
		<th width="70px">
		      Certificate Type	
		</th>
 	
 	</tr>
	<?php 
	foreach($certificate as $m=>$v) {
		$certificate = Certificate::model()->findByPk($v['employee_certificate_type_id']);
            ?>	<tr>
			<td>
			      <?php echo ++$k; ?>		
			</td>
			<td width="70px">
			      <?php echo $certificate->certificate_title;?>
 			</td>
			
 		</tr> 
       <?php

     }// end for loop
	
?>
</table>
<?php }
	else
		echo "No Certificate available";
 ?>
<h3>Employee Qualification</h3>
<?php $k=0;
//print_r($model);exit;
if ($employee_qual != null){
?>
<table border="1">

	<tr>
		<th>
		      SN.		
		</th>
		<th>
		     Qualification
		</th>
		<th>
		     Eduboard
		</th>
		<th>
		     Year
		</th>
		<th>
		     Theory Mark Obtained
		</th>
		<th>
		     Theory Mark Max
		</th>
		<th>
		    Theory Percentage
		</th>
		<th><?php $date=date_create($EmployeeInfo->employee_dob);
	echo date_format($date, 'd-m-Y');?>
		    Practical Mark Obtained
		</th>
		<th>
		    Practical Mark Max
		</th>
		<th>
		   Practical Percentage
		</th>
		
 	</tr>
	<?php 
	foreach($employee_qual as $m=>$v) {
            ?>	<tr>
			<td>
			      <?php echo ++$k; ?>		
			</td>
			<td>
			      <?php echo Qualification::model()->findByPk($v['employee_academic_record_trans_qualification_id'])->qualification_name; ?>
			</td>
			<td>
			      <?php echo Eduboard::model()->findByPk($v['employee_academic_record_trans_eduboard_id'])->eduboard_name; ?>
			</td>
			<td>
			      <?php echo Year::model()->findByPk($v['employee_academic_record_trans_year_id'])->year; ?>
			</td>
			<td>
			      <?php echo $v['theory_mark_obtained']; ?>
			</td>
			<td>
			      <?php echo $v['theory_mark_max']; ?>
			</td>
			<td>
			      <?php echo $v['theory_percentage']; ?>
			</td>
			<td>
			      <?php echo $v['practical_mark_obtained']; ?>
			</td>
			<td>
			      <?php echo $v['practical_mark_max']; ?>
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
<br></br>
<h3>Employee Experiance</h3>

<?php $k=0;

if ($emp_exp != null){
?>
<table border="1">

	<tr>
		<th>
		      SN.		
		</th>
		<th>
		      Organization Name		
		</th>
		<th>
		      Designation	
		</th>
		<th>
		      From Date		
		</th>
		<th>
		      To Date		
		</th>
		<th>
		      Experience		
		</th>	
 		
 	</tr>
	<?php 
	foreach($emp_exp as $m=>$v) {
		$EmployeeExperience = EmployeeExperience::model()->findByPk($v['employee_experience_trans_emp_experience_id']);
            ?>	<tr>
			<td>
			      <?php echo ++$k; ?>		
			</td>
			<td>
			      <?php echo $EmployeeExperience->employee_experience_organization_name; ?>		
			</td>
			<td>
			      <?php echo $EmployeeExperience->employee_experience_designation; ?>		
			</td>
			<td>
				<?php $date=date_create($EmployeeExperience->employee_experience_from);
	echo date_format($date, 'd-m-Y');?>
			</td>
			<td>
				<?php $date=date_create($EmployeeExperience->employee_experience_to);
	echo date_format($date, 'd-m-Y');?>
			
			</td>
			<td>
			      <?php echo $EmployeeExperience->employee_experience; ?>		
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


