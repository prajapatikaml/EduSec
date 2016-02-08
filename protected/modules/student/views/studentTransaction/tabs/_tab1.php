<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-transaction-form',
	//'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

<?php $org_id=Yii::app()->user->getState('org_id'); ?>    
		
		
	<div class="row">
		<div class="row-left">
		<?php echo $form->labelEx($info,'student_enroll_no'); ?>
		<?php echo $form->textField($info,'student_enroll_no',array('size'=>18,'maxlength'=>12)); ?><span class="status">&nbsp;</span>
	      
		</div>
		<div class="row-right">
	  <?php echo $form->labelEx($info,'student_adm_date'); ?>
		<?php 
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    'model'=>$info, 
			    'attribute'=>'student_adm_date',
			    'options'=>array(
				'dateFormat'=>'dd-mm-yy',
				'changeYear'=>'true',
				'changeMonth'=>'true',
				'showAnim' =>'slide',
				'yearRange'=>'1900:'.date('Y'),
				'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',
								
			    ),
				'htmlOptions'=>array(
				'style'=>'width:80px;vertical-align:top',
				
				'value'=>date("d-m-Y", strtotime($info->student_adm_date)),
			    ),
				));
			?>
		</div>
	</div>

	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($info,'title'); ?>   
			<?php echo $form->dropdownList($info,'title',$info->getTitleOptions(), array('empty' => '-----------Select---------')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'title'); ?>
		</div>

		<div class="row-right">
			 <?php echo $form->labelEx($info,'student_first_name'); ?>
			<?php echo $form->textField($info,'student_first_name',array('size'=>18,'maxlength'=>25)); ?><span class="status">&nbsp;</span>
			 <?php echo $form->error($info,'student_first_name'); ?>  
		</div>

	</div>

	
	<div class="row">   
			<div class="row-left">   
            		<?php echo $form->labelEx($info,'student_middle_name'); ?>
			<?php echo $form->textField($info,'student_middle_name',array('size'=>18,'maxlength'=>25)); ?><span class="status">&nbsp;</span>        
			<?php echo $form->error($info,'student_middle_name'); ?>
		        </div>   

			<div class="row-right">   
			<?php echo $form->labelEx($info,'student_last_name'); ?>
			<?php echo $form->textField($info,'student_last_name',array('size'=>18,'maxlength'=>25)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_last_name'); ?>
			</div>   
	</div>

	<div class="row">   	
			<div class="row-left">
			<?php echo $form->labelEx($info,'student_gender'); ?>
			<?php echo $form->dropdownList($info,'student_gender',$info->getGenderOptions(), array('empty' => '-----------Select---------')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_gender'); ?>
			</div>
			<div class="row-right">

      			<?php echo $form->labelEx($info,'student_dob'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    'model'=>$info, 
			    'attribute'=>'student_dob',
			    'options'=>array(
				'dateFormat'=>'dd-mm-yy',
				'changeYear'=>'true',
				'changeMonth'=>'true',
				'showAnim' =>'slide',
				'yearRange'=>'1900:'.date('Y'),
				'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',
				
						
			    ),
				'htmlOptions'=>array(
				'style'=>'width:80px;vertical-align:top',
				
				'value'=>date("d-m-Y", strtotime($info->student_dob)),
			    ),
				));
			?>
			</div>

	</div>

	<div class="row">   
		<div class="row-left">   			
		    	<?php echo $form->labelEx($info,'student_email_id_1'); ?>
			<?php echo $form->textField($info,'student_email_id_1',array('size'=>38,'maxlength'=>60)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_email_id_1'); ?>
    		</div>
			<div class="row-right"> 
			<?php echo $form->labelEx($info,'student_mobile_no'); ?>   
			<?php echo $form->textField($info,'student_mobile_no',array('size'=>18,'maxlength'=>15)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_mobile_no'); ?>
			</div>	
	</div> 
		
	<div class="row">   
			<div class="row-left">
			<?php echo $form->labelEx($info,'student_bloodgroup'); ?>
			<?php echo $form->dropdownList($info,'student_bloodgroup',$info->getBloodGroup(), array('empty' => 'Select Blood Group')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_bloodgroup'); ?>
			</div>	
			<div class="row-right">
			<?php echo $form->labelEx($model,'student_transaction_nationality_id'); ?>
			<?php echo $form->dropDownList($model,'student_transaction_nationality_id',Nationality::items(), array('empty' => '-----------Select---------')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_transaction_nationality_id'); ?>
			</div> 
    	</div> 
		

	<div class="row">
			<div class="row-left">
			<?php echo $form->labelEx($model,'student_academic_term_period_tran_id'); ?>
			<?php
					echo $form->dropDownList($model,'student_academic_term_period_tran_id',AcademicTermPeriod::items(),
					array(
					'prompt' => '-----------Select-----------',
					'ajax' => array(
					'type'=>'POST', 
					'url'=>CController::createUrl('dependent/getStudItemName'), 
					'update'=>'#StudentTransaction_student_academic_term_name_id', //selector to update
			
					))); 
					 
					?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_academic_term_period_tran_id'); ?>
			</div>
			<div class="row-right">
				<?php echo $form->labelEx($model,'student_academic_term_name_id'); ?>
				<?php 
					$term = "Sem-".$model->academic_term_name;
					if(isset($model->student_academic_term_name_id))
						echo $form->dropDownList($model,'student_academic_term_name_id', CHtml::listData(AcademicTerm::model()->findAll(array('condition'=>'academic_term_period_id='.$model->student_academic_term_period_tran_id)),'academic_term_id','academic_term_name'));
					else
						echo $form->dropDownList($model,'student_academic_term_name_id',array() ,array('prompt' => '-----------Select-----------')); 
				?><span class="status">&nbsp;</span>
				<?php echo $form->error($model,'student_academic_term_name_id'); ?>
			</div>	

	</div>

	<div class="row">
			<div class="row-left">
			<?php echo $form->labelEx($lang,'languages_known1'); ?>
			<?php echo $form->dropDownList($lang,'languages_known1',Languages::items(),array('empty'=>'-----------Select---------')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($lang,'languages_known1'); ?>
			</div>

			<div class="row-right">
			<?php echo $form->labelEx($lang,'languages_known2');?>
			<?php echo $form->dropDownList($lang,'languages_known2',Languages::items(),array('empty'=>'-----------Select---------')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($lang,'languages_known2'); ?>
			</div>

	</div>
	


	<div class="row buttons">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'submit')); ?>
	
	</div>
<?php $this->endWidget(); ?>


