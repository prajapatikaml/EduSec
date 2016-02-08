<div class="row">
		<?php echo CHtml::label('Line 1 :','student_address_c_line1'); ?>
		<?php echo $address->student_address_c_line1; ?>
	</div>

	<div class="row">
		<?php echo CHtml::label('Line 2 :','student_address_c_line2'); ?>
		<?php echo $address->student_address_c_line2; ?>
	</div>
		

<div class="row">
	<div class="row-left">
	<?php echo CHtml::label('Country :','student_address_c_country'); ?>
	<?php if($address->student_address_c_country!=0)
		echo $address->Rel_c_country->name; ?>
	</div>
	
	<div class="row-right">
	<?php echo CHtml::label('State / Province :','student_address_c_state'); ?>
	<?php if($address->student_address_c_state!=0)
		echo $address->Rel_c_state->state_name;?>
	</div>
</div>

<div class="row last">
	<div class="row-left">
	<?php echo CHtml::label('City :','student_address_c_city'); ?>
	<?php if($address->student_address_c_city!=0)
		echo $address->Rel_c_city->city_name;?>
	</div>

	<div class="row-right">
	<?php echo CHtml::label('Zip / Postal Code :','student_address_c_pin'); ?>
	<?php echo $address->student_address_c_pin;?>
	</div>
</div>
