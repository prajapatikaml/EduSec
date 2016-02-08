<?php

$studInfo = StudentInfo::model()->findByPk($student_transaction[0]->student_transaction_student_id);

$studAdd = StudentAddress::model()->findByPk($student_transaction[0]->student_transaction_student_address_id);

if($student_transaction[0]->student_transaction_parent_id != null || $student_transaction[0]->student_transaction_parent_id != 0)
$parent = ParentLogin::model()->findByPk($student_transaction[0]->student_transaction_parent_id);
else
$parent = new $ParentLogin;

?>
<h3>Student Detail</h3>
<h4>Personal Info</h4>
<table border="1" width="200px">

<tr>
	<td>
	<label> Enrollment No  </label></td><td><?php echo $studInfo->student_enroll_no;?>
	</td>
</tr>
<tr>
	<td>
	<label> First Name </label></td><td><?php echo $studInfo->student_first_name;?>
	</td>
</tr>	

<tr>
	<td>
	<label> Last Name </label></td><td><?php echo $studInfo->student_last_name;?>
	</td>
</tr>	
<tr>
	<td>
	<label> Gender </label></td><td><?php echo $studInfo->student_gender;?>
	</td>
</tr>	
<tr>
	<td>
	<label> Mobile No. </label></td><td><?php echo $studInfo->student_mobile_no;?>
	</td>
</tr>	
<tr>
	<td>
	<label> Admission Date </label></td><td><?php 
		if($studInfo->student_adm_date != NULL)
		echo date('d-m-Y',strtotime($studInfo->student_adm_date));
		?>
	</td>
</tr>	
<tr>
	<td>
	<label> DOB </label></td><td><?php 
		if($studInfo->student_dob != NULL)
		echo date('d-m-Y',strtotime($studInfo->student_dob));		
		?>
	</td>
</tr>
<tr>
	<td>
	<label> Academic Year </label>
	</td>
	<td>
	   <?php 
		if(isset($student_transaction[0]->student_academic_term_period_tran_id))
		  echo AcademicTermPeriod::model()->findByPk($student_transaction[0]->student_academic_term_period_tran_id)->academic_term_period;
		else
		  echo "N/A";
	   ?>
	</td>
</tr>
<tr>
	<td>
	<label> Semester </label>
	</td>
	<td>
	  <?php 
		if(isset($student_transaction[0]->student_academic_term_name_id))
		  echo AcademicTerm::model()->findByPk($student_transaction[0]->student_academic_term_name_id)->academic_term_name;
		else
		  echo "N/A";
		?>
	</td>
</tr>
<tr>
	<td><label> Nationality </label></td>
	<td>
	   <?php 
		if(isset($student_transaction[0]->student_transaction_nationality_id))
		echo Nationality::model()->findByPk($student_transaction[0]->student_transaction_nationality_id)->nationality_name;
		else
		echo "N/A";
		?>
	</td>
</tr>		

</table>
</br></br>


<h4>Guardian Info</h4>
<table border="1" width="200px">
<tr>
	<td>
	<label> Guardian Name  </label></td><td><?php echo $studInfo->student_guardian_name;?>
	</td>
</tr>
<tr>
	<td>
	<label> Relation  </label></td><td><?php echo $studInfo->student_guardian_relation;?>
	</td>
</tr>


<tr>
	<td>
	<label> Occupation  </label></td><td><?php echo $studInfo->student_guardian_occupation;?>
	</td>
</tr>
<?php if(isset(Yii::app()->modules['parents'])) { ?>
	
<tr>
	<td>
	<label> Parent Email ID  </label></td><td><?php echo $parent->parent_user_name;?>
	</td>
</tr>
<?php } ?>
<tr>
	<td>
	<label> Home Address  </label></td><td><?php echo $studInfo->student_guardian_home_address;?>
	</td>
</tr>
<tr>
	<td>
	<label> Income  </label></td><td><?php echo $studInfo->student_guardian_income;?>
	</td>
</tr>
<tr><td></td><td></td></tr>
<tr>
	<td>
	<label> Phone No  </label></td><td><?php echo $studInfo->student_guardian_phoneno;?>
	</td>
