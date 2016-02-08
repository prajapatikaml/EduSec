<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'certificate-form',
	'enableAjaxValidation'=>true,

)); ?>

<?php 
//echo $form->hiddenField($model,'branch',array('value'=>$branch));
//echo $form->hiddenField('','student_data',array('value'=>$student_data));

echo Yii::app()->user->getFlash('no_criteria');

//echo $query;
?>
<div class="row">&nbsp;</div>
<div class="row">&nbsp;</div>
<div class="row">
</br>
<div class="select">
<p class="note">Select any criteria <span class="required">*</span></p>
</div></div>
<input  type="hidden" name="en_no" value="<?php echo $en_no;?>" />
<input  type="hidden" name="certificate_type" value="<?php echo $certificate_type;?>" />

<div class="row">
<input type="checkbox" name="stud_info[]" id="student_enroll_no" value="student_enroll_no" />&nbsp;Enrollment Number 
</div>
</br>
<div class="row">
<input type="checkbox" name="stud_info[]" id="student_roll_no" value="student_roll_no" />&nbsp;Roll Number
</div>
</br>
 	
<div class="row">
<input type="checkbox" name="stud_info[]" id="student_merit_no" value="student_merit_no" />&nbsp;Merit Number
</div>
</br>

<div class="row">
<input type="checkbox" name="stud_info[]" id="student_first_name" value="student_first_name" /> &nbsp;First Name
</div>
</br>
	 	
<div class="row">
<input type="checkbox" name="stud_info[]" id="student_middle_name" value="student_middle_name" /> &nbsp;Middle Name
</div>
</br>
	
<div class="row">
<input type="checkbox" name="stud_info[]" id="student_last_name" value="student_last_name" /> &nbsp;Last Name
</div>
</br>

<div class="row">
<input type="checkbox" name="stud_info[]" id="student_mother_name" value="student_mother_name" /> &nbsp;Mother Name
</div>
</br>

<div class="row">
<input type="checkbox" name="stud_info[]" id="quota_name" value="quota_name" /> &nbsp;Quota
</div>
</br>

<div class="row">
<input type="checkbox" name="stud_info[]" id="sem" value="sem" /> &nbsp;Semester
</div>
</br>

<div class="row">
<input type="checkbox" name="stud_info[]" id="category_name" value="category_name" /> &nbsp;Category
</div>
</br>

<div class="row">
<input type="checkbox" name="stud_info[]" id="city" value="city" /> &nbsp;City
</div>

<div class="row">
<input type="checkbox" name="stud_info[]" id="branch_name" value="branch_name" /> &nbsp;Branch Name
</div>
</br>

<div class="row">
<input type="checkbox" name="stud_info[]" id="division_code" value="division_code" /> &nbsp;Division Name
</div>
</br>

<div class="row">
<input type="checkbox" name="stud_info[]" id="student_address_c_line1" value="student_address_c_line1" /> &nbsp;Current Address
</div>


<div class="row">
<input type="checkbox" name="stud_info[]" id="student_address_p_line1" value="student_address_p_line1" /> &nbsp;Permenent Address
</div>

<div class="row">
<input type="checkbox" name="stud_info[]" id="student_bloodgroup" value="student_bloodgroup" /> &nbsp;Blood Group
</div>
</br>


<div class="row">
<input type="checkbox" name="stud_info[]" id="student_guardian_mobile" value="student_guardian_mobile" /> &nbsp;Guardian Mobile
</div>
</br>
 	
<div class="row">
<input type="checkbox" name="stud_info[]" id="student_gender" value="student_gender" /> &nbsp;Gender
</div>

<div class="row">
<input type="checkbox" name="stud_info[]" id="student_dob", value="student_dob" />&nbsp;Birthdate
</div>


<div class="row">
<input type="checkbox" name="stud_info[]" id="student_guardian_phoneno" value="student_guardian_phoneno" /> &nbsp;Phone No
</div>

<div class="row">
<input type="checkbox" name="stud_info[]" id="student_mobile_no", value="student_mobile_no" />&nbsp;Mobile No 
</div>
</br>
 	

<div class="row">
<input type="checkbox" name="stud_info[]" id="student_email_id_1" value="student_email_id_1" />&nbsp;College Email-ID 
</div>

<div class="row">
<input type="checkbox" name="stud_info[]" id="student_email_id_2" value="student_email_id_2" />&nbsp;Email-ID 
</div>


</br>
<div class="row buttons">
	<?php  echo CHtml::button('Submit' , array('class'=>'submit','submit' => array('certificate/selectedfield')))."</br>";?>
</div>
<?php $this->endWidget(); ?>




