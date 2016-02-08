<fieldset>
 <legend> Local Address </legend>	
	<div class="row">
		 <?php echo CHtml::label('Street 1 :', ''); ?>
		 <?php echo (!empty($address->employee_address_c_line1) ? $address->employee_address_c_line1 : "Not Set");?>	
	</div>
	<div class="row">
		 <?php echo CHtml::label('Street 2 :', '');?>
		  <?php echo (!empty($address->employee_address_c_line1) ? $address->employee_address_c_line1 : "Not Set");?>	
	</div>
	
	<div class="row">
		<div class="row-coloumn1">
		 <?php echo CHtml::label('Country :', ''); ?>
		<?php if($address->employee_address_c_country!=0)
			echo $address->Rel_c_country->name;
			else
			echo "Not Set";		
		?>
	   	</div>
		<div class="row-coloumn2">
		 <?php echo CHtml::label('State/Province :', ''); ?>
		<?php if($address->employee_address_c_state!=0)
			echo $address->Rel_c_state->state_name;
			else
			echo "Not Set";			
		?>
		</div>
	</div>

	<div class="row">
		<div class="row-coloumn1">
		<?php echo CHtml::label('Town :', ''); ?>
		<?php if($address->employee_address_c_city!=0)
			echo $address->Rel_c_city->city_name;
			else
			echo "Not Set";	
		?>
	   	</div>
		<div class="row-coloumn2">
		 <?php echo CHtml::label('PostCode :', ''); ?>
		 <?php echo (!empty($address->employee_address_c_pincode) ? $address->employee_address_c_pincode : "Not Set");?>
	   	</div>

	</div>
	<div class="row">
	<div class="row-column1">
	<?php echo CHtml::label('Phone:','employee_address_c_phone'); 
		echo (!empty($address->employee_address_c_phone) ? $address->employee_address_c_phone : "Not Set" );?>
	</div>

	<div class="row-column2">
	<?php echo CHtml::label('Mobile :','employee_address_c_mobile'); ?>
	<?php echo (!empty($address->employee_address_c_mobile) ? $address->employee_address_c_mobile :"Not Set");?>
	</div>
	</div>
	<div class="row">
	
	<div class="row-column1">
	<?php echo CHtml::label('House No. :','employee_c_house_no'); ?>
	<?php echo (!empty($address->employee_c_house_no) ? $address->employee_c_house_no : "Not Set");?>
	</div>
	</div>
</fieldset>
<fieldset>
<legend> International Address</legend>
		<div class="row">
		 <?php echo CHtml::label('Street 1 :', ''); ?>
		 <?php echo (!empty($address->employee_address_p_line1) ? $address->employee_address_p_line1 : "Not Set");?>		
	</div>
	<div class="row">
		 <?php echo CHtml::label('Street 2 :', '');?>
		  <?php echo (!empty($address->employee_address_p_line2) ? $address->employee_address_p_line2 : "Not Set");?>
	</div>
	
	<div class="row">
		<div class="row-coloumn1">
		 <?php echo CHtml::label('Country :', ''); ?>
		<?php if($address->employee_address_p_country!=0)
			echo $address->Rel_p_country->name;
			else
			echo "Not Set";
		?>
	   	</div>
		<div class="row-coloumn2">
		 <?php echo CHtml::label('State/Province :', ''); ?>
		<?php if($address->employee_address_p_state!=0)
			echo $address->Rel_p_state->state_name;
			else
			echo "Not Set";
		?>
		</div>
	</div>

	<div class="row">
		<div class="row-coloumn1">
		<?php echo CHtml::label('City :', ''); ?>
		<?php if($address->employee_address_p_city!=0)
			echo $address->Rel_p_city->city_name;
			else
			echo "Not Set";		
		?>
	   	</div>
		<div class="row-coloumn2">
		 <?php echo CHtml::label('Zip / Post Code :', ''); ?>
		 <?php echo (!empty($address->employee_address_p_pincode) ? $address->employee_address_p_pincode : "Not Set");?>
	   	</div>
	</div>
	<div class="row">
	<div class="row-column1">
	<?php echo CHtml::label('Phone:','employee_address_p_phone'); 
		echo (!empty($address->employee_address_p_phone) ? $address->employee_address_p_phone : "Not Set" );?>
	</div>

	<div class="row-column2">
	<?php echo CHtml::label('Mobile :','employee_address_p_mobile'); ?>
	<?php echo (!empty($address->employee_address_p_mobile) ? $address->employee_address_p_mobile :"Not Set");?>
	</div>
	</div>
	<div class="row last">
	
	<div class="row-column1">
	<?php echo CHtml::label('House No. :','employee_p_house_no'); ?>
	<?php echo (!empty($address->employee_p_house_no) ? $address->employee_p_house_no : "Not Set");?>
	</div>
	</div>
</fieldset>
