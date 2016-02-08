<div class="row">
	      <div class="row-left">
	       <?php echo $form->labelEx($info,'employee_attendance_card_id'); ?>
               <?php echo $form->textField($info,'employee_attendance_card_id',array('size'=>18,'maxlength'=>15,'tabindex'=>1)); ?><span class="status">&nbsp;</span>
               <?php echo $form->error($info,'employee_attendance_card_id'); ?>
	      </div>

	      <div class="row-right">
	       <?php echo $form->labelEx($info,'employee_faculty_of'); ?>
               <?php echo $form->textField($info,'employee_faculty_of',array('size'=>18,'maxlength'=>50,'tabindex'=>2)); ?><span class="status">&nbsp;</span>
               <?php echo $form->error($info,'employee_faculty_of'); ?>
	      </div>
</div>
               
<div class="row-textarea">
	      <div class="row-left">
	       <?php echo $form->labelEx($info,'employee_curricular'); ?>
               <?php echo $form->textArea($info,'employee_curricular',array('maxlength'=>200,'rows'=>2, 'cols'=>16,'tabindex'=>3)); ?><span class="status">&nbsp;</span>
               <?php echo $form->error($info,'employee_curricular'); ?>
	      </div>


	      <div class="row-right">
	       <?php echo $form->labelEx($info,'employee_project_details'); ?>
               <?php echo $form->textArea($info,'employee_project_details',array('maxlength'=>200,'rows'=>2, 'cols'=>16,'tabindex'=>4));?><span class="status">&nbsp;</span>
               <?php echo $form->error($info,'employee_project_details'); ?>
	      </div>

</div>
<div class="row-textarea">
	      <div class="row-left">
	       <?php echo $form->labelEx($info,'employee_technical_skills'); ?>
               <?php echo $form->textArea($info,'employee_technical_skills',array('maxlength'=>200,'rows'=>2, 'cols'=>16,'tabindex'=>5)); ?><span class="status">&nbsp;</span>
               <?php echo $form->error($info,'employee_technical_skills'); ?>
	      </div>


	      <div class="row-right">
	       <?php echo $form->labelEx($info,'employee_hobbies'); ?>
               <?php echo $form->textArea($info,'employee_hobbies',array('maxlength'=>200,'rows'=>2, 'cols'=>16,'tabindex'=>6),array('maxlength' =>200)); ?><span class="status">&nbsp;</span>
               <?php echo $form->error($info,'employee_hobbies'); ?>
	      </div>
</div>
<div class="row">
	      <div class="row-left">
		<?php echo $form->labelEx($lang,'languages_known1'); ?>
		<?php echo $form->dropDownList($lang,'languages_known1',Languages::items(),array('empty'=>'-----------Select---------','tabindex'=>7)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($lang,'languages_known1'); ?>
	      </div>


	      <div class="row-right">
		<?php echo $form->labelEx($lang,'languages_known2');?>
		<?php echo $form->dropDownList($lang,'languages_known2',Languages::items(),array('empty'=>'-----------Select---------','tabindex'=>8)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($lang,'languages_known2'); ?>
	      </div>
</div>
<div class="row">
	      <div class="row-left">
		<?php echo $form->labelEx($lang,'languages_known3');?>
		<?php echo $form->dropDownList($lang,'languages_known3',Languages::items(),array('empty'=>'-----------Select---------','tabindex'=>9)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($lang,'languages_known3'); ?>
	      </div>


	      <div class="row-right">
		<?php echo $form->labelEx($lang,'languages_known4');?>
		<?php echo $form->dropDownList($lang,'languages_known4',Languages::items(),array('empty'=>'-----------Select---------','tabindex'=>10)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($lang,'languages_known4');?>
	      </div>


</div>	
<div class="row">
	      <div class="row-left">
	       <?php echo $form->labelEx($info,'employee_reference'); ?>
               <?php echo $form->textField($info,'employee_reference',array('size'=>18,'maxlength'=>25,'tabindex'=>11)); ?><span class="status">&nbsp;</span>
               <?php echo $form->error($info,'employee_reference'); ?>
	      </div>

	      <div class="row-right">
	       <?php echo $form->labelEx($info,'employee_refer_designation'); ?>
               <?php echo $form->textField($info,'employee_refer_designation',array('size'=>18,'maxlength'=>20,'tabindex'=>12)); ?><span class="status">&nbsp;</span>
               <?php echo $form->error($info,'employee_refer_designation'); ?>
	      </div>
</div>                
