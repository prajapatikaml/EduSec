<?php

		
//print_r($data);

?>	<div class="form5">
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

	<div class="row-left">
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 4095b1a379c60405fee380f72e8f722a6bea1151
	<?php echo $form->labelEx($address,'student_address_c_country'); ?>
	<?php //echo $form->dropDownList($address,'student_address_c_country',Country::items(), array('empty' => '-----------Select---------','tabindex'=>6)); 
		echo $form->dropDownList($address,'student_address_c_country',Country::items(),
				array(
				'prompt' => '-----------Select---------','tabindex'=>3,
				'ajax' => array(
				'type'=>'POST', 
<<<<<<< HEAD
				'url'=>CController::createUrl('StudentTransaction/getItemName1'),	 	
				//'update'=>'#StudentAddress_student_address_c_state', selector to update				
				'dataType'=>'json',
		        	'success'=>'function(data) {			
		                  $("#StudentAddress_student_address_c_state").html(data.state);
				  $("#StudentAddress_student_address_c_city").html(data.city);				
		                }',
				)));


	?><span class="status">&nbsp;</span>
	<?php echo $form->error($address,'student_address_c_country'); ?>
	
=======
				'url'=>CController::createUrl('StudentTransaction/UpdateCStates'),	 					
				'update'=>'#StudentAddress_student_address_c_state',
		        	
				)));
	?><span class="status">&nbsp;</span>
	<?php echo $form->error($address,'student_address_c_country'); ?>
	
	</div>


	<div class="row-right">	
	<?php echo $form->labelEx($address,'student_address_c_state'); ?>
	<?php //echo $form->dropDownList($address,'student_address_c_state',array('prompt' => '---------------Select-------------'),array('tabindex'=>5)); 
		echo $form->dropDownList($address,'student_address_c_state',array(),
				array(
				'prompt' => '-----------Select---------','tabindex'=>4,
				'ajax' => array(
				'type'=>'POST', 
				'url'=>CController::createUrl('StudentTransaction/UpdateCCities'),	 	
				'update'=>'#StudentAddress_student_address_c_city', //selector to update
				)));

?><span class="status">&nbsp;</span>
	<?php echo $form->error($address,'student_address_c_state'); ?>
=======
	<?php echo $form->labelEx($address,'student_address_c_city'); ?>
	<?php echo $form->dropDownList($address,'student_address_c_city',City::items(), array('empty' => '-----------Select---------','tabindex'=>3)); ?><span class="status">&nbsp;</span>
	<?php echo $form->error($address,'student_address_c_city'); ?>
>>>>>>> 4095b1a379c60405fee380f72e8f722a6bea1151
	</div>


	<div class="row-right">
<<<<<<< HEAD
	
	<?php echo $form->labelEx($address,'student_address_c_state'); ?>
	<?php //echo $form->dropDownList($address,'student_address_c_state',array('prompt' => '---------------Select-------------'),array('tabindex'=>5)); 
		echo $form->dropDownList($address,'student_address_c_state',array(),
				array(
				'prompt' => '-----------Select---------','tabindex'=>4,
				'ajax' => array(
				'type'=>'POST', 
				'url'=>CController::createUrl('StudentTransaction/getItemName2'),	 	
				'update'=>'#StudentAddress_student_address_c_city', //selector to update
				
				/*'dataType'=>'json',
		        	'success'=>'function(data) {

				
		                  $("#StudentAddress_student_address_c_state").html(data.state);				
				
		                }',*/
				)));

?><span class="status">&nbsp;</span>
	<?php echo $form->error($address,'student_address_c_state'); ?>
=======
	<?php echo $form->labelEx($address,'student_address_c_pin'); ?>
	<?php echo $form->textField($address,'student_address_c_pin',array('size'=>11,'maxlength'=>6,'tabindex'=>4)); ?><span class="status">&nbsp;</span>
	<?php echo $form->error($address,'student_address_c_pin'); ?>
>>>>>>> 829db863ae7e1106d36ddfad5e1a60a47101115e
>>>>>>> 4095b1a379c60405fee380f72e8f722a6bea1151
	</div>


</div>

<div class="row">

	<div class="row-left">
	<?php echo $form->labelEx($address,'student_address_c_city'); ?>
	<?php echo $form->dropDownList($address,'student_address_c_city',array('prompt' => '-----------Select---------'), array('tabindex'=>5)); ?><span class="status">&nbsp;</span>
	<?php echo $form->error($address,'student_address_c_city'); ?>
	</div>

	<div class="row-right">
	<?php echo $form->labelEx($address,'student_address_c_pin'); ?>
	<?php echo $form->textField($address,'student_address_c_pin',array('size'=>11,'maxlength'=>6,'tabindex'=>6)); ?><span class="status">&nbsp;</span>
	<?php echo $form->error($address,'student_address_c_pin'); ?>
	</div>

