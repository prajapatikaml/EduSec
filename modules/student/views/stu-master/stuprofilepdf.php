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

<!------------Start Student Details Block---------------->
<h3 class="title">Student Detail</h3>
<table class="no_border">
	<tr>
		<td  rowspan='4' width="135px" align="center" style="border:none">
		<img src="<?php echo Yii::$app->request->hostInfo.$stuInfo->getStuPhoto($stuInfo->stu_photo); ?>" height="147px" width="147px" class="photo" style="margin-right:18px"/>
		</td>
		<td  class="label" style="border:1.5px solid white;width:12;"><b><?= $stuInfo->getAttributeLabel('stu_unique_id') ?><b></td>
		<td><?php echo $stuInfo->stu_unique_id;?></td>
	</tr>
	<tr style="background:none">
		<td class="label" style="border:1.5px solid white;"><b>Name</b></td>
		<td><?php echo $stuInfo->stu_title." ". $stuInfo->stu_first_name." ".$stuInfo->stu_middle_name." ".$stuInfo->stu_last_name;?></td>
	</tr>
	<tr>
		<td class="label" style="border:1.5px solid white;"><b><?= $stuInfo->getAttributeLabel('stu_email_id') ?><b></td>
		<td><?php echo $stuInfo->stu_email_id;?></td>
	</tr>
	<tr style="background:none">
		<td class="label" style="border:1.5px solid white;"><b><?= $stuCourse->getAttributeLabel('course_name') ?></b></td>
		<td><?php echo $stuCourse->course_name;?>
	</tr>
</table>

<!----------Start Student personal information--------------> 
<div class="profile-data">
<h4 class="title">Personal Profile</h4>
<table>
<tr>
	<td class="label"><?= $stuInfo->getAttributeLabel('stu_gender') ?></td>
	<td><?php echo $stuInfo->stu_gender;?></td>
	<td class="label"><?= $stuInfo->getAttributeLabel('stu_dob') ?></td>
	<td><?php echo Yii::$app->formatter->asDate($stuInfo->stu_dob);?></td>
</tr>	
<tr>
	<td class="label"><?= $stuMaster->getAttributeLabel('stu_master_nationality_id') ?></td>
	<td><?php echo (!empty($nationality)) ? $nationality : "(Not Set)"; ?></td>
	<td class="label"><?= $stuInfo->getAttributeLabel('stu_mobile_no') ?></td><td><?php echo $stuInfo->stu_mobile_no;?></td>
</tr>
<tr>
	<td class="label"><?= $stuMaster->getAttributeLabel('stu_master_category_id') ?></td>
	<td><?php echo (!empty($stuMaster->stu_master_category_id)) ? $stuMaster->stuMasterCategory->stu_category_name : "(Not Set)"; ?></td>
	<td class="label"><?= $stuInfo->getAttributeLabel('stu_religion') ?></td><td><?php echo $stuInfo->stu_religion;?></td>
</tr>
<tr>
	<td class="label"><?= $stuInfo->getAttributeLabel('stu_bloodgroup') ?></td>
	<td><?php echo (!empty($stuInfo->stu_bloodgroup)) ? $stuInfo->stu_bloodgroup : "(Not Set)"; ?></td>
	<td class="label"><?= $stuInfo->getAttributeLabel('stu_birthplace') ?></td><td><?php echo $stuInfo->stu_birthplace;?></td>
</tr>
<tr>
	<td class="label"><?= $stuInfo->getAttributeLabel('stu_languages') ?></td>
	<td colspan="3"><?php echo (!empty($stuInfo->stu_languages)) ? $stuInfo->stu_languages : "(Not Set)"; ?></td>
</tr>	
</table>

<!---------Start Student academic details block--------------> 
<h4 class="title">Academic Details</h4>
<table>
<tr>
	<td class="label"><?= $stuInfo->getAttributeLabel('stu_admission_date') ?></td>
	<td><?php echo (!empty($stuInfo->stu_admission_date) ? Yii::$app->formatter->asDate($stuInfo->stu_admission_date) : "(Not Set)");?></td>
	<td class="label"><?= $stuBatch->getAttributeLabel('batch_name') ?></td>
	<td><?php echo $stuBatch->batch_name;?></td>
