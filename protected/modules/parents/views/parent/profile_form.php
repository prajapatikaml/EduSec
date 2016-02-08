<style>
#form1{
   margin-top:33px;
}

</style>
<?php
$this->layout='//layouts/personal-profile';
$this->breadcrumbs=array(
	'Student'=>'',
	'Profile',
);
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'personal-profile',
	'enableAjaxValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	 'clientOptions'=>array('validateOnSubmit'=>true),
	

));

?>

<?php $org_id=Yii::app()->user->getState('org_id'); ?>	

<div id="form1" class="info-form">
	<fieldset >
		<legend>Personal Info</legend>
<div class="row">    
	<div class="row-column1">
		<?php echo $form->labelEx($info,'student_roll_no'); ?>   
		<?php echo $info->student_roll_no;?>
	</div>

	<div class="row-column2">
		<?php echo $form->labelEx($info,'student_living_status'); ?> 
		<?php echo $info->student_living_status;?>  
	</div>

	<div class="row-column3">
		<?php echo $form->labelEx($info,'student_gr_no'); ?> 
		<?php echo $info->student_gr_no;?>    
	</div>
</div>
<div class="row">    

	<div class="row-column1">
		<?php echo $form->labelEx($info,'student_merit_no'); ?>
		<?php echo $info->student_merit_no;?>       
	</div>

	<div class="row-column2">
	        <?php echo $form->labelEx($info,'student_adm_date'); ?>
		<?php if($info->student_adm_date != NULL)
			echo date('d-m-Y',strtotime($info->student_adm_date));?>
	</div>

	<div class="row-column3">
        	<?php echo $form->labelEx($info,'student_enroll_no'); ?>
		<?php echo $info->student_enroll_no;?> 
	</div>
</div>

<div class="row">
	<div class="row-column1">
		<?php echo $form->labelEx($info,'title'); ?>
		<?php echo $info->title;?>    
	</div>
	<div class="row-column2">
		<?php echo $form->labelEx($info,'student_dtod_regular_status');?>   
		<?php echo $info->student_dtod_regular_status;?>
	</div>
        <div class="row-column3">   
        	<?php echo $form->labelEx($info,'student_first_name'); ?>
		<?php echo $info->student_first_name;?>    
        </div>   
</div>

<div class="row">   

	<div class="row-column1">   
		<?php echo $form->labelEx($info,'student_middle_name'); ?>
		<?php echo $info->student_middle_name;?>
	</div>

	<div class="row-column2">   
		<?php echo $form->labelEx($info,'student_last_name'); ?>
		<?php echo $info->student_last_name;?>
	</div>   

	<div class="row-column3">
		<?php echo $form->labelEx($info,'student_mother_name'); ?>
		<?php echo $info->student_mother_name;?>
	</div>	
   
</div>

<div class="row">
	<div class="row-column1">
		<?php echo $form->labelEx($info,'student_gender'); ?>
		<?php echo $info->student_gender;?>
	</div>

	<div class="row-column2">
		<?php echo $form->labelEx($info,'student_mobile_no'); ?>   
		<?php echo $info->student_mobile_no;?>
	</div>

	<div class="row-column3">
	        <?php echo $form->labelEx($info,'student_birthplace'); ?>
	        <?php echo $info->student_birthplace;?>
	</div>
</div>

<div class="row">

	
	<div class="row-column1">
        <?php echo $form->labelEx($info,'student_dob'); ?>
	<?php 	if($info->student_dob != NULL)
		echo date('d-m-Y',strtotime($info->student_dob));?>
	</div>

	<div class="row-column2">
        <?php echo $form->labelEx($model,'student_transaction_nationality_id'); ?>
        <?php if($model->student_transaction_nationality_id!=null)
		echo $model->Rel_Nationality->nationality_name;	
	?>
	</div>

	<div class="row-column3">
        <?php echo $form->labelEx($model,'student_transaction_religion_id'); ?>
       <?php if($model->student_transaction_religion_id!=null)
		echo $model->Rel_Religion->religion_name;?>	
	</div>
</div>

