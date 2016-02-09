<style>
.profile-data table{
	display: table;
	border-collapse: collapse;
	border:1.5px solid #adacab;
	font-size: 12.5px;
	width:100%;
}
.no_border tr,td{
	border:none;
	border:hidden;
	border:1.5px solid white; 
}
table tr:nth-child(even) { 
	background: #F4F4F4;
}
table tr:nth-child(odd) { 
	background: white;
}
.profile-data th{ 
	text-align:left;
	font-weight:normal;
	color:#990a10;
	width:110px;
	border:0.4px solid #adacab;
	height:24px;
}
.title {
	color:seagreen;
}
.profile-data td{
	border:0.4px solid #adacab;
	height:24px;
	text-align:left;
}
.label{
	text-align:left;
	font-weight:normal;
	color:#990a10;
	width:110px;
	height:24px;
}
</style>


<!------------Start Employee Details Block---------------->
<h3 class="title">Employee Detail</h3>
<table class="no_border">
	<tr>
		<td  rowspan='4' width="135px" align="center" style="border:none">
			<img src="<?php echo Yii::$app->request->hostInfo.$empInfo->getEmpPhoto($empInfo->emp_photo); ?>" height="147px" width="147px" class="photo" style="margin-right:18px"/>
		</td>

		<td  class="label" style="border:1.5px solid white;width:150px"><b><?= $empInfo->getAttributeLabel('emp_unique_id'); ?><b></td>
		<td><?php echo $empInfo->emp_unique_id;?></td>
	</tr>
	<tr style="background:none">
		<td class="label" style="border:1.5px solid white;"><b>Name</b></td>
		<td><?php echo $empInfo->emp_title." ". $empInfo->emp_first_name." ".$empInfo->emp_middle_name." ".$empInfo->emp_last_name;?></td>
	</tr>
	<tr>
		<td class="label" style="border:1.5px solid white;"><b>Department</b></td>
		<td><?php echo $empMaster->empMasterDepartment->emp_department_name;?>
	</tr>
	<tr style="background:none">
		<td class="label" style="border:1.5px solid white;"><b>Designation<b></td>
		<td><?php echo (empty($empMaster->emp_master_designation_id) ? "N/A" : $empMaster->empMasterDesignation->emp_designation_name);?></td>
	</tr>
</table>

<!----------Start employee personal information--------------> 
<div class="profile-data">
<h4 class="title">Personal Profile</h4>
<table>
<tr>
	<td class="label">Name Alias</td><td colspan="3"><?php echo $empInfo->emp_name_alias;?></td>
</tr>
<tr>
	<td class="label">Email Id</td><td><?php echo $empInfo->emp_email_id;?></td>
	<td class="label">Mother Name</td><td><?php echo $empInfo->emp_mother_name;?></td>
</tr>
<tr>
	<td class="label">Gender</td>	<td><?php echo $empInfo->emp_gender;?></td>
	<td class="label">Joining Date</td>
	<td><?php echo Yii::$app->formatter->asDate($empInfo->emp_joining_date);?></td>
</tr>
<tr>	
	<td class="label">Date of Birth</td>
	<td><?php if($empInfo->emp_dob != NULL)
		echo Yii::$app->formatter->asDate($empInfo->emp_dob);?>
	</td>
	<td class="label">Birth Place</td><td><?php echo $empInfo->emp_birthplace;?></td>
</tr>	

<tr>		
	<td class="label">Blood Group</td><td><?php echo $empInfo->emp_bloodgroup;?></td>
	<td class="label">Marital Status</td><td><?php echo $empInfo->emp_maritalstatus;?></td>
</tr>
<tr>		
	<td class="label">Nationality</td><td><?php echo (!empty($nationality) ? $nationality : "");?></td>
	<td class="label">Bank Account No</td><td><?php echo $empInfo->emp_bankaccount_no;?></td>
</tr>	
<tr>		
	<td class="label">Category</td>
	<td><?php  
		if($empMaster->emp_master_category_id != null)
			echo $empMaster->empMasterCategory->emp_category_name;
		else 
			echo " - ";
	    ?>
	</td>
	<td class="label">Mobile No</td><td><?php echo $empInfo->emp_mobile_no;?></td>
</tr>	
</table>
<!--------Start employee guardian info----------------->
<h4 class="title">Guardian Info</h4>
<table>
<tr>
	<td class="label">Name</td><td width="40%"><?php echo $empInfo->emp_guardian_name;?></td>
	<td class="label">Relation</td><td width="40%"><?php echo $empInfo->emp_guardian_relation;?></td>
</tr>
<tr>
	<td class="label">Qualification</td><td><?php echo $empInfo->emp_guardian_qualification;?></td>
	<td class="label">Occupation</td><td><?php echo $empInfo->emp_guardian_occupation;?></td>
</tr>
<tr>
	<td class="label">Annual Income</td><td><?php echo $empInfo->emp_guardian_income;?></td>
	<td class="label">Email Id</td><td><?php echo $empInfo->emp_guardian_email_id;?></td>
</tr>
<tr>
	<td class="label">Home Address</td><td><?php echo $empInfo->emp_guardian_homeadd;?></td>
	<td class="label">Office Address</td><td><?php echo $empInfo->emp_guardian_officeadd;?></td>
