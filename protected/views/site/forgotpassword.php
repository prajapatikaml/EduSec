<div class="forgotPass-wrapper">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'focus'=>array($model,'username'),
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<div>
	    <div class="block-error">
		<?php echo Yii::app()->user->getFlash('block'); ?>
	    </div>
	</div>
		<?php echo CHtml::link('Back',array('site/login'), array('style'=>"color: rgb(255, 255, 255); float: right; padding-right: 20px;")); ?>
		<div>
		<?php echo CHtml::label(Yii::t('email', 'Email: <span class="required">*</span>'), 'Email');
 ?> 
            	<?php  echo $form->textField($model,'username'); ?><span class="new-status">&nbsp;</span>
		<?php echo $form->error($model,'username'); ?>
		</div>
            <div id="lower">
		<?php echo CHtml::submitButton('Reset',array('align'=>'center','class'=>'submit','id'=>'login-button')); ?>
		</div>

<?php $this->endWidget(); ?>
</div>
