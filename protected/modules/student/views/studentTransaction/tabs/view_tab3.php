<div class="row">
	<div class="row-left">
        <?php echo CHtml::label('Blood Group','student_bloodgroup'); ?>
        <?php echo $info->student_bloodgroup; ?>
	</div>

</div>

<div class="row">
	<div class="row-left">
        <?php echo CHtml::label('Language Known 1','languages_known1'); ?>
        <?php 
		if($lang->languages_known1)
		echo $lang->Rel_Langs1->languages_name;?>
	</div>

	<div class="row-right">
	<?php echo CHtml::label('Language Known 2','languages_known2');?>
	<?php if($lang->languages_known2)
		echo $lang->Rel_Langs2->languages_name;?>
	</div>
</div>
  <div class="row">
	<div class="row-left">
       		<?php echo CHtml::label('Email ID','student_email_id_1'); ?>       		 			<?php echo $info->student_email_id_1; ?>
	</div>
  </div>

