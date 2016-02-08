<?php
$this->breadcrumbs=array('Report',
	' Student Document Search',
	
);?>
<div class="portlet box blue">
<div class="portlet-title"><i class="fa fa-plus"></i> <span class="box-title">Select Criterias</span>
</div>
<div class="form"></br>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'document-search',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),

)); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'document_category'); ?>
		<?php echo $form->dropDownList($model,'document_category',CHtml::listData(DocumentCategoryMaster::model()->findAll(),'doc_category_id','doc_category_name'), array('empty' => 'Select Document'));?>
		<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'document_category'); ?>
	</div>
	
</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Search', array('class'=>'submit','name'=>'search')); ?>
	</div>	

<?php $this->endWidget(); ?>	

</div>
