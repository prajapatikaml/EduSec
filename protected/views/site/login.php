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
		<?php echo $form->error($model,'password', array('style'=>'color: red; font-size: 13px; text-align: center; font-weight: normal;')); ?>
		<div>
            	<?php echo $form->textField($model,'username', array('placeholder'=>'Username','tabindex'=>1)); ?><span class="new-status">&nbsp;</span>
		<?php echo $form->error($model,'username'); ?>
		</div>

		<div>
		<?php echo $form->passwordField($model,'password' , array('placeholder'=>'Password','tabindex'=>2)); ?><span class="new-status">&nbsp;</span>		
		</div>
		<div class="captchaArea">
		<?php if($model->scenario == 'captchaRequired'):?>
			<?php echo $form->textField($model,'verifyCode', array('size'=>5,'tabindex'=>3));?>
			<?php $this->widget('CCaptcha'); ?>			
		<?php endif; ?>
		</div>
            <p class="forgotbox"><?php echo CHtml::link('Forgot Password?',array('forgotpassword')); ?>	</p>

            <div id="lower">
		<?php echo CHtml::submitButton('Login',array('align'=>'center','class'=>'submit','id'=>'login-button','tabindex'=>3)); ?>
	     </div>

<?php $this->endWidget(); ?>

