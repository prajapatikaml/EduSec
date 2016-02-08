<?php
$this->breadcrumbs=array(
	'Generating Employee Identity Card',
	
);

$this->menu=array(
	array('label'=>'', 'url'=>array('IdcardFieldFormat/EmployeeCardCreate'),'linkOptions'=>array('class'=>'Create','title'=>'Generate Id Format')),

);
?>
<h1>Generating Employee Identity Card</h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'emp-id-card',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),

)); ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<!--<div class="row">
		<?php echo CHtml::label('Term Period',''); ?>
		<?php echo CHtml::dropDownList('acdm_period', null, AcademicTermPeriod::items(),
		array(
			'prompt' => '-----------Select-----------','tabindex'=>1,
			'ajax' => array(
			'type'=>'POST', 
			'url'=>CController::createUrl('Report/getAcademicterm'), 
			'update'=>'#acdm_name', //selector to update
			
			))); ?>
	</div>
	<div class="row">
		<?php echo CHtml::label('Term Name',''); ?>
		<?php echo CHtml::dropDownList('acdm_name', null, array('empty' => '---------------Select-------------','tabindex'=>2));?>
	</div>-->
	<div class="row">
		<?php echo $form->labelEx($model,'template_name'); ?>
<?php echo $form->dropDownList($model,'template_name',CHtml::listData(IdcardFieldFormat::model()->findAll(array('condition'=>'idcard_org_id='.Yii::app()->user->getState('org_id').' and stud_emp_type="Employee"','group'=>'idtemplate_name')),'idtemplate_name','idtemplate_name'), array('empty' => 'Select Template'));?>
	<span class="status">&nbsp;</span>
	<?php echo $form->error($model,'template_name'); ?>
	</div>
	<div class="row">
		<?php echo CHtml::label('Department',''); ?>
		<?php echo CHtml::dropDownList('department', null, Department::items(),array('empty' => 'Select Department','tabindex'=>3)); ?>
	</div>
	<div class="row">
		<?php echo CHtml::label('Card Id',''); ?>
		<?php echo CHtml::textField('employee_card_id', null, array('empty' => '---------------Select-------------','tabindex'=>5));?><span class="status">&nbsp;</span>&nbsp;&nbsp;		
	</div>
<div class="row buttons">
	<?php echo CHtml::submitButton('Generate', array('class'=>'submit','name'=>'search','tabindex'=>3)); ?>
</div>
<?php $this->endWidget(); ?>
</div>
