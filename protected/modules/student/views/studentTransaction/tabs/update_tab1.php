<!--<script>
$(document).ready(function () {
	$('select').attr('disabled',true);
	$('input:text').attr('disabled',true);
	$('#edit').click(function () {
		$('select').attr('disabled',false);
		$('input:text').attr('disabled',false);
	});
});
</script>-->

<div class="row">    
		<div class="row-left">
		<?php echo $form->labelEx($info,'student_roll_no'); ?>   
		<?php echo $form->textField($info,'student_roll_no',array('size'=>18,'maxlength'=>15,'tabindex'=>1)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($info,'student_roll_no'); ?>
		</div>

<?php $org_id=Yii::app()->user->getState('org_id'); ?>
		<div class="row-right">
		<?php echo $form->labelEx($info,'student_living_status'); ?>   
		<?php echo $form->dropdownList($info,'student_living_status',$info->getLivingOptions(), array('empty' => '-----------Select---------','tabindex'=>2)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($info,'student_living_status'); ?>
		</div>
</div>
<div class="row">    

	<div class="row-left">
		<?php echo $form->labelEx($info,'student_gr_no'); ?>   
		<?php echo $form->textField($info,'student_gr_no',array('size'=>18,'maxlength'=>15,'tabindex'=>3)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($info,'student_gr_no'); ?>
	</div>
	

	<div class="row-right">
		<?php echo $form->labelEx($info,'student_merit_no'); ?>   
		<?php echo $form->textField($info,'student_merit_no',array('size'=>18,'maxlength'=>15,'tabindex'=>4)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($info,'student_merit_no'); ?>   
	</div>
</div>

    <div class="row">
	<div class="row-left">
	  <?php echo $form->labelEx($info,'student_adm_date'); ?>
		<?php if(isset($info->student_adm_date))
			{
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    'model'=>$info, 
			    'attribute'=>'student_adm_date',
			    'options'=>array(
				'dateFormat'=>'dd-mm-yy',
				'changeYear'=>'true',
				'changeMonth'=>'true',
				'showAnim' =>'slide',
				'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',
								
			    ),
				'htmlOptions'=>array(
				'style'=>'width:80px;vertical-align:top',
				
				'value'=>date("d-m-Y", strtotime($info->student_adm_date)),
			    ),
				));
			}
		else
		{
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		    'model'=>$info, 
		    'attribute'=>'student_adm_date',
		    'options'=>array(
			'dateFormat'=>'dd-mm-yy',
			'changeYear'=>'true',
			'changeMonth'=>'true',
			'showAnim' =>'slide',
			'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',
					
		    ),
			'htmlOptions'=>array(
			'style'=>'width:80px;vertical-align:top',
			'tabindex'=>5,
		    ),
			
		));
		}
	?>
	<span class="status">&nbsp;</span>
		<?php echo $form->error($info,'student_adm_date'); ?>
	</div>

	<div class="row-right">
        <?php echo $form->labelEx($info,'student_enroll_no'); ?>
        <?php echo $form->textField($info,'student_enroll_no',array('size'=>18,'maxlength'=>12,'tabindex'=>6)); ?><span class="status">&nbsp;</span>
      
	</div>
 </div>

