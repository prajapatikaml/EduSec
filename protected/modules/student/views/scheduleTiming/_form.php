<div class="portlet box blue">
<i class="icon-reorder"></i>
<div class="portlet-title"> <span class="box-title"> Fill Details</span>
</div><div class="form two-coloumn">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'schedule-timing-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

			
	<?php for($i=0;$i<60;$i++)
	{
		$minute[]=$i;
		
	}?>
	
	<?php for($i=0;$i<24;$i++)
	{
		$hour[]=$i;
	}?>
	<?php for($i=1;$i<=31;$i++)
	{
		$date[$i]=$i;
	}?>
	<?php $minute[]="*";
	      $hour[]="*";
	      $date[]="*"; ?>
	<?php $day = array(1=>'Sunday',
	    'Monday',
	    'Tuesday',
	    'Wednesday',
	    'Thursday',
	    'Friday',
	    'Saturday',
		'*',
	);?>
<?php $month = array (1=>"January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December","*");?>
	<div class="row">
		<?php echo $form->labelEx($model,'schedule_timing_minute'); ?>
		<?php echo $form->dropDownList($model,'schedule_timing_minute',$minute, array('empty' => 'Select Minute')); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'schedule_timing_minute'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'schedule_timing_hour'); ?>
		<?php echo $form->dropDownList($model,'schedule_timing_hour',$hour, array('empty' => 'Select Hour')); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'schedule_timing_hour'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'schedule_timing_date'); ?>
		<?php echo $form->dropDownList($model,'schedule_timing_date',$date, array('empty' => 'Select Date')); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'schedule_timing_date'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'schedule_timing_day'); ?>
		<?php echo $form->dropDownList($model,'schedule_timing_day',$model->getDays(), array('empty' => 'Select Day')); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'schedule_timing_day'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'schedule_timing_month'); ?>
		<?php echo $form->dropDownList($model,'schedule_timing_month',$model->getMonths(), array('empty' => 'Select Month')); ?><span class="status">&nbsp;</span>

		<?php //echo $form->textField($model,'database_backup_cron_month'); ?>
		<?php echo $form->error($model,'schedule_timing_month'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save',array('class'=>'submit')); ?>
 		<?php echo CHtml::link('Cancel', array('admin'), array('class'=>'btnCan')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form --></div>