<div class="row">
	<div class="row-column1">
        <?php echo $form->labelEx($model,'student_transaction_cast_id'); ?>
       <?php if($model->student_transaction_cast_id!=null)
		echo CastMaster::model()->findByPk($model->student_transaction_cast_id)->cast_master_name;?>	
	</div>
	<div class="row-column2">
        <?php echo $form->labelEx($model,'student_transaction_quota_id'); ?>
        <?php echo $model->Rel_Quota->quota_name;?>
	</div>
	<div class="row-column3">
        <?php echo $form->labelEx($model,'student_transaction_category_id'); ?>
        <?php if($model->student_transaction_category_id!=null)
		echo $model->Rel_Category->category_name;?>
	</div>

		

</div>
<div class="row">
	<div class="row-column1">
        <?php echo $form->labelEx($model,'student_academic_term_period_tran_id'); ?>
       <?php echo $model->Rel_student_academic_terms_period_name->academic_term_period;?>
	</div>

	<div class="row-column2">
		<?php echo $form->labelEx($model,'student_academic_term_name_id'); ?>
		<?php $term = "Sem-".$model->Rel_student_academic_terms_name->academic_term_name;
		echo $term;
		?>
	</div>	

	<div class="row-column3">
	<?php echo $form->labelEx($model,'student_transaction_branch_id'); ?>
	<?php echo $model->Rel_Branch->branch_name; ?>
	</div>

	

</div>
	

 <div class="row">
	<div class="row-column1">
	<?php echo $form->labelEx($model,'student_transaction_division_id'); ?>
	<?php echo $model->Rel_Division->division_name; ?>
	</div>
	<div class="row-column2">
        <?php echo $form->labelEx($model,'student_transaction_batch_id'); ?>
        <?php if($model->student_transaction_batch_id!=0)
		echo $model->Rel_Batch->batch_code; ?>	
	</div>

	<div class="row-column3">
        <?php echo $form->labelEx($model,'student_transaction_shift_id'); ?>
        <?php echo $model->Rel_Shift->shift_type; ?>	
	</div>

    </div>

</fieldset>
</div>

<div id="form2" class="info-form">

<fieldset>

	<legend>Guardian Info</legend>
<div class="row">
	<div class="row-column1">
        <?php echo $form->labelEx($info,'student_guardian_name'); ?>
        <?php echo $info->student_guardian_name; ?>	
	</div>
	
	<div class="row-column2">
        <?php echo $form->labelEx($info,'student_guardian_relation'); ?>
	<?php echo $info->student_guardian_relation; ?>	
	</div>

	<div class="row-column3">
        <?php echo $form->labelEx($info,'student_guardian_qualification'); ?>
        <?php echo $info->student_guardian_qualification; ?>	
	</div>
</div>

<div class="row">


	<div class="row-column1">
        <?php echo $form->labelEx($info,'student_guardian_occupation'); ?>
        <?php echo $info->student_guardian_occupation; ?>	
	</div>  
	<div class="row-column2">        
        <?php echo $form->labelEx($info,'student_guardian_income'); ?>
        <?php echo $info->student_guardian_income; ?>
	</div> 
</div>
<?php if (isset(Yii::app()->modules['parents'])) { ?>
<div class="row">
        <?php echo $form->labelEx($parent,'parent_user_name'); ?>
        <?php if($model->student_transaction_parent_id != 0 ) 
		echo $model->Rel_parent->parent_user_name; ?>
</div>
<?php } ?>
<div class="row">
	<div class="row-column1">
        <?php echo $form->labelEx($info,'student_guardian_phoneno'); ?>
        <?php echo $info->student_guardian_phoneno; ?>
	</div>

	<div class="row-column2">
	<?php echo $form->labelEx($info,'student_guardian_mobile'); ?>
        <?php echo $info->student_guardian_mobile; ?>
	</div>
</div>

<div class="row">
        <?php echo $form->labelEx($info,'student_guardian_home_address'); ?>
        <?php echo $info->student_guardian_occupation_address; ?>
</div>

</fieldset>
</div>

<div id="form3" class="info-form">
<fieldset>
	<legend>Other Info</legend>
	<div class="row">
		<div class="row-left">
        		<?php echo $form->labelEx($info,'student_email_id_1'); ?>
       			<?php echo $info->student_email_id_1; ?>
		</div>
		<div class="row-right">
			<?php echo $form->labelEx($info,'student_email_id_2'); ?>
			<?php echo $info->student_email_id_2; ?>
		</div>
	</div>


