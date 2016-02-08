<div class="row">    

	<div class="row-column1">
        	<?php echo CHtml::label('Enrollment No. :','student_enroll_no'); ?>
		<?php echo $info->student_enroll_no;?> 
	</div>

	<div class="row-column2">
	        <?php echo CHtml::label('Adm. Date :','student_adm_date'); ?>
		<?php if($info->student_adm_date != NULL)
			echo date('d-m-Y',strtotime($info->student_adm_date));?>
	</div>

</div>

<div class="row">
	<?php echo CHtml::label('Name :','name'); ?>
	<?php echo $info->title." ".$info->student_first_name." ".$info->student_last_name;?>
</div>


<div class="row">
	<div class="row-column1">
		<?php echo CHtml::label('Gender :','student_gender'); ?>
		<?php echo $info->student_gender;?>
	</div>

	<div class="row-column3">
        <?php echo CHtml::label('Date of Birth :','student_dob'); ?>
	<?php 	if($info->student_dob != NULL)
		echo date('d-m-Y',strtotime($info->student_dob));?>
	</div>
</div>

  <div class="row">
	<div class="row-left">
       		<?php echo CHtml::label('Email ID :','student_email_id_1'); ?>       		 			<?php echo $info->student_email_id_1; ?>
	</div>
	<div class="row-column2">
		<?php echo CHtml::label('Mobile No. :','student_mobile_no'); ?>   
		<?php echo $info->student_mobile_no;?>
	</div>
  </div>

<div class="row">
	<div class="row-left">
        <?php echo CHtml::label('Blood Group :','student_bloodgroup'); ?>
        <?php echo $info->student_bloodgroup; ?>
	</div>

	<div class="row-column3">
        <?php echo CHtml::label('Nationality :','student_transaction_nationality_id'); ?>
        <?php if($model->student_transaction_nationality_id!=null)
		echo $model->Rel_Nationality->nationality_name;	
	?>
	</div>

</div>

<div class="row">
	<div class="row-column1">
        <?php echo CHtml::label('Year :','student_academic_term_period_tran_id'); ?>
       <?php echo $model->Rel_student_academic_terms_period_name->academic_term_period;?>
	</div>

	<div class="row-column2">
		<?php echo CHtml::label('Semester :','student_academic_term_name_id'); ?>
		
		<?php
		if(isset($model->student_academic_term_name_id)) {
		 $term = "Sem-".$model->Rel_student_academic_terms_name->academic_term_name;
		echo $term;
		}
		?>
	</div>	
</div>

<div class="row">
	<div class="row-left">
        <?php echo CHtml::label('Language Known :','languages_known1'); ?>
        <?php 
		$knwLang = "";
		if($lang->languages_known1)
		$knwLang =  $lang->Rel_Langs1->languages_name; 
		if($lang->languages_known2)
		$knwLang .= ", ".$lang->Rel_Langs2->languages_name;
		echo $knwLang;
	?>

	</div>
</div>

  <div class="row last">
	<div class="row-column3">
		<?php echo CHtml::label('Course :','student_transaction_course_id'); ?>
		<?php
		    echo !empty($model->student_transaction_course_id) ? $model->relCourse->course_name : 'N/A';
		
		?>
	</div>	
</div>

