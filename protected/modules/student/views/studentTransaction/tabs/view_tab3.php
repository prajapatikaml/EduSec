<style>
.portlet.box.blue label {
    float: left;
    font-size: 14px;
    font-weight: bold;
    padding-right: 20px;
    text-align: right;
    width: 195px;
}

</style>

<div class="row" >
	<!--div class="row-column1">
		<?php echo CHtml::label('College Email :','student_email_id_1'); ?>
		<?php echo $info->student_email_id_1; ?>
	</div>
	<div class="row-column2">
		<?php echo CHtml::label('Private Email :','student_email_id_2'); ?>
		<?php echo $info->student_email_id_2; ?>
	</div-->
	<div class="row-column1">
		<?php echo CHtml::label('Emergency Contact Name :','emergency_cont_name'); ?>
		<?php echo (!empty($info->emergency_cont_name) ? $info->emergency_cont_name : "Not Set"); ?>
	</div>
	<div class="row-column2">
		<?php echo CHtml::label('Emergency Contact No :','emergency_cont_no'); ?>
		<?php echo (!empty($info->emergency_cont_no)?$info->emergency_cont_no :"Not Set"); ?>
	</div>
</div>

<!--div class="row">
	<div class="row-column1">
        <?php echo CHtml::label('Blood Group :','student_bloodgroup'); ?>
        <?php echo $info->student_bloodgroup; ?>
	</div>
</div-->

<!--div class="row">
	<!--div class="row-column1">
        <?php //echo CHtml::label('Lang. Known1 :','languages_known1'); ?>
        <?php 
		if($lang->languages_known1)
		//echo $lang->Rel_Langs1->languages_name;?>
	</div>

	<div class="row-column2">
	<?php //echo CHtml::label('Lang. Known2 :','languages_known2');?>
	<?php if($lang->languages_known2)
		//echo $lang->Rel_Langs2->languages_name;?>
	</div-->

<div class="row">
	<div class="row-column1">
        <?php echo CHtml::label('Passport No. :','passport_no'); ?>
        <?php echo (!empty($info->passport_no) ? $info->passport_no : "Not Set"); ?>
		
	</div>

	<div class="row-column2">
	<?php echo CHtml::label('Visa Expiry Date :','visa_exp_date');?>
	<?php if($info->visa_exp_date == 0000-00-00)
		echo "Not Set";
	      else
		echo date('d-m-Y',strtotime($info->visa_exp_date));?>

	</div>
</div>

<div class="row"  style=width:200px;>
	
        <?php echo CHtml::label('Languages Known :','languages_known1'); ?>
        <?php 
		//if($lang->languages_known1)
		echo (!empty($lang->languages_known1) ? $lang->languages_known1 :"Not Set");?>
	

	
</div>

