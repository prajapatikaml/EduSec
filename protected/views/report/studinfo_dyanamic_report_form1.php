
<?php
$this->breadcrumbs=array('Report' => array(),
	'Student Info',
	
);?>

<h1> Student Report </h1>

<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Select criteria
 </div>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'studentinfo-form',
	'enableAjaxValidation'=>true,

)); ?>

	<div class="block-error">
	   <?php echo Yii::app()->user->getFlash('no_student_found'); ?>
		
	</div>
	<?php
	
	$acd = Yii::app()->db->createCommand()
		->select('*')
		->from('academic_term')
		->where('current_sem=1')
		->queryAll();
		
	$acdterm=CHtml::listData($acd,'academic_term_id','academic_term_name');

	?>
	
	<div class="row">
	  <?php echo CHtml::label('Academic Year',''); ?>
	  <?php  echo CHtml::dropDownList('acdm_period', null, CHtml::listData(AcademicTermPeriod::model()->findAll(), 'academic_terms_period_id', 'academic_term_period'), array('empty' => 'Select Year','tabindex'=>2) ); ?>
	
	  <?php echo CHtml::label('Semester',''); ?>
	  <?php echo CHtml::dropDownList('sem', null, $acdterm, array('empty' => 'Select Semester','tabindex'=>3));?>

	</div>
	<div class="row">

	  <?php echo CHtml::label('City',''); ?>
	  <?php echo CHtml::dropDownList('city', null, City::items(), array('empty' => 'Select City','tabindex'=>5));?>

	  <?php echo CHtml::label('Blood Group',''); ?>
	  <?php echo CHtml::dropDownList('bg', null, StudentInfo::getBloodGroup(), array('empty' => 'Select Blood Group','tabindex'=>7));?>
	</div>

	<div class="row">
	  <?php echo CHtml::label('Gender',''); ?>
	  <?php echo CHtml::dropDownList('gender', null, StudentInfo::getGenderOptions(), array('empty' => 'Select Gender','tabindex'=>8));?>

	  <?php echo CHtml::label('Course',''); ?>
	  <?php echo CHtml::dropDownList('course', null, CHtml::listData(CourseMaster::model()->findAll(), 'course_master_id', 'course_name'), array('empty' => 'Select Course','tabindex'=>9) );?>
	</div>
	
</div>
</div>

<div class="dynamic-report-form">
<?php echo $this->renderPartial('criteria_selection_form', array('query'=>$query)); ?>

	<div class="row buttons">
	  <?php echo CHtml::submitButton('Submit', array('class'=>'submit','tabindex'=>32, 'style'=>'margin-left: 0; margin-top: 18px;')); ?>
	</div>

</div>


<?php $this->endWidget(); ?>

