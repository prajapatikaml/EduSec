<div class="row">
      	<div class="row-column1">
      	      <?php echo CHtml::label('Attendance card id :', '' , '' ); ?>
              <?php echo (!empty($info->employee_attendance_card_id) ? $info->employee_attendance_card_id : "Not Set");?>
     	</div>
	<div class="row-column2">
	       <?php echo CHtml::label('Curricular :','employee_curricular'); ?>
	       <?php echo (!empty($info->employee_curricular) ? $info->employee_curricular : "Not Set");?>
	</div>
      	<!--div class="row-column2">
	       <?php //echo CHtml::label('Faculty of :', '' ); ?>
               <?php //echo $info->employee_faculty_of;?>
	</div-->
</div>
<div class="row">
	<div class="row-column1">
	       <?php echo CHtml::label('Technical Skills :','employee_technical_skills'); ?>
	       <?php echo (!empty($info->employee_technical_skills) ? $info->employee_technical_skills : "Not Set");?>
	</div>
	<div class="row-column2">
	       <?php echo CHtml::label('Project Details :','employee_project_details'); ?>
	       <?php echo (!empty($info->employee_project_details) ? $info->employee_project_details : "Not Set");?>
      	</div>
</div>
<div class="row">
	<div class="row-column1">
	       <?php echo CHtml::label('EPF Number :','employee_pf_id'); ?>
	       <?php echo (!empty($info->employee_pf_id) ? $info->employee_pf_id : "Not Set");?>
	</div>
	      	

	<div class="row-column2">
	       <?php echo CHtml::label('Hobbies :','employee_hobbies'); ?>
	       <?php echo (!empty($info->employee_hobbies) ? $info->employee_hobbies : "Not Set");?>
	</div>
</div>
<div class="row"  style=width:200px;>
	
		<?php echo CHtml::label('Language Known :', '' ); ?>
		<?php 
			echo (!empty($lang->languages_known1) ? $lang->languages_known1 :"Not Set");;?>

	 <!--div class="row-column2">
		<?php echo CHtml::label('Language Known 2 :', '' );?>
		<?php if($lang->languages_known2 )
			echo $lang->Rel_Langs2->languages_name;?>
	 </div-->	

</div>	
<!--div class="row">
	<div class="row-column1">
		<?php // echo CHtml::label('Language Known 3 :', '' ); ?>
		<?php 
			//if($lang->languages_known3)
			//echo $lang->Rel_Langs3->languages_name;?>
	 </div>
	 <div class="row-column2">
		<?php //echo CHtml::label('Language Known 4 :', '' );?>
		<?php //if($lang->languages_known4 )
			//echo $lang->Rel_Langs4->languages_name;?>
	 </div>	

</div-->	

<div class="row last">
	<div class="row-column1">
	       <?php echo CHtml::label('Reference :','employee_reference'); ?>
	       <?php echo (!empty($info->employee_reference) ? $info->employee_reference : "Not Set");?>
	</div>
	<div class="row-column2">
	       <?php echo CHtml::label('Reference Designation :', '' ); ?>
	       <?php echo (!empty($info->employee_refer_designation) ? $info->employee_refer_designation : "Not Set");?>
	</div>
	
</div>


	
