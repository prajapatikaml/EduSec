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
$('.btn.generate').click(function (e) {
  if ($("input[type=checkbox]:checked").length === 0) {
	
      e.preventDefault();
      alert("<?php echo Yii::t('report', 'Please select atleast one checkbox') ?>");
      return false;
  }
});
});
</script>

<fieldset>
   <div style="padding: 5px 5px 5px 19px;"><input type="checkbox" class="checkall" id="check_all_id"> <label for="check_all_id"> <?php echo Yii::t('report', 'Check All'); ?> </label></div>
<input  type="hidden" name="query" value="<?php echo $query;?>" />
<div class="checkbox">
 <div class="col-xs-12 col-lg-12 col-sm-12">
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
	   <label class="checkbox-inline">
		<input type="checkbox" class="checkbox" name="s_info[]" id="stu_unique_id" value="stu_unique_id" /> &nbsp;<?php echo Yii::t('report', 'Student No'); ?> </label>
	</div>
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
	   <label class="checkbox-inline"> 
		<input type="checkbox" class="checkbox" name="s_info[]" id="stu_first_name" value="stu_first_name" /> &nbsp;<?php echo Yii::t('report', 'First Name'); ?></label>
	</div>
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
            <label class="checkbox-inline">
		<input type="checkbox" class="checkbox" name="s_info[]"  id="stu_middle_name" value="stu_middle_name" /> &nbsp;<?php echo Yii::t('report', 'Middle Name'); ?></label>
	</div>
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
  	    <label class="checkbox-inline">
		<input type="checkbox" class="checkbox" name="s_info[]" id="stu_last_name" value="stu_last_name" /> &nbsp;<?php echo Yii::t('report', 'Last Name'); ?> </label>
	</div>
  </div>
</div>

<div class="checkbox">
   <div class="col-xs-12 col-lg-12 col-sm-12">
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
	    <label class="checkbox-inline">
		<input type="checkbox" class="checkbox"  name="s_info[]" id="stu_gender" value="stu_gender" /> &nbsp;<?php echo Yii::t('report', 'Gender'); ?></label>
	</div>
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
	    <label class="checkbox-inline">
		<input type="checkbox" class="checkbox"  name="s_info[]" id="stu_dob" value="stu_dob" /> &nbsp;<?php echo Yii::t('report', 'Birth Date'); ?></label>
	</div>
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
          <label class="checkbox-inline">
		<input type="checkbox" class="checkbox" name="s_info[]" id="stu_email_id" value="stu_email_id" /> &nbsp;<?php echo Yii::t('report', 'Email Id'); ?>  </label>
	</div>
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
	    <label class="checkbox-inline">
		<input type="checkbox" class="checkbox" name="s_info[]" id="stu_bloodgroup" value="stu_bloodgroup" />&nbsp;<?php echo Yii::t('report', 'Blood Group'); ?> 	   </label>
	</div>
   </div>	 
</div>


<div class="checkbox">
   <div class="col-xs-12 col-lg-12 col-sm-12">
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
    	 <label class="checkbox-inline">
		<input type="checkbox" class="checkbox" name="s_info[]" id="stu_birthplace" value="stu_birthplace" />&nbsp;<?php echo Yii::t('report', 'Birth Place'); ?>
	   </label>
	</div>
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
          <label class="checkbox-inline">
		<input type="checkbox" class="checkbox" name="s_info[]" id="stu_religion" value="stu_religion" /> &nbsp;<?php echo Yii::t('report', 'Religion'); ?> 
	   </label>
	</div>
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
        	<label class="checkbox-inline">
		<input type="checkbox" class="checkbox" name="s_info[]" id="stu_admission_date" value="stu_admission_date" />&nbsp;<?php echo Yii::t('report', 'Admission Date'); ?>
	   </label>
	</div>
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
		<label class="checkbox-inline">
		<input type="checkbox" class="checkbox" name="s_info[]" id="stu_languages" value="stu_languages" />&nbsp;<?php echo Yii::t('report', 'Languages Known'); ?>
	   </label>
	</div>
   </div>
</div>


<div class="checkbox">
   <div class="col-xs-12 col-lg-12 col-sm-12">
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
	  <label class="checkbox-inline">
		<input type="checkbox" class="checkbox" name="s_info[]" id="course_name" value="course_name" />&nbsp;<?php echo Yii::t('report', 'Course'); ?> </label> 
	</div>
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
	  <label class="checkbox-inline">
		<input type="checkbox" class="checkbox" name="s_info[]" id="batch_name" value="batch_name" /> &nbsp;<?php echo Yii::t('report', 'Batch'); ?> </label>
	</div>
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
    	   <label class="checkbox-inline">
		<input type="checkbox" class="checkbox" name="s_info[]" id="section_name" value="section_name" /> &nbsp;<?php echo Yii::t('report', 'Section'); ?> </label>          
	</div>
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
		<label class="checkbox-inline">
		<input type="checkbox" class="checkbox" name="s_info[]" id="stu_mobile_no" value="stu_mobile_no" /> &nbsp;<?php echo Yii::t('report', 'Mobile No'); ?>
	   </label>
	</div>
   </div>
</div>


<div class="checkbox">
   <div class="col-xs-12 col-lg-12 col-sm-12">
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
            <label class="checkbox-inline">
		<input type="checkbox" class="checkbox" name="s_info[]" id="stu_cadd" value="stu_cadd"/>&nbsp;<?php echo Yii::t('report', 'Local Address'); ?></label>	
	</div>
	<div class = "col-sm-3 col-lg-3 col-xs-12" style="padding:3px;">
            <label class="checkbox-inline">
		<input type="checkbox" class="checkbox" name="s_info[]" id="stu_padd" value="stu_padd"/>&nbsp;<?php echo Yii::t('report', 'International Address'); ?></label>	
	</div>
   </div>
</div>

</fieldset>

