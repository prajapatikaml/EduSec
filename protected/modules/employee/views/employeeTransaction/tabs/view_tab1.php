<div class="row">
       <div class="row-column1">
		<?php echo CHtml::label('Employee No. :','employee_no'); ?> 
		<?php echo (!empty($info->employee_no) ? $info->employee_no : "Not Set");?> 
	</div>
	<div class="row-column2">
		<?php echo CHtml::label('Employee Unique Id :','employee_unique_id'); ?>
		<?php echo (!empty($info->employee_unique_id) ? $info->employee_unique_id : "Not Set");?> 
	</div>
</div>

<div class="row">
      
	<div class="row-column1">
		<?php echo CHtml::label('Name Alias :','employee_name_alias'); ?>
		<?php echo (!empty($info->employee_name_alias) ? $info->employee_name_alias : "Not Set");?> 
	</div>
	<div class="row-column2">
	       <?php echo CHtml::label('Private Email :','employee_private_email'); ?>
	       <?php echo (!empty($info->employee_private_email) ? $info->employee_private_email : "Not Set");?>
	
	</div>
</div>


<div class="row">
	<div class="row-column1">
		<?php echo CHtml::label('Designation :','employee_transaction_designation_id'); ?>
		 <?php echo (!empty($model->Rel_Designation->employee_designation_name) ? $model->Rel_Designation->employee_designation_name : "Not Set");?>		
	</div>
	<div class="row-column2">
		<?php echo CHtml::label('Title :','title'); ?>   
		<?php echo (!empty($info->title) ? $info->title :"Not Set");?>
	</div>
</div>	
<div class="row">
	<div class="row-column1">
		<?php echo CHtml::label('First Name :','employee_first_name'); ?>
		<?php echo (!empty($info->employee_first_name) ? $info->employee_first_name : "Not Set");?>
	</div>
	<div class="row-column2">
	      <?php echo CHtml::label('Middle Name :','employee_middle_name'); ?>
	      <?php echo (!empty($info->employee_middle_name) ? $info->employee_middle_name : "Not Set") ;?>
	</div>
</div>
<div class="row">
	<div class="row-column1">
	     <?php echo CHtml::label('Last Name :','employee_last_name'); ?>
	      <?php echo $info->employee_last_name;?>
	</div>
	<div class="row-column2">
	      <?php echo CHtml::label('Mother Name :','employee_mother_name'); ?>
	      <?php echo (!empty($info->employee_mother_name) ? $info->employee_mother_name : "Not Set");?>
	</div>
</div>
<div class="row">
       <div class="row-column1">
		<?php echo CHtml::label('Gender :','employee_gender'); ?>
		<?php echo (!empty($info->employee_gender) ? $info->employee_gender : "Not Set");?>
	</div>
	<div class="row-column2">
		<?php echo CHtml::label('Department :','employee_transaction_department_id'); ?>
		<?php echo (!empty($model->Rel_Department->department_name) ? $model->Rel_Department->department_name : "Not Set");?>	 
	</div>
</div>
<!--div class="row">
	<div class="row-column1">
		<?php //echo CHtml::label('AICTE ID :','employee_aicte_id'); ?>
		<?php //echo $info->employee_aicte_id;?>  
	</div>
       <div class="row-column2">
		<?php //echo CHtml::label('GTU ID :','employee_gtu_id'); ?>
		<?php //echo $info->employee_gtu_id;?>
	</div>
</div-->

<div class="row">
	<div class="row-column1">
		<?php  echo CHtml::label('Joining Date :','employee_joining_date'); ?>
		<?php if($info->employee_joining_date!=null)
			echo date('d-m-Y',strtotime($info->employee_joining_date));
			else
			echo "Not Set";
		?>
	</div>
	<div class="row-column2">
		<?php echo CHtml::label('Probation Period :','employee_probation_period'); ?>
		<?php echo (!empty($info->employee_probation_period) ? $info->employee_probation_period : "Not Set");?>
	</div>
</div>


<div class="row">
	<div class="row-column1">
		<?php  echo CHtml::label('Date of Birth :','employee_dob'); ?>
		<?php if($info->employee_dob!=null)
			echo date('d-m-Y',strtotime($info->employee_dob));
			else
			echo "Not Set";
		?>
	</div>
	<div class="row-column2">
		<?php echo CHtml::label('Birth Place :','employee_birthplace'); ?>
		<?php echo (!empty($info->employee_birthplace) ? $info->employee_birthplace : "Not Set");?>			
	</div>
</div>
<div class="row">
	<div class="row-column1">
		<?php echo CHtml::label('Blood Group :','employee_bloodgroup'); ?>
	        <?php echo (!empty($info->employee_bloodgroup) ? $info->employee_bloodgroup : "Not Set");?>
	</div>

	<div class="row-column2">
		<?php echo CHtml::label('Nationality :','employee_transaction_nationality_id'); ?>
		<?php if($model->employee_transaction_nationality_id != null)
			echo $model->Rel_Nationality->nationality_name;
			else
			echo "Not Set";
		?>
	</div>
</div>
<div class="row">
	
	<div class="row-column1">
		<?php echo CHtml::label('Marital Status :','employee_marital_status'); ?>
	        <?php echo (!empty($info->employee_marital_status) ? $info->employee_marital_status : "Not Set");?>
	</div>
	<div class="row-column2">
	       	 <?php echo CHtml::label('Type :','employee_type'); ?>
	         <?php 
			if($info->employee_type ==1)
			echo "Teaching";
			else
			echo "Non-Teaching";
		?>
	</div>
	<!--div class="row-column2">
	       <?php //echo CHtml::label('Pancard No :','employee_pancard_no'); ?>
	       <?php //echo $info->employee_pancard_no;?>
	</div-->

</div>

<div class="row">		
	<div class="row-column1">
	       <?php echo CHtml::label('Bank Account No :','employee_account_no'); ?>
	      <?php echo (!empty($info->employee_account_no) ? $info->employee_account_no : "Not Set");?>
	</div>
	<div class="row-column2">
		 <?php echo CHtml::label('Institute Mobile :','employee_organization_mobile'); ?>
		 <?php echo (!empty($info->employee_organization_mobile) ? $info->employee_organization_mobile : "Not Set");?>
	</div>
	
</div>
<div class="row">
	
	<div class="row-column1">
		 <?php echo CHtml::label('Private Mobile No. : ','employee_private_mobile'); ?>
		 <?php echo (!empty($info->employee_private_mobile) ? $info->employee_private_mobile : "Not Set");?>
	</div>

</div>


