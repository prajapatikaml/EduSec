<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-transaction-form',
	//'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>
<div class="row">

	<div class="row-left">
        <?php echo $form->labelEx($info,'student_guardian_name'); ?>
        <?php echo $form->textField($info,'student_guardian_name',array('size'=>18,'maxlength'=>100)); ?><span class="status">&nbsp;</span>
        <?php echo $form->error($info,'student_guardian_name'); ?>
	</div>
	
	<div class="row-right">
        <?php echo $form->labelEx($info,'student_guardian_relation'); ?>
	<?php echo $form->textField($info,'student_guardian_relation',array('size'=>18,'maxlength'=>20)); ?><span class="status">&nbsp;</span>
	<?php echo $form->error($info,'student_guardian_relation'); ?>
	</div>
</div>


	   <div class="row">
	<div class="row-left">
        <?php echo $form->labelEx($info,'student_guardian_phoneno'); ?>
        <?php echo $form->textField($info,'student_guardian_phoneno',array('size'=>18,'maxlength'=>15)); ?><span class="status">&nbsp;</span>
        <?php echo $form->error($info,'student_guardian_phoneno'); ?>
	</div>

	<div class="row-right">
	<?php echo $form->labelEx($info,'student_guardian_mobile'); ?>
        <?php echo $form->textField($info,'student_guardian_mobile',array('size'=>18,'maxlength'=>15)); ?><span class="status">&nbsp;</span>
        <?php echo $form->error($info,'student_guardian_mobile'); ?>
	</div>

    </div>



<div class="row">
        <?php echo $form->labelEx($info,'student_guardian_home_address'); ?>
        <?php echo $form->textField($info,'student_guardian_home_address',array('size'=>59,'maxlength'=>100)); ?><span class="status">&nbsp;</span>
        <?php echo $form->error($info,'student_guardian_home_address'); ?>
</div>
<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'submit')); ?>
	</div>

<?php $this->endWidget(); ?>  
