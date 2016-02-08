<div class="row">
     	<div class="row-column1">
      		<?php echo CHtml::label('Name :', ''); ?>
      		<?php echo $info->employee_guardian_name;?>
     	</div>
        <div class="row-column2">
	      	<?php echo CHtml::label('Relation :', ''); ?>
              	<?php echo $info->employee_guardian_relation;?>
	</div>

</div>
	
<div class="row">
	<div class="row-column1">
	      <?php echo CHtml::label('Occupation :', ''); ?>
	      <?php echo $info->employee_guardian_occupation;?>
	</div>	   
	<div class="row-column2">
	      <?php echo CHtml::label('Income :', ''); ?>
	      <?php echo $info->employee_guardian_income;?>
	</div>
</div>

<div class="row">
	      <?php echo CHtml::label('Home address :', ''); ?>
	      <?php echo $info->employee_guardian_home_address;?>
</div>

<div class="row last">
     	<div class="row-column3">           
	      <?php echo CHtml::label('Mobile :', ''); ?>
	      <?php echo $info->employee_guardian_mobile1;?>
	</div>
	 <div class="row-column2">
	      <?php echo CHtml::label('Phone :', ''); ?>
	      <?php echo $info->employee_guardian_phone_no;?>
	 </div>

</div>    
