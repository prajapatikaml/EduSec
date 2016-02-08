	<div class="row">
		 <?php echo CHtml::label('Line 1 :', ''); ?>
		 <?php echo $address->employee_address_c_line1;?>		
	</div>
	<div class="row">
		 <?php echo CHtml::label('Line 2 :', '');?>
		  <?php echo $address->employee_address_c_line2;?>
	</div>

	<div class="row">
		<div class="row-right">
		 <?php echo CHtml::label('Country :', ''); ?>
		<?php if($address->employee_address_c_country!=0)
			echo $address->Rel_c_country->name;?>
	   	</div>
		<div class="row-left">
		 <?php echo CHtml::label('State/Province :', ''); ?>
		<?php if($address->employee_address_c_state!=0)
			echo $address->Rel_c_state->state_name;?>
		</div>
	</div>

	<div class="row last">
		<div class="row-left">
		<?php echo CHtml::label('City :', ''); ?>
		<?php if($address->employee_address_c_city!=0)
			echo $address->Rel_c_city->city_name;?>
	   	</div>
		<div class="row-right">
		 <?php echo CHtml::label('Zip / Postal Code :', ''); ?>
		 <?php echo $address->employee_address_c_pincode;?>
	   	</div>

	</div>

