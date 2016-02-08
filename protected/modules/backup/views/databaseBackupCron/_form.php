<div class="portlet box blue">
<i class="icon-reorder"></i>
<div class="portlet-title"><span class="box-title">Schedule Database Backup</span>
</div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'database-backup-cron-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'database_backup_cron_schedule_time_id'); ?>
		<?php echo $form->dropDownList($model,'database_backup_cron_schedule_time_id',CHtml::listData(ScheduleTiming::model()->findAll(),'schedule_timing_id','schedule_timing_name'),array('empty'=>'Select Schedule')); ?>
		<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'database_backup_cron_schedule_time_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save',array('class'=>'submit')); ?>
		<?php echo CHtml::link('Cancel', array('admin'), array('class'=>'btnCan')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