<div class="row">
	<div class="row-left">
        <?php echo $form->labelEx($info,'student_bloodgroup'); ?>
        <?php echo $info->student_bloodgroup; ?>
	</div>

	<div class="row-right">     
	<?php echo $form->labelEx($model,'Organization Name'); ?>
        <?php echo $model->Rel_Organization->organization_name; ?>
	</div>
</div>

<div class="row">
	<div class="row-left">
        <?php echo $form->labelEx($lang,'languages_known1'); ?>
        <?php 
		if($lang->languages_known1)
		echo $lang->Rel_Langs1->languages_name;?>
	</div>

	<div class="row-right">
	<?php echo $form->labelEx($lang,'languages_known2');?>
	<?php if($lang->languages_known2)
		echo $lang->Rel_Langs2->languages_name;?>
	</div>
</div>
</fieldset>

</div>
<div class="address-data">
<fieldset>
	<legend>Current Address</legend>
	<div class="row">
		<?php echo $form->labelEx($address,'student_address_c_line1'); ?>
		<?php echo $address->student_address_c_line1; ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($address,'student_address_c_line2'); ?>
		<?php echo $address->student_address_c_line2; ?>
	</div>
		
	<div class="row">
		<div class="row-left">
		<?php echo $form->labelEx($address,'student_address_c_taluka'); ?>
		<?php echo $address->student_address_c_taluka; ?>
		</div>
		
		<div class="row-right">
		<?php echo $form->labelEx($address,'student_address_c_district'); ?>
		<?php echo $address->student_address_c_district; ?>
		</div>
	</div>

<div class="row">
	<div class="row-left">
	<?php echo $form->labelEx($address,'student_address_c_country'); ?>
	<?php if($address->student_address_c_country!=0)
		echo $address->Rel_c_country->name; ?>
	</div>
	
	<div class="row-right">
	<?php echo $form->labelEx($address,'student_address_c_state'); ?>
	<?php if($address->student_address_c_state!=0)
		echo $address->Rel_c_state->state_name;?>
	</div>
</div>

<div class="row">
	<div class="row-left">
	<?php echo $form->labelEx($address,'student_address_c_city'); ?>
	<?php if($address->student_address_c_city!=0)
		echo $address->Rel_c_city->city_name;?>
	</div>

	<div class="row-right">
	<?php echo $form->labelEx($address,'student_address_c_pin'); ?>
	<?php echo $address->student_address_c_pin;?>
	</div>
</div>
</fieldset>
</div>

<div class="address-data">
<fieldset>
	<legend>Permanent Address</legend>
	
<div class="row">
	<?php echo $form->labelEx($address,'student_address_p_line1'); ?>
	<?php echo $address->student_address_p_line1;?>
</div>

<div class="row">
	<?php echo $form->labelEx($address,'student_address_p_line2'); ?>
	<?php echo $address->student_address_p_line2;?>
</div>

<div class="row">
	<div class="row-left">
		<?php echo $form->labelEx($address,'student_address_p_taluka'); ?>
		<?php echo $address->student_address_p_taluka;?>
	</div>
		
	<div class="row-right">
		<?php echo $form->labelEx($address,'student_address_p_district'); ?>
		<?php echo $address->student_address_p_district;?>
	</div>
</div>

<div class="row">
	<div class="row-left">
	<?php echo $form->labelEx($address,'student_address_p_country'); ?>
	<?php if($address->student_address_p_country!=0)
		echo $address->Rel_p_country->name; ?>
	</div>

	<div class="row-right">
	<?php echo $form->labelEx($address,'student_address_p_state'); ?>
	<?php if($address->student_address_p_state!=0)
		echo $address->Rel_p_state->state_name;?>
	</div>

</div>

<div class="row">
	<div class="row-left">
	<?php echo $form->labelEx($address,'student_address_p_city'); ?>
	<?php if($address->student_address_p_city!=0)
		echo $address->Rel_p_city->city_name;?>
	</div>

	<div class="row-right">
	<?php echo $form->labelEx($address,'student_address_p_pin'); ?>
	<?php echo $address->student_address_p_pin;?>
	</div>
</div>

</fieldset>
</div>

<?php  $this->endWidget(); ?>

