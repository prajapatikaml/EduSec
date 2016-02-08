<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-transaction-form',
	//'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

<div class="row">
	<?php echo $form->labelEx($address,'student_address_p_line1'); ?>
	<?php echo $form->textField($address,'student_address_p_line1',array('size'=>59,'maxlength'=>100)); ?><span class="status">&nbsp;</span>
	<?php echo $form->error($address,'student_address_p_line1'); ?>
</div>

<div class="row">
	<?php echo $form->labelEx($address,'student_address_p_line2'); ?>
	<?php echo $form->textField($address,'student_address_p_line2',array('size'=>59,'maxlength'=>100)); ?><span class="status">&nbsp;</span>
	<?php echo $form->error($address,'student_address_p_line2'); ?>
</div>

<div class="row">

	<div class="row-right">
	<?php echo $form->labelEx($address,'student_address_p_country'); ?>
	<?php 
		echo $form->dropDownList($address,'student_address_p_country',Country::items(), array(
			'prompt' => '-----------Select-----------',
			'ajax' => array(
			'type'=>'POST', 
			'url'=>CController::createUrl('dependent/UpdateStudPStates'), 
			'update'=>'#StudentAddress_student_address_p_state', //selector to update
			
			))); ?><span class="status">&nbsp;</span>
	<?php echo $form->error($address,'student_address_p_country'); ?>
	</div>

	<div class="row-left">
	<?php echo $form->labelEx($address,'student_address_p_state'); ?>
	<?php 
			if(isset($address->student_address_p_state))
			echo $form->dropDownList($address,'student_address_p_state', CHtml::listData(State::model()->findAll(array('condition'=>'country_id='.$address->student_address_p_country)), 'state_id', 'state_name'),
			array(
			'prompt' => '-----------Select-----------',
			'ajax' => array(
			'type'=>'POST', 
			'url'=>CController::createUrl('dependent/UpdateStudPCities'), 
			'update'=>'#StudentAddress_student_address_p_city', //selector to update
			
			)));
			else
			echo $form->dropDownList($address,'student_address_p_state',array(), 			array(
			'prompt' => '-----------Select-----------',
			'ajax' => array(
			'type'=>'POST', 
			'url'=>CController::createUrl('dependent/UpdateStudPCities'), 
			'update'=>'#StudentAddress_student_address_p_city', //selector to update
			
			))); ?><span class="status">&nbsp;</span>
	<?php echo $form->error($address,'student_address_p_state'); ?>
	</div>

</div>

<div class="row">

	<div class="row-left">
	<?php echo $form->labelEx($address,'student_address_p_city'); ?>
	<?php 
		if(isset($address->student_address_p_city))
		echo $form->dropDownList($address,'student_address_p_city', CHtml::listData(City::model()->findAll(array('condition'=>'state_id='.$address->student_address_p_state)), 'city_id', 'city_name'));
		else
		echo $form->dropDownList($address,'student_address_p_city',array(), array('empty' => '-----------Select---------')); ?><span class="status">&nbsp;</span>
	<?php echo $form->error($address,'student_address_p_city'); ?>
	</div>

	<div class="row-right">
	<?php echo $form->labelEx($address,'student_address_p_pin'); ?>
	<?php echo $form->textField($address,'student_address_p_pin',array('size'=>11,'maxlength'=>6)); ?><span class="status">&nbsp;</span>
	<?php echo $form->error($address,'student_address_p_pin'); ?>
	</div>


</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'submit')); ?>
	</div>

<?php $this->endWidget(); ?>  