</tr>
<tr>
	<td class="label"><?= $stuSection->getAttributeLabel('section_name') ?></td>
	<td><?php echo $stuSection->section_name;?></td>
	<td class="label"><?= $stuMaster->getAttributeLabel('stu_master_stu_status_id') ?></td>
	<td><?php echo (($stuMaster->stu_master_stu_status_id == 0) ? "Reguler" : $stuMaster->stuMasterStuStatus->stu_status_name);?></td>
</tr>
</table>
<!--------Start Student guardian info----------------->
<h4 class="title">Guardian Info</h4>
<?php
if(!empty($stuGuard)) : 
$sr_no = 0;
foreach($stuGuard as $key => $guardData) : ?>
<table>
<tr>
	<td class="label"> Guardian </td>
	<td><?php echo ++$sr_no; ?></td>
	<td class="label"> <?= $guardData->getAttributeLabel('is_emp_contact') ?> </td>
	<td><?php echo ( ($guardData->is_emg_contact == 1) ? "Yes" : "No" ); ?></td>
</tr>
<tr>
	<td class="label"><?= $guardData->getAttributeLabel('guardian_name') ?></td>
	<td><?php echo $guardData->guardian_name;?></td>
	<td class="label"><?= $guardData->getAttributeLabel('guardian_relation') ?></td>
	<td><?php echo $guardData->guardian_relation;?></td>
</tr>
<tr>
	<td class="label"><?= $guardData->getAttributeLabel('guardian_qualification') ?></td>
	<td><?php echo $guardData->guardian_qualification;?></td>
	<td class="label"><?= $guardData->getAttributeLabel('guardian_occupation') ?></td>
	<td><?php echo $guardData->guardian_occupation;?></td>
</tr>
<tr>
	<td class="label"><?= $guardData->getAttributeLabel('guardian_incode') ?></td>
	<td><?php echo $guardData->guardian_income;?></td>
</tr>
<tr>
	<td class="label"><?= $guardData->getAttributeLabel('guardian_home_address') ?></td>
	<td colspan="3"><?php echo $guardData->guardian_home_address;?></td>
</tr>
<tr>
	<td class="label"><?= $guardData->getAttributeLabel('guardian_office_address') ?></td>
	<td colspan="3"><?php echo $guardData->guardian_office_address;?></td>
</tr>
<tr>
	<td class="label"><?= $guardData->getAttributeLabel('guardian_phone_no') ?></td><td><?php echo $guardData->guardian_phone_no;?></td>
	<td class="label"><?= $guardData->getAttributeLabel('guardian_mobile_no') ?></td><td><?php echo $guardData->guardian_mobile_no;?></td>
</tr>
</table>
<br/>
<?php endforeach; ?>
<?php else: ?>
	No Guardian Info Available
<?php endif; ?>

<!---------start Student address info block------------>
<h4 class="title">Address Info</h4>
<table>
<tr>
	<td class="label" colspan="4" align="center"><b>Current Address</b></td>
</tr>
<tr>	
	<td class="label"><?= $stuAdd->getAttributeLabel('stu_cadd') ?></td><td colspan="3">
	<?php echo $stuAdd->stu_cadd;?></td>
</tr>
<tr>	
	<td class="label"><?= $stuAdd->getAttributeLabel('stu_cadd_country') ?></td>
	<td><?php 
		if(!empty($stuAdd->stu_cadd_country))
			echo app\models\Country::findOne($stuAdd->stu_cadd_country)->country_name;
		else
			echo "(Not Set)";
	     ?>
	</td>
	<td class="label"><?= $stuAdd->getAttributeLabel('stu_cadd_state') ?></td>
	<td><?php 
		if(!empty($stuAdd->stu_cadd_state))
			echo app\models\State::findOne($stuAdd->stu_cadd_state)->state_name;
		else
			echo "(Not Set)";
	     ?>
	</td>
