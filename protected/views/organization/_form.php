<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Fill Details
 </div>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'organization-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array(
                               'validateOnSubmit'=>true,
                             ),
       'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model);  ?>

	<div class="row">
		<?php echo $form->labelEx($model,'organization_name'); ?>
		<?php echo $form->textField($model,'organization_name',array('size'=>25,'maxlength'=>50)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'organization_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address_line1'); ?>
		<?php echo $form->textField($model,'address_line1',array('size'=>66,'maxlength'=>50, 'style'=>'width:500px;')); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'address_line1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address_line2'); ?>
		<?php echo $form->textField($model,'address_line2',array('size'=>66,'maxlength'=>50, 'style'=>'width:500px;')); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'address_line2'); ?>
	</div>
<div class="row">
	<div class="row-left">
		<?php echo $form->labelEx($model,'country'); ?>
		<?php echo $form->dropDownList($model,'country', Country::items(), 			array(
			'prompt' => 'Select Country',
			'ajax' => array(
			'type'=>'POST', 
			'url'=>CController::createUrl('Organization/UpdateStates'), 
			'update'=>'#Organization_state', //selector to update
			)));?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'country'); ?>
	</div>

	
	<div class="row-right">
		<?php echo $form->labelEx($model,'state'); ?>
		<?php 
			if(isset($model->state))
			echo $form->dropDownList($model,'state', CHtml::listData(State::model()->findAll(array('condition'=>'country_id='.$model->country)), 'state_id', 'state_name'),
			array(
			'prompt' => 'Select State',
			'ajax' => array(
			'type'=>'POST', 
			'url'=>CController::createUrl('Organization/UpdateCities'), 
			'update'=>'#Organization_city', //selector to update
			
			
			)));
			else
			echo $form->dropDownList($model,'state', array(),
			array(
			'prompt' => 'Select State',
			'ajax' => array(
			'type'=>'POST', 
			'url'=>CController::createUrl('Organization/UpdateCities'), 
			'update'=>'#Organization_city', //selector to update

			)));?> <span class="status">&nbsp;</span>
		<?php echo $form->error($model,'state'); ?>
	</div>
</div>
<div class="row">
	<div class="row-left">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php
			 if(isset($model->city))
			 echo $form->dropDownList($model,'city', CHtml::listData(City::model()->findAll(array('condition'=>'state_id='.$model->state)), 'city_id', 'city_name'));
			 else			
			 echo $form->dropDownList($model,'city', array(),array('empty' => 'Select City'));?><span class="status">&nbsp;</span>
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
		<?php echo $form->textField($model,'website',array()); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'website'); ?>
	</div>
</div>
<div class="row">
	<div class="row-left">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array()); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'email'); ?>
	</div>
	<div class="row-right">
		<?php echo $form->labelEx($model,'fax_no'); ?>
		<?php echo $form->textField($model,'fax_no',array('size'=>10,'maxlength'=>10)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'fax_no'); ?>
	</div>
</div>

<div class="row">
	<div class="row-left">
		
		 <?php echo $form->labelEx($model,'logo'); ?>
               <?php echo $form->fileField($model,'logo',array()); ?><span class="status">&nbsp;</span> 
		<?php echo $form->error($model,'logo'); ?>      
		 
	</div>

	<div class="row-right">
		
		<?php if(isset($model->logo))
			{
				echo CHtml::image(Yii::app()->controller->createUrl('site/loadImage', array('id'=>$model->organization_id)), "No Image",array("width"=>"60","height"=>"50"));
			}
		?>  
	</div>
</div>	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save',array('class'=>'submit')); ?>
		<?php echo CHtml::link('Cancel', array('view','id'=>$model->organization_id), array('class'=>'btnCan')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
