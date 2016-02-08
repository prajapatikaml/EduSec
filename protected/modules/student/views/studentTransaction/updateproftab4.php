<script>
$(document).ready(function () {
	$('#ckbox').click(function () {
			
		if ($("#ckbox").is(":checked"))
		{
			$('#p_add').hide();
		}
		else
			$('#p_add').show();
	});
	});
</script>
<?php
$this->breadcrumbs=array(
	'Student'=>array('update', 'id'=>$_REQUEST['id']),
	'Address Info',
);?>
<div id="form4" class="info-form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-transaction-form',
	'enableAjaxValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>
<fieldset>
	<legend>Address Info</legend>
	
	<div class="form5">
		<?php echo ('<b><u>Current Address :</u></b>'); ?>
	</div>

	<div class="form5">
		<?php echo ('&nbsp;'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($address,'student_address_c_line1'); ?>
		<?php echo $form->textField($address,'student_address_c_line1',array('size'=>59,'maxlength'=>100)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($address,'student_address_c_line1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($address,'student_address_c_line2'); ?>
		<?php echo $form->textField($address,'student_address_c_line2',array('size'=>59,'maxlength'=>100)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($address,'student_address_c_line2'); ?>
	</div>

	<div class="row">
		<div class="row-right">
			<?php echo $form->labelEx($address,'student_address_c_country'); ?>
			<?php echo $form->dropDownList($address,'student_address_c_country' ,Country::items(),
					array(
					'prompt' => 'Select Country',
					'ajax' => array(
					'type'=>'POST', 
					'url'=>CController::createUrl('dependent/UpdateStudCStates'), 
					'update'=>'#StudentAddress_student_address_c_state', //selector to update
			
					))); 
			?><span class="status">&nbsp;</span>
			<?php echo $form->error($address,'student_address_c_country'); ?>
		</div>
		<div class="row-left">
			<?php echo $form->labelEx($address,'student_address_c_state'); ?>
			<?php 
				if($address->student_address_c_state!=null  && $address->student_address_c_country!=null)
				echo $form->dropDownList($address,'student_address_c_state', CHtml::listData(State::model()->findAll(array('condition'=>'country_id='.$address->student_address_c_country)), 'state_id', 'state_name'),
				array(
				'prompt' => 'Select State',
				'ajax' => array(
				'type'=>'POST', 
				'url'=>CController::createUrl('dependent/UpdateStudCCities'), 
				'update'=>'#StudentAddress_student_address_c_city', //selector to update
			
				)));
				else	
				echo $form->dropDownList($address,'student_address_c_state',array(),
				array(
				'prompt' => 'Select State',
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
				if($address->student_address_c_city!=null && $address->student_address_c_state!=null)
					echo $form->dropDownList($address,'student_address_c_city', CHtml::listData(City::model()->findAll(array('condition'=>'state_id='.$address->student_address_c_state)), 'city_id', 'city_name'),array('prompt'=>'Select State'));
				else
					echo $form->dropDownList($address,'student_address_c_city',array(), array('empty' => 'Select City')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($address,'student_address_c_city'); ?>
		</div>
		<div class="row-right">
			<?php echo $form->labelEx($address,'student_address_c_pin'); ?>
			<?php echo $form->textField($address,'student_address_c_pin',array('size'=>13,'maxlength'=>6)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($address,'student_address_c_pin'); ?>
		</div>
	</div>
	
	<div class="row">	
		<?php  echo $form->checkBox($address,'stud_address_chkbox',array('value'=>1, 'uncheckValue'=>0,'id'=>'ckbox')); 
	      echo '&nbsp;&nbsp;Check this box if Current Address and Permanent Address are the same.';?>
	</div>

<div id="p_add">
	<div class="form5">
		<?php echo ('<b><u>Permanent Address :</u></b>'); ?>
	</div>

	<div class="form5">
		<?php echo ('&nbsp;'); ?>
	</div>


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
				echo $form->dropDownList($address,'student_address_p_country',Country::items(), 				array(
					'prompt' => 'Select Country',
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
				if(!empty($address->student_address_p_state)  && !empty($address->student_address_p_country))
				echo $form->dropDownList($address,'student_address_p_state', CHtml::listData(State::model()->findAll(array('condition'=>'country_id='.$address->student_address_p_country)), 'state_id', 'state_name'),
				array(
				'prompt' => 'Select State',
				'ajax' => array(
				'type'=>'POST', 
				'url'=>CController::createUrl('dependent/UpdateStudPCities'), 
				'update'=>'#StudentAddress_student_address_p_city', //selector to update
			
				)));
			else
				echo $form->dropDownList($address,'student_address_p_state',array(), 		
			array(
			'prompt' => 'Select State',
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
				if(!empty($address->student_address_p_city) && !empty($address->student_address_p_state))
				echo $form->dropDownList($address,'student_address_p_city', CHtml::listData(City::model()->findAll(array('condition'=>'state_id='.$address->student_address_p_state)), 'city_id', 'city_name'),array('prompt'=>'Select State'));
				else
				echo $form->dropDownList($address,'student_address_p_city',array(), array('empty' => 'Select City')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($address,'student_address_p_city'); ?>
		</div>
		<div class="row-right">
			<?php echo $form->labelEx($address,'student_address_p_pin'); ?>
			<?php echo $form->textField($address,'student_address_p_pin',array('size'=>13,'maxlength'=>6)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($address,'student_address_p_pin'); ?>
		</div>
	</div>
</div>




	<div class="form5">
		<?php echo ('&nbsp;'); ?>
	</div>

	<?php  if(Yii::app()->user->checkAccess('StudentTransaction.UpdateStudentData')  && (Yii::app()->user->getState('stud_id') == $_REQUEST['id']) || Yii::app()->user->checkAccess('StudentTransaction.UpdateAllStudentData')) { ?>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Save', array('class'=>'submit')); ?>
   	</div>
	<?php } ?>

</fieldset>
</div>
<?php  $this->endWidget(); ?>
