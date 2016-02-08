<div class="form">

<?php echo "<?php \$form=\$this->beginWidget('CActiveForm', array(
	'id'=>'".$this->class2id($this->modelClass)."-form',
	'enableAjaxValidation'=>true,
)); ?>\n"; ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>


<?php
foreach($this->tableSchema->columns as $column)
{
	if($column->autoIncrement)
		continue;
?>
	<div class="row">
		<?php echo "<?php echo ".$this->generateActiveLabel($this->modelClass,$column)."; ?>\n"; ?>
		<?php echo "<?php echo ".$this->generateActiveField($this->modelClass,$column)."; ?>\n"; ?><span class="status">&nbsp;</span>
		<?php echo "<?php echo \$form->error(\$model,'{$column->name}'); ?>\n"; ?>
	</div>

<?php
}
?>
	<div class="row buttons">
		<?php echo "<?php echo CHtml::submitButton(\$model->isNewRecord ? 'Add' : 'Save',array('class'=>'submit')); ?>\n"; ?>
	</div>

<?php echo "<?php \$this->endWidget(); ?>\n"; ?>

</div><!-- form -->
