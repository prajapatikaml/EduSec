<script>
$( document ).ready(function() {
var editLinkPath = '<?php echo Yii::app()->baseUrl; ?>';
  $("#guardian-tab").click(function(event) {
      $('#updateData').attr('href', editLinkPath + '/employee/employeeTransaction/updateprofiletab2?id=' + '<?php echo $_REQUEST["id"]; ?>');
 });

 $("#other-tab").click(function(event) {
      $('#updateData').attr('href', editLinkPath + '/employee/employeeTransaction/updateprofiletab3?id=' + '<?php echo $_REQUEST["id"]; ?>');
 });

 $("#add-tab").click(function(event) {
      $('#updateData').attr('href', editLinkPath + '/employee/employeeTransaction/updateprofiletab4?id=' + '<?php echo $_REQUEST["id"]; ?>');
 });

 $("#personal-tab").click(function(event) {
      $('#updateData').attr('href', editLinkPath + '/employee/employeeTransaction/updateprofiletab1?id=' + '<?php echo $_REQUEST["id"]; ?>');
 });

});
</script>
            <div class="clear-div"></div>
            <div class="profile-page-box">
                <!--===============================Page header start============================-->
                <div class="page-title-header"><i class="fa fa-plus"></i> View Employee Profile</div>
                <!--===============================Page header end============================-->
		<?php $empInfo = EmployeeTransaction::model()->findByPk($_REQUEST['id']); 
		      $emppicPath = EmployeePhotos::model()->findByPk($empInfo->employee_transaction_emp_photos_id);
			  $emp_photo=Yii::app()->baseUrl."/college_data/emp_images/".$emppicPath->employee_photos_path;		
		?>
                <!--Profile Tab Start-->
                <div class="profile-box-bg">
                	<div class="profilebox-left">
                    	<div class="profile-image-tab">
		<?php  if(Yii::app()->user->checkAccess('EmployeeTransaction.UpdateEmployeeData')  && (Yii::app()->user->getState('emp_id') == $_REQUEST['id']) || Yii::app()->user->checkAccess('EmployeeTransaction.UpdateAllEmployeeData') && $model->employee_status==0)  { ?>
			<a title="Change Picture" href ="<?php echo Yii::app()->baseUrl.'/employee/employeeTransaction/updateprofilephoto?id='.$_REQUEST['id']; ?>">
		<?php   }?>
                            <div class="profile-box-user"><img src="<?php echo $emp_photo;?>" width="200" height="200"></a></div>
                        </div>
                    </div>
                    <div class="profilebox-middle" style="font-family : sans-serif; ">
                    	<div class="profile-username"><?php echo $empInfo->Rel_Emp_Info->employee_first_name.' '.$empInfo->Rel_Emp_Info->employee_last_name ;?> </div>
                        <div style="color: rgb(85, 85, 85); font-size: 15px; height: 35px; line-height: 35px;"><i class="fa fa-sort-amount-desc" style="width: 30px; color: #D9534F;"></i> Department : <?php echo (!empty($empInfo->Rel_Department->department_name) ? $empInfo->Rel_Department->department_name : "Not Set");?></div>
                        <div style="color: rgb(85, 85, 85); font-size: 15px; height: 35px; line-height: 35px;"><i class="fa fa-users" style="width: 30px; color: #D9534F; "></i> Designation : <?php echo (!empty($empInfo->Rel_Designation->employee_designation_name) ? $empInfo->Rel_Designation->employee_designation_name : "Not Set");?></div>
			<?php if($empInfo->Rel_Emp_Info->employee_private_mobile != '')  { ?>
                        <div class="phoneno-display" style="color: rgb(85, 85, 85); font-size: 15px; height: 35px; line-height: 35px;"><i class="fa fa-mobile" style="width: 30px; font-size: 25px; color: #D9534F;"></i> Mobile : <?php echo $empInfo->Rel_Emp_Info->employee_private_mobile; ?></div>
			<?php } ?>
                    </div>
                    <div class="profilebox-right">
                    	<div class="btn-group">
                            <ul class="button-display">
                                <li><?php echo CHtml::link('<i class="fa fa-angle-double-left"></i> Back', array('admin'), array('class'=>'btn btn-default btnradious'));?></li>
                                <li><?php  echo CHtml::link('<i class="fa fa-file-pdf-o"></i> PDF',array('ExportToPDFExcel/EmployeeFinalViewExportToPdf', 'id'=>$_REQUEST['id']),array('id'=>'pdf','class'=>'btn btn-pdf','target'=>'_blank')); ?></li>
                                <!--li><button name="color" type="button" class="btn btn-excel"><i class="fa fa-file-excel-o"></i> Excel</button></li-->
		<?php if(Yii::app()->user->checkAccess('Employee.EmployeeTransaction.Create')) { ?>
                                <li><?php echo CHtml::link('<i class="fa fa-plus-square"></i> Add', array('employeeTransaction/create'), array('class'=>'btn btn-add')); ?></li>
		<?php }?>
			<?php if(Yii::app()->user->checkAccess('Employee.EmployeeTransaction.Updateprofiletab1')) { ?>
                                <li><?php echo CHtml::link('<i class="fa fa-wrench"></i> Edit', array('updateprofiletab1' ,'id'=>$model->employee_transaction_id), array('class'=>'btn btn-edit', 'id'=>'updateData'));?></li>
			<?php }
			 if(Yii::app()->user->checkAccess('Employee.EmployeeTransaction.Delete')) { ?>
                                <li><?php echo CHtml::link('<i class="fa fa-trash-o"></i> Delete', array('delete' ,'id'=>$empInfo->employee_transaction_id), array('class'=>'btn btn-delete btnradious-last'));?></li>
			<?php   } ?>
                            </ul>
                      	</div>
                    </div>
                    <div class="clear-div"></div>  
                </div>
                <div class="profile-tab-he">                	
                	<ul class="pronav nav-tabs">
                      <li class="activetab"><a href="#tab1" id="personal-tab">Profile</a></li>
                      <li><a href="#tab2" id="guardian-tab">Guardian Info</a></li>
                      <li><a href="#tab3" id="other-tab">Other Info</a></li>
                      <li><a href="#tab4" id="add-tab">Address Info</a></li>
                      <li><a href="#tab5">Documents</a></li>
                      <li><a href="#tab6">Cetificates</a></li>
                      <!--li><a href="#tab7">Qualification</a></li-->
                    </ul><div class="clear-div"></div>  
                </div>
                <div id="tab1" class="tab-content active">
                    <div class="content-box-border">
                        <div class="content-bg-he">Profile</div>
                        <div class="content-bg-inner">
                            <div class="content-bg-inner-one">
				<?php
			$info = EmployeeInfo::model()->findByPk($empInfo->employee_transaction_employee_id); 
				?>
                                <table width="100%" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td class="table-cell-title" width="23%">Employee No</td>
                                    <td class="table-cell-content" width="23%"><?php echo (!empty($empInfo->Rel_Emp_Info->employee_no) ? $empInfo->Rel_Emp_Info->employee_no : "Not Set");?></td>
                                    <td class="table-cell-title" width="23%">Employee Unique Id</td>
                                    <td class="table-cell-content" width="23%"><?php echo (!empty($info->employee_unique_id) ? $info->employee_unique_id : "Not Set");?></td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">Name Alias</td>
                                    <td class="table-cell-content"><?php echo (!empty($info->employee_name_alias) ? $info->employee_name_alias : "Not Set");?></td>
                                    <td class="table-cell-title">Private Email </td>
                                    <td class="table-cell-content"><?php echo (!empty($info->employee_private_email) ? $info->employee_private_email : "Not Set");?></td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">Designation</td>
                                    <td class="table-cell-content"><?php echo (!empty($empInfo->Rel_Designation->employee_designation_name) ? $empInfo->Rel_Designation->employee_designation_name : "Not Set");?></td>
                                    <td class="table-cell-title">Title</td>
                                    <td class="table-cell-content"><?php echo (!empty($info->title) ? $info->title :"Not Set");?></td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">First Name</td>
                                    <td class="table-cell-content"><?php echo (!empty($info->employee_first_name) ? $info->employee_first_name : "Not Set");?></td>
                                    <td class="table-cell-title">Middle Name</td>
                                    <td class="table-cell-content"><?php echo (!empty($info->employee_middle_name) ? $info->employee_middle_name : "Not Set") ;?></td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">Last Name</td>
                                    <td class="table-cell-content"><?php echo $info->employee_last_name;?></td>
                                    <td class="table-cell-title">Mother Name</td>
                                    <td class="table-cell-content"><?php echo (!empty($info->employee_mother_name) ? $info->employee_mother_name : "Not Set");?></td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">Gender</td>
                                    <td class="table-cell-content"><?php echo (!empty($info->employee_gender) ? $info->employee_gender : "Not Set");?></td>
                                    <td class="table-cell-title">Department</td>
                                    <td class="table-cell-content"><?php echo (!empty($empInfo->Rel_Department->department_name) ? $empInfo->Rel_Department->department_name : "Not Set");?></td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">Joining Date</td>
                                    <td class="table-cell-content">
				  <?php if($info->employee_joining_date!=null)
					  echo date('d-m-Y',strtotime($info->employee_joining_date));
					else
					  echo "Not Set";
				    ?></td>
                                    <td class="table-cell-title">Probation Period</td>
                                    <td class="table-cell-content"><?php echo (!empty($info->employee_probation_period) ? $info->employee_probation_period : "Not Set");?></td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">Date of Birth</td>
                                    <td class="table-cell-content">
					<?php if($info->employee_dob!=null)
						echo date('d-m-Y',strtotime($info->employee_dob));
					      else
						echo "Not Set";
					?>
					</td>
                                    <td class="table-cell-title">Birth Place</td>
                                    <td class="table-cell-content"><?php echo (!empty($info->employee_birthplace) ? $info->employee_birthplace : "Not Set");?></td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">Blood Group</td>
                                    <td class="table-cell-content"><?php echo (!empty($info->employee_bloodgroup) ? $info->employee_bloodgroup : "Not Set");?></td>
                                    <td class="table-cell-title">Nationality</td>
                                    <td class="table-cell-content">
					<?php if($empInfo->employee_transaction_nationality_id != null)
						echo $empInfo->Rel_Nationality->nationality_name;
					else
						echo "Not Set";
					?></td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">Marital Status</td>
                                    <td class="table-cell-content"><?php echo (!empty($info->employee_marital_status) ? $info->employee_marital_status : "Not Set");?></td>
                                    <td class="table-cell-title">Type</td>
                                    <td class="table-cell-content">
				<?php 
					if($info->employee_type ==1)
					echo "Teaching";
					else
					echo "Non-Teaching";
				?></td>
                                  </tr>
				 <tr>
                                    <td class="table-cell-title">Bank Account No.</td>
                                    <td class="table-cell-content"><?php echo (!empty($info->employee_account_no) ? $info->employee_account_no : "Not Set");?></td>
                                    <td class="table-cell-title">Institute Mobile</td>
                                    <td class="table-cell-content"><?php echo (!empty($info->employee_organization_mobile) ? $info->employee_organization_mobile : "Not Set");?></td>
                                  </tr>
				  <tr>
                                    <td class="table-cell-title">Private Mobile No.</td>
                                    <td class="table-cell-content"><?php echo (!empty($info->employee_private_mobile) ? $info->employee_private_mobile : "Not Set");?></td>
                                  </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> 
                <!--Profile Tab end-->
                <!--Gaurdian Tab Start-->
                <div id="tab2" class="tab-content hide">
                    <div class="content-box-border">
                        <div class="content-bg-he">Guardian Info</div>
                        <div class="content-bg-inner">
                            <div class="content-bg-inner-one">
                                <table width="100%" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td class="table-cell-title" width="23%">Name</td>
                                    <td class="table-cell-content" width="23%"><?php echo (!empty($info->employee_guardian_name) ? $info->employee_guardian_name : "Not Set");?></td>
                                    <td class="table-cell-title" width="23%">Relation</td>
                                    <td class="table-cell-content" width="23%"><?php echo (!empty($info->employee_guardian_relation) ? $info->employee_guardian_relation : "Not Set");?></td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">Qualification</td>
                                    <td class="table-cell-content"><?php echo (!empty($info->employee_guardian_qualification) ? $info->employee_guardian_qualification : "Not Set");?></td>
                                    <td class="table-cell-title">Occupation</td>
                                    <td class="table-cell-content"> <?php echo (!empty($info->employee_guardian_occupation) ? $info->employee_guardian_occupation : "Not Set");?></td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">Annual Income</td>
                                    <td class="table-cell-content"><?php echo (!empty($info->employee_guardian_income) ? $info->employee_guardian_income : "Not Set");?></td>
                                    <td class="table-cell-title">Home Address</td>
                                    <td class="table-cell-content"><?php echo (!empty($info->employee_guardian_home_address) ? $info->employee_guardian_home_address : "Not Set");?></td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">Occupation Address</td>
                                    <td class="table-cell-content"><?php echo (!empty($info->employee_guardian_occupation_address) ? $info->employee_guardian_occupation_address : "Not Set");?></td>
                                    <td class="table-cell-title">Occupation City</td>
                                    <td class="table-cell-content">	    
				<?php if($info->employee_guardian_occupation_city!=0)
					    echo $info->Rel_g_city->city_name;
				   else
					   echo "Not Set";
				?></td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">City Pincode</td>
                                    <td class="table-cell-content"><?php echo (!empty($info->employee_guardian_city_pin) ? $info->employee_guardian_city_pin : "Not Set");?></td>
                                    <td class="table-cell-title">Mobile 1</td>
                                    <td class="table-cell-content"><?php echo (!empty($info->employee_guardian_mobile1) ? $info->employee_guardian_mobile1 : "Not Set");?></td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">Mobile 2</td>
                                    <td class="table-cell-content"><?php echo (!empty($info->employee_guardian_mobile2) ? $info->employee_guardian_mobile2 : "Not Set");?></td>
                                    <td class="table-cell-title">Phone</td>
                                    <td class="table-cell-content"><?php echo (!empty($info->employee_guardian_phone_no) ? $info->employee_guardian_phone_no : "Not Set");?></td>
                                  </tr>
                                </table>
                            </div>
                        </div>
                    </div> 
                 </div>
                <!--Gaurdian Tab end-->
                <!--Other Info Tab Start-->
                <div id="tab3" class="tab-content hide">
                    <div class="content-box-border">
                        <div class="content-bg-he">Other Info</div>
                        <div class="content-bg-inner">
                            <div class="content-bg-inner-one">
                                <table width="100%" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td class="table-cell-title" width="23%">Attendance card id</td>
                                    <td class="table-cell-content" width="23%"><?php echo (!empty($info->employee_attendance_card_id) ? $info->employee_attendance_card_id : "Not Set");?></td>
                                    <td class="table-cell-title" width="23%">Curricular</td>
                                    <td class="table-cell-content" width="23%"><?php echo (!empty($info->employee_curricular) ? $info->employee_curricular : "Not Set");?></td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">Technical Skills</td>
                                    <td class="table-cell-content"><?php echo (!empty($info->employee_technical_skills) ? $info->employee_technical_skills : "Not Set");?></td>
                                    <td class="table-cell-title">Project Details</td>
                                    <td class="table-cell-content"><?php echo (!empty($info->employee_project_details) ? $info->employee_project_details : "Not Set");?></td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">EPF Number</td>
                                    <td class="table-cell-content"><?php echo (!empty($info->employee_pf_id) ? $info->employee_pf_id : "Not Set");?></td>
                                    <td class="table-cell-title">Hobbies</td>
                                    <td class="table-cell-content"><?php echo (!empty($info->employee_hobbies) ? $info->employee_hobbies : "Not Set");?></td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">Language Known</td>
                                    <td class="table-cell-content" style="word-wrap:break-word; table-layout:fixed;"><?php echo (!empty($lang->languages_known1) ? $lang->languages_known1 :"Not Set");;?></td>
                                    <td class="table-cell-title">Reference</td>
                                    <td class="table-cell-content"> <?php echo (!empty($info->employee_reference) ? $info->employee_reference : "Not Set");?></td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">Reference Designation</td>
                                    <td class="table-cell-content"> <?php echo (!empty($info->employee_refer_designation) ? $info->employee_refer_designation : "Not Set");?></td>
                                  </tr>
                                </table>
                            </div>
                        </div>
                    </div> 
                 </div>
                <!--Other Info Tab end-->
                <!--Address Info Tab Start-->
                <div id="tab4" class="tab-content hide">
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
			<?php $address = EmployeeAddress::model()->findByPk($empInfo->employee_transaction_emp_address_id);?>
                                    <td class="table-cell-title" width="23%">Street 1</td>
                                    <td class="table-cell-content" width="23%"><?php echo (!empty($address->employee_address_c_line1) ? $address->employee_address_c_line1 :"Not Set"); ?></td>
                                    <td class="table-cell-title" width="23%">Street 1</td>
                                    <td class="table-cell-content" width="23%"><?php echo (!empty($address->employee_address_p_line1) ? $address->employee_address_p_line1 : "Not Set");?></td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">Street 2</td>
                                    <td class="table-cell-content"><?php echo (!empty($address->employee_address_c_line2) ? $address->employee_address_c_line2 : "Not Set"); ?></td>
                                    <td class="table-cell-title">Street 2</td>
                                    <td class="table-cell-content"><?php echo (!empty($address->employee_address_p_line2) ? $address->employee_address_p_line2 :"Not Set");?></td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">Country</td>
                                    <td class="table-cell-content">
				<?php if($address->employee_address_c_country!=0)
					echo $address->Rel_c_country->name; 
	      			      else
					echo "Not Set";?></td>
                                    <td class="table-cell-title">Country</td>
                                    <td class="table-cell-content">
				    <?php if($address->employee_address_p_country!=0)
					   echo $address->Rel_p_country->name; 
	  				  else
					   echo "Not Set";?></td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">State</td>
                                    <td class="table-cell-content">
				   <?php if($address->employee_address_c_state!=0)
			  		 echo $address->Rel_c_state->state_name;
             				else
					 echo "Not Set";?></td>
                                    <td class="table-cell-title">State</td>
                                    <td class="table-cell-content">
				  <?php if($address->employee_address_p_state!=0)
	  		                echo $address->Rel_p_state->state_name;
	  				else
					echo "Not Set";?></td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">Town</td>
                                    <td class="table-cell-content">
					<?php if($address->employee_address_c_city!=0)
			  		   echo $address->Rel_c_city->city_name;
              				   else
		   		           echo "Not Set";?></td>
                                    <td class="table-cell-title">Town</td>
                                    <td class="table-cell-content">
					<?php if($address->employee_address_p_city!=0)
		  		           echo $address->Rel_p_city->city_name;
	  				    else
					   echo "Not Set";?></td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">Postcode</td>
                                    <td class="table-cell-content"><?php echo (!empty($address->employee_address_c_pincode) ? $address->employee_address_c_pincode : "Not Set");?></td>
                                    <td class="table-cell-title">Postcode</td>
                                    <td class="table-cell-content"><?php echo (!empty($address->employee_address_p_pincode) ? $address->employee_address_p_pincode : "Not Set");?></td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">Mobile No.</td>
                                    <td class="table-cell-content"><?php echo (!empty($address->employee_address_c_mobile) ? $address->employee_address_c_mobile :"Not Set");?></td>
                                    <td class="table-cell-title">Mobile No.</td>
                                    <td class="table-cell-content"><?php echo (!empty($address->employee_address_p_phone) ? $address->employee_address_p_phone : "Not Set" );?></td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">Phone No.</td>
                                    <td class="table-cell-content"><?php echo (!empty($address->employee_address_c_phone) ? $address->employee_address_c_phone : "Not Set");?></td>
                                    <td class="table-cell-title">Phone No.</td>
                                    <td class="table-cell-content"><?php echo (!empty($address->employee_address_p_mobile) ? $address->employee_address_p_mobile :"Not Set");?></td>
                                  </tr>
                                  <tr>
                                    <td class="table-cell-title">House No.</td>
                                    <td class="table-cell-content"><?php echo (!empty($address->employee_c_house_no) ? $address->employee_c_house_no : "Not Set");?></td>
                                    <td class="table-cell-title">House No.</td>
                                    <td class="table-cell-content"><?php echo (!empty($address->employee_p_house_no) ? $address->employee_p_house_no : "Not Set");?></td>
                                  </tr>
                                </table>
                            </div>
                        </div>
                    </div> 
                 </div>
                <!--Address Info Tab end-->
                <!--Documents Tab Start-->
                <div id="tab5" class="tab-content hide">
                    <div class="content-box-border" style="float: left; width: 100%;">
                        <div class="content-bg-he">Documents</div>
                        <div class="content-bg-inner" style="float: left;">
                            <div class="content-bg-inner-one" style="float: left;">
                                <?php 
			        $employeeDocsTrans = new EmployeeDocsTrans;
			        echo $this->renderPartial('application.modules.employee.views.employeeDocsTrans.employeedocs', array('emp_doc'=>$employeeDocsTrans), $this); 
			     ?>
                            </div>
                        </div>
                    </div> 
                 </div>
                <!--Documents Tab end-->
                <!--Cetificates Tab Start-->
                <div id="tab6" class="tab-content hide">
                    <div class="content-box-border" style="float: left; width: 100%;">
                        <div class="content-bg-he">Cetificates</div>
                        <div class="content-bg-inner" style="float: left;">
                            <div class="content-bg-inner-one" style="float: left;">
                                <?php 
			        $employeecertificate = new EmployeeCertificateDetailsTable;
			        echo $this->renderPartial('application.modules.employee.views.employeeCertificateDetailsTable.employeecertificate', array('employeecertificate'=>$employeecertificate), $this); 
			     ?>
                            </div>
                        </div>
                    </div> 
                 </div>
                <!--Cetificates Tab end-->
                <!--Qualification Tab Start-->
                <div id="tab7" class="tab-content hide">
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
                 </div>
                <!--Qualification Tab end-->
            </div>             
            <div class="clear-div"></div>   
