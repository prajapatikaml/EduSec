<script>
$(document).ready(function() {
$('#StudentTransaction_student_academic_term_name_id').change(function () {
	$('#StudentTransaction_student_transaction_branch_id').val(" ");
	$('#StudentTransaction_student_transaction_division_id').val(" ");
	$('#StudentTransaction_student_transaction_batch_id').val(" ");	
});
});
</script>
<div class="portlet box blue">
 <div class="portlet-title"><i class="fa fa-plus"></i><span class="box-title">Fill Details</span>
 </div>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-transaction-form',
	'enableAjaxValidation'=>true,
	'focus'=>array($info,'student_roll_no'),
	//'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	'clientOptions'=>array('validateOnSubmit'=>true),

)); ?>
 
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
	 <?php 
		$stud_roll_no = StudentInfo::model()->findAll();
		$rollno='';
		if(Yii::app()->controller->action->id=='create')
		{
			if(empty($stud_roll_no))
			{
				$rollno=$info->student_roll_no=1;
			}
			else
			{
				foreach($stud_roll_no as $s)
				{
		            		$stud[]=$s['student_roll_no'];
					$rollno=MAX($stud)+1;
				}			
			}
		}
		else
		{
			if(!empty($stud_roll_no))
			{
				$rollno=$info->student_roll_no;
			}
		}
		//echo $rollno; exit;
					
		
		?>
		
		<div class="row-left">
			<?php echo $form->labelEx($info,'student_roll_no'); ?>   
			<?php echo $form->textField($info,'student_roll_no',array('size'=>13,'readonly'=>'true','value'=>$rollno)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_roll_no'); ?>
		</div>
		<div class="row-right">
			<?php //echo $form->labelEx($info,'student_no'); ?>   
			<?php //echo $form->textField($info,'student_no',array('size'=>6)); ?><span class="status">&nbsp;</span>
			<?php //echo $form->error($info,'student_no'); ?>
		</div>
	</div>
	<div class=row>
		<div class="row-left">
		  	<?php echo $form->labelEx($info,'student_adm_date'); 
			?>
			<?php if($info->student_adm_date != '')
				$info->student_adm_date= date('d-m-Y',strtotime($info->student_adm_date));
			
				$this->widget('CustomDatePicker', array(
			    	'model'=>$info, 
				'attribute'=>'student_adm_date',
			    	'options'=>array(
				'dateFormat'=>'dd-mm-yy',
				'changeYear'=>'true',
				'changeMonth'=>'true',
				'showAnim' =>'slide',
				'yearRange'=>'1900:'.(date('Y')+1),
				'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',			
			    	),
				'htmlOptions'=>array(
				'style'=>'width:250px;vertical-align:top',
				'readonly'=>true,
			    	),
			));
			?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_adm_date'); ?>
		</div>
		<div class="row-right">
			<?php echo $form->labelEx($info,'title'); ?>   
			<?php echo $form->dropdownList($info,'title',$info->getTitleOptions(), array('empty' => 'Select Title')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'title'); ?>
		</div>
		
	</div>

	<div class="row"> 
		  
	    	<div class="row-left">   
			<?php echo $form->labelEx($info,'student_first_name'); ?>
			<?php echo $form->textField($info,'student_first_name',array('size'=>13)); ?><span class="status">&nbsp;</span>
			 <?php echo $form->error($info,'student_first_name'); ?>       
	    	</div>   
		<div class="row-right">   
			<?php echo $form->labelEx($info,'student_middle_name'); ?>
			<?php echo $form->textField($info,'student_middle_name',array('size'=>13)); ?><span class="status">&nbsp;</span>        
			<?php echo $form->error($info,'student_middle_name'); ?>
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
			<?php echo $form->labelEx($model,'course_id'); ?>
			<?php
				echo $form->dropDownList($model,'course_id',
					CHtml::listData(Course::model()->findAll(),'course_id','course_name'),
					array(
					'prompt' => 'Select Course',
					'ajax' => array(
					'type'=>'POST', 
					'url'=>CController::createUrl('dependent/getCBatch'), 
					'update'=>'#StudentTransaction_student_transaction_batch_id', //selector to update
					)));
				 	?><span class="status">&nbsp;</span>

			
			<?php echo $form->error($model,'course_id'); ?>
	    	</div>  	    	  
		<div class="row-right">
		<?php echo $form->labelEx($model,'student_transaction_batch_id'); ?>
		<?php
	 		if(!empty($model->student_transaction_batch_id))
			  echo $form->dropDownList($model,'student_transaction_batch_id',CHtml::listData(Batch::model()->findAll(),'batch_id','batch_name'),array('prompt'=>"Select Batch"));
	 		else	
	 		  echo $form->dropDownList($model,'student_transaction_batch_id', array('empty' => 'Select Batch')); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'student_transaction_batch_id'); ?>
	</div>	
	</div>
	<div class="row">	
	   
		<div class="row-left">
			<?php echo $form->labelEx($info,'student_mobile_no'); ?>   
			<?php echo $form->textField($info,'student_mobile_no',array('size'=>13)); ?><span class="status">&nbsp;</span><br><br>
			<?php echo $form->error($info,'student_mobile_no'); ?>
	       </div>
		<div class="row-right">
			<?php echo $form->labelEx($info,'passport_no'); ?>
        		<?php echo $form->textField($info,'passport_no',array('size'=>13,'maxlength'=>20)); ?>
			<?php echo $form->error($info,'passport_no'); ?><span class="status">&nbsp;</span>
		</div>		
	</div>
	<div class="row">
        	<div class="row-left">
			<?php echo $form->labelEx($info,'passport_exp_date'); ?>
        		<?php //if($info->passport_exp_date != '')
				//$info->passport_exp_date= date('d-m-Y',strtotime($info->passport_exp_date));
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    	'model'=>$info,
				'attribute'=>'passport_exp_date',
			    	'options'=>array(
				'dateFormat'=>'dd-mm-yy',
				'changeYear'=>'true',
				'changeMonth'=>'true',
				'showAnim' =>'slide',
				'yearRange'=> (date('Y')).':2099',
		
			    	),
				'htmlOptions'=>array(
				'style'=>'width:250px;vertical-align:top',
		
				'size'=>13,
			    	),
				));
			?>
			<?php echo $form->error($info,'passport_exp_date'); ?><span class="status">&nbsp;</span>
		</div>
	</div>
</div><!-- form -->
	<div class="row buttons">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save', array('class'=>'submit')); ?>
<?php echo CHtml::link('Cancel', array('admin'), array('class'=>'btnCan')); ?> 
	</div>
<?php $this->endWidget(); ?>
</div>
