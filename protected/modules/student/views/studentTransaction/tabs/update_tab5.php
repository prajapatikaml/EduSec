
	<div class="form5">
	<?php echo ('<b><u>Current Address :</u></b>'); ?>
	</div>

	<div class="form5">
	<?php echo ('&nbsp;'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($address,'student_address_c_line1'); ?>
		<?php echo $form->textField($address,'student_address_c_line1',array('size'=>59,'maxlength'=>100,'tabindex'=>1)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($address,'student_address_c_line1'); ?>
		</div>

		<div class="row">
		<?php echo $form->labelEx($address,'student_address_c_line2'); ?>
		<?php echo $form->textField($address,'student_address_c_line2',array('size'=>59,'maxlength'=>100,'tabindex'=>2)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($address,'student_address_c_line2'); ?>
	</div>

<div class="row">

	<div class="row-right">
	<?php echo $form->labelEx($address,'student_address_c_country'); ?>
	<?php //echo $form->dropDownList($address,'student_address_c_country',Country::items(), array('empty' => '-----------Select---------','tabindex'=>6)); 
		echo $form->dropDownList($address,'student_address_c_country' ,Country::items(),
			array(
			'prompt' => '-----------Select-----------','tabindex'=>3,
			'ajax' => array(
			'type'=>'POST', 
			'url'=>CController::createUrl('dependent/UpdateStudCStates'), 
			'update'=>'#StudentAddress_student_address_c_state', //selector to update
			
			))); 
	?>
	<span class="status">&nbsp;</span>
	<?php echo $form->error($address,'student_address_c_country'); ?>
	</div>

	
	<div class="row-left">
		<?php echo $form->labelEx($address,'student_address_c_state'); ?>
		<?php 
			if(isset($address->student_address_c_state))
			echo $form->dropDownList($address,'student_address_c_state', CHtml::listData(State::model()->findAll(array('condition'=>'country_id='.$address->student_address_c_country)), 'state_id', 'state_name'),
			array(
			'prompt' => '-----------Select-----------','tabindex'=>4,
			'ajax' => array(
			'type'=>'POST', 
			'url'=>CController::createUrl('dependent/UpdateStudCCities'), 
			'update'=>'#StudentAddress_student_address_c_city', //selector to update
			
			)));
			else	
			echo $form->dropDownList($address,'student_address_c_state',array(),
			array(
			'prompt' => '-----------Select-----------','tabindex'=>4,
			'ajax' => array(
			'type'=>'POST', 
			'url'=>CController::createUrl('dependent/UpdateStudCCities'), 
			'update'=>'#StudentAddress_student_address_c_city', //selector to update
			
			)));?><span class="status">&nbsp;</span>
		<?php echo $form->error($address,'student_address_c_state'); ?>
	</div>

</div>

<div class="row">

	<div class="row-left">
	<?php echo $form->labelEx($address,'student_address_c_city'); ?>
	<?php 
		if(isset($address->student_address_c_city))
		echo $form->dropDownList($address,'student_address_c_city', CHtml::listData(City::model()->findAll(array('condition'=>'state_id='.$address->student_address_c_state)), 'city_id', 'city_name'));
		else
		echo $form->dropDownList($address,'student_address_c_city',array(), array('empty' => '-----------Select---------','tabindex'=>5)); ?><span class="status">&nbsp;</span>
	<?php echo $form->error($address,'student_address_c_city'); ?>
	</div>


	<div class="row-right">
	<?php echo $form->labelEx($address,'student_address_c_pin'); ?>
	<?php echo $form->textField($address,'student_address_c_pin',array('size'=>11,'maxlength'=>6,'tabindex'=>6)); ?><span class="status">&nbsp;</span>
	<?php echo $form->error($address,'student_address_c_pin'); ?>
	</div>


</div>


		<input type="checkbox" id="ckbox" name="address" onclick="FillAddress(this.form)">
		<em>Check this box if Current Address and Permenent Address are the same.</em>
<br />
<br />

	<div class="form5">
	<?php echo ('<b><u>Permenent Address :</u></b>'); ?>
	</div>

	<div class="form5">
	<?php echo ('&nbsp;'); ?>
	</div>


<div class="row">
	<?php echo $form->labelEx($address,'student_address_p_line1'); ?>
	<?php echo $form->textField($address,'student_address_p_line1',array('size'=>59,'maxlength'=>100,'tabindex'=>7)); ?><span class="status">&nbsp;</span>
	<?php echo $form->error($address,'student_address_p_line1'); ?>
</div>

<div class="row">
	<?php echo $form->labelEx($address,'student_address_p_line2'); ?>
	<?php echo $form->textField($address,'student_address_p_line2',array('size'=>59,'maxlength'=>100,'tabindex'=>8)); ?><span class="status">&nbsp;</span>
	<?php echo $form->error($address,'student_address_p_line2'); ?>
</div>

<div class="row">

	<div class="row-right">
	<?php echo $form->labelEx($address,'student_address_p_country'); ?>
	<?php 
		echo $form->dropDownList($address,'student_address_p_country',Country::items(), array(
			'prompt' => '-----------Select-----------','tabindex'=>9,
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
			if(!empty($address->student_address_p_state))
			echo $form->dropDownList($address,'student_address_p_state', CHtml::listData(State::model()->findAll(array('condition'=>'country_id='.$address->student_address_p_country)), 'state_id', 'state_name'),
			array(
			'prompt' => '-----------Select-----------','tabindex'=>10,
			'ajax' => array(
			'type'=>'POST', 
			'url'=>CController::createUrl('dependent/UpdateStudPCities'), 
			'update'=>'#StudentAddress_student_address_p_city', //selector to update
			
			)));
			else
			echo $form->dropDownList($address,'student_address_p_state',array(), 			array(
			'prompt' => '-----------Select-----------','tabindex'=>10,
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
		if(!empty($address->student_address_p_city))
		echo $form->dropDownList($address,'student_address_p_city', CHtml::listData(City::model()->findAll(array('condition'=>'state_id='.$address->student_address_p_state)), 'city_id', 'city_name'));
		else
		echo $form->dropDownList($address,'student_address_p_city',array(), array('empty' => '-----------Select---------','tabindex'=>11)); ?><span class="status">&nbsp;</span>
	<?php echo $form->error($address,'student_address_p_city'); ?>
	</div>

	<div class="row-right">
	<?php echo $form->labelEx($address,'student_address_p_pin'); ?>
	<?php echo $form->textField($address,'student_address_p_pin',array('size'=>11,'maxlength'=>6,'tabindex'=>12)); ?><span class="status">&nbsp;</span>
	<?php echo $form->error($address,'student_address_p_pin'); ?>
	</div>


</div>



<div class="row">
	<div class="row-left">
	<?php echo $form->labelEx($address,'student_address_phone'); ?>
	<?php echo $form->textField($address,'student_address_phone',array('size'=>18,'maxlength'=>15,'tabindex'=>13)); ?><span class="status">&nbsp;</span>
	<?php echo $form->error($address,'student_address_phone'); ?>
	</div>
	
	<div class="row-right">
	<?php echo $form->labelEx($address,'student_address_mobile'); ?>
	<?php echo $form->textField($address,'student_address_mobile',array('size'=>18,'maxlength'=>15,'tabindex'=>14)); ?><span class="status">&nbsp;</span>
	<?php echo $form->error($address,'student_address_mobile'); ?>
	</div>

</div>
	<div class="form5">
		<?php echo ('&nbsp;'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'submit','name'=>'tab5','tabindex'=>12)); 
			//echo CHtml::button('save',array('class'=>'submit','submit'=>array('update')); 
		?>
       </div>
