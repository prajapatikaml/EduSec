<div class="header">
	<h1 class="title">Create Organization</h1>
</div>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'organization-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'organization_name'); ?>
		<?php echo $form->textField($model,'organization_name',array('size'=>25,'maxlength'=>50),array('tabindex'=>1)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'organization_name'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'name_alias'); ?>
		<?php echo $form->textField($model,'name_alias',array('size'=>25,'maxlength'=>50),array('tabindex'=>1)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'name_alias'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address_line1'); ?>
		<?php echo $form->textField($model,'address_line1',array('size'=>66,'maxlength'=>50),array('tabindex'=>2)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'address_line1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address_line2'); ?>
		<?php echo $form->textField($model,'address_line2',array('size'=>66,'maxlength'=>50),array('tabindex'=>3)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'address_line2'); ?>
	</div>
<div class="row">
	<div class="row-left">
		<?php echo $form->labelEx($model,'country'); ?>
		<?php echo $form->textField($model,'country',array('size'=>15,'maxlength'=>50),array('tabindex'=>3)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'country'); ?>
	</div>

	
	<div class="row-right">
		<?php echo $form->labelEx($model,'state'); ?>
		<?php echo $form->textField($model,'state',array('size'=>15,'maxlength'=>50),array('tabindex'=>3)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'state'); ?>
	</div>
</div>
<div class="row">
	<div class="row-left">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>15,'maxlength'=>50),array('tabindex'=>3)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'city'); ?>
	</div>

	<div class="row-right">
		<?php echo $form->labelEx($model,'pin'); ?>
		<?php echo $form->textField($model,'pin',array('size'=>12,'maxlength'=>7)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'pin'); ?>
	</div>
</div>
<div class="row">
	<div class="row-left">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('maxlength'=>15)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'phone'); ?>
	</div>
	<div class="row-right">
		<?php echo $form->labelEx($model,'website'); ?>
		<?php echo $form->textField($model,'website'); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'website'); ?>
	</div>
</div>
<div class="row">
	<div class="row-left">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'email'); ?>
	</div>
	<div class="row-right">
		<?php echo $form->labelEx($model,'fax_no'); ?>
		<?php echo $form->textField($model,'fax_no'); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'fax_no'); ?>
	</div>
</div>

	<div class="row">
		 <?php echo $form->labelEx($model,'logo', array('style'=>'width: 137px;')); ?>
               <?php echo $form->fileField($model,'logo',array(),array('tabindex'=>13)); ?>
		<?php echo $form->error($model,'logo'); ?>      
		 
	<div class="row-right">
		
		<?php if(isset($model->logo))
			{
				echo CHtml::image(Yii::app()->controller->createUrl('site/loadImage', array('id'=>$model->organization_id)), "No Image",array("width"=>"175px","height"=>"70px"));
			}
		?>  
	</div>
</div>	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'submit', 'style'=>'float: left; margin-left: 27%;')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

