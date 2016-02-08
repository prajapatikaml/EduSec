<div class="lw_right">
<div class="inner_right">

<h1>Forgot Password</h1>
<p>Please enter your email address to receive new password.</p>


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'forgot-password-form',
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
		<div class="input-icon left">
		<i class="icon-envelope"></i>
            	<?php  echo $form->textField($model,'username', array('placeholder'=>'Email', 'style'=>'padding-left: 25px; width: 225px;')); ?><span class="new-status">&nbsp;</span>
		<?php echo $form->error($model,'username'); ?>
		</div>
		</td>
          </tr>

        <tr>
            <td >
		<?php echo CHtml::submitButton('Reset',array('align'=>'center','class'=>'submit','id'=>'login-button', 'style'=>'margin-right: 30px;')); ?>
		<?php echo CHtml::link('Back',array('site/login'), array('style'=>"background: none repeat scroll 0 0 #E5E5E5;color: #333333;float: left;margin-left: 20px;padding: 10px 20px;
text-decoration: none;")); ?>
	    </td>
        </tr>
</table>

<?php $this->endWidget(); ?>
</div>
</div>
