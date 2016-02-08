<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-address-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php
		$city= new City;
	        $state= new State;
		$country= new Country;
	?>
	<div class="row">
		<?php echo $form->labelEx($model,'student_address_c_line1'); ?>
		<?php echo $form->textField($model,'student_address_c_line1',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'student_address_c_line1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_address_c_line2'); ?>
		<?php echo $form->textField($model,'student_address_c_line2',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'student_address_c_line2'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'student_address_c_country'); ?>
		<?php echo $form->dropDownList($model,'student_address_c_country',Country :: items()); ?>
		<?php echo $form->error($model,'student_address_c_country'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_address_c_city'); ?>
		<?php echo $form->dropDownList($model,'student_address_c_city',City :: items()); ?>
		<?php echo $form->error($model,'student_address_c_city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_address_c_pin'); ?>
		<?php echo $form->textField($model,'student_address_c_pin'); ?>
		<?php echo $form->error($model,'student_address_c_pin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_address_c_state'); ?>
		<?php echo $form->dropDownList($model,'student_address_c_state',State::items()); ?>
		<?php echo $form->error($model,'student_address_c_state'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_address_p_line1'); ?>
		<?php echo $form->textField($model,'student_address_p_line1',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'student_address_p_line1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_address_p_line2'); ?>
		<?php echo $form->textField($model,'student_address_p_line2',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'student_address_p_line2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_address_p_city'); ?>
		<?php echo $form->dropDownList($model,'student_address_p_city',City :: items()); ?>
		<?php echo $form->error($model,'student_address_p_city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_address_p_pin'); ?>
		<?php echo $form->textField($model,'student_address_p_pin'); ?>
		<?php echo $form->error($model,'student_address_p_pin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_address_p_state'); ?>
		<?php echo $form->dropDownList($model,'student_address_p_state',State::items()); ?>
		<?php echo $form->error($model,'student_address_p_state'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_address_p_country'); ?>
		<?php echo $form->dropDownList($model,'student_address_p_country',Country::items()); ?>
		<?php echo $form->error($model,'student_address_p_country'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_address_phone'); ?>
		<?php echo $form->textField($model,'student_address_phone'); ?>
		<?php echo $form->error($model,'student_address_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_address_mobile'); ?>
		<?php echo $form->textField($model,'student_address_mobile'); ?>
		<?php echo $form->error($model,'student_address_mobile'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
