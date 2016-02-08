<?php
$this->breadcrumbs=array('Report',
	'Employee Document Search',
	
);?>

<div class="form">
</br>
<h1> Employee Document Search</h1></br>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'document-search-emp',
	'enableAjaxValidation'=>true,	
	'clientOptions'=>array('validateOnSubmit'=>true),

)); ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<div class="row">
		<?php echo $form->labelEx($model,'department'); ?>
		<?php echo $form->dropDownList($model,'department',Department::items(), array('empty' => 'Select Department'));?>
		<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'department'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'document_category'); ?>
		<?php echo $form->dropDownList($model,'document_category',CHtml::listData(DocumentCategoryMaster::model()->findAll(),'doc_category_id','doc_category_name'), array('empty' => 'Select Document'));?>
		<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'document_category'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Search', array('class'=>'submit','name'=>'search')); ?>
	</div>	

<?php $this->endWidget(); ?>	

</div>
