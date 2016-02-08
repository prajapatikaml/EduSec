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
$EmployeeInfo = EmployeeInfo::model()->findByPk($employee_transaction[0]->employee_transaction_employee_id);

$EmployeeDesignation = EmployeeDesignation::model()->findByPk($employee_transaction[0]->employee_transaction_designation_id);

if($employee_transaction[0]->employee_transaction_nationality_id != null)
$Nationality = Nationality::model()->findByPk($employee_transaction[0]->employee_transaction_nationality_id);
else
$Nationality = new Nationality;

$Department = Department::model()->findByPk($employee_transaction[0]->employee_transaction_department_id);

if($employee_transaction[0]->employee_transaction_languages_known_id != null)
$LanguagesKnown = LanguagesKnown::model()->findByPk($employee_transaction[0]->employee_transaction_languages_known_id);


if($employee_transaction[0]->employee_transaction_emp_address_id != null)
$EmployeeAddress = EmployeeAddress::model()->findByPk($employee_transaction[0]->employee_transaction_emp_address_id);
else
$EmployeeAddress = new EmployeeAddress;

?>

<h3 class="title">Employee Detail</h3>

<table class="no_border">

	<tr>

		<td rowspan='4' width="135px" align="center" style="border:1px solid #74b9f0;">
<img src="college_data/emp_images/<?php echo EmployeePhotos::model()->findBypk($employee_transaction[0]-> employee_transaction_emp_photos_id)->employee_photos_path; ?>" height="147px" width="129px"/>
		</td>

		<td class="label" width="130px;" style="border:1.5px solid white;"><b>Name</b></td><td><?php echo $EmployeeInfo->employee_first_name." ".$EmployeeInfo->employee_middle_name." ".$EmployeeInfo->employee_last_name;?></td>
		
	</tr>
	<tr style="background:none">
		<td class="label" style="border:1.5px solid white;"><b>Attendance Card Id<b/></td><td><?php echo $EmployeeInfo->employee_attendance_card_id;?></td>
	</tr>
	<tr>
		<td class="label" style="border:1.5px solid white;"><b>Designation</b></td><td><?php echo $EmployeeDesignation->employee_designation_name;?></td>
	</tr>
	<tr style="background:none">
		<td class="label" style="border:1.5px solid white;"><b>Department</b></td><td><?php echo $Department->department_name;?></td>
	</tr>

</table>
<br/>

<h4 class="title">Personal Profile</h4>
<table>
<tr>
	<td class="label" width="140px">Employee No</td><td><?php echo $EmployeeInfo->employee_no;?></td>
	<td class="label" width="140px">Employee Unique Id</td><td><?php echo $EmployeeInfo->employee_unique_id;?></td>
</tr>
<tr>
	<td class="label">Name Alias</td><td><?php echo $EmployeeInfo->employee_name_alias;?></td>
	<td class="label">Private Email</td><td><?php echo $EmployeeInfo->employee_private_email;?></td>
</tr>
<tr>
	<td class="label">Mother Name</td><td><?php echo $EmployeeInfo->employee_mother_name;?></td>
	<td class="label">Gender</td>	<td><?php echo $EmployeeInfo->employee_gender;?></td>
</tr>
<tr>	
	<td class="label">Joining Date</td>
	<td><?php echo date('d-m-Y',strtotime($EmployeeInfo->employee_joining_date));?></td>
	<td class="label">Probation Period</td><td><?php echo $EmployeeInfo->employee_probation_period;?></td>
</tr>	

<tr>		
	<td class="label">Date of Birth</td>
	<td><?php if($EmployeeInfo->employee_dob != NULL)
		echo date('d-m-Y',strtotime($EmployeeInfo->employee_dob));?></td>
	<td class="label">Birth Place</td><td><?php echo $EmployeeInfo->employee_birthplace;?></td>
</tr>
<tr>		
	<td class="label">Blood Group</td><td><?php echo $EmployeeInfo->employee_bloodgroup;?></td>
	<td class="label">Nationality</td><td><?php echo $Nationality->nationality_name;?></td>
