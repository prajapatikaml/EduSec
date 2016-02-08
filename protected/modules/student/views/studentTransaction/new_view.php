<?php
$this->breadcrumbs=array(
	'Student Transactions'=>array('index'),
	$model->student_transaction_id,
);

$this->menu=array(
	array('label'=>'List Student Transaction', 'url'=>array('index')),
	array('label'=>'Create Student Transaction', 'url'=>array('create')),
	array('label'=>'Update Student Transaction', 'url'=>array('update', 'id'=>$model->student_transaction_id)),
	array('label'=>'Delete Student Transaction', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->student_transaction_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Student Transaction', 'url'=>array('admin')),
);
?>
<div class="content">
<h2><u>
<h3>View StudentTransaction #<?php echo $model->student_transaction_id; ?></h3>
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
<?php echo $model->student_transaction_id .'<br>'; ?>
</div>
<div class="view12">
<?php echo ('&nbsp;');?>
</div>
<div class="view12">
<?php echo ('&nbsp;');?>
</div>
<div class="view13">
<?php echo '<lable><b>RollNo</b></lable>'; ?>
</div>
<div class="view13">
<?php echo '<lable><b>Merit Number</b></lable>'; ?>
</div>
<div class="view13">
<?php echo '<lable><b>Enrollment Number</b></lable>'; ?>
</div>

<div class="view12">
<?php echo $model->Rel_Stud_Info->student_roll_no .'<br>'; ?>
</div>
<div class="view12">
<?php echo $model->Rel_Stud_Info->student_merit_no .'<br>'; ?>
</div>
<div class="view12">
<?php echo $model->Rel_Stud_Info->student_enroll_no .'<br>'; ?>
</div>


<div class="view13">
<?php echo '<lable><b>First Name</b></lable>';?>
</div>
<div class="view13">
<?php echo '<lable><b>Middle Name</b></lable>';?>
</div>
<div class="view13">
<?php echo '<lable><b>Last Name</b></lable>';?>
</div>

<div class="view12">
<?php echo $model->Rel_Stud_Info->student_first_name .'<br>'; ?>
</div>
<div class="view12">
<?php echo $model->Rel_Stud_Info->student_middle_name.'<br>'; ?>
</div>
<div class="view12">
<?php echo $model->Rel_Stud_Info->student_last_name.'<br>'; ?>
</div>
<div class="view13">
<?php echo '<lable><b>Father Name</b></lable>';?>
</div>
<div class="view13">
<?php echo '<lable><b>Mother Name</b></lable>';?>
</div>
<div class="view13">
<?php echo '<lable><b>Gender</b></lable>';?>
</div>

<div class="view12">
<?php echo $model->Rel_Stud_Info->student_father_name.'<br>'; ?>
</div>
<div class="view12">
<?php echo $model->Rel_Stud_Info->student_mother_name.'<br>'; ?>
</div>
<div class="view12">
<?php echo $model->Rel_Stud_Info->student_gender.'<br>'; ?>
</div>
<div class="view13">
<?php echo '<lable><b>Admissionn Date</b></lable>';?>
</div>
<div class="view13">
<?php echo '<lable><b>Date of Birth</b></lable>';?>
</div>
<div class="view13">
<?php echo '<lable><b>BirthPlace</b></lable>';?>
</div>
<div class="view12">
<?php echo $model->Rel_Stud_Info->student_adm_date.'<br>'; ?>
</div>
<div class="view12">
<?php echo $model->Rel_Stud_Info->student_dob.'<br>'; ?>
</div>
<div class="view12">
<?php echo $model->Rel_Stud_Info->student_birthplace.'<br>'; ?>
</div>


<div class="view11">
<h3><b><u>Guardian Information</u></b></h3>
</div>
<div class="view13">
<?php echo '<lable><b>Name</b></lable>';?>
</div>
<div class="view13">
<?php echo '<lable><b>Relation</b></lable>';?>
</div>
<div class="view13">
<?php echo '<lable><b>Qualification</b></lable>';?>
</div>

<div class="view12">
<?php echo $model->Rel_Stud_Info->student_guardian_name.'<br>'; ?>
</div>
<div class="view12">
<?php echo $model->Rel_Stud_Info->student_guardian_relation.'<br>'; ?>
</div>
<div class="view12">
<?php echo $model->Rel_Stud_Info->student_guardian_qualification. '<br>'; ?>
</div>
<div class="view13">
<?php echo '<lable><b>Occupation</b></lable>';?>
</div>
<div class="view13">
<?php echo '<lable><b>Occupation Address</b></lable>';?>
</div>
<div class="view13">
<?php echo '<lable><b>Occupation City</b></lable>';?>
</div>

<div class="view12">
<?php echo $model->Rel_Stud_Info->student_guardian_occupation. '<br>'; ?>
</div>
<div class="view12">
<?php echo $model->Rel_Stud_Info->student_guardian_occupation_address. '<br>'; ?>
</div>
<div class="view12">
<?php echo $model->Rel_Stud_Info->student_guardian_occupation_city.  '<br>'; ?>
</div>
<div class="view13">
<?php echo '<lable><b>Occupation City pin</b></lable>';?>
</div>
<div class="view13">
<?php echo '<lable><b>income</b></lable>';?>
</div>
<div class="view13">
<?php echo '<lable><b>Home Address</b></lable>';?>
</div>

<div class="view12">
<?php echo $model->Rel_Stud_Info->student_guardian_city_pin.  '<br>'; ?>
</div>
<div class="view12">
<?php echo $model->Rel_Stud_Info->student_guardian_income. '<br>'; ?>
</div>
<div class="view12">
<?php echo $model->Rel_Stud_Info->student_guardian_home_address.  '<br>'; ?>
</div>
<div class="view13">
<?php echo '<lable><b>Phone Number</b></lable>';?>
</div>
<div class="view13">
<?php echo '<lable><b>Mobile</b></lable>';?>
</div>
<div class="view12">
<?php echo ('&nbsp;');?>
</div>

<div class="view12">
<?php echo $model->Rel_Stud_Info->student_guardian_phoneno.  '<br>'; ?>
</div>

<div class="view12">
<?php echo $model->Rel_Stud_Info->student_guardian_mobile.  '<br>'; ?>
</div>
<div class="view12">
<?php echo ('&nbsp;');?>
</div>

<div class="view11">
<h3><b><u>Other Information</u></b></h3>
</div>


<div class="view13">
<?php echo '<lable><b>Email Id 1</b></lable>';?>
</div>
<div class="view13">
<?php echo '<lable><b>Email Id 2</b></lable>';?>
</div>
<div class="view13">
<?php echo '<lable><b>Bloodgroup</b></lable>';?>
</div>
<div class="view12">
<?php echo $model->Rel_Stud_Info->student_email_id_1.  '<br>'; ?>
</div>
<div class="view12">
<?php echo $model->Rel_Stud_Info->student_email_id_2.  '<br>'; ?>
</div>
<div class="view12">
<?php echo $model->Rel_Stud_Info->student_bloodgroup.  '<br>'; ?>
</div>

<div class="view13">
<?php echo '<lable><b>Tally Id</b></lable>'; ?>
</div>
<div class="view12">
<?php echo ('&nbsp;');?>
</div>
<div class="view12">
<?php echo ('&nbsp;');?>
</div>

<div class="view12">
<?php echo ('&nbsp;');?>
</div>
<div class="view12">
<?php echo ('&nbsp;');?>
</div>

<div class="view11">
<h3><b><u>Transection Information</u></b></h3>
</div>

<div class="view13">
<?php echo '<lable><b>Branch Name</b></lable>'; ?>
</div>
<div class="view13">
<?php echo '<lable><b>Category Name</b></lable>'; ?>
</div>
<div class="view13">
<?php echo '<lable><b>Organization Name</b></lable>'; ?>
</div>

<div class="view12">
<?php echo $model->Rel_Branch->branch_name .'<br>'; ?>
</div>

<div class="view12">
<?php echo $model->Rel_Category->category_name .'<br>'; ?>
</div>

<div class="view12">
<?php echo $model->Rel_Organization->organization_name .'<br>'; ?>
</div>

<div class="view13">
<?php echo '<lable><b>Nationality Name</b></lable>'; ?>
</div>
<div class="view13">
<?php echo '<lable><b>Quota Name</b></lable>'; ?>
</div>
<div class="view13">
<?php echo '<lable><b>Religion Name</b></lable>'; ?>
</div>
<div class="view12">
<?php echo $model->Rel_Nationality->nationality_name .'<br>'; ?>
</div>
<div class="view12">
<?php echo $model->Rel_Quota->quota_name .'<br>'; ?>
</div>
<div class="view12">
<?php echo $model->Rel_Religion->religion_name .'<br>'; ?>
</div>

<div class="view13">
<?php echo '<lable><b>Shift Type</b></lable>'; ?>
</div>
<div class="view13">
<?php echo '<lable><b>Division Name Type</b></lable>'; ?>
</div>
<div class="view13">
<?php echo '<lable><b>Batch Type</b></lable>'; ?>
</div>
<div class="view12">
<?php echo $model->Rel_Shift->shift_type .'<br>'; ?>
</div>

<div class="view12">
<?php echo $model->Rel_Division->division_name .'<br>'; ?>
</div>

<div class="view12">
<?php echo $model->Rel_Batch->batch_name .'<br>'; ?>
</div>

<div class="view13">
<?php echo '<lable><b>Batch Type</b></lable>'; ?>
</div>
<div class="view12">
<?php echo ('&nbsp;');?>
</div>
<div class="view12">
<?php echo ('&nbsp;');?>
</div>
<div class="view12">
<?php echo $model->Rel_Batch->batch_name .'<br>'; ?>
</div>
<div class="view12">
<?php echo ('&nbsp;');?>
</div>
<div class="view12">
<?php echo ('&nbsp;');?>
</div>
<div class="view12">
<?php echo ('&nbsp;');?>
</div>

<div class="view12">
<?php echo ('&nbsp;');?>
</div>



