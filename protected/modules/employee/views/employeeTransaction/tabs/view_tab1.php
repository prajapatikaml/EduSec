<div class="row">
       <div class="row-column1">
		<?php echo CHtml::label('Employee No. :', 'employee_no'); ?> 
		<?php echo $info->employee_no;?> 
	</div>
      	<div class="row-column1">
      	      <?php echo CHtml::label('Attd card no. :', '' , '' ); ?>
              <?php echo $info->employee_attendance_card_id;?>
     	</div>

</div>

<div class="row">

	<div class="row-column2">
		<?php echo CHtml::label('Name :','title'); ?>   
		<?php echo $info->title.' '.$info->employee_first_name.' '.$info->employee_last_name;?>
	</div>
</div>

<div class="row">
	<div class="row-column2">
		<?php echo CHtml::label('Alias :','employee_name_alias'); ?>
		<?php echo $info->employee_name_alias;?> 
	</div>
       <div class="row-column1">
		<?php echo CHtml::label('Gender :','employee_gender'); ?>
		<?php echo $info->employee_gender;?>
	</div>

</div>

<div class="row">
	<div class="row-column1">
		<?php  echo CHtml::label('DOB :','employee_dob'); ?>
		<?php if($info->employee_dob!=null)
			echo date('d-m-Y',strtotime($info->employee_dob));?>
	</div>
	<div class="row-column3">
		<?php echo CHtml::label('Blood Group :','employee_bloodgroup'); ?>
	        <?php echo $info->employee_bloodgroup;?>
	</div>
</div>

<div class="row">
	<div class="row-column1">
		<?php echo CHtml::label('Nationality :','employee_transaction_nationality_id'); ?>
		<?php if($model->employee_transaction_nationality_id != null)
			echo $model->Rel_Nationality->nationality_name;?>
	</div>
	<div class="row-column2">
		<?php echo CHtml::label('Marital Status :','employee_marital_status'); ?>
	        <?php echo $info->employee_marital_status;?>
	</div>
</div>

<div class="row">
	<div class="row-column2">
		<?php  echo CHtml::label('Joining Date  :','employee_joining_date'); ?>
		<?php if($info->employee_joining_date!=null)
			echo date('d-m-Y',strtotime($info->employee_joining_date));?>
	</div>
	<div class="row-column2">
		<?php echo CHtml::label('Department :','employee_transaction_department_id'); ?>
		<?php echo $model->Rel_Department->department_name;?>	 
	</div>

</div>
<div class="row">
	<div class="row-column1">
	       <?php echo CHtml::label('Designation :', '' ); ?>
	       <?php echo $model->Rel_Designation->employee_designation_name;?>
	</div>
      	<div class="row-column2">
	       <?php echo CHtml::label('Faculty of :', '' ); ?>
               <?php echo $info->employee_faculty_of;?>
	</div>
</div>
<div class="row">
	<div class="row-column1">
		<?php echo CHtml::label('Language Known :', '' ); ?>
		<?php 
			$lanKnw = "";
			if($lang->languages_known1)
			$lanKnw = $lang->Rel_Langs1->languages_name;
			if($lang->languages_known2 )
			$lanKnw .= ", ".$lang->Rel_Langs2->languages_name;
			echo $lanKnw;
		?>
	 </div>

	<div class="row-column1">
	       	 <?php echo CHtml::label('Type :','employee_type'); ?>
	         <?php 
			if($info->employee_type ==1)
			echo "Teaching";
			else
			echo "Non-Teaching";
		?>
	</div>
</div>	

<div class="row last">
	 <div class="row-column2">
	       <?php echo CHtml::label('Email :','employee_private_email'); ?>
	       <?php echo $info->employee_private_email;?>
	 </div>	
	<div class="row-column3">
		 <?php echo CHtml::label('Mobile :','employee_private_mobile'); ?>
		 <?php echo $info->employee_private_mobile;?>
	</div>
</div>

