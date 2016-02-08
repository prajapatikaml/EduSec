<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gaurdian-form',
//	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>
<div class="row">
	     <div class="row-left">
	      <?php echo $form->labelEx($info,'employee_guardian_name'); ?>
              <?php echo $form->textField($info,'employee_guardian_name',array('size'=>18,'maxlength'=>100,'tabindex'=>1)); ?><span class="status">&nbsp;</span>
              <?php echo $form->error($info,'employee_guardian_name'); ?>
	     </div>

             <div class="row-right">
	      <?php echo $form->labelEx($info,'employee_guardian_relation'); ?>
              <?php echo $form->textField($info,'employee_guardian_relation',array('size'=>18,'maxlength'=>20,'tabindex'=>2)); ?><span class="status">&nbsp;</span>
              <?php echo $form->error($info,'employee_guardian_relation'); ?>
	     </div>
</div>

<div class="row">

               <div class="row-left">
	      <?php echo $form->labelEx($info,'employee_guardian_occupation'); ?>
              <?php echo $form->textField($info,'employee_guardian_occupation',array('size'=>18,'maxlength'=>50,'tabindex'=>4)); ?><span class="status">&nbsp;</span>
              <?php echo $form->error($info,'employee_guardian_occupation'); ?>
	      </div>

               <div class="row-right">
              <?php echo $form->labelEx($info,'employee_guardian_income'); ?>
              <?php echo $form->textField($info,'employee_guardian_income',array('size'=>18,'maxlength'=>15,'tabindex'=>5)); ?><span class="status">&nbsp;</span>
              <?php echo $form->error($info,'employee_guardian_income'); ?>
	      </div>
</div>

<div class="row">
	      <?php echo $form->labelEx($info,'employee_guardian_home_address'); ?>
              <?php echo $form->textField($info,'employee_guardian_home_address',array('size'=>59,'maxlength'=>100,'tabindex'=>6)); ?><span class="status">&nbsp;</span>
              <?php echo $form->error($info,'employee_guardian_home_address'); ?>
</div>


<div class="row last">
             <div class="row-left">           
	      <?php echo $form->labelEx($info,'employee_guardian_mobile1'); ?>
              <?php echo $form->textField($info,'employee_guardian_mobile1',array('size'=>18,'maxlength'=>15,'tabindex'=>10)); ?><span class="status">&nbsp;</span>
              <?php echo $form->error($info,'employee_guardian_mobile1'); ?>
	     </div>
             <div class="row-left">
	      <?php echo $form->labelEx($info,'employee_guardian_phone_no'); ?>
	      <?php echo $form->textField($info,'employee_guardian_phone_no',array('size'=>18,'maxlength'=>15,'tabindex'=>12)); ?><span class="status">&nbsp;</span>
	      <?php echo $form->error($info,'employee_guardian_phone_no'); ?>
	     </div>

</div>



<?php $this->endWidget(); ?>
