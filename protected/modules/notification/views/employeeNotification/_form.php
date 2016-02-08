<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employee-notification-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

		<div class="row">	
		<?php echo $form->labelEx($model,'alert_after_date'); ?>
	
	        <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		    'model'=>$model, 
		    'attribute'=>'alert_after_date',
		    'options'=>array(
			'dateFormat'=>'dd-mm-yy',
			'changeYear'=>'true',
			'changeMonth'=>'true',
			'showAnim' =>'slide',
			'yearRange'=>'1900:'.(date('Y')+1),
			'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',			
		    ),
			'htmlOptions'=>array(
			'style'=>'width:150px;vertical-align:top',
			'readonly'=>true,
		    ),
			
		));
		
?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'alert_after_date'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'alert_before_date'); ?>
	
	        <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		    'model'=>$model, 
		    'attribute'=>'alert_before_date',
		    'options'=>array(
			'dateFormat'=>'dd-mm-yy',
			'changeYear'=>'true',
			'changeMonth'=>'true',
			'showAnim' =>'slide',
			'yearRange'=>'1900:'.(date('Y')+1),
			'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',			
		    ),
			'htmlOptions'=>array(
			'style'=>'width:150px;vertical-align:top',
			'readonly'=>true,
		    ),
			
		));
		
?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'alert_before_date'); ?>
	</div>		
	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>50,'maxlength'=>50)); ?>
		<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'title'); ?>
	</div>
		
	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>5, 'cols'=>63)); ?>
		<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'content'); ?>
	</div>
<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save',array('class'=>'submit')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->  


