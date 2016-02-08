<script>
$(function () {
    $('.checkall').click(function () {
        $(this).parents('fieldset:eq(0)').find(':checkbox').attr('checked', this.checked);
    });
});
</script>
<fieldset>
    <!-- these will be affected by check all -->
    <div><input type="checkbox" class="checkall"> Check All</div></br>
<input  type="hidden" name="query" value="<?php echo $query;?>" />


<div class="row">
<input type="checkbox" name="emp_info[]" id="employee_first_name" value="employee_first_name" /> &nbsp;First Name
</div>
	 	
<div class="row">
<input type="checkbox" name="emp_info[]" id="employee_last_name" value="employee_last_name" /> &nbsp;Last Name
</div>

<div class="row">
<input type="checkbox" name="emp_info[]" id="employee_faculty_of" value="employee_faculty_of" /> &nbsp;Faculty Of
</div>

<div class="row">
<input type="checkbox" name="emp_info[]" id="department_name" value="department_name" /> &nbsp;Department
</div>

<div class="row">
<input type="checkbox" name="emp_info[]" id="employee_guardian_home_address" value="employee_guardian_home_address" /> &nbsp;Home Address
</div>

<div class="row">
<input type="checkbox" name="emp_info[]" id="employee_refer_designation" value="employee_refer_designation" />&nbsp;Designation
</div>

<div class="row">
<input type="checkbox" name="emp_info[]" id="employee_marital_status" value="employee_marital_status" /> &nbsp;Marital Status
</div>

<div class="row">
<input type="checkbox" name="emp_info[]" id="city" value="city" /> &nbsp;City
</div>

<div class="row">
<input type="checkbox" name="emp_info[]" id="employee_reference" value="employee_reference" /> &nbsp;Reference
</div>

<div class="row">
<input type="checkbox" name="emp_info[]" id="employee_address_c_line1" value="employee_address_c_line1" /> &nbsp;Current Address
</div>

<div class="row">
<input type="checkbox" name="emp_info[]" id="employee_bloodgroup" value="employee_bloodgroup" /> &nbsp;Blood Group
</div>

<div class="row">
<input type="checkbox" name="emp_info[]" id="employee_guardian_mobile1" value="employee_guardian_mobile1" /> &nbsp;Guardian Mobile
</div>
 	
<div class="row">
<input type="checkbox" name="emp_info[]" id="employee_gender" value="employee_gender" /> &nbsp;Gender
</div>

<div class="row">
<input type="checkbox" name="emp_info[]" id="employee_dob", value="employee_dob" />&nbsp;Birthdate
</div>

<div class="row">
<input type="checkbox" name="emp_info[]" id="employee_joining_date", value="employee_joining_date" />&nbsp;Joining Date
</div>

<div class="row">
<input type="checkbox" name="emp_info[]" id="employee_private_mobile", value="employee_private_mobile" />&nbsp;Mobile No 
</div>

<div class="row">
<input type="checkbox" name="emp_info[]" id="employee_private_email" value="employee_private_email" />&nbsp;Email-ID 
</div>

</div>

</fieldset>


