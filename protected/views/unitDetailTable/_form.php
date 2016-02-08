<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Fill Details
 </div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'unit-detail-table-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>


	<div class="row">
		<?php echo $form->labelEx($model,'unit_detail_title'); ?>
		<?php echo $form->textField($model,'unit_detail_title',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'unit_detail_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'unit_lec_date'); ?>
	
	 <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		    'model'=>$model, 
		    'attribute'=>'unit_lec_date',
		    'options'=>array(
			'dateFormat'=>'dd-mm-yy',
			'changeYear'=>'true',
			'changeMonth'=>'true',
			'showAnim' =>'slide',
			'yearRange'=>'1900:'.(date('Y')+1),
			'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',			
		    ),
			'htmlOptions'=>array(
			'readonly'=>true,
		    ),
			
		));
?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'unit_lec_date'); ?>
	</div>
	
	<?php echo $form->labelEx($model,'unit_detail_desc'); ?>
	<div class="row">

		<?php $this->widget('application.extensions.ckeditor.CKEditor', array(
			'model'=>$model,
			'attribute'=>'unit_detail_desc',
			'language'=>'us',
			'editorTemplate'=>'full',
			)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'unit_detail_desc'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save',array('class'=>'submit','onclick'=>'CKEDITOR.instances.UnitDetailTable_unit_detail_desc.updateElement()')); 
		?>
	</div>


<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
