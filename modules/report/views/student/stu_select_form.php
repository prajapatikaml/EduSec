<script>
$(function () {
    $('.checkall').click(function () {

        $(this).parents('fieldset:eq(0)').find(':checkbox').attr('checked', this.checked);
	if(this.checked)
	   $(this).parents("fieldset:eq(0)").find(".checkbox").prop("checked",true);
	else
	   $(this).parents("fieldset:eq(0)").find(".checkbox").prop("checked",false);
    });

});
</script>
<script>
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
   <div style="padding: 5px 5px 5px 19px;"><input type="checkbox" class="checkall" id="check_all_id"> <label for="check_all_id"> Check All </label></div>
<input  type="hidden" name="query" value="<?php echo $query;?>" />
<div class="checkbox">
 <div class="col-xs-12 col-lg-12 col-sm-12">
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
	   <label class="checkbox-inline">
		<input type="checkbox" class="checkbox" name="s_info[]" id="stu_unique_id" value="stu_unique_id" /> &nbsp;Student No </label>
	</div>
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
	   <label class="checkbox-inline"> 
		<input type="checkbox" class="checkbox" name="s_info[]" id="stu_first_name" value="stu_first_name" /> &nbsp;First Name</label>
	</div>
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
            <label class="checkbox-inline">
		<input type="checkbox" class="checkbox" name="s_info[]"  id="stu_middle_name" value="stu_middle_name" /> &nbsp;Middle Name</label>
	</div>
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
  	    <label class="checkbox-inline">
		<input type="checkbox" class="checkbox" name="s_info[]" id="stu_last_name" value="stu_last_name" /> &nbsp;Last Name </label>
	</div>
  </div>
</div>

<div class="checkbox">
   <div class="col-xs-12 col-lg-12 col-sm-12">
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
	    <label class="checkbox-inline">
		<input type="checkbox" class="checkbox"  name="s_info[]" id="stu_gender" value="stu_gender" /> &nbsp;Gender</label>
	</div>
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
	    <label class="checkbox-inline">
		<input type="checkbox" class="checkbox"  name="s_info[]" id="stu_dob" value="stu_dob" /> &nbsp;Birth Date</label>
	</div>
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
          <label class="checkbox-inline">
		<input type="checkbox" class="checkbox" name="s_info[]" id="stu_email_id" value="stu_email_id" /> &nbsp;Email Id  </label>
	</div>
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
	    <label class="checkbox-inline">
		<input type="checkbox" class="checkbox" name="s_info[]" id="stu_bloodgroup" value="stu_bloodgroup" />&nbsp;Blood Group 
	   </label>
	</div>
   </div>	 
</div>


<div class="checkbox">
   <div class="col-xs-12 col-lg-12 col-sm-12">
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
    	 <label class="checkbox-inline">
		<input type="checkbox" class="checkbox" name="s_info[]" id="stu_birthplace" value="stu_birthplace" />&nbsp;Birth Place
	   </label>
	</div>
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
          <label class="checkbox-inline">
		<input type="checkbox" class="checkbox" name="s_info[]" id="stu_religion" value="stu_religion" /> &nbsp;Religion 
	   </label>
	</div>
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
        	<label class="checkbox-inline">
		<input type="checkbox" class="checkbox" name="s_info[]" id="stu_admission_date" value="stu_admission_date" />&nbsp;Admission Date
	   </label>
	</div>
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
		<label class="checkbox-inline">
		<input type="checkbox" class="checkbox" name="s_info[]" id="stu_languages" value="stu_languages" />&nbsp;Languages Known
	   </label>
	</div>
   </div>
</div>


<div class="checkbox">
   <div class="col-xs-12 col-lg-12 col-sm-12">
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
	  <label class="checkbox-inline">
		<input type="checkbox" class="checkbox" name="s_info[]" id="course_name" value="course_name" />&nbsp;Course </label> 
	</div>
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
	  <label class="checkbox-inline">
		<input type="checkbox" class="checkbox" name="s_info[]" id="batch_name" value="batch_name" /> &nbsp;Batch </label>
	</div>
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
    	   <label class="checkbox-inline">
		<input type="checkbox" class="checkbox" name="s_info[]" id="section_name" value="section_name" /> &nbsp;Section </label>          
	</div>
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
		<label class="checkbox-inline">
		<input type="checkbox" class="checkbox" name="s_info[]" id="stu_mobile_no" value="stu_mobile_no" /> &nbsp;Mobile No
	   </label>
	</div>
   </div>
</div>


<div class="checkbox">
   <div class="col-xs-12 col-lg-12 col-sm-12">
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
            <label class="checkbox-inline">
		<input type="checkbox" class="checkbox" name="s_info[]" id="stu_cadd" value="stu_cadd"/>&nbsp;Local Address</label>	
	</div>
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
            <label class="checkbox-inline">
		<input type="checkbox" class="checkbox" name="s_info[]" id="stu_padd" value="stu_padd"/>&nbsp;International Address</label>	
	</div>
   </div>
</div>

</fieldset>

