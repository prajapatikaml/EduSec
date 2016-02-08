<?php
$this->breadcrumbs=array(
	'Employee Transactions'=>array('index'),
	$model->employee_transaction_id,
);

$this->menu=array(
	array('label'=>'List EmployeeTransaction', 'url'=>array('index')),
	array('label'=>'Create EmployeeTransaction', 'url'=>array('create')),
	array('label'=>'Update EmployeeTransaction', 'url'=>array('update', 'id'=>$model->employee_transaction_id)),
	array('label'=>'Delete EmployeeTransaction', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->employee_transaction_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EmployeeTransaction', 'url'=>array('admin')),
);
?>
<div class="content">
<h2><u>
<h3>View EmployeeTransaction #<?php echo $model->employee_transaction_id; ?></h3>
</u></h2>
<div class="menu1">
<div class="view11">
<h3><b><u>Personal Information</u></b></h3>
</div>
<div class="view13">
<?php echo '<lable><b>ID</b></lable>';?>
</div>
<div class="view12">
<?php echo ('&nbsp;');?>
</div>
<div class="view12">
<?php echo ('&nbsp;');?>
</div>
 
<div class="view12">
<?php echo $model->employee_transaction_id .'<br>'; ?>
</div>
<div class="view12">
<?php echo ('&nbsp;');?>
</div>
<div class="view12">
<?php echo ('&nbsp;');?>
</div>

<div class="view13">
<?php echo '<lable><b>First Name</b></lable>'; ?>
</div>
<div class="view13">
<?php echo '<lable><b>Middle Name</b></lable>'; ?>
</div>
<div class="view13">
<?php echo '<lable><b>Last Name</b></lable>'; ?>
</div>
<div class="view12">
<?php echo $model->Rel_Emp_Info->employee_first_name .'<br>'; ?>
</div>

<div class="view12">
<?php echo $model->Rel_Emp_Info->employee_middle_name .'<br>'; ?>
</div>

<div class="view12">
<?php echo $model->Rel_Emp_Info->employee_last_name .'<br>'; ?>
</div>

<div class="view13">
<?php echo '<lable><b>Alias Name</b></lable>'; ?>
</div>
<div class="view13">
<?php echo '<lable><b>DOB</b></lable>';?>
</div>
<div class="view13">
<?php echo '<lable><b>Birthplace</b></lable>'; ?>
</div>
<div class="view12">
<?php echo $model->Rel_Emp_Info->employee_name_alias .'<br>'; ?>
</div>

<div class="view12">
<?php echo $model->Rel_Emp_Info->employee_dob .'<br>'; ?>
</div>

<div class="view12">
<?php echo $model->Rel_Emp_Info->employee_birthplace .'<br>'; ?>
</div>

<div class="view13">
<?php echo '<lable><b>Gender</b></lable>';?>
</div>
<div class="view13">
<?php echo '<lable><b>Bloodgroup</b></lable>'; ?>
</div>
<div class="view13">
<?php echo '<lable><b>Marital Status</b></lable>'; ?>
</div>
<div class="view12">
<?php echo $model->Rel_Emp_Info->employee_gender .'<br>'; ?>
</div>

<div class="view12">
<?php echo $model->Rel_Emp_Info->employee_bloodgroup .'<br>'; ?>
</div>

<div class="view12">
<?php echo $model->Rel_Emp_Info->employee_marital_status .'<br>'; ?>
</div>

<div class="view11">
<h3><b><u>Guardian Information</u></b></h3>
</div>

<div class="view13">
<?php echo '<lable><b>Guardian Name</b></lable>' ; ?>
</div>
<div class="view13">
<?php echo '<lable><b>Guardian Relation</b></lable>' ; ?>
</div>
<div class="view12">
<?php echo ('&nbsp;');?>
</div>
<div class="view12">
<?php echo $model->Rel_Emp_Info->employee_guardian_name .'<br>'; ?>
</div>

<div class="view12">
<?php echo $model->Rel_Emp_Info->employee_guardian_relation .'<br>'; ?>
</div>
<div class="view12">
<?php echo ('&nbsp;');?>
</div>
<div class="view13">
<?php echo '<lable><b>Home Address</b></lable>' ;?>
</div>
<div class="view13">
<?php echo '<lable><b>Qualification</b></lable>' ;?>
</div>
<div class="view13">
<?php echo '<lable><b>Occupation</b></lable>' ; ?> 
</div>
<div class="view12">
<?php echo $model->Rel_Emp_Info->employee_guardian_home_address .'<br>'; ?>
</div>

<div class="view12">
<?php echo $model->Rel_Emp_Info->employee_guardian_qualification .'<br>'; ?>
</div>

<div class="view12">
<?php echo $model->Rel_Emp_Info->employee_guardian_occupation .'<br>'; ?>
</div>

<div class="view13">
<?php echo '<lable><b>Income</b> : </lable>' ; ?>
</div>
<div class="view13">
<?php echo '<lable><b>Occupation Address</b></lable>' ; ?>
</div>
<div class="view13">
<?php echo '<lable><b>Occupation City</b></lable>' ; ?>
</div>
<div class="view12">
<?php echo $model->Rel_Emp_Info->employee_guardian_income .'<br>'; ?>
</div>

<div class="view12">
<?php echo $model->Rel_Emp_Info->employee_guardian_occupation_address .'<br>'; ?>
</div>

<div class="view12">
<?php echo $model->Rel_Emp_Info->employee_guardian_occupation_city .'<br>'; ?>
</div>

<div class="view13">
<?php echo '<lable><b>City Pin</b></lable>' ; ?>
</div>

<div class="view12">
<?php echo ('&nbsp;');?>
</div>
<div class="view12">
<?php echo ('&nbsp;');?>
</div>

<div class="view12">
<?php echo $model->Rel_Emp_Info->employee_guardian_city_pin .'<br>'; ?>
</div>

<div class="view12">
<?php echo ('&nbsp;');?>
</div>
<div class="view12">
<?php echo ('&nbsp;');?>
</div>


<div class="view13">
<?php echo '<lable><b>Phone Number</b></lable>'; ?>
</div>
<div class="view13">
<?php echo '<lable><b>Mobile1</b></lable>'; ?>
</div>
<div class="view13">
<?php echo '<lable><b>Mobile2</b></lable>' ; ?>
</div>
<div class="view12">
<?php echo $model->Rel_Emp_Info->employee_guardian_phone_no .'<br>'; ?>
</div>
<div class="view12">
<?php echo $model->Rel_Emp_Info->employee_guardian_mobile1 .'<br>'; ?>
</div>

<div class="view12">
<?php echo $model->Rel_Emp_Info->employee_guardian_mobile2 .'<br>'; ?>
</div>

<div class="view13">
<?php echo '<lable><b>Faculty Of</b></lable>' ; ?>
</div>
<div class="view13">
<?php echo '<lable><b>Attendance Card Id</b></lable>'; ?>
</div>
<div class="view12">
<?php echo ('&nbsp;');?>
</div>

<div class="view12">
<?php echo $model->Rel_Emp_Info->employee_faculty_of .'<br>'; ?>
</div>

<div class="view12">
<?php echo $model->Rel_Emp_Info->employee_attendance_card_id .'<br>'; ?>
</div>
<div class="view12">
<?php echo ('&nbsp;');?>
</div>

<div class="view11">
<h3><b><u>Other Information</u></b></h3>
</div>

<div class="view13">
<?php echo '<lable><b>Private Email</b></lable>' ; ?>
</div>
<div class="view13">
<?php echo '<lable><b>Organization Mobile</b></lable>' ; ?>
</div>
<div class="view13">
<?php echo '<lable><b>Private Mobile</b></lable>' ; ?>
</div> 
<div class="view12">
<?php echo $model->Rel_Emp_Info->employee_private_email .'<br>'; ?>
</div>

<div class="view12">
<?php echo $model->Rel_Emp_Info->employee_organization_mobile .'<br>'; ?>
</div>

<div class="view12">
<?php echo $model->Rel_Emp_Info->employee_private_mobile .'<br>'; ?>
</div>

<div class="view13">
<?php echo '<lable><b>Pancard No</b></lable>' ; ?>
</div>
<div class="view13">
<?php echo '<lable><b>Account No</b></lable>'; ?> 
</div>
<div class="view13">
<?php echo '<lable><b>Joining Date</b></lable>' ; ?>
</div>
<div class="view12">
<?php echo $model->Rel_Emp_Info->employee_pancard_no .'<br>'; ?>
</div>

<div class="view12">
<?php echo $model->Rel_Emp_Info->employee_account_no .'<br>'; ?>
</div>

<div class="view12">
<?php echo $model->Rel_Emp_Info->employee_joining_date .'<br>'; ?>
</div>

<div class="view13">
<?php echo '<lable><b>Probation Period</b></lable>' ; ?>
</div>
<div class="view12">
<?php echo ('&nbsp;');?>
</div>
<div class="view12">
<?php echo ('&nbsp;');?>
</div>
<div class="view12">
<?php echo $model->Rel_Emp_Info->employee_probation_period .'<br>'; ?>
</div>
<div class="view12">
<?php echo ('&nbsp;');?>
</div>
<div class="view12">
<?php echo ('&nbsp;');?>
</div>
<div class="view13">
<?php echo '<lable><b>Hobbies</b></lable>' ; ?>
</div>
<div class="view13">
<?php echo '<lable><b>Technical Skills</b></lable>' ; ?>
</div>
<div class="view13">
<?php echo '<lable><b>Project Details</b></lable>' ;?>
</div>
<div class="view12">
<?php echo $model->Rel_Emp_Info->employee_hobbies .'<br>'; ?>
</div>

<div class="view12">
<?php echo $model->Rel_Emp_Info->employee_technical_skills .'<br>'; ?>
</div>

<div class="view12">
<?php echo $model->Rel_Emp_Info->employee_project_details .'<br>'; ?>
</div>
<div class="view13">
<?php echo '<lable><b>Curricular</b></lable>' ; ?>
</div>
<div class="view12">
<?php echo ('&nbsp;');?>
</div>
<div class="view12">
<?php echo ('&nbsp;');?>
</div>
<div class="view12">
<?php echo $model->Rel_Emp_Info->employee_curricular .'<br>' ; ?>
</div>
<div class="view12">
<?php echo ('&nbsp;');?>
</div>
<div class="view12">
<?php echo ('&nbsp;');?>
</div>

<div class="view13">
<?php echo '<lable><b>Reference </b></lable>' ; ?>
</div>
<div class="view13">
<?php echo '<lable><b>Refer Designation </b></lable>' ; ?>
</div>
<div class="view12">
<?php echo ('&nbsp;');?>
</div>


<div class="view12">
<?php echo $model->Rel_Emp_Info->employee_reference .'<br>'; ?>
</div>
<div class="view12">
<?php echo $model->Rel_Emp_Info->employee_refer_designation .'<br>'; ?>
</div>
<div class="view12">
<?php echo ('&nbsp;');?>
</div>

<div class="view11">
<h3><b><u>Transection Information</u></b></h3>
</div>


<div class="view13">
<?php echo '<lable><b> Branch Name </b></lable>' ; ?>
</div>
<div class="view13">
<?php echo '<lable><b>Category Name </b></lable>' ;?>
</div>
<div class="view13">
<?php echo '<lable><b>Quota Name </b></lable>'; ?>
</div> 

<div class="view12">
<?php echo $model->Rel_Branch->branch_name .'<br>'; ?>
</div>

<div class="view12">
<?php echo $model->Rel_Category->category_name .'<br>'; ?>
</div>

<div class="view12">
<?php echo$model->Rel_Quota->quota_name .'<br>'; ?>
</div>

<div class="view13">
<?php echo '<lable><b>Religion Name </b></lable>' ; ?>
</div>
<div class="view13">
<?php echo '<lable><b>Shift Type </b></lable>' ; ?>
</div>
<div class="view13">
<?php echo '<lable><b>Designation Name </b></lable>' ; ?>
</div>

<div class="view12">
<?php echo $model->Rel_Religion->religion_name .'<br>'; ?>
</div>

<div class="view12">
<?php echo $model->Rel_Shift->shift_type .'<br>'; ?>
</div>

<div class="view12">
<?php echo $model->Rel_Designation->employee_designation_name .'<br>'; ?>
</div>

<div class="view13">
<?php echo '<lable><b>Nationality Name </b></lable>' ; ?>
</div>
<div class="view13">
<?php echo '<lable><b>Department Name </b></lable>' ;?>
</div>
<div class="view13">
<?php echo '<lable><b>Organization Name </b></lable>' ;?>
</div>
<div class="view12">
<?php echo $model->Rel_Nationality->nationality_name .'<br>'; ?>
</div>

<div class="view12">
<?php echo $model->Rel_Department->department_name .'<br>'; ?>
</div>

<div class="view12">
<?php echo $model->Rel_Organization->organization_name .'<br>'; ?>
</div>

<div class="view11">
<h3><b><u>Address Information</u></b></h3>
</div>


<div class="view13">
<?php echo '<lable><b>Current Address line1</b></lable>'; ?>
</div>
<div class="view13">
<?php echo '<lable><b>Current Address line2</b></lable>'; ?>
</div>
<div class="view13">
<?php echo '<lable><b>Current City</b></lable>'; ?>
</div>

<div class="view12">
<?php echo $model->Rel_Employee_Address->employee_address_c_line1 .'<br>'; ?>
</div>
<div class="view12">
<?php echo $model->Rel_Employee_Address->employee_address_c_line2 .'<br>'; ?>
</div>
<div class="view12">
<?php echo $model->Rel_Employee_Address->employee_address_c_city .'<br>'; ?>
</div>


<div class="view13">
<?php echo '<lable><b>City Pincode</b></lable>'; ?>
</div>
<div class="view13">
<?php echo '<lable><b>Current State</b></lable>'; ?>
</div>
<div class="view13">
<?php echo '<lable><b>Current Country</b></lable>'; ?>
</div>

<div class="view12">
<?php echo $model->Rel_Employee_Address->employee_address_c_pincode .'<br>'; ?>
</div>
<div class="view12">
<?php echo $model->Rel_Employee_Address->employee_address_c_state .'<br>'; ?>
</div>
<div class="view12">
<?php echo $model->Rel_Employee_Address->employee_address_c_country .'<br>'; ?>
</div>


<div class="view13">
<?php echo '<lable><b>Permannent Address line1</b></lable>'; ?>
</div>
<div class="view13">
<?php echo '<lable><b>Permannent  City</b></lable>'; ?>
</div>
<div class="view13">
<?php echo '<lable><b>City Pincode</b></lable>'; ?>
</div>
<div class="view12">
<?php echo $model->Rel_Employee_Address->employee_address_p_line1 .'<br>'; ?>
</div>
<div class="view12">
<?php echo $model->Rel_Employee_Address->employee_address_p_city .'<br>'; ?>
</div>
<div class="view12">
<?php echo $model->Rel_Employee_Address->employee_address_p_pincode .'<br>'; ?>
</div>


<div class="view13">
<?php echo '<lable><b>Current State</b></lable>'; ?>
</div>
<div class="view13">
<?php echo '<lable><b>Permannent  Country</b></lable>'; ?>
</div>
<div class="view13">
<?php echo '<lable><b>Phone Number</b></lable>'; ?>
</div>
<div class="view12">
<?php echo $model->Rel_Employee_Address->employee_address_c_state .'<br>'; ?>
</div>
<div class="view12">
<?php echo $model->Rel_Employee_Address->employee_address_c_country .'<br>'; ?>
</div>
<div class="view12">
<?php echo $model->Rel_Employee_Address->employee_address_phone .'<br>'; ?>
</div>

<div class="view13">
<?php echo '<lable><b>Mobile Number</b></lable>'; ?>
</div>
<div class="view12">
<?php echo ('&nbsp;');?>
</div>
<div class="view12">
<?php echo ('&nbsp;');?>
</div>
<div class="view12">
<?php echo $model->Rel_Employee_Address->employee_address_mobile .'<br>'; ?>
</div>
<div class="view12">
<?php echo ('&nbsp;');?>
</div>
<div class="view12">
<?php echo ('&nbsp;');?>
</div>


</div>
</div>






