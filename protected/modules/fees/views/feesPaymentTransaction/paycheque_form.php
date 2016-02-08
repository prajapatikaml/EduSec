<div class="portlet box blue" >
<div class="portlet-title"><i class="fa fa-plus"></i><span class="box-title">Add Cheque Fees</span>
</div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'fees-payment-cheque-form',
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

	<div class="row">
		<?php echo $form->labelEx($model,'fees_payment_cheque_number'); ?>
		<?php echo $form->textField($model,'fees_payment_cheque_number',array('size'=>20,'maxlength'=>6)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'fees_payment_cheque_number'); ?>
	</div>
		<div class="row">
		<?php echo $form->labelEx($model,'fees_payment_cheque_date'); ?>
		
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		    'model'=>$model, 
		    'attribute'=>'fees_payment_cheque_date',
		    'options'=>array(
			'dateFormat'=>'dd-mm-yy',
			'changeYear'=>'true',
			'changeMonth'=>'true',
			'showAnim' =>'slide',
			'yearRange'=>'1900:'.(date('Y')+1),
			'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',			
		    ),
			'htmlOptions'=>array(
			'style'=>'width:80px;vertical-align:top',
			'readonly'=>true,
		    ),
			
		));
		?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'fees_payment_cheque_date'); ?>
		</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fees_payment_cheque_bank'); ?>
		<?php echo $form->dropdownList($model,'fees_payment_cheque_bank', BankMaster::items(),array('empty' => 'Select Bank')); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'fees_payment_cheque_bank'); ?>
	</div>
</div><!-- form -->
<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save', array('class'=>'submit')); ?>
		<?php echo CHtml::link('Cancel', array('create','id'=>$_REQUEST['id']), array('class'=>'btnCan')); ?>
	</div>

<?php $this->endWidget(); ?>
</div>
