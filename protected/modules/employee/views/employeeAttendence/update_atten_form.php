<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title"><span class="box-title">Edit Employee Attendance</span>
</div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employee-attendence-form',
	//'enableAjaxValidation'=>true,
	//'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php // echo $form->errorSummary($model); ?>

	<div class="block-error">
		<?php echo Yii::app()->user->getFlash('not-select-attendece'); ?>
	</div>
	<div class="row">
		<?php 
			$org_id = Yii::app()->user->getState('org_id');
			$emp_id = $model->employee_id;
			$leave_data = EmployeeLeaveMaster::model()->findAll('empid = '.$emp_id);
			$leave = array();
			$ap = array();			
			?>
		<?php echo $form->labelEx($model,'attendence'); ?>
		<?php echo $form->dropDownList($model,'attendence',array("P"=>"Present","LWP"=>"Absent")); ?>
		<span class="status">&nbsp;</span> 
		<?php echo $form->error($model,'attendence'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'time1'); ?>
		<?php
		 $this->widget('application.extensions.jui_timepicker.JTimePicker', array(
		    'model'=>$model,
		     'attribute'=>'time1',
		     // additional javascript options for the date picker plugin
		     'options'=>array(
			 'showPeriod'=>true,
			 'showPeriodLabels'=>true,
			 ),
		     'htmlOptions'=>array('size'=>8,'maxlength'=>4,'readonly'=>true),
		 ));
		?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'time1'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'time2'); ?>
		<?php
		 $this->widget('application.extensions.jui_timepicker.JTimePicker', array(
		    'model'=>$model,
		    'attribute'=>'time2',
		     // additional javascript options for the date picker plugin
		     'options'=>array(
			 'showPeriod'=>true,
			 'showPeriodLabels'=>true,
			 ),
		     'htmlOptions'=>array('size'=>8,'maxlength'=>4,'readonly'=>true),
		 ));
		?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'time2'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Empattendanceupdate' : 'Save',array('class'=>'submit')); ?>
		<?php echo CHtml::link('Cancel', array('admin'), array('class'=>'btnCan')); ?> 
	</div>

<?php $this->endWidget(); ?>
</div>
</div>
