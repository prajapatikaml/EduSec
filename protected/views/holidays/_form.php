<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'holidays-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'holiday_name'); ?>
		<?php echo $form->textField($model,'holiday_name',array('size'=>50,'maxlength'=>50)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'holiday_name'); ?>
	</div>

    <div class="row">
	  <?php echo $form->labelEx($model,'date'); ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker',
		    array(
			'model'=>$model,
			'attribute'=>'date',
			'language' => 'en',
			'options' => array(
			    'dateFormat'=>'yy-mm-dd',
			    'changeMonth' => 'true',
			    'changeYear' => 'true',
			    'duration'=>'fast',
			    'showAnim' =>'slide',
			    
			),
			'htmlOptions'=>array('tabindex'=>3,
			'style'=>'height:18px;
			    padding-left: 4px;width:168px;'

			)
		    )
		);
	?><span class="status">&nbsp;</span>
	<?php echo $form->error($model,'date'); ?>
	</div>

<!--
	<div class="row">
		<?php echo $form->labelEx($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by'); ?>
		<?php echo $form->error($model,'created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'creation_date'); ?>
		<?php echo $form->textField($model,'creation_date'); ?>
		<?php echo $form->error($model,'creation_date'); ?>
	</div>
-->
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
