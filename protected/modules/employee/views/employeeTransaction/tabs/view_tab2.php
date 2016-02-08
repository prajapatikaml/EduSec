<div class="row">
     	<div class="row-column1">
      		<?php echo CHtml::label('Name :', ''); ?>
      		<?php echo (!empty($info->employee_guardian_name) ? $info->employee_guardian_name : "Not Set");?>
     	</div>
        <div class="row-column2">
	      	<?php echo CHtml::label('Relation :', ''); ?>
              	<?php echo (!empty($info->employee_guardian_relation) ? $info->employee_guardian_relation : "Not Set");?>
	</div>

</div>
	
<div class="row">
	<div class="row-column1">
		 <?php echo CHtml::label('Qualification :','employee_guardian_qualification'); ?>
		 <?php echo (!empty($info->employee_guardian_qualification) ? $info->employee_guardian_qualification : "Not Set");?>
	</div>
	<div class="row-column2">
	      <?php echo CHtml::label('Occupation :', ''); ?>
	      <?php echo (!empty($info->employee_guardian_occupation) ? $info->employee_guardian_occupation : "Not Set");?>
	</div>	   
</div>

<div class="row">
	<div class="row-column1">
	      <?php echo CHtml::label('Annual Income :', ''); ?>
	      <?php echo (!empty($info->employee_guardian_income) ? $info->employee_guardian_income : "Not Set");?>
	</div>
	 <div class="row-coloumn2">
	     	
	      <?php echo CHtml::label('Home address :', ''); ?>
	      <?php echo (!empty($info->employee_guardian_home_address) ? $info->employee_guardian_home_address : "Not Set");?>
	 </div>	
 </div>
		
<div class="row">
	<div class="row-column1">
	      <?php echo CHtml::label('Occupation Address :',''); ?>
	      <?php echo (!empty($info->employee_guardian_occupation_address) ? $info->employee_guardian_occupation_address : "Not Set");?>
	</div>	

	<div class="row-column2">
	     <?php echo CHtml::label('Occupation City :','employee_guardian_occupation_city'); ?>
	     <?php if($info->employee_guardian_occupation_city!=0)
		    echo $info->Rel_g_city->city_name;
		   else
			echo "Not Set";
		?>
	</div>
	
</div>
<div class="row">
	<div class="row-column1">
	     <?php echo CHtml::label('City Pincode :','employee_guardian_city_pin'); ?>
	     <?php echo (!empty($info->employee_guardian_city_pin) ? $info->employee_guardian_city_pin : "Not Set");?>
	</div>

	<div class="row-column2">           
	      <?php echo CHtml::label('Mobile 1 :','employee_guardian_mobile1'); ?>
	      <?php echo (!empty($info->employee_guardian_mobile1) ? $info->employee_guardian_mobile1 : "Not Set");?>
	</div>
</div> 
 <div class="row">
	<div class="row-column1">           
	      <?php echo CHtml::label('Mobile 2 :', ''); ?>
	      <?php echo (!empty($info->employee_guardian_mobile2) ? $info->employee_guardian_mobile2 : "Not Set");?>
	</div>
	<div class="row-column2">           
	      <?php echo CHtml::label('Phone :', ''); ?>
	      <?php echo (!empty($info->employee_guardian_phone_no) ? $info->employee_guardian_phone_no : "Not Set");?>
	 </div>
</div>
   
