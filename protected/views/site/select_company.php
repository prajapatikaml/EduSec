<div class="product-name" style="padding: 50px; padding-bottom: 0; padding-top: 25px; text-align: right; font-size: 40px;">
<?php echo Yii::app()->name; ?>
</div>
<div class="company-select-container">
<h1 style= "padding: 50px; padding-bottom: 0; padding-top: 25px;">List of Company</h1>
<div class="form" style="float: left; width: 100%;">
<?php
	 $form=$this->beginWidget('CActiveForm', array(
	'id'=>'select_company_form',
	'enableAjaxValidation'=>true,
	'htmlOptions' => array('style'=>'padding: 50px; padding-top: 0;')
	)); 
?>
	
	    <?php echo $form->errorSummary($model); ?>
	
	<div class="block-error">
		<?php echo Yii::app()->user->getFlash('not-select'); ?>
	</div>
	<div class="row">
<?php
		$listcompany = CHtml::listData($company,'organization_id', 'organization_name');
		echo $form->radioButtonList($model,'organization_name',$listcompany,array('template'=>'<span class="rb" style="height: 22px; float: left; width: 100%;">{input} {label}</span>'));
		echo $form->error($model,'organization_name');
?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Select',array('class'=>'submit','name' => 'select_org','style'=>'margin-top:10px; margin-left:0px;')); ?>
	</div>
	
<?php $this->endWidget(); ?>
</div>
</div>
