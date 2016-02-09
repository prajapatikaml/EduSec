<script>
$(document).ready(function () {

   $('.checkall').click(function () {
        $(this).parents('fieldset:eq(0)').find(':checkbox').attr('checked', this.checked);	
	if(this.checked)
	   $(this).parents("fieldset:eq(0)").find(".checkbox").prop("checked",true);
	else
	   $(this).parents("fieldset:eq(0)").find(".checkbox").prop("checked",false);
    });
});
$(document).ready(function(){
$('.btn').click(function (e) {
  if ($("input[type=checkbox]:checked").length === 0) {
	e.preventDefault();
      alert('Please select atleast one checkbox');
      return false;
  }
});
});
</script>

<fieldset>
<div style="padding: 5px 5px 5px 19px;">
	<input type="checkbox" class="checkall" id="check_all_id"> <label for="check_all_id"> Check All </label>
</div>

<input  type="hidden" name="query" value="<?php echo $query;?>" />

<div class="checkbox">
 <div class="col-xs-12 col-lg-12 col-sm-12">
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
	   <label class="checkbox-inline">
		<input type="checkbox" class="checkbox"  name="e_info[]" id="emp_unique_id" value="emp_unique_id" /> &nbsp;Employee No
 	   </label>
	</div>
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
	   <label class="checkbox-inline">
		<input type="checkbox" class="checkbox" name="e_info[]" id="emp_first_name" value="emp_first_name" /> &nbsp;First Name</label>
	</div>
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
	   <label class="checkbox-inline">
		<input type="checkbox" class="checkbox" name="e_info[]"  id="emp_middle_name" value="emp_middle_name" /> &nbsp;Middle Name</label>
	</div>
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
	   <label class="checkbox-inline">
		<input type="checkbox" class="checkbox" name="e_info[]" id="emp_last_name" value="emp_last_name" /> &nbsp;Last Name </label>
	</div>
	
 </div>
</div>

<div class="checkbox">
  <div class="col-xs-12 col-lg-12 col-sm-12">	
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
	  <label class="checkbox-inline">
		<input type="checkbox" class="checkbox" name="e_info[]" id="emp_mother_name" value="emp_mother_name" /> &nbsp;Mother Name </label>
	</div>
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
	  <label class="checkbox-inline">
		<input type="checkbox" class="checkbox" name="e_info[]" id="emp_attendance_card_id" value="emp_attendance_card_id" /> &nbsp;Attendence Card </label>
	</div>
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
	     <label class="checkbox-inline">
		<input type="checkbox" class="checkbox" name="e_info[]" id="emp_maritalstatus" value="emp_maritalstatus" /> &nbsp;Marital Status </label>
	</div>
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
		 <label class="checkbox-inline">
		<input type="checkbox"  class="checkbox" name="e_info[]" id="emp_department_name" value="emp_department_name" /> &nbsp;Department </label>
	</div>
  </div>
</div>

<div class="checkbox">
  <div class="col-xs-12 col-lg-12 col-sm-12">
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
 	       <label class="checkbox-inline">
		<input type="checkbox" class="checkbox" name="e_info[]" id="emp_designation_name" value="emp_designation_name" /> &nbsp;Designation </label>
	</div>
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
	        <label class="checkbox-inline">
		<input type="checkbox" class="checkbox"  name="e_info[]" id="city" value="city" /> &nbsp;City 			</label>
	</div>
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
		 <label class="checkbox-inline">
		<input type="checkbox"  class="checkbox" name="e_info[]" id="emp_reference" value="emp_reference" />&nbsp;Reference </label>
	</div>
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
	        <label class="checkbox-inline">
		<input type="checkbox" class="checkbox" name="e_info[]" id="emp_cadd" value="emp_cadd" /> &nbsp;Local Address </label>
	</div>
  </div>
</div>

<div class="checkbox">
  <div class="col-xs-12 col-lg-12 col-sm-12">
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
           <label class="checkbox-inline">
		<input type="checkbox" class="checkbox" name="e_info[]" id="emp_padd" value="emp_padd" /> &nbsp;International Address </label>
	</div>
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
	  <label class="checkbox-inline">
		<input type="checkbox" class="checkbox" name="e_info[]" id="emp_bloodgroup" value="emp_bloodgroup" /> &nbsp;Blood Group   </label>
	</div>
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
	  <label class="checkbox-inline">
		<input type="checkbox" class="checkbox" name="e_info[]" id="emp_gender" value="emp_gender" /> &nbsp;Gender </label>
	</div>
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
	  <label class="checkbox-inline">
		<input type="checkbox" class="checkbox" name="e_info[]" id="emp_dob", value="emp_dob" />&nbsp;Birth Date</label>	
	</div>
  </div>
</div>


<div class="checkbox">
  <div class="col-xs-12 col-lg-12 col-sm-12">
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
	  <label class="checkbox-inline">
		<input type="checkbox" class="checkbox" name="e_info[]" id="emp_joining_date", value="emp_joining_date" />&nbsp;Joining Date </label>
	</div>
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
	  <label class="checkbox-inline">
		<input type="checkbox" class="checkbox" name="e_info[]" id="emp_mobile_no", value="emp_mobile_no" />&nbsp;Mobile No </label>
	</div>
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
	  <label class="checkbox-inline">
		<input type="checkbox" class="checkbox"  name="e_info[]" id="emp_guardian_mobile_no" 					value="emp_guardian_mobile_no" /> &nbsp;Guardian Mobile </label>
	</div>
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
  	  <label class="checkbox-inline">
		<input type="checkbox" class="checkbox"  name="e_info[]" id="emp_email_id" value="emp_email_id" />&nbsp;Email-ID</label>
	</div>
   </div>
</div>

<div class="checkbox">
  <div class="col-xs-12 col-lg-12 col-sm-12">
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
	  <label class="checkbox-inline">
		<input type="checkbox" class="checkbox"  name="e_info[]" id="emp_bankaccount_no" value="emp_bankaccount_no" />&nbsp;Bank Account No </label>
	</div>
   </div>
</div>
</fieldset>
