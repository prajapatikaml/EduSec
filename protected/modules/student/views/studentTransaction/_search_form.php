<style>
.required{
   display:none;
}
.row{
   width:50%;	
}
</style>
<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title"><span class="box-title">Select Criterias</span>
</div>
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
	<?php echo $form->labelEx($model,''); ?>
	<?php echo $form->dropDownList($model,'student_transaction_batch_id',CHtml::listData(Batch::model()->findAll(),'batch_id','batch_code'),array('empty' => 'Select Batch','tabindex'=>1));?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Search',array('class'=>'submit')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
</div>
