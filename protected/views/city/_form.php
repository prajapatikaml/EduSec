<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Fill Details
 </div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'city-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>


	<div class="row">
        <?php echo $form->labelEx($model,'country_id'); ?>
	<?php
			echo $form->dropDownList($model,'country_id', Country :: items(),
			array(
			'prompt' => 'Select Country',
			'ajax' => array(
			'type'=>'POST', 
			'url'=>CController::createUrl('dependent/getstatecity'), 
			'update'=>'#City_state_id', //selector to update
			 
			),'tabindex'=>21));
			
			 
			?><span class="status">&nbsp;</span>
        <?php echo $form->error($model,'country_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'state_id'); ?>
		<?php 
		
			if(isset($model->state_id))
				echo $form->dropDownList($model,'state_id', CHtml::listData(State::model()->findAll(array('condition'=>'state_id='.$model->state_id)), 'state_id', 'state_name'));
			else
				echo $form->dropDownList($model,'state_id',array('empty' => 'Select State')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'state_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'city_name'); ?>
		<?php echo $form->error($model,'city_name'); ?>
		<?php echo $form->textField($model,'city_name',array('size'=>30,'maxlength'=>60)); ?><span class="status">&nbsp;</span>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save',array('class'=>'submit')); ?>
		<?php echo CHtml::link('Cancel', array('admin'), array('class'=>'btnCan')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

</div>