</tr>
<tr>
	<td>
	<label> Mobile No  </label></td><td><?php echo $studInfo->		student_guardian_mobile;?>
	</td>
</tr>
</table>
</br></br>


<h4>Other Info</h4>
<table border="1" width="200px">
<tr>
	<td>
	<label> Email Id 1  </label></td><td><?php echo $studInfo->student_email_id_1;?>
	</td>
</tr>

<tr>
	<td>
	<label> Bloodgroup  </label></td><td><?php echo $studInfo->student_bloodgroup;?>
	</td>
</tr>


<tr>
	<td>
	<label> Language 1  </label>
	</td>
	<td>
	<?php 
		$lang1 = LanguagesKnown::model()->findByPk($student_transaction[0]->student_transaction_languages_known_id)->languages_known1;
		if(isset($lang1))
		echo Languages::model()->findByPk($lang1)->languages_name;
		else
		echo "N/A";	
	?>
	</td>
</tr>
<tr>
	<td>
	<label> Language 2  </label>
	</td>
	<td>
	<?php 
		$lang2 = LanguagesKnown::model()->findByPk($student_transaction[0]->student_transaction_languages_known_id)->languages_known2;
		if(isset($lang2))
		echo Languages::model()->findByPk($lang2)->languages_name;
		else
		echo "N/A";	
	?>
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
		echo $studAdd->student_address_c_line1;
		?>
	</td>
</tr>
<tr>	
	<td>
	<label> Line2  </label></td><td><?php 
		$studAdd->student_address_c_line2;
		?>
	</td>
</tr>


<tr>	
	<td>
	<label> City </label></td><td><?php 
		if($studAdd->student_address_c_city !=0)
		echo City::model()->findByPk($studAdd->student_address_c_city)->city_name;
		else
		echo "";
		?>
	</td>
</tr>
<tr>	
	<td>
	<label> Zip / Postal Code </label></td><td><?php 
		echo $studAdd->student_address_c_pin;
		?>
	</td>
</tr>
<tr>	
	<td>
	<label> State / Province</label></td><td><?php 
		if($studAdd->student_address_c_state !=0)
		echo State::model()->findByPk($studAdd->student_address_c_state)->state_name;
		else
			echo "";
			
		?>
	</td>
</tr>
<tr>	
	<td>
	<label> Country </label></td><td><?php 
		if($studAdd->student_address_c_country!=0)
		echo  Country::model()->findByPk($studAdd->student_address_c_country)->name;
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
		echo $studAdd->student_address_p_line1;
		?>
	</td>
</tr>
<tr>	
	<td>
	<label> Line2  </label></td><td><?php 
		echo $studAdd->student_address_p_line2;
		?>
	</td>
</tr>


<tr>	
	<td>
	<label> City </label></td><td><?php 
		if($studAdd->student_address_p_city !=0)
		echo City::model()->findByPk($studAdd->student_address_p_city)->city_name;
		else
		echo "";
		?>
	</td>
</tr>
<tr>	
	<td>
	<label> Zip / Postal Code </label></td><td><?php 
		echo $studAdd->student_address_p_pin;
		?>
	</td>
</tr>
<tr>	
	<td>
	<label> State / Province </label></td><td><?php 
		if($studAdd->student_address_p_state !=0)
		echo State::model()->findByPk($studAdd->student_address_p_state)->state_name;
		else
			echo "";
		?>
	</td>
</tr>
<tr>	
	<td>
	<label> Country </label></td><td><?php 
		if($studAdd->student_address_p_country!=0)
		echo  Country::model()->findByPk($studAdd->student_address_p_country)->name;
	else
		echo "";
		?>
	</td>
</tr>

</table>
</br></br>
<?php echo "</br></br>"; ?>
<h3>Attached Documents</h3>

<?php $k=0;

if ($student_docs != null){
?>
<table border="1">

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
<h3>Qualification</h3>

<?php $k=0;
//print_r($model);exit;
if ($studentqualification != null){
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
		<th>
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
			      <?php echo Year::model()->findByPk($v['student_academic_record_trans_record_trans_year_id'])->year; ?>
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
</br></br>


