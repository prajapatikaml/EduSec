<div class="portlet box blue">
 <div class="portlet-title"><i class="fa fa-plus"></i><span class="box-title">Fill Details</span>
</div>        
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'course-form',
	'enableAjaxValidation'=>true,
	 'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php // echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'course_name'); ?>
		<?php echo $form->textField($model,'course_name',array('size'=>50,'maxlength'=>50)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'course_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'course_code'); ?>
		<?php echo $form->textField($model,'course_code',array('size'=>50,'maxlength'=>50)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'course_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'section_name'); ?>
		<?php echo $form->textField($model,'section_name',array('size'=>50,'maxlength'=>50)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'section_name'); ?>
	</div>
<?php
		if(isset($_REQUEST['id'])) 
		$batch=Batch::model()->findByPk($_REQUEST['id']); ?>
	<?php if(empty($batch->course_id)) { //echo $batch->course_id; ?>
	<h3 style="color: #000000;font-size: 15px;font-weight: bold;margin: 0 0 10px 5px;padding: 0 0 6px;width: 95%;">Initial Batch</h3>
	<div class="row">
		<?php echo $form->labelEx($batch,'batch_name'); ?>
		<?php echo $form->textField($batch,'batch_name',array('size'=>50,'maxlength'=>50)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($batch,'batch_name'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($batch,'batch_fees'); ?>
		<?php echo $form->textField($batch,'batch_fees',array('size'=>50,'maxlength'=>50)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($batch,'batch_fees'); ?>
	</div>
	<?php
	     
		} /*
			$acd = Yii::app()->db->createCommand()
				->select('*')
				->from('academic_term')
				->where('current_sem=1')
				->queryAll();
			$acdterm=CHtml::listData($acd,'academic_term_id','academic_term_name');	
		//print_r($acd); exit;			
		$period=array();
			if($acdterm)
			{
			$pe_data = AcademicTermPeriod::model()->findByPk($acd[0]['academic_term_period_id']);
			$period[$pe_data->academic_terms_period_id] = $pe_data->academic_term_period; 
			}
		*/ ?>
	<!--div class="row">
		<?php //echo $form->labelEx($model,'academic_term_period_id'); ?>
		<?php //echo $form->dropDownList($model,'academic_term_period_id',CHtml::listData(AcademicTermPeriod::model()->findAll(),'academic_terms_period_id','academic_term_period'),array('prompt' => 'Select Year')); ?><span class="status">&nbsp;</span>
		<?php //echo $form->error($model,'academic_terms_period_id'); ?>
	</div-->
</div><!-- form -->
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'submit')); ?>
		<?php echo CHtml::link('Cancel', array('admin'), array('class'=>'btnCan')); ?>	
	</div>

<?php $this->endWidget(); ?>


</div>
