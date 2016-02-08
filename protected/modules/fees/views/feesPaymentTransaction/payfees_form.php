<div class="portlet box blue" >
<div class="portlet-title"><i class="fa fa-plus"></i><span class="box-title">Add Cash Fees</span>
</div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'fees-payment-cash-form',
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>true,
	    'clientOptions' => array (
	        'validateOnSubmit' => true,
	        'validateOnChange' => true,
	        'validateOnType' => true,
        	),
)); ?>
	<?php echo $form->error($model,'fees_payment_amount'); ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo CHtml::hiddenField('scenario',$model->scenario); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'fees_payment_amount'); ?>
		<?php echo $form->textField($model,'fees_payment_amount'); ?><span class="status">&nbsp;</span>
	</div>
</div><!-- form -->
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save',array('class'=>'submit')); ?>
		<?php echo CHtml::link('Cancel', array('create','id'=>$_REQUEST['id']), array('class'=>'btnCan')); ?>
	</div>

<?php $this->endWidget(); ?>
</div>