<div class="row">
		<div class="row-left">
		<?php echo $form->labelEx($info,'title'); ?>   
		<?php echo $form->dropdownList($info,'title',$info->getTitleOptions(), array('empty' => '-----------Select---------','tabindex'=>7)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($info,'title'); ?>

		</div>
		<!--<div class="row-right">
			<?php echo $form->error($info,'student_enroll_no'); ?>		
		</div>-->
		<div class="row-right">
			<?php echo $form->labelEx($info,'student_dtod_regular_status'); ?>   
			<?php echo $form->dropdownList($info,'student_dtod_regular_status',$info->getStatusOptions(), array('empty' => '-----------Select---------','tabindex'=>8)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_dtod_regular_status'); ?>
		</div>

</div>




<div class="row">   

    <div class="row-left">   
        <?php echo $form->labelEx($info,'student_first_name'); ?>
	<?php echo $form->textField($info,'student_first_name',array('size'=>18,'maxlength'=>25,'tabindex'=>9)); ?><span class="status">&nbsp;</span>
	 <?php echo $form->error($info,'student_first_name'); ?>       
    </div>   

    <div class="row-right">   
	<?php echo $form->labelEx($info,'student_middle_name'); ?>
	<?php echo $form->textField($info,'student_middle_name',array('size'=>18,'maxlength'=>25,'tabindex'=>10)); ?><span class="status">&nbsp;</span>        
	<?php echo $form->error($info,'student_middle_name'); ?>
    </div>   
</div>
<div class="row">   
    <div class="row-left">   
	<?php echo $form->labelEx($info,'student_last_name'); ?>
	<?php echo $form->textField($info,'student_last_name',array('size'=>18,'maxlength'=>25,'tabindex'=>11)); ?><span class="status">&nbsp;</span>
	<?php echo $form->error($info,'student_last_name'); ?>
    </div>   

	<div class="row-right">
	<?php echo $form->labelEx($info,'student_mother_name'); ?>
	<?php echo $form->textField($info,'student_mother_name',array('size'=>18,'maxlength'=>25,'tabindex'=>12)); ?><span class="status">&nbsp;</span>        
	<?php echo $form->error($info,'student_mother_name'); ?>
	</div>

	
   </div>


    <div class="row">
<!--	<div class="row-left">
        <?php echo $form->labelEx($info,'student_father_name'); ?>
	<?php echo $form->textField($info,'student_father_name',array('size'=>18,'maxlength'=>25,'tabindex'=>10)); ?><span class="status">&nbsp;</span>
	<?php echo $form->error($info,'student_father_name'); ?>
	</div>
-->

</div>

<div class="row">

	<div class="row-left">
		<?php echo $form->labelEx($info,'student_gender'); ?>
		<?php echo $form->dropdownList($info,'student_gender',$info->getGenderOptions(), array('empty' => '-----------Select---------','tabindex'=>13)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($info,'student_gender'); ?>
	</div>

	<div class="row-right">
		<?php echo $form->labelEx($info,'student_mobile_no'); ?>   
		<?php echo $form->textField($info,'student_mobile_no',array('size'=>18,'maxlength'=>15,'tabindex'=>14)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($info,'student_mobile_no'); ?>
	</div>

    </div>


    <div class="row">
	<div class="row-left">
        <?php echo $form->labelEx($info,'student_birthplace'); ?>
        <?php echo $form->textField($info,'student_birthplace',array('size'=>18,'maxlength'=>25,'tabindex'=>15)); ?><span class="status">&nbsp;</span>
        <?php echo $form->error($info,'student_birthplace'); ?>
	</div>
	
	<div class="row-right">

        <?php echo $form->labelEx($info,'student_dob'); ?>
	<?php if(isset($info->student_dob))
			{
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    'model'=>$info, 
			    'attribute'=>'student_dob',
			    'options'=>array(
				'dateFormat'=>'dd-mm-yy',
				'changeYear'=>'true',
				'changeMonth'=>'true',
				'showAnim' =>'slide',
				'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',
				
						
			    ),
				'htmlOptions'=>array(
				'style'=>'width:80px;vertical-align:top',
				
				'value'=>date("d-m-Y", strtotime($info->student_dob)),
			    ),
				));
			}
		else
		{
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		    'model'=>$info, 
		    'attribute'=>'student_dob',
		    'options'=>array(
			'dateFormat'=>'dd-mm-yy',
			'changeYear'=>'true',
			'changeMonth'=>'true',
			'showAnim' =>'slide',
			'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',
					
		    ),
			'htmlOptions'=>array(
			'style'=>'width:80px;vertical-align:top',
			'tabindex'=>16,	
		    ),
			
		));
		}
	?>