</tr>	
<tr>		
	<td class="label">Marital Status</td><td><?php echo $EmployeeInfo->employee_marital_status;?></td>
	<td class="label">Bank Account No</td><td><?php echo $EmployeeInfo->employee_account_no;?></td>
</tr>	
<tr>		
	<td class="label">Type</td>
	<td><?php  
		if($EmployeeInfo->employee_type==1)
			echo "Teaching";
		else 
			echo "Non-Teaching";?></td>
	<td class="label">Institute Mobile</td><td><?php echo $EmployeeInfo->employee_organization_mobile;?></td>
</tr>
<tr>		
	<td class="label">Private Mobile No</td><td colspan="3"><?php echo $EmployeeInfo->employee_private_mobile;?></td>
</tr>		
</table>
</br></br>


<h4 class="title">Guardian Info</h4>
<table>
<tr>
	<td class="label">Name</td><td width="40%"><?php echo $EmployeeInfo->employee_guardian_name;?></td>
	<td class="label">Relation</td><td width="40%"><?php echo $EmployeeInfo->employee_guardian_relation;?></td>
</tr>
<tr>
	<td class="label">Qualification</td><td><?php echo $EmployeeInfo->employee_guardian_qualification;?></td>
	<td class="label">Occupation</td><td><?php echo $EmployeeInfo->employee_guardian_occupation;?></td>
</tr>
<tr>
	<td class="label">Annual Income</td><td><?php echo $EmployeeInfo->employee_guardian_income;?></td>
	<td class="label">Home Address</td><td><?php echo $EmployeeInfo->employee_guardian_home_address;?></td>
</tr>
<tr>
	<td class="label">Occupation Address</td><td><?php echo $EmployeeInfo->employee_guardian_occupation_address;?></td>
	<td class="label">Occupation City</td>
	<td><?php 
		if($EmployeeInfo->employee_guardian_occupation_city !=0)
		echo City::model()->findByPk($EmployeeInfo->employee_guardian_occupation_city)->city_name;
		else
		echo "";
	    ?></td>
</tr>
<tr>
	<td class="label">City Pincode</td><td><?php echo $EmployeeInfo->employee_guardian_city_pin;?></td>
	<td class="label">Mobile 1</td><td><?php echo $EmployeeInfo->employee_guardian_mobile1;?></td>
</tr>
<tr>
	<td class="label">Mobile 2</td><td><?php echo $EmployeeInfo->employee_guardian_mobile2;?></td>
	<td class="label">Phone No</td><td><?php echo $EmployeeInfo->employee_guardian_phone_no;?></td>
</tr>

</table>
</br></br>


<h4 class="title">Other Info</h4>
<table>
<tr>
	<td class="label">Attendance Card Id</td><td><?php echo $EmployeeInfo->employee_attendance_card_id;?></td>
	<td class="label">Reference Designation</td><td><?php echo $EmployeeInfo->employee_refer_designation;?></td>
</tr>
<tr>
	<td class="label">Curricular</td><td><?php echo $EmployeeInfo->employee_curricular;?></td>
	<td class="label">Project Details</td><td><?php echo $EmployeeInfo->employee_project_details?></td>
</tr>
<tr>
	<td class="label">Technical Skills</td><td><?php echo $EmployeeInfo->employee_technical_skills;?></td>
	<td class="label">Hobbies</td><td><?php echo $EmployeeInfo->employee_hobbies;?></td>
</tr>
<tr>
	<td class="label">Language Known</td>
	<td colspan="3"><?php 
		if(!empty($LanguagesKnown->languages_known1))
			echo $LanguagesKnown->languages_known1;
		else
			echo "";
		?></td>
</tr>
<tr>
	<td class="label">Reference</td><td><?php echo $EmployeeInfo->employee_reference;?></td>
	<td class="label">EPF Number</td><td><?php $EmployeeInfo->employee_pf_id;?></td>
</tr>
</table>
</br></br>

<h4  class="title">Address Info</h4>
<table>
<tr>
<td class="title" colspan="4" align="center"><b>Current Address</b></td>
</tr>
<tr>	
	<td class="label">Street 1</td><td colspan="3"><?php echo $EmployeeAddress->employee_address_c_line1; ?></td>
