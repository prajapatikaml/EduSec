<div class="portlet box blue">

 <div class="portlet-title"><i class="fa fa-plus"></i><span class="box-title">Fill Details</span>
</div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'national-holidays-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		 <?php 
		//$date = date('Y/m/d');		
		echo $form->labelEx($model,'national_holiday_date'); ?>
		
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		    'model'=>$model, 
		    'attribute'=>'national_holiday_date',
		    'options'=>array(
			//'showOn'=> "button",
			'dateFormat'=>'dd-mm-yy',
			'changeYear'=>'true',
			'changeMonth'=>'true',
			'showAnim' =>'slide',
			'yearRange'=>'1900:'.(date('Y')+1),
			'buttonImage'=>Yii::app()->theme->baseUrl.'/images/calendar.png',			
		    ),
			'htmlOptions'=>array(
			'style'=>'width:250px;vertical-align:top',
			'readonly'=>true,
			'tabindex' => 1,
		    ),
			
		));
	?>
	<span class="status">&nbsp;</span><?php echo $form->error($model,'national_holiday_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'national_holiday_name'); ?>
		<?php echo $form->textField($model,'national_holiday_name',array('size'=>30,'maxlength'=>100,'tabindex'=>2)); ?>
		<span class="status">&nbsp;</span><?php echo $form->error($model,'national_holiday_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'national_holiday_remarks'); ?>
		<?php echo $form->textField($model,'national_holiday_remarks',array('size'=>20,'tabindex'=>3,'maxlength'=>200)); ?>
		<span class="status">&nbsp;</span><?php echo $form->error($model,'national_holiday_remarks'); ?>
	</div>

</div><!-- form -->
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save', array('class'=>'submit','tabindex'=>4)); ?>
		<?php echo CHtml::link('Cancel', array('admin'), array('class'=>'btnCan')); ?> 
	</div>
<?php $this->endWidget(); ?>
</div>