<span class="status">&nbsp;</span>
	<?php echo $form->error($info,'student_dob'); ?>
	</div>

    </div>

    <div class="row">

	<div class="row-left">
        <?php echo $form->labelEx($model,'student_transaction_nationality_id'); ?>
        <?php echo $form->dropDownList($model,'student_transaction_nationality_id',Nationality::items(), array('empty' => '-----------Select---------','tabindex'=>17)); ?><span class="status">&nbsp;</span>
        <?php echo $form->error($model,'student_transaction_nationality_id'); ?>
	</div>

	<div class="row-right">
        <?php echo $form->labelEx($model,'student_transaction_religion_id'); ?>
        <?php echo $form->dropDownList($model,'student_transaction_religion_id',Religion::items(), array('empty' => '-----------Select---------','tabindex'=>18)); ?><span class="status">&nbsp;</span>
        <?php echo $form->error($model,'student_transaction_religion_id'); ?>
	</div>

    </div>

<div class="row">
	<div class="row-left">
        <?php echo $form->labelEx($model,'student_transaction_quota_id'); ?>
        <?php echo $form->dropDownList($model,'student_transaction_quota_id',Quota::items(), array('empty' => '-----------Select---------','tabindex'=>19)); ?><span class="status">&nbsp;</span>
        <?php echo $form->error($model,'student_transaction_quota_id'); ?>
	</div>
	<div class="row-right">
        <?php echo $form->labelEx($model,'student_transaction_category_id'); ?>
        <?php echo $form->dropDownList($model,'student_transaction_category_id',Category::items(), array('empty' => '-----------Select---------','tabindex'=>20)); ?><span class="status">&nbsp;</span>
        <?php echo $form->error($model,'student_transaction_category_id'); ?>
	</div>
	

