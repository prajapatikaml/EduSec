<div class = "test" style="display:none;">
<?php        

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'mydialog',
	// additional javascript options for the dialog plugin
	'options'=>array(
		'title'=>'Add Admin',
		'autoOpen'=>true,
		'modal'=>true,	
                'height'=>'auto',
                'width'=>400,
                'resizable'=>false,
                'draggable'=>false,
		'close' => 'js:function(event, ui) { location.href = "'.Yii::app()->createUrl("user/admin").'"; }'
	),
));
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array(
				'validateOnSubmit'=>true,
			      ),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row1">
		<?php echo $form->labelEx($model,'user_organization_email_id'); ?>
		<?php echo $form->error($model,'user_organization_email_id'); ?>
		<?php echo $form->textField($model,'user_organization_email_id',array('size'=>35,'maxlength'=>60)); ?><span class="status">&nbsp;</span>
	</div>

	<div class="row1">
		<?php echo $form->labelEx($model,'user_password'); ?>
		<?php echo $form->passwordField($model,'user_password',array('size'=>25,'maxlength'=>25)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'user_password'); ?>
	</div>


	<!--<div class="row">
		<?php echo $form->labelEx($model,'user_created_by'); ?>
		<?php echo $form->textField($model,'user_created_by'); ?>
		<?php echo $form->error($model,'user_created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_creation_date'); ?>
		<?php echo $form->textField($model,'user_creation_date'); ?>
		<?php echo $form->error($model,'user_creation_date'); ?>
	</div>-->
<br/>
	<div class="row1 buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save', array('class'=>'submit')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
</div>
