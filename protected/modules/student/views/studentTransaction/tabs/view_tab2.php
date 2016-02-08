<div class="row">
	<div class="row-column1">
        <?php echo CHtml::label('Guardian Name :','student_guardian_name'); ?>
        <?php echo $info->student_guardian_name; ?>	
	</div>
	
	<div class="row-column2">
        <?php echo CHtml::label('Relation :','student_guardian_relation'); ?>
	<?php echo $info->student_guardian_relation; ?>	
	</div>

</div>

<div class="row">
	<div class="row-column1">
        <?php echo CHtml::label('Guardian Occupation :','student_guardian_occupation'); ?>
        <?php echo $info->student_guardian_occupation; ?>	
	</div>
	
	<div class="row-column2">
        <?php echo CHtml::label('Income :','student_guardian_income'); ?>
	<?php echo $info->student_guardian_income; ?>	
	</div>

</div>

<div class="row">
	<div class="row-column2">
        <?php echo CHtml::label('Contact No :','student_guardian_phoneno'); ?>
        <?php echo $info->student_guardian_phoneno; ?>
	</div>

	<div class="row-column3">
	<?php echo CHtml::label('Mobile No :','student_guardian_mobile'); ?>
        <?php echo $info->student_guardian_mobile; ?>
	</div>
</div>

<div class="row last">
        <?php echo CHtml::label('Home Address :','student_guardian_home_address'); ?>
        <?php echo $info->student_guardian_home_address; ?>
</div>
