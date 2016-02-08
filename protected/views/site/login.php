<div class="lw_right">
<div class="inner_right">

<h1>Login</h1>
<p>Please fill out the following form with your login credentials:</p>


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


	
	<table cellspacing="0" cellpadding="0" border="0" width="100%">
	  <tr>
		<td>
		<i class="icon-user"></i>
		<div class="input-icon left">
            	<?php  echo $form->textField($model,'username', array('placeholder'=>'Username','tabindex'=>1)); ?><span class="new-status">&nbsp;</span>
		<?php echo $form->error($model,'username'); ?>
		</div>
		</td>
          </tr>

        <tr>
            <td>
		<i class="icon-lock"></i>
		<div class="input-icon left">

		<?php echo $form->passwordField($model,'password' , array('placeholder'=>'Password','tabindex'=>2)); ?><span class="new-status">&nbsp;</span>
			
		</div>
            </td>
	</tr>


	<?php if($model->scenario == 'captchaRequired'):?>
	<tr class="captch-image">	   
            <td>
		<?php echo $form->textField($model,'verifyCode', array('size'=>5,'tabindex'=>3));?>

		<?php $this->widget('CCaptcha'); ?>			
	    </td>
	</tr>
	<?php endif; ?>

        <tr style="padding-top: 10px;">
            <td>
		<?php echo CHtml::link('Forgot Password?',array('forgotpassword'), array('style'=>"color:#000; margin-left:20px;",'tabindex'=>4)); ?>	
		<?php echo CHtml::submitButton('Login',array('align'=>'center','class'=>'submit','id'=>'login-button','tabindex'=>3)); ?>
		<?php //echo CHtml::link('Parent Login',array('parentlogin'), array('style'=>"color:#FFF; margin-left:20px;")); ?>
	    </td> 
        </tr>

</table>
	<?php echo $form->error($model,'password'); ?>
<?php $this->endWidget(); ?>
</div>
</div>
<!--
<div class="login-details login-details1">
<span class="user-type">For SuperUser</span>
<label>Username : admin@edusec.info</label> 
<label>Password : admin@edusec.info</label>
</div>

<div class="login-details login-details2">
<span class="user-type">For Employee</span>
<label>Username : employee@edusec.info</label> 
<label>Password : employee@edusec.info</label>
</div>


<div class="login-details login-details3">
<span class="user-type">For Student</span>
<label>Username : student@edusec.info</label>
<label>Password : student@edusec.info</label>
</div>
-->
