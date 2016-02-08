<style>
#StudentInfo_student_guardian_home_address{
   width:500px;
}
</style>
<?php
$this->breadcrumbs=array(
	'Student List'=>array('admin'),
	'Update Details',
);?>
<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Update Details
 </div>

<div class="profile-tab profile-edit ui-tabs ui-widget ui-widget-content ui-corner-all ui-tabs-collapsible">

<ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
<li class="ui-state-default ui-corner-top">
  <?php echo CHtml::link('Personal Profile', array('updateprofiletab1', 'id'=>$_REQUEST['id'])); ?></li>
<li class="ui-state-default ui-corner-top ui-tabs-selected ui-state-active">
  <?php echo CHtml::link('Gaurdian Info', array('updateprofiletab2', 'id'=>$_REQUEST['id'])); ?></li>
<li class="ui-state-default ui-corner-top">
   <?php echo CHtml::link('Address Info', array('updateprofiletab3', 'id'=>$_REQUEST['id'])); ?></li>
<li class="ui-state-default ui-corner-top">
   <?php echo CHtml::link('Academic Record', array('studentacademicrecord', 'id'=>$_REQUEST['id'])); ?></li>
<li class="ui-state-default ui-corner-top">
   <?php echo CHtml::link('Document', array('Studentdocs', 'id'=>$_REQUEST['id'])); ?></li>

</ul>

<div class="ui-tabs-panel form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-transaction-form',
	'enableAjaxValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
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
        <?php echo $form->labelEx($info,'student_guardian_occupation'); ?>
        <?php echo $form->textField($info,'student_guardian_occupation',array('size'=>18,'maxlength'=>100)); ?><span class="status">&nbsp;</span>
        <?php echo $form->error($info,'student_guardian_occupation'); ?>
	</div>
	
	<div class="row-right">
        <?php echo $form->labelEx($info,'student_guardian_income'); ?>
	<?php echo $form->textField($info,'student_guardian_income',array('size'=>18,'maxlength'=>20)); ?><span class="status">&nbsp;</span>
	<?php echo $form->error($info,'student_guardian_income'); ?>
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

<div class="row last">
        <?php echo $form->labelEx($info,'student_guardian_home_address'); ?>
        <?php echo $form->textField($info,'student_guardian_home_address',array('size'=>59,'maxlength'=>100)); ?><span class="status">&nbsp;</span>
        <?php echo $form->error($info,'student_guardian_home_address'); ?>
</div>
	<div class="row buttons last">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save',array('class'=>'submit')); 
		?>
		<?php echo CHtml::link('Cancel', array('admin'), array('class'=>'btnCan')); ?>
	</div>

<?php  $this->endWidget(); ?>
</div>
</div>
</div>

