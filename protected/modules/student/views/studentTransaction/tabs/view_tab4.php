<fieldset>
 <legend> Local Address </legend>
<div class="row" >
	<?php echo CHtml::label('Street 1 :','student_address_c_line1'); ?>
	<?php echo (!empty($address->student_address_c_line1) ? $address->student_address_c_line1 :"Not Set"); ?>
</div>

<div class="row">
	<?php echo CHtml::label('Street  2','student_address_c_line2'); ?>
	<?php echo (!empty($address->student_address_c_line2) ? $address->student_address_c_line2 : "Not Set"); ?>
</div>
		

<div class="row">
	<div class="row-column1">
	<?php echo CHtml::label('Country :','student_address_c_country'); ?>
	<?php if($address->student_address_c_country!=0)
		echo $address->Rel_c_country->name; 
	      else
		echo "Not Set";?>
	</div>
	
	<div class="row-column2">
	<?php echo CHtml::label('State :','student_address_c_state'); ?>
	<?php if($address->student_address_c_state!=0)
		echo $address->Rel_c_state->state_name;
             else
		echo "Not Set";?>
	</div>
</div>

<div class="row">
	<div class="row-column1">
	<?php echo CHtml::label('Town :','student_address_c_city'); ?>
	<?php if($address->student_address_c_city!=0)
		echo $address->Rel_c_city->city_name;
              else
		echo "Not Set";?>
	</div>

	<div class="row-column2">
	<?php echo CHtml::label('Postcode :','student_address_c_pin'); ?>
	<?php echo (!empty($address->student_address_c_pin) ? $address->student_address_c_pin : "Not Set");?>
	</div>
</div>
<div class="row">
	
	<div class="row-column1">
	<?php echo CHtml::label('Mobile No. :','student_address_c_mobile'); ?>
	<?php echo (!empty($address->student_address_c_mobile) ? $address->student_address_c_mobile :"Not Set");?>
	</div>
	<div class="row-column2">
	<?php echo CHtml::label('Phone No. :','student_address_c_phone'); ?>
	<?php echo (!empty($address->student_address_c_phone) ? $address->student_address_c_phone : "Not Set");?>
	</div>
	
</div>
<div class="row">
	<div class="row-column1">
	<?php echo CHtml::label('House No. :','student_c_house_no'); ?>
	<?php echo (!empty($address->student_c_house_no) ? $address->student_c_house_no : "Not Set");?>
	</div>
</div>
</fieldset>
<fieldset>
<legend> International Address</legend>
<div class="row">
	<?php echo CHtml::label('Street 1 :','student_address_p_line1'); ?>
	<?php echo (!empty($address->student_address_p_line1) ? $address->student_address_p_line1 : "Not Set");?>
</div>

<div class="row">
	<?php echo CHtml::label('Street 2 :','student_address_p_line2'); ?>
	<?php echo (!empty($address->student_address_p_line2) ? $address->student_address_p_line2 :"Not Set");?>
</div>

<div class="row">
	<div class="row-column1">
	<?php echo CHtml::label('Country :','student_address_p_country'); ?>
	<?php if($address->student_address_p_country!=0)
		echo $address->Rel_p_country->name; 
	  else
		echo "Not Set";?>
	</div>

	<div class="row-column2">
	<?php echo CHtml::label('State :','student_address_p_state'); ?>
	<?php if($address->student_address_p_state!=0)
		echo $address->Rel_p_state->state_name;
	  else
		echo "Not Set";?>
	</div>

</div>

<div class="row">
	<div class="row-column1">
	<?php echo CHtml::label('Town :','student_address_p_city'); ?>
	<?php if($address->student_address_p_city!=0)
		echo $address->Rel_p_city->city_name;
	  else
		echo "Not Set";?>
	</div>

	<div class="row-column2">
	<?php echo CHtml::label('Postcode :','student_address_p_pin'); ?>
	<?php echo (!empty($address->student_address_p_pin) ? $address->student_address_p_pin : "Not Set");?>
	</div>
</div>
<div class="row">
	<div class="row-column1">
	<?php echo CHtml::label('Phone:','student_address_p_phone'); 
		echo (!empty($address->student_address_p_phone) ? $address->student_address_p_phone : "Not Set" );?>
	</div>

	<div class="row-column2">
	<?php echo CHtml::label('Mobile :','student_address_p_mobile'); ?>
	<?php echo (!empty($address->student_address_p_mobile) ? $address->student_address_p_mobile :"Not Set");?>
	</div>
</div>
<div class="row">
	
	<div class="row-column1">
	<?php echo CHtml::label('House No. :','student_p_house_no'); ?>
	<?php echo (!empty($address->student_p_house_no) ? $address->student_p_house_no : "Not Set");?>
	</div>
</div>

</fieldset>
