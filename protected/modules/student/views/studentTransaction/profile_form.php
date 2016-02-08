<script>
$( document ).ready(function() {
var editLinkPath = '<?php echo Yii::app()->baseUrl; ?>';
  $("#guardian-tab").click(function(event) {
      $('#updateData').attr('href', editLinkPath + '/student/studentTransaction/updateprofiletab2?id=' + '<?php echo $_REQUEST["id"]; ?>');
 });

 $("#academic-tab").click(function(event) {
      $('#updateData').attr('href', editLinkPath + '/student/studentTransaction/updateprofiletab5?id=' + '<?php echo $_REQUEST["id"]; ?>');
 });

 $("#add-tab").click(function(event) {
      $('#updateData').attr('href', editLinkPath + '/student/studentTransaction/updateprofiletab4?id=' + '<?php echo $_REQUEST["id"]; ?>');
 });

 $("#personal-tab").click(function(event) {
      $('#updateData').attr('href', editLinkPath + '/student/studentTransaction/updateprofiletab1?id=' + '<?php echo $_REQUEST["id"]; ?>');
 });

});
</script>           
            <div class="clear-div"></div>
            <div class="profile-page-box">
                <!--===============================Page header start============================-->
                <div class="page-title-header"><i class="fa fa-plus"></i> View Student Profile</div>
                <!--===============================Page header end============================-->
		<?php $studInfo = StudentTransaction::model()->findByPk($_REQUEST['id']); 
			$stdpicPath = StudentPhotos::model()->findByPk($studInfo->student_transaction_student_photos_id);
			  $stud_photo=Yii::app()->baseUrl."/college_data/stud_images/".$stdpicPath->student_photos_path;		
			?>
                <!--Profile Tab Start-->
                <div class="profile-box-bg">
                	<div class="profilebox-left">
                    	<div class="profile-image-tab">
			<a title="Change Picture" href ="<?php echo Yii::app()->baseUrl.'/student/studentTransaction/updateprofilephoto?id='.$_REQUEST['id']; ?>">
                            <div class="profile-box-user"><img src="<?php echo $stud_photo;?>" width="200" height="200"></div></a>
                        </div>
                    </div>
                    <div class="profilebox-middle" style="font-family : sans-serif; ">
                    	<div class="profile-username"><?php echo $studInfo->Rel_Stud_Info->student_first_name.' '.$studInfo->Rel_Stud_Info->student_last_name ;?> </div>
			<div style="color: rgb(85, 85, 85); font-size: 15px; height: 35px; line-height: 35px;"><i class="fa fa-graduation-cap" style="width: 30px; color: #D9534F;"></i> Course : <?php echo (!empty($studInfo->Rel_course->course_name) ? $studInfo->Rel_course->course_name : "Not Set");?></div>
                        <div style="color: rgb(85, 85, 85); font-size: 15px; height: 35px; line-height: 35px;"><i class="fa fa-sitemap" style="width: 30px; color: #D9534F;"></i> Batch : <?php echo (!empty($studInfo->Rel_Batch->batch_name) ? $studInfo->Rel_Batch->batch_name : "Not Set");?></div>
			<?php if($studInfo->Rel_Stud_Info->student_mobile_no != '')  { ?>
                        <div class="phoneno-display" style="color: rgb(85, 85, 85); font-size: 15px; height: 35px; line-height: 35px;"><i class="fa fa-mobile" style="width: 30px; font-size: 25px; color: #D9534F;"></i> Mobile : <?php echo $studInfo->Rel_Stud_Info->student_mobile_no; ?></div>
			<?php } ?>
                    </div>
                    <div class="profilebox-right">
                    	<div class="btn-group">
                            <ul class="button-display">
                                <li><?php echo CHtml::link('<i class="fa fa-angle-double-left"></i> Back', array('admin'), array('class'=>'btn btn-default btnradious'));?></li>
                                <li><?php  echo CHtml::link('<i class="fa fa-file-pdf-o"></i> PDF',array('ExportToPDFExcel/StudentFinalViewExportToPdf', 'id'=>$_REQUEST['id']),array('id'=>'pdf','class'=>'btn btn-pdf','target'=>'_blank')); ?><!--button name="PDF" type="button" class="btn btn-pdf"><i class="fa fa-file-pdf-o"></i> PDF</button--></li>
                                <!--li><button name="color" type="button" class="btn btn-excel"><i class="fa fa-file-excel-o"></i> Excel</button></li-->
			<?php if(Yii::app()->user->checkAccess('Student.StudentTransaction.Updateprofiletab1')) { ?>
                                <li><?php echo CHtml::link('<i class="fa fa-plus-square"></i> Add', array('studentTransaction/create'), array('class'=>'btn btn-add')); ?></li>
                                <li><?php echo CHtml::link('<i class="fa fa-wrench"></i> Edit', array('updateprofiletab1', 'id'=>$_REQUEST['id']), array('class'=>'btn btn-edit', 'id'=>'updateData'));?></li>
                                <li><?php echo CHtml::link('<i class="fa fa-trash-o"></i> Delete', array('delete' ,'id'=>$studInfo->student_transaction_id), array('class'=>'btn btn-delete btnradious-last'));?></li>
                           <?php   } ?>
			     </ul>
                      	</div>
                    </div>
                    <div class="clear-div"></div>  
                </div>
                <div class="profile-tab-he">                	
                	<ul class="pronav nav-tabs">
                      <li class="activetab" id="personal-tab"><a href="#tab1">Profile</a></li>
                      <!--li><a href="#tab2">Academic Info</a></li-->
                      <li><a href="#tab3" id="guardian-tab">Guardian Info</a></li>
		      <li><a href="#tab5" id="add-tab">Address Info</a></li>
                      <li><a href="#tab6">Documents</a></li>
                      <li><a href="#tab7">Cetificates</a></li>
                      <!--li><a href="#tab7">Qualification</a></li-->
                    </ul><div class="clear-div"></div>  
                </div>
                <div id="tab1" class="tab-content active">
                    <div class="content-box-border">
                        <div class="content-bg-he">Personal</div>
                        <div class="content-bg-inner">
                            <div class="content-bg-inner-one">
                                <table width="100%" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td class="table-cell-title" width="23%">Student Unique Id</td>
                                    <td class="table-cell-content" width="23%"><?php echo $studInfo->Rel_Stud_Info->student_roll_no;?></td>
                                    <td class="table-cell-title" width="23%">Title</td>
                                    <td class="table-cell-content" width="23%"><?php echo (!empty($studInfo->Rel_Stud_Info->title) ? $studInfo->Rel_Stud_Info->title : "Not Set");?></td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">First Name</td>
                                    <td class="table-cell-content"><?php echo (!empty($studInfo->Rel_Stud_Info->student_first_name) ? $studInfo->Rel_Stud_Info->student_first_name : "Not Set" );?></td>
                                    <td class="table-cell-title">Middle Name</td>
                                    <td class="table-cell-content"><?php echo (!empty($studInfo->Rel_Stud_Info->student_middle_name) ? $studInfo->Rel_Stud_Info->student_middle_name : "Not Set");?></td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">Last Name</td>
                                    <td class="table-cell-content"><?php echo (!empty ($studInfo->Rel_Stud_Info->student_last_name) ? $studInfo->Rel_Stud_Info->student_last_name :"Not Set");?></td>
                                    <td class="table-cell-title">Gender</td>
                                    <td class="table-cell-content"><?php echo (!empty($studInfo->Rel_Stud_Info->student_gender) ? $studInfo->Rel_Stud_Info->student_gender : "Not Set");?></td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">Date Of Birth</td>
                                    <td class="table-cell-content"><?php 	
						if($studInfo->Rel_Stud_Info->student_dob == '0000-00-00')
						  echo "Not Set";
						else
						   echo date('d-m-Y',strtotime($studInfo->Rel_Stud_Info->student_dob));
		       		   ?></td>
                                    <td class="table-cell-title">Nationality</td>
                                    <td class="table-cell-content">
				<?php if($studInfo->student_transaction_nationality_id!=null)
					echo $studInfo->Rel_Nationality->nationality_name;	
				      else
					echo "Not Set";	
					?></td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">Contact No.</td>
                                    <td class="table-cell-content"><?php echo (!empty($studInfo->Rel_Stud_Info->student_mobile_no) ? $studInfo->Rel_Stud_Info->student_mobile_no : "Not Set");?></td>
                                    <td class="table-cell-title">Student Email</td>
                                    <td class="table-cell-content">
					<?php if(!empty($studInfo->Rel_Stud_Info->student_email_id_1))
					echo $studInfo->Rel_Stud_Info->student_email_id_1; 
				      else
					echo "Not Set";?></td>
				</tr>

                                 <tr>
                                    <td class="table-cell-title" width="23%">Emergency Contact Name</td>
                                    <td class="table-cell-content" width="23%"><?php echo (!empty($studInfo->Rel_Stud_Info->emergency_cont_name) ? $studInfo->Rel_Stud_Info->emergency_cont_name : "Not Set"); ?></td>
                                    <td class="table-cell-title" width="23%">Emergency Contact No</td>
                                    <td class="table-cell-content" width="23%"><?php echo (!empty($studInfo->Rel_Stud_Info->emergency_cont_no) ? $studInfo->Rel_Stud_Info->emergency_cont_no :"Not Set"); ?></td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">Passport No.</td>
                                    <td class="table-cell-content"><?php echo (!empty($studInfo->Rel_Stud_Info->passport_no) ? $studInfo->Rel_Stud_Info->passport_no : "Not Set"); ?></td>
                                    <td class="table-cell-title">Visa Expiry Date</td>
                                    <td class="table-cell-content"><?php 
					if($studInfo->Rel_Stud_Info->visa_exp_date == 0000-00-00)
						echo "Not Set";
			    	         else
						echo date('d-m-Y',strtotime($studInfo->Rel_Stud_Info->visa_exp_date));?></td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">Languages Known</td>
                                    <td class="table-cell-content" style="word-wrap:break-word; table-layout:fixed;"><?php
				$lang = LanguagesKnown::model()->findByPk($studInfo->student_transaction_languages_known_id);
		echo (!empty($lang->languages_known1) ? $lang->languages_known1 :"Not Set");?></td>
				    <td class="table-cell-title">Passport Expiry Date</td>
				    <td class="table-cell-content"><?php 
					if($studInfo->Rel_Stud_Info->passport_exp_date == 0000-00-00)
						echo "Not Set";
			    	         else
						echo date('d-m-Y',strtotime($studInfo->Rel_Stud_Info->passport_exp_date));?></td>
				  </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> 
                <!--Profile Tab end-->
                <!--Guardian Info Tab Start-->
                <div id="tab3" class="tab-content hide">
                    <div class="content-box-border">
                        <div class="content-bg-he">Guardian Info</div>
                        <div class="content-bg-inner">
                            <div class="content-bg-inner-one">
                                <table width="100%" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td class="table-cell-title" width="23%">Name</td>
                                    <td class="table-cell-content" width="23%"><?php echo (!empty ($studInfo->Rel_Stud_Info->student_guardian_name) ? $studInfo->Rel_Stud_Info->student_guardian_name :" Not Set"); ?></td>
                                    <td class="table-cell-title" width="23%">Relation</td>
                                    <td class="table-cell-content" width="23%"><?php echo (!empty ($studInfo->Rel_Stud_Info->student_guardian_relation) ? $studInfo->Rel_Stud_Info->student_guardian_relation : "Not Set");?></td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">Qualification</td>
                                    <td class="table-cell-content"> <?php echo (!empty($studInfo->Rel_Stud_Info->student_guardian_qualification) ? $studInfo->Rel_Stud_Info->student_guardian_qualification : "Not Set"); ?></td>
                                    <td class="table-cell-title">Occupation</td>
                                    <td class="table-cell-content"><?php echo (!empty($studInfo->Rel_Stud_Info->student_guardian_occupation) ? $studInfo->Rel_Stud_Info->student_guardian_occupation : "Not Set"); ?></td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">Annual Income</td>
                                    <td class="table-cell-content"><?php echo (!empty($studInfo->Rel_Stud_Info->student_guardian_income) ? $studInfo->Rel_Stud_Info->student_guardian_income :"Not Set"); ?></td>
				    <?php if(isset(Yii::app()->modules['parents'])) { ?>
				    <td class="table-cell-title">
			             Parent Email</td>
				    <td class="table-cell-content">
		<?php if($studInfo->student_transaction_parent_id != 0 ) 
			echo $studInfo->Rel_parent->parent_user_name; 
		      else
			  echo "Not Set";?>
				</td>
			<?php } ?>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">Home Address</td>
                                    <td class="table-cell-content"><?php echo (!empty($studInfo->Rel_Stud_Info->student_guardian_home_address) ? $studInfo->Rel_Stud_Info->student_guardian_home_address :"Not Set"); ?></td>
                                    <td class="table-cell-title">Occupation Address</td>
                                    <td class="table-cell-content"><?php echo (!empty($studInfo->Rel_Stud_Info->student_guardian_occupation_address) ? $studInfo->Rel_Stud_Info->student_guardian_occupation_address : "Not Set" ); ?></td>
                                  </tr>
				  <tr>
                                    <td class="table-cell-title">Occupation City</td>
                                    <td class="table-cell-content"><?php echo (!empty($studInfo->Rel_Stud_Info->student_guardian_occupation_city) ? $studInfo->Rel_Stud_Info->Rel_gardian_city->city_name :"Not Set"); ?></td>
                                    <td class="table-cell-title">City Pincode</td>
                                    <td class="table-cell-content"><?php echo (!empty($studInfo->Rel_Stud_Info->student_guardian_city_pin) ? $studInfo->Rel_Stud_Info->student_guardian_city_pin : "Not Set" ); ?></td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">Phone</td>
                                    <td class="table-cell-content"><?php echo (!empty($studInfo->Rel_Stud_Info->student_guardian_phoneno) ? $studInfo->Rel_Stud_Info->student_guardian_phoneno : "Not Set" ); ?></td>
                                    <td class="table-cell-title">Mobile</td>
                                    <td class="table-cell-content"><?php echo (!empty($studInfo->Rel_Stud_Info->student_guardian_mobile) ? $studInfo->Rel_Stud_Info->student_guardian_mobile : "Not Set" ); ?></td>
                                  </tr>
                                </table>
                            </div>
                        </div>
                    </div> 
                 </div>
                <!--Guardian Info Tab end-->

		<!--Address Info Tab Start-->
                <div id="tab5" class="tab-content hide">
                    <div class="content-box-border">
                        <div class="content-bg-he">Address Info</div>
                        <div class="content-bg-inner">
                            <div class="content-bg-inner-one">
                                <table width="100%" cellpadding="0" cellspacing="0">
				<tr>
                                    <td class="table-cell-title" colspan="2" style="border-right:2px solid #FFAD12;text-align:center;font-size:20px">Local Address</td>
                                    <td class="table-cell-title" colspan="2" style=";text-align:center;font-size:20px">International Address</td>
                                </tr>
                                  <tr>
			<?php $address = StudentAddress::model()->findByPk($studInfo->student_transaction_student_address_id);?>
                                    <td class="table-cell-title" width="23%">Street 1</td>
                                    <td class="table-cell-content" width="23%"><?php echo (!empty($address->student_address_c_line1) ? $address->student_address_c_line1 :"Not Set"); ?></td>
                                    <td class="table-cell-title" width="23%">Street 1</td>
                                    <td class="table-cell-content" width="23%"><?php echo (!empty($address->student_address_p_line1) ? $address->student_address_p_line1 : "Not Set");?></td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">Street 2</td>
                                    <td class="table-cell-content"><?php echo (!empty($address->student_address_c_line2) ? $address->student_address_c_line2 : "Not Set"); ?></td>
                                    <td class="table-cell-title">Street 2</td>
                                    <td class="table-cell-content"><?php echo (!empty($address->student_address_p_line2) ? $address->student_address_p_line2 :"Not Set");?></td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">Country</td>
                                    <td class="table-cell-content">
				<?php if($address->student_address_c_country!=0)
					echo $address->Rel_c_country->name; 
	      			      else
					echo "Not Set";?></td>
                                    <td class="table-cell-title">Country</td>
                                    <td class="table-cell-content">
				    <?php if($address->student_address_p_country!=0)
					   echo $address->Rel_p_country->name; 
	  				  else
					   echo "Not Set";?></td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">State</td>
                                    <td class="table-cell-content">
				   <?php if($address->student_address_c_state!=0)
			  		 echo $address->Rel_c_state->state_name;
             				else
					 echo "Not Set";?></td>
                                    <td class="table-cell-title">State</td>
                                    <td class="table-cell-content">
				  <?php if($address->student_address_p_state!=0)
	  		                echo $address->Rel_p_state->state_name;
	  				else
					echo "Not Set";?></td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">Town</td>
                                    <td class="table-cell-content">
					<?php if($address->student_address_c_city!=0)
			  		   echo $address->Rel_c_city->city_name;
              				   else
		   		           echo "Not Set";?></td>
                                    <td class="table-cell-title">Town</td>
                                    <td class="table-cell-content">
					<?php if($address->student_address_p_city!=0)
		  		           echo $address->Rel_p_city->city_name;
	  				    else
					   echo "Not Set";?></td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">Postcode</td>
                                    <td class="table-cell-content"><?php echo (!empty($address->student_address_c_pin) ? $address->student_address_c_pin : "Not Set");?></td>
                                    <td class="table-cell-title">Postcode</td>
                                    <td class="table-cell-content"><?php echo (!empty($address->student_address_p_pin) ? $address->student_address_p_pin : "Not Set");?></td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">Mobile No.</td>
                                    <td class="table-cell-content"><?php echo (!empty($address->student_address_c_mobile) ? $address->student_address_c_mobile :"Not Set");?></td>
                                    <td class="table-cell-title">Mobile No.</td>
                                    <td class="table-cell-content"><?php echo (!empty($address->student_address_p_phone) ? $address->student_address_p_phone : "Not Set" );?></td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">Phone No.</td>
                                    <td class="table-cell-content"><?php echo (!empty($address->student_address_c_phone) ? $address->student_address_c_phone : "Not Set");?></td>
                                    <td class="table-cell-title">Phone No.</td>
                                    <td class="table-cell-content"><?php echo (!empty($address->student_address_p_mobile) ? $address->student_address_p_mobile :"Not Set");?></td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">House No.</td>
                                    <td class="table-cell-content"><?php echo (!empty($address->student_c_house_no) ? $address->student_c_house_no : "Not Set");?></td>
                                    <td class="table-cell-title">House No.</td>
                                    <td class="table-cell-content"><?php echo (!empty($address->student_p_house_no) ? $address->student_p_house_no : "Not Set");?></td>
                                  </tr>
                                </table>
                            </div>
                        </div>
                    </div> 
                 </div>
                <!--Address Info Tab end-->
                <!--Documents Tab Start-->
                <div id="tab6" class="tab-content hide">
                    <div class="content-box-border" style="float: left; width: 100%;">
                        <div class="content-bg-he">Documents</div>
                        <div class="content-bg-inner" style="float: left; ">
                            <div class="content-bg-inner-one" style="float: left;">
 			     <?php 
			        $studentdocstrans = new StudentDocsTrans;
			        echo $this->renderPartial('application.modules.student.views.studentDocsTrans.studentdocstrans', array('studentdocstrans'=>$studentdocstrans), $this); 
			     ?>
                            </div>
                        </div>
                    </div> 
                 </div>
                <!--Documents Tab end-->
                <!--Cetificates Tab Start-->
                <div id="tab7" class="tab-content hide">
                    <div class="content-box-border" style="float: left; width: 100%;">
                        <div class="content-bg-he">Cetificates</div>
                        <div class="content-bg-inner" style="float: left;">
                            <div class="content-bg-inner-one" style="float: left;">
 			     <?php 
			        $studentcertificate = new StudentCertificateDetailsTable;
			        echo $this->renderPartial('application.modules.student.views.studentCertificateDetailsTable.studentcertificate', array('studentcertificate'=>$studentcertificate), $this); 
			     ?>
                            </div>
                        </div>
                    </div> 
                 </div>
                <!--Cetificates Tab end-->
                <!--Qualification Tab Start-->
                <!--div id="tab7" class="tab-content hide">
                    <div class="content-box-border">
                        <div class="content-bg-he">Qualification</div>
                        <div class="content-bg-inner">
                            <div class="content-bg-inner-one">
                                <table width="100%" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td class="table-cell-title" width="23%">Employee No</td>
                                    <td class="table-cell-content" width="23%">000051</td>
                                    <td class="table-cell-title" width="23%">Employee No</td>
                                    <td class="table-cell-content" width="23%">0001</td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">Name Alias</td>
                                    <td class="table-cell-content">RGK</td>
                                    <td class="table-cell-title">Employee Unique Id</td>
                                    <td class="table-cell-content">0001</td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">Gender</td>
                                    <td class="table-cell-content">Female</td>
                                    <td class="table-cell-title">Father Name</td>
                                    <td class="table-cell-content">Birju Bhai</td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">Mother Name</td>
                                    <td class="table-cell-content">Jayshree Ben</td>
                                    <td class="table-cell-title">Department</td>
                                    <td class="table-cell-content">Management</td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">AICTE ID</td>
                                    <td class="table-cell-content">12345</td>
                                    <td class="table-cell-title">GTU ID</td>
                                    <td class="table-cell-content">545645454</td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">Joining Date</td>
                                    <td class="table-cell-content">15-07-1980</td>
                                    <td class="table-cell-title">Probation Period</td>
                                    <td class="table-cell-content">6 Months</td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">Blood Group</td>
                                    <td class="table-cell-content">A+</td>
                                    <td class="table-cell-title">Birth Place</td>
                                    <td class="table-cell-content">Ahmedabad</td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">Martial Status</td>
                                    <td class="table-cell-content">Married</td>
                                    <td class="table-cell-title">Nationality</td>
                                    <td class="table-cell-content">Indian</td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">Type</td>
                                    <td class="table-cell-content">Teaching</td>
                                    <td class="table-cell-title">Organization Mobile</td>
                                    <td class="table-cell-content">+ 91 9898656556</td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">Bank Account No.</td>
                                    <td class="table-cell-content">454545454454445454</td>
                                    <td class="table-cell-title">Private Mobile</td>
                                    <td class="table-cell-content">+ 91 9898656562</td>
                                  </tr>
                                </table>
                            </div>
                        </div>
                    </div> 
                 </div-->
                <!--Qualification Tab end-->
            </div>             
            <div class="clear-div"></div>               
            <!--===============================Dashboard Boxes end============================-->       
    	
