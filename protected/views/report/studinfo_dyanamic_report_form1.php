<?php
$this->breadcrumbs=array('Report',
	'Student Info',
	
);?>
<div class="portlet box blue">
 <div class="portlet-title"><i class="fa fa-plus"></i><span class="box-title">Select Criterias</span>
</div>

<div class="dynamic-report-form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'studentinfo-form',
	'enableAjaxValidation'=>true,

)); ?>

	<?php //echo $form->errorSummary($model); ?>

	<div class="block-error">
	   <?php echo Yii::app()->user->getFlash('no_student_found'); ?>
		
	</div>
	<div class="row">
	<?php echo CHtml::label('Batch',''); ?>
	  <?php echo CHtml::dropDownList('batch', null, CHtml::listData(Batch::model()->findAll(),'batch_id','batch_name'), array('empty' => 'Select Batch','tabindex'=>4));?>
	
	  <?php echo CHtml::label('City',''); ?>
	  <?php echo CHtml::dropDownList('city', null, City::items(), array('empty' => 'Select City','tabindex'=>5));?>
	<span class="status">&nbsp;</span>
	</div>

	<div class="row">
	  <?php //echo CHtml::label('Blood Group',''); ?>
	  <?php //echo CHtml::dropDownList('bg', null, StudentInfo::getBloodGroup(), array('empty' => 'Select Blood Group','tabindex'=>7));?>

	  <?php echo CHtml::label('Gender',''); ?>
	  <?php echo CHtml::dropDownList('gender', null, StudentInfo::getGenderOptions(), array('empty' => 'Select Gender','tabindex'=>8));?>
	</div>

</div>

<div class="dynamic-report-form">
<?php
		echo $this->renderPartial('criteria_selection_form', array('query'=>$query));

?>

<table class="report-table" border="2">
	<div class="row buttons">
	  <?php echo CHtml::submitButton('Submit', array('class'=>'submit','tabindex'=>32)); ?>
	</div>
</table>
</div>


<?php $this->endWidget(); ?>
</div>

