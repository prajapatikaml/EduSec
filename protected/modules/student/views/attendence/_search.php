<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); 

$org_id=Yii::app()->user->getState('org_id');
?>
	<div class="row">

        <?php echo $form->labelEx($model,'sem_id'); ?>
	<?php
			echo $form->dropDownList($model,'sem_id',AcademicTermPeriod::items(),
			array(
			'prompt' => 'Select Year','tabindex'=>1,
			'ajax' => array(
			'type'=>'POST', 
			'url'=>CController::createUrl('dependent/getAttendenceItemName'), 
			'update'=>'#Attendence_sem_name_id', //selector to update
			
			))); 
			 
			?><span class="status">&nbsp;</span>
        <?php echo $form->error($model,'sem_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sem_name_id'); ?>
	        <?php echo $form->dropDownList($model,'sem_name_id',array('prompt' => 'Select Semester'),array('tabindex'=>2)); 
		?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'sem_name_id'); ?>
	</div>	
	<div class="row">
		<?php echo $form->labelEx($model,'branch_id'); ?>
		<?php
			echo $form->dropDownList($model,'branch_id',
				CHtml::listData(Branch::model()->findAll(array('condition'=>'branch_organization_id='.$org_id)),'branch_id','branch_name'),
				array(
				'prompt' => 'Select Branch' ,'tabindex'=>3,
				'ajax' => array(
				'type'=>'POST', 
				'url'=>CController::createUrl('dependent/getAttendenceItemName1'),	 	
				//'update'=>'#Attendence_div_id', //selector to update
				
				'dataType'=>'json',
		        	'success'=>'function(data) { 		                 
				  $("#Attendence_sub_id").html(data.sub);				
		                }',
				)));
			 
			 
		?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'sub_id'); ?>
	        <?php echo $form->dropDownList($model,'sub_id',array('prompt' => 'Select Subject'),array('tabindex'=>4)); 
		?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'sub_id'); ?>
	</div>
	
	<!--<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'st_id'); ?>
		<?php echo $form->textField($model,'st_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'attendence'); ?>
		<?php echo $form->textField($model,'attendence',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'shift_id'); ?>
		<?php echo $form->textField($model,'shift_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sem_id'); ?>
		<?php echo $form->textField($model,'sem_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'branch_id'); ?>
		<?php echo $form->textField($model,'branch_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'div_id'); ?>
		<?php echo $form->textField($model,'div_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sub_id'); ?>
		<?php echo $form->textField($model,'sub_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'batch_id'); ?>
		<?php echo $form->textField($model,'batch_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'timetable_id'); ?>
		<?php echo $form->textField($model,'timetable_id'); ?>
	</div>-->

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search',array('class'=>'submit')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
