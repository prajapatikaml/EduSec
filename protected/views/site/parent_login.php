<div class="lw_left">
	<a href="http://www.rudrasoftech.com" target="_blank"><div class="lw_logo">
	<img height="88" width="140" src="../images/rudra_logo.png" />
	<img height="35" width="130" src="../images/edusec.png" />
	</div></a>
</div>

<div class="lw_right">
<div class="inner_right">

<h1>Parent Login</h1>
<p>Please fill out the following form with your login credentials:</p>


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'focus'=>array($model,'parent_username'),
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<div>
	    <div class="block-error">
		<?php echo Yii::app()->user->getFlash('block'); ?>
	    </div>
	</div>


	
	<table cellspacing="0" cellpadding="0" border="0" width="100%">
	  <tr>
		<td>
		<div>
		<?php echo $form->labelEx($model,'parent_username'); ?>
            	<?php  echo $form->textField($model,'parent_username'); ?><span class="new-status">&nbsp;</span>
		<?php echo $form->error($model,'parent_username'); ?>
		</div>
		</td>
          </tr>

        <tr>
            <td>
		<div>
		<?php echo $form->labelEx($model,'parent_password'); ?>
		<?php echo $form->passwordField($model,'parent_password'); ?><span class="new-status">&nbsp;</span>
		<?php echo $form->error($model,'parent_password'); ?>	
		</div>
            </td>
	</tr>


	<?php if($model->scenario == 'parentcaptchaRequired'):?>
	<tr class="captch-image" style="padding-top:100px; padding-left:20px; margin-left:100px;">	   
            <td>
		<?php echo $form->textField($model,'verifyCode', array('size'=>9));?>

		<?php $this->widget('CCaptcha'); ?>			
	    </td>
	</tr>
	<?php endif; ?>

        <tr>
            <td >
		<?php echo CHtml::submitButton('Login',array('align'=>'center','class'=>'submit','id'=>'login-button')); ?>
		<?php echo CHtml::link('Forgot Password?',array('forgotpassword'), array('style'=>"color:#FFF; margin-left:20px;")); ?>
		<?php echo CHtml::link('User Login',array('login'), array('style'=>"color:#FFF; margin-left:20px;")); ?>
	    </td> 
        </tr>
</table>

<?php $this->endWidget(); ?>
</div>
</div>