</div>
<div class="row">
	<div class="row-left">
        <?php echo $form->labelEx($model,'student_academic_term_period_tran_id'); ?>
        <?php //echo $form->dropDownList($model,'student_academic_term_period_tran_id',AcademicTermPeriod::items(), array('empty' => '-----------Select---------','tabindex'=>17)); ?>
	<?php
			echo $form->dropDownList($model,'student_academic_term_period_tran_id',AcademicTermPeriod::items(),
			array(
			'prompt' => '-----------Select-----------','tabindex'=>21,
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
	        <?php //echo $form->dropDownList($model,'student_academic_term_name_id',array()); ?>
		<?php 
			$term = "Sem-".$model->academic_term_name;
			if(isset($model->student_academic_term_name_id))
				echo $form->dropDownList($model,'student_academic_term_name_id', CHtml::listData(AcademicTerm::model()->findAll(array('condition'=>'academic_term_period_id='.$model->student_academic_term_period_tran_id)),'academic_term_id','academic_term_name'));
			else
				echo $form->dropDownList($model,'student_academic_term_name_id',array('prompt' => '-----------Select-----------'),array('tabindex'=>22)); 
		?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'student_academic_term_name_id'); ?>
	</div>	


</div>
	
<div class="row">

	<!--
	<div class="row-left">
        <?php echo $form->labelEx($model,'student_transaction_branch_id'); ?>
        <?php echo $form->dropDownList($model,'student_transaction_branch_id',Branch::items(), array('empty' => '-----------Select---------','tabindex'=>18)); ?><span class="status">&nbsp;</span>
        <?php echo $form->error($model,'student_transaction_branch_id'); ?>
	</div>-->


	<div class="row-left">
		<?php echo $form->labelEx($model,'student_transaction_branch_id'); ?>
		<?php
			echo $form->dropDownList($model,'student_transaction_branch_id',
				CHtml::listData(Branch::model()->findAll(array('condition'=>'branch_organization_id='.$org_id)),'branch_id','branch_name'),
				array(
				'prompt' => '-----------Select-----------','tabindex'=>23,
				'ajax' => array(
				'type'=>'POST', 
				'url'=>CController::createUrl('dependent/getStudDivision'),	 	
				//'update'=>'#StudentTransaction_student_transaction_division_id',
				
				'dataType'=>'json',
		        	'success'=>'function(data) {

		                  $("#StudentTransaction_student_transaction_division_id").html(data.div);
				  $("#StudentTransaction_student_transaction_batch_id").html(data.bat);
				
		                }',
				)));
			 
			 
		?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'student_transaction_branch_id'); ?>
	</div>
	
	<!--
	<div class="row-right">
        <?php echo $form->labelEx($model,'student_transaction_division_id'); ?>
        <?php echo $form->dropDownList($model,'student_transaction_division_id',Division::items(), array('empty' => '-----------Select---------','tabindex'=>4)); ?><span class="status">&nbsp;</span>
        <?php echo $form->error($model,'student_transaction_division_id'); ?>
    	</div>-->


	<div class="row-right">
		<?php echo $form->labelEx($model,'student_transaction_division_id'); ?>
		<?php //echo $form->dropDownList($model,'div_id',Division::items(), array('empty' => '---------------Select-------------','tabindex'=>5)); ?>
		<?php 
			
			if(isset($model->student_transaction_division_id))
				echo $form->dropDownList($model,'student_transaction_division_id', CHtml::listData(Division::model()->findAll(array('condition'=>'academic_name_id='.$model->student_academic_term_name_id.' and branch_id='.$model->student_transaction_branch_id.' and division_organization_id='.$org_id)), 'division_id', 'division_code'),
			array(
			'prompt' => '-----------Select-----------','tabindex'=>24,
			'ajax' => array(
			'type'=>'POST', 
			'url'=>CController::createUrl('dependent/getStudbatch'), 
			'update'=>'#StudentTransaction_student_transaction_batch_id', //selector to update
			
			))
			);
			else
			echo $form->dropDownList($model,'student_transaction_division_id' ,array(),
			array(
			'prompt' => '-----------Select-----------','tabindex'=>24,
			'ajax' => array(
			'type'=>'POST', 
			'url'=>CController::createUrl('dependent/getStudbatch'), 
			'update'=>'#StudentTransaction_student_transaction_batch_id', //selector to update
			
			))); 
			  
		?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'student_transaction_division_id'); ?>
	</div>

 </div>
 <div class="row">
	<div class="row-left">
        <?php echo $form->labelEx($model,'student_transaction_batch_id'); ?>
        <?php
		 if(isset($model->student_transaction_batch_id))
				echo $form->dropDownList($model,'student_transaction_batch_id', CHtml::listData(Batch::model()->findAll(array('condition'=>'branch_id='.$model->student_transaction_branch_id.' and batch_organization_id='.$org_id.' and div_id='.$model->student_transaction_division_id)), 'batch_id', 'batch_code'));
		 else	
		 echo $form->dropDownList($model,'student_transaction_batch_id', array('empty' => '-----------Select---------'),array('tabindex'=>25)); ?><span class="status">&nbsp;</span>
        <?php echo $form->error($model,'student_transaction_batch_id'); ?>
	</div>

	<div class="row-right">
        <?php echo $form->labelEx($model,'student_transaction_shift_id'); ?>
        <?php echo $form->dropDownList($model,'student_transaction_shift_id',Shift::items(), array('empty' => '-----------Select---------','tabindex'=>26)); ?><span class="status">&nbsp;</span>
        <?php echo $form->error($model,'student_transaction_shift_id'); ?>
	</div>

    </div>

    <div class="row">
	      <?php echo $form->labelEx($photo,'student_photos_path'); ?>
	      <?php CHtml::form('','post',array('enctype'=>'multipart/form-data')); ?>
	      <?php echo CHtml::activeFileField($photo, 'student_photos_path',array('tabindex'=>27)); ?><span class="status">&nbsp;</span>
	      <?php CHtml::endForm(); ?>
</div>

<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'submit','name'=>'tab1','tabindex'=>15)); 
		      echo CHtml::button('Edit',array('class'=>'submit', 'id'=>'edit')); 
		?>
</div>

