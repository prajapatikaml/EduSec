<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title"> <span class="box-title">Fill Details</span>
</div>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'feedback-details-table-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'feedback_category_master_id'); ?>
		<?php 
			echo $form->dropDownList($model,'feedback_category_master_id',
				CHtml::listData(FeedbackCategoryMaster::model()->findAll(), 'feedback_category_master_id', 'feedback_category_name'),array('empty' => 'Select Category','tabindex'=>1));	
		  ?>			
		<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'feedback_category_master_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'feedback_details_remarks'); ?>
		 <?php echo $form->textArea($model,'feedback_details_remarks',array('maxlength'=>200,'rows'=>2, 'cols'=>28,'tabindex'=>2)); ?>
		<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'feedback_details_remarks'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save',array('class'=>'submit','tabindex'=>3)); ?>
 		<?php echo CHtml::link('Cancel', Yii::app()->request->urlReferrer , array('class'=>'btnCan')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