</tr>
<tr>	
	<td class="label">Street 2</td><td colspan="3"><?php echo $EmployeeAddress->employee_address_c_line2; ?></td>
</tr>
<tr>	
	<td class="label">Country</td><td><?php 
		if($EmployeeAddress->employee_address_c_country !=0)
		echo Country::model()->findByPk($EmployeeAddress->employee_address_c_country)->name;
		else
		echo "";
		?></td>
	<td class="label">State/Province</td><td><?php 
		if($EmployeeAddress->employee_address_c_state != 0)
		echo State::model()->findByPk($EmployeeAddress->employee_address_c_state)->state_name;
		else
		echo "";
		?></td>
</tr>
<tr>	
	<td class="label">Town</td><td><?php 
		if($EmployeeAddress->employee_address_c_city !=0)
		echo City::model()->findByPk($EmployeeAddress->employee_address_c_city)->city_name;
		else
		echo "";
		?></td>
	<td class="label">Post Code</td><td><?php echo $EmployeeAddress->employee_address_c_pincode;?></td>
</tr>
<tr>
	<td class="label">Phone</td><td><?php echo $EmployeeAddress->employee_address_c_phone;?></td>
	<td class="label">Mobile</td><td><?php echo $EmployeeAddress->employee_address_c_mobile;?></td>
</tr>
<tr>
	<td class="label">House No</td><td colspan="3"><?php echo $EmployeeAddress->employee_c_house_no;?></td>
</tr>

<tr>
<td class="title" colspan="4" align="center"><b>Permanent Address</b></td>
</tr>
<tr>	
	<td class="label">Street 1</td><td colspan="3"><?php echo $EmployeeAddress->employee_address_p_line1;?></td>
</tr>
<tr>	
	<td class="label">Street 2</td><td colspan="3"><?php echo $EmployeeAddress->employee_address_p_line2;?></td>
</tr>
<tr>	
	<td class="label">Country</td><td><?php 
		if($EmployeeAddress->employee_address_p_country !=0)
		echo Country::model()->findByPk($EmployeeAddress->employee_address_p_country)->name;
		else
		echo "";	
		?></td>
	<td class="label">State/Province</td><td><?php 
		if($EmployeeAddress->employee_address_p_state != 0)
		echo State::model()->findByPk($EmployeeAddress->employee_address_p_state)->state_name;
		else
		echo "";
		?></td>
</tr>
<tr>	
	<td class="label">Town</td><td><?php 
		if($EmployeeAddress->employee_address_p_city !=0)
		echo City::model()->findByPk($EmployeeAddress->employee_address_p_city)->city_name;
		else
		echo "";
		?>
	</td>
	<td class="label">Post Code</td><td><?php echo $EmployeeAddress->employee_address_p_pincode;?></td>
</tr>
<tr>
	<td class="label">Phone</td><td><?php echo $EmployeeAddress->employee_address_p_phone;?></td>
	<td class="label">Mobile</td><td><?php echo $EmployeeAddress->employee_address_p_mobile;?></td>
</tr>
<tr>
	<td class="label">House No</td><td colspan="3"><?php echo $EmployeeAddress->employee_p_house_no;?></td>
</tr>

</table>
</br></br>
<h4 class="title">Documents</h4>

<?php $k=0;
if ($employee_docs != null){
?>
<table>

	<tr>
		<th>
		      SN.		
		</th>
		<th width="70px">
		      Title		
		</th>
		
 		<th width="70px">
		       Document	Category	
		</th>
		<th width="70px">
		       Document	Description	
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
<h4 class="title">Certificates</h4>

<?php $k=0;
$certificate = EmployeeCertificateDetailsTable::model()->findAll("employee_certificate_details_table_emp_id=".$_REQUEST['id']);

if ($certificate != null){
?>
<table style="font-size:125%;">

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
<h4 class="title">Qualification</h4>
<?php $k=0;
//print_r($model);exit;
if ($employee_qual != null){
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
		     Year
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
			      <?php echo $v['employee_academic_record_trans_year_id'];?>
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