</tr>
<tr>
	<td class="label">Mobile No</td><td><?php echo $empInfo->emp_guardian_mobile_no;?></td>
	<td class="label">Phone No</td><td><?php echo $empInfo->emp_guardian_phone_no;?></td>
</tr>
</table>

</br></br>

<!--------Start employee other info block----------------->
<h4 class="title">Other Info</h4>
<table>
<tr>
	<td class="label">Specialization</td><td colspan= "3"><?php echo $empInfo->emp_specialization;?></td>
	
</tr>
<tr>
	<td class="label">Reference</td><td><?php echo $empInfo->emp_reference;?></td>
	<td class="label">Experience</td><td><?php echo (!empty($empInfo->emp_experience_year || $empInfo->emp_experience_month ) ? $empInfo->emp_experience_year." Year(s) ".$empInfo->emp_experience_month." Month(s)" : " ");?></td>
</tr>
<tr>
	<td class="label">Religion</td><td><?php echo $empInfo->emp_religion;?></td>
	<td class="label">Hobbies</td><td><?php echo $empInfo->emp_hobbies;?></td>
</tr>
<tr>
	<td class="label">Language Known</td>
	<td colspan="3"><?php 
		if(!empty($empInfo->emp_languages))
			echo $empInfo->emp_languages;
		else
			echo "";
		?></td>
</tr>
</table>

</br></br>
<!---------start employee address info block------------>
<h4 class="title">Address Info</h4>
<table>
<tr>
<td class="title" colspan="4" align="center"><b>Local Address</b></td>
</tr>
<tr>	
	<td class="label">Address</td><td colspan="3"><?php echo $empAdd->emp_cadd; ?></td>
</tr>
<tr>	
	<td class="label">Country</td>
	<td><?php 
		if($empAdd->emp_cadd_country !=0)
		echo app\models\Country::findOne($empAdd->emp_cadd_country)->country_name;
		else
		echo "";
		?>
	</td>
	<td class="label">State/Province</td>
	<td><?php 
		if($empAdd->emp_cadd_state != 0)
		echo app\models\State::findOne($empAdd->emp_cadd_state)->state_name;
		else
		echo "";
		?>
	</td>
</tr>
<tr>	
	<td class="label">Town</td>
	<td><?php 
		if($empAdd->emp_cadd_city !=0)
		echo app\models\City::findOne($empAdd->emp_cadd_city)->city_name;
		else
		echo "";
		?>
	</td>
	<td class="label">Post Code</td><td><?php echo $empAdd->emp_cadd_pincode;?></td>
</tr>
<tr>
	<td class="label">Phone</td><td><?php echo $empAdd->emp_cadd_phone_no;?></td>
	<td class="label">House No</td><td><?php echo $empAdd->emp_cadd_house_no;?></td>
</tr>
<tr>
<td class="title" colspan="4" align="center"><b>International Address</b></td>
</tr>
<tr>	
	<td class="label">Address</td><td colspan="3"><?php echo $empAdd->emp_padd;?></td>
</tr>
<tr>	
	<td class="label">Country</td><td><?php 
		if($empAdd->emp_padd_country !=0)
		echo app\models\Country::findOne($empAdd->emp_padd_country)->country_name;
		else
		echo "";	
		?></td>
	<td class="label">State/Province</td><td><?php 
		if($empAdd->emp_padd_state != 0)
		echo app\models\State::findOne($empAdd->emp_padd_state)->state_name;
		else
		echo "";
		?></td>
</tr>
<tr>	
	<td class="label">Town</td><td><?php 
		if($empAdd->emp_padd_city !=0)
		echo app\models\City::findOne($empAdd->emp_padd_city)->city_name;
		else
		echo "";
		?>
	</td>
	<td class="label">Post Code</td><td><?php echo $empAdd->emp_padd_pincode;?></td>
</tr>
<tr>
	<td class="label">Phone</td><td><?php echo $empAdd->emp_padd_phone_no;?></td>
	<td class="label">House No</td><td><?php echo $empAdd->emp_padd_house_no;?></td>
</tr>
</table>
</br></br>
<!------Start employee document------------>
<h4 class="title">Documents</h4>
<?php $k=0;
if ($empDocs != null){
?>
<table>
	<tr>
		<th>
		      SN.		
		</th>
 		<th width="70px">
		       Document	Category	
		</th>
		<th width="70px">
		       Document	Detail	
		</th>
		<th width="70px">
		       Status	
		</th>
 		<th width="70px">
		       Submit Date	
		</th>
 		
 	</tr>
	<?php 
	foreach($empDocs as $m=>$v) {
            ?>	<tr>
			<td>
			      <?php echo ++$k; ?>		
			</td>
			<td width="70px">
			      <?php echo $v->empDocsCategory->doc_category_name; ?>		
			</td>
			<td width="70px">
			      <?php echo $v->emp_docs_details; ?>		
			</td>
			<td width="70px">
			      <?php echo (($v->emp_docs_status == 1) ? "Approved" : (($v->emp_docs_status == 2) ? "Disapproved" : "Pendding")); ?>		
			</td>
				<td>
				<?php echo Yii::$app->formatter->asDateTime($v->emp_docs_submited_at); ?>
			</td>
 		</tr> 
       <?php

     } // end for loop
	
?>
</table>
<?php }
	else
		echo "No document available";
 ?>
</div>