</div>

		<input type="checkbox" name="address" onclick="FillAddress(this.form)">
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

	<div class="row-left">
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 4095b1a379c60405fee380f72e8f722a6bea1151
	<?php echo $form->labelEx($address,'student_address_p_country'); ?>
	<?php //echo $form->dropDownList($address,'student_address_p_country',Country::items(), array('empty' => '-----------Select---------','tabindex'=>9)); 
		echo $form->dropDownList($address,'student_address_p_country',Country::items(),
				array(
				'prompt' => '-----------Select---------','tabindex'=>9,
				'ajax' => array(
				'type'=>'POST', 
<<<<<<< HEAD
				'url'=>CController::createUrl('StudentTransaction/getItemName3'),	 	
				//'update'=>'#StudentAddress_student_address_p_state', //selector to update
				
				'dataType'=>'json',
		        	'success'=>'function(data) {

		                  $("#StudentAddress_student_address_p_state").html(data.state);
				  $("#StudentAddress_student_address_p_city").html(data.city);				
				
		                }',
				)));
		
?><span class="status">&nbsp;</span>
	<?php echo $form->error($address,'student_address_p_country'); ?>
	</div>

	<div class="row-right">
	<?php echo $form->labelEx($address,'student_address_p_state'); ?>
	<?php //echo $form->dropDownList($address,'student_address_p_state',State::items(), array('empty' => '-----------Select---------','tabindex'=>10));
		echo $form->dropDownList($address,'student_address_p_state',array(),
				array(
				'prompt' => '-----------Select---------','tabindex'=>10,
				'ajax' => array(
				'type'=>'POST', 
				'url'=>CController::createUrl('StudentTransaction/getItemName4'),	 	
				'update'=>'#StudentAddress_student_address_p_city', //selector to update
				
				)));

 ?><span class="status">&nbsp;</span>
	<?php echo $form->error($address,'student_address_p_state'); ?>
=======
				'url'=>CController::createUrl('StudentTransaction/UpdatePStates'),	 					
				'update'=>'#StudentAddress_student_address_p_state',
		        	
				)));

		
?><span class="status">&nbsp;</span>
	<?php echo $form->error($address,'student_address_p_country'); ?>
	</div>

	<div class="row-right">
	<?php echo $form->labelEx($address,'student_address_p_state'); ?>
	<?php //echo $form->dropDownList($address,'student_address_p_state', array(), array('empty' => '-----------Select---------','tabindex'=>10));
		echo $form->dropDownList($address,'student_address_p_state',array(),
				array(
				'prompt' => '-----------Select---------','tabindex'=>10,
				'ajax' => array(
				'type'=>'POST', 
				'url'=>CController::createUrl('StudentTransaction/UpdatePCities'),	 	
				'update'=>'#StudentAddress_student_address_p_city', //selector to update
				
				)));

 ?><span class="status">&nbsp;</span>
	<?php echo $form->error($address,'student_address_p_state'); ?>
=======
	<?php echo $form->labelEx($address,'student_address_p_city'); ?>
	<?php echo $form->dropDownList($address,'student_address_p_city',City::items(), array('empty' => '-----------Select---------','tabindex'=>9)); ?><span class="status">&nbsp;</span>
	<?php echo $form->error($address,'student_address_p_city'); ?>
	</div>

	<div class="row-right">
	<?php echo $form->labelEx($address,'student_address_p_pin'); ?>
	<?php echo $form->textField($address,'student_address_p_pin',array('size'=>11,'maxlength'=>6,'tabindex'=>10)); ?><span class="status">&nbsp;</span>
	<?php echo $form->error($address,'student_address_p_pin'); ?>
>>>>>>> 829db863ae7e1106d36ddfad5e1a60a47101115e
>>>>>>> 4095b1a379c60405fee380f72e8f722a6bea1151
	</div>


</div>


<div class="row">

	<div class="row-left">
<<<<<<< HEAD
	<?php echo $form->labelEx($address,'student_address_p_city'); ?>
	<?php echo $form->dropDownList($address,'student_address_p_city',City::items(), array('empty' => '-----------Select---------','tabindex'=>11)); ?><span class="status">&nbsp;</span>
	<?php echo $form->error($address,'student_address_p_city'); ?>
=======
<<<<<<< HEAD
	<?php echo $form->labelEx($address,'student_address_p_city'); ?>
	<?php echo $form->dropDownList($address,'student_address_p_city',array(), array('empty' => '-----------Select---------','tabindex'=>11)); ?><span class="status">&nbsp;</span>
	<?php echo $form->error($address,'student_address_p_city'); ?>
=======
	<?php echo $form->labelEx($address,'student_address_p_state'); ?>
	<?php echo $form->dropDownList($address,'student_address_p_state',State::items(), array('empty' => '-----------Select---------','tabindex'=>11)); ?><span class="status">&nbsp;</span>
	<?php echo $form->error($address,'student_address_p_state'); ?>
>>>>>>> 829db863ae7e1106d36ddfad5e1a60a47101115e
>>>>>>> 4095b1a379c60405fee380f72e8f722a6bea1151
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
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'submit','tabindex'=>15)); ?>
	</div>
