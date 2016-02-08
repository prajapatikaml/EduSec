<div class="row">
        <?php echo $form->labelEx($info,'student_email_id_1'); ?>
        <?php echo $form->textField($info,'student_email_id_1',array('size'=>38,'maxlength'=>60,'tabindex'=>1)); ?><span class="status">&nbsp;</span>
        <?php echo $form->error($info,'student_email_id_1'); ?>
	</div>

<div class="row">
        <?php echo $form->labelEx($info,'student_email_id_2'); ?>
        <?php echo $form->textField($info,'student_email_id_2',array('size'=>38,'maxlength'=>60,'tabindex'=>2)); ?><span class="status">&nbsp;</span>
        <?php echo $form->error($info,'student_email_id_2'); ?>
	</div>


    <div class="row">

<!--
	<div class="row-left">
        <?php echo $form->labelEx($info,'student_tally_id'); ?>
        <?php echo $form->textField($info,'student_tally_id',array('size'=>17,'maxlength'=>200,'tabindex'=>3)); ?><span class="status">&nbsp;</span>
        <?php echo $form->error($info,'student_tally_id'); ?>
	</div>
-->
	<div class="row-left">
        <?php echo $form->labelEx($info,'student_bloodgroup'); ?>
        <?php echo $form->dropdownList($info,'student_bloodgroup',$info->getBloodGroup(), array('empty' => '-----------Select---------','tabindex'=>3)); ?><span class="status">&nbsp;</span>
        <?php echo $form->error($info,'student_bloodgroup'); ?>
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

     <div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'submit','name'=>'tab3','tabindex'=>12)); 
			//echo CHtml::button('save',array('class'=>'submit','submit'=>array('update')); 
		?>
    </div>