</tr>
<tr>	
	<td class="label"><?= $stuAdd->getAttributeLabel('stu_cadd_city') ?></td>
	<td><?php
		if(!empty($stuAdd->stu_cadd_city))
			echo app\models\City::findOne($stuAdd->stu_cadd_city)->city_name;
		else
			echo "(Not Set)";
	     ?>
	</td>
	<td class="label"><?= $stuAdd->getAttributeLabel('stu_cadd_pincode') ?></td><td><?php echo $stuAdd->stu_cadd_pincode;?></td>
</tr>
<tr>	
	<td class="label"><?= $stuAdd->getAttributeLabel('stu_cadd_phone_no') ?></td><td><?php echo $stuAdd->stu_cadd_phone_no;?></td>
	<td class="label"><?= $stuAdd->getAttributeLabel('stu_cadd_house_no') ?></td><td><?php echo $stuAdd->stu_cadd_house_no;?></td>
</tr>
<tr>
	<td class="label" colspan="4" align="center"><b>Permanent Address</b></td>
</tr>
<tr>	
	<td class="label"><?= $stuAdd->getAttributeLabel('stu_padd') ?></td>
	<td colspan="3"><?php echo $stuAdd->stu_padd;?></td>
</tr>
<tr>	
	<td class="label"><?= $stuAdd->getAttributeLabel('stu_padd_country') ?></td>
	<td><?php 
		if(!empty($stuAdd->stu_padd_country))
			echo app\models\Country::findOne($stuAdd->stu_padd_country)->country_name;
		else
			echo "(Not Set)";
		?>
	</td>
	<td class="label"><?= $stuAdd->getAttributeLabel('stu_padd_state') ?></td>
	<td><?php 
		if(!empty($stuAdd->stu_padd_state))
			echo app\models\State::findOne($stuAdd->stu_padd_state)->state_name;
		else
			echo "(Not Set)";
		?>
	</td>
</tr>
<tr>	
	<td class="label"><?= $stuAdd->getAttributeLabel('stu_padd_city') ?></td>
	<td><?php 
		if(!empty($stuAdd->stu_padd_city))
			echo app\models\City::findOne($stuAdd->stu_padd_city)->city_name;
		else
			echo "(Not Set)";
	     ?>		
	</td>
	<td class="label"><?= $stuAdd->getAttributeLabel('stu_padd_pincode') ?></td><td><?php echo $stuAdd->stu_padd_pincode;?></td>
</tr>
<tr>	
	<td class="label"><?= $stuAdd->getAttributeLabel('stu_padd_phone_no') ?></td><td><?php echo $stuAdd->stu_padd_phone_no;?></td>
	<td class="label"><?= $stuAdd->getAttributeLabel('stu_padd_house_no') ?></td><td><?php echo $stuAdd->stu_padd_house_no;?></td>
</tr>

</table>
<!------Start stu Document------------>
<h4 class="title">Documents</h4>
<?php $k=0;
if($stuDocs !== null) {
?>
<table>
	<tr>
		<th>SN.</th>
		<th><?= $sDocs->getAttributeLabel('stu_docs_category_id') ?></th>
		<th><?= $sDocs->getAttributeLabel('stu_docs_details') ?></th>
		<th width="70px"><?= $sDocs->getAttributeLabel('stu_docs_status') ?></th>
		<th><?= $sDocs->getAttributeLabel('stu_docs_submited_at') ?></th>
 	</tr>
<?php foreach($stuDocs as $key=>$sdoc) { ?>
		<tr>
			<td><?php echo ++$k; ?></td>
			<td> <?php echo (!empty($sdoc->stuDocsCategory->doc_category_name) ? $sdoc->stuDocsCategory->doc_category_name : " ");?></td>
			<td><?php echo (!empty($sdoc->stu_docs_details) ? $sdoc->stu_docs_details : " "); ?></td>
			<td width="70px"><?php echo (($sdoc->stu_docs_status == 1) ? "Approved" : (($sdoc->stu_docs_status == 2) ? "Disapproved" : "Pendding")); ?></td>
			<td><?php echo Yii::$app->formatter->asDateTime($sdoc->stu_docs_submited_at); ?>
			</td>
 		</tr> 
       <?php
	} // end foreach loop
?>
</table>
<?php }
	else 
		echo "No document available";
?>
</div>