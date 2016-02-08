<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employee-address-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	

	<div class="row">
		<?php echo $form->labelEx($model,'employee_address_c_line1'); ?>
		<?php echo $form->textField($model,'employee_address_c_line1',array('size'=>50,'maxlength'=>50)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'employee_address_c_line1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'employee_address_c_line2'); ?>
		<?php echo $form->textField($model,'employee_address_c_line2',array('size'=>50,'maxlength'=>50)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'employee_address_c_line2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'employee_address_c_city'); ?>
		<?php echo $form->dropDownList($model,'employee_address_c_city',City::items()); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'employee_address_c_city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'employee_address_c_pincode'); ?>
		<?php echo $form->textField($model,'employee_address_c_pincode'); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'employee_address_c_pincode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'employee_address_c_state'); ?>
		<?php  echo $form->dropDownList($model,'employee_address_c_state',State::items()); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'employee_address_c_state'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'employee_address_c_country'); ?>
		<?php echo $form->dropDownList($model,'employee_address_c_country',Country::items()); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'employee_address_c_country'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'employee_address_p_line1'); ?>
		<?php echo $form->textField($model,'employee_address_p_line1',array('size'=>50,'maxlength'=>50)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'employee_address_p_line1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'employee_address_p_line2'); ?>
		<?php echo $form->textField($model,'employee_address_p_line2',array('size'=>50,'maxlength'=>50)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'employee_address_p_line2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'employee_address_p_city'); ?>
		<?php echo $form->dropDownList($model,'employee_address_p_city',City::items());?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'employee_address_p_city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'employee_address_p_pincode'); ?>
		<?php echo $form->textField($model,'employee_address_p_pincode'); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'employee_address_p_pincode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'employee_address_p_state'); ?>
		<?php echo $form->dropDownList($model,'employee_address_p_state',State::items()); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'employee_address_p_state'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'employee_address_p_country'); ?>
		<?php  echo $form->dropDownList($model,'employee_address_p_country',Country::items()); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'employee_address_p_country'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'employee_address_phone'); ?>
		<?php echo $form->textField($model,'employee_address_phone'); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'employee_address_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'employee_address_mobile'); ?>
		<?php echo $form->textField($model,'employee_address_mobile'); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'employee_address_mobile'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
