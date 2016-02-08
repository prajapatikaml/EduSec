<div class="row">
      	<div class="row-column1">
      	      <?php echo CHtml::label('Attendance card id', '' , '' ); ?>
              <?php echo $info->employee_attendance_card_id;?>
     	</div>
      	<div class="row-column2">
	       <?php echo CHtml::label('Faculty of', '' ); ?>
               <?php echo $info->employee_faculty_of;?>
	</div>
</div>

	

<div class="row">
	<div class="row-column1">
		<?php echo CHtml::label('Language Known 1', '' ); ?>
		<?php 
			if($lang->languages_known1)
			echo $lang->Rel_Langs1->languages_name;?>
	 </div>
	 <div class="row-column2">
		<?php echo CHtml::label('Language Known 2', '' );?>
		<?php if($lang->languages_known2 )
			echo $lang->Rel_Langs2->languages_name;?>
	 </div>	

</div>	

<div class="row last">

	<div class="row-column1">
	       <?php echo CHtml::label('Designation', '' ); ?>
	       <?php echo $info->employee_refer_designation;?>
	</div>
	
</div>

	
