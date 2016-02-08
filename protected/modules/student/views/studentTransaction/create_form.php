<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Fill Details
 </div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-transaction-form',
	'enableAjaxValidation'=>true,
	'focus'=>array($info,'student_roll_no'),
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	'clientOptions'=>array('validateOnSubmit'=>true),

)); ?>
 
	<p class="note">Fields with <span class="required">*</span> are required.</p>
  	<?php echo $form->error($info,'student_enroll_no'); ?>

	<div class="row">
   
		<div class="row-left">
			<?php echo $form->labelEx($info,'student_enroll_no'); ?>
			<?php echo $form->textField($info,'student_enroll_no'); ?><span class="status">&nbsp;</span>
		</div>
		
		<div class="row-right">

<?php echo $form->labelEx($info,'student_adm_date'); 
			?>
			<?php if($info->student_adm_date != '')
				$info->student_adm_date= date('d-m-Y',strtotime($info->student_adm_date));
			
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    	'model'=>$info, 
				'attribute'=>'student_adm_date',
			    	'options'=>array(
				'dateFormat'=>'dd-mm-yy',
				'changeYear'=>'true',
				'changeMonth'=>'true',
				'maxDate'=>0,
				'showAnim' =>'slide',
				'yearRange'=>'1900:'.(date('Y')+1),
				'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',			
			    	),
				'htmlOptions'=>array(
				'style'=>'width:165px;vertical-align:top',
				'readonly'=>true,
			    	),
			));
			?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_adm_date'); ?>
			
		</div>		
	</div>

	<div class="row"> 
		<div class="row-left">
			<?php echo $form->labelEx($info,'title'); ?>   
			<?php echo $form->dropdownList($info,'title',$info->getTitleOptions(), array('empty' => 'Select Title')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'title'); ?>
		</div>  
	    	<div class="row-right">   
			<?php echo $form->labelEx($info,'student_first_name'); ?>
			<?php echo $form->textField($info,'student_first_name',array('size'=>13)); ?><span class="status">&nbsp;</span>
			 <?php echo $form->error($info,'student_first_name'); ?>       
	    	</div>   	    	  
	</div>

	<div class="row"> 
 
	    	<div class="row-left">   
			<?php echo $form->labelEx($info,'student_last_name'); ?>
			<?php echo $form->textField($info,'student_last_name',array('size'=>13)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_last_name'); ?>
	    	</div>

	    	<div class="row-right"> 
		    	<?php echo $form->labelEx($info,'student_email_id_1'); ?>
			<?php echo $form->textField($user,'user_organization_email_id',array('size'=>13)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($user,'user_organization_email_id'); ?>
	    	</div>  
	</div>


	<div class="row">	

		<div class="row-left">
			<?php echo $form->labelEx($info,'student_mobile_no'); ?>   
			<?php echo $form->textField($info,'student_mobile_no',array('size'=>13)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_mobile_no'); ?>
	       </div>		
	

		<?php
			$acd = Yii::app()->db->createCommand()
				->select('*')
				->from('academic_term')
				->where('current_sem=1')
				->queryAll();
			$acdterm=CHtml::listData($acd,'academic_term_id','academic_term_name');	
			$period=array();
			if($acdterm)
			{
			$pe_data = AcademicTermPeriod::model()->findByPk($acd[0]['academic_term_period_id']);
			$period[$pe_data->academic_terms_period_id] = $pe_data->academic_term_period; 
			}
 
		?>

		<div class="row-right">
			<?php echo $form->labelEx($model,'student_academic_term_period_tran_id'); ?>
			<?php echo $form->dropDownList($model,'student_academic_term_period_tran_id', CHtml::listData(AcademicTermPeriod::model()->findAll(), 'academic_terms_period_id', 'academic_term_period') ,array('prompt' => 'Select Year'));?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_academic_term_period_tran_id'); ?>
		</div>
	</div>
	<div class="row">
	      <div class="row-left">
			<?php echo $form->labelEx($model,'student_academic_term_name_id'); ?>
			<?php echo $form->dropDownList($model,'student_academic_term_name_id',$acdterm,array('prompt' => 'Select Semester')); 
			?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_academic_term_name_id'); ?>
		</div>
	      <div class="row-right">
			<?php echo $form->labelEx($model,'student_transaction_detain_student_flag'); ?>
			<?php echo $form->dropDownList($model,'student_transaction_detain_student_flag',CHtml::listData(Studentstatusmaster::model()->findAll(), 'id', 'status_name'),array('prompt' => 'Student Status')); 
			?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_transaction_detain_student_flag'); ?>
		</div>		

 	</div>

	<div class="row">
	      <div class="row-left">
			<?php echo $form->labelEx($model,'student_transaction_course_id'); ?>
			<?php echo $form->dropDownList($model,'student_transaction_course_id',  CHtml::listData(CourseMaster::model()->findAll(), 'course_master_id','course_name'),array('prompt' => 'Select Course')); 
			?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_transaction_course_id'); ?>
		</div>
 	</div>

	<div class="row buttons">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save', array('class'=>'submit')); ?>
		<?php echo CHtml::link('Cancel', array('admin'), array('class'=>'btnCan')); ?>
	
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
