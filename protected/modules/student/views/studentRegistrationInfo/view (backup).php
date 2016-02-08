<style>
div.form fieldset {
    border: 1px solid #3B5998;
    border-radius: 7px 7px 7px 7px;
    margin: 0 0 10px 10px;
    padding: 10px;
    min-width:700px;
}
legend {
    color:#3B5998;  
    font-size:14px;
    font-weight:bold;
}
.lbl_header {
     color: #990A10;
}
</style>

<?php

$this->breadcrumbs=array(
	'Student Registration Information'=>array('admin'),
	$model->student_registration_id,
);

$this->menu=array(
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'', 'url'=>array('update', 'id'=>$model->student_registration_id),'linkOptions'=>array('class'=>'Edit','title'=>'Update')),
	array('label'=>'', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->student_registration_id),'confirm'=>'Are you sure you want to delete this item?'),'linkOptions'=>array('class'=>'Delete','title'=>'Delete')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>



<?php  /*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'student_registration_id',
		'student_first_name',
		'student_middle_name',
		'student_last_name',
		'student_merit_no',
		'student_merit_marks',
		'student_category_id',
		'student_gender',
		'student_date_of_registration',
		'student_branch_id',
		'student_board',
		'student_dob',
		'student_place_of_birth',
		'student_current_address',
		'student_permanent_address',
		'student_email_id',
		'student_phoneno',
		'student_mobile',
		'student_guardian_phoneno',
		'student_guardian_mobile',
		'student_last_school_attended',
		'student_last_school_attended_address',
		'student_father_name',
		'student_mother_name',
		'student_father_occupation',
		'student_mother_occupation',
		'studnet_father_office_address',
		'student_mother_office_address',
		'student_photo',
	),
));*/ 
 ?>
<h1>View Student Registration Information <?php echo $model->student_registration_id; ?></h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-registration-info-form',
	'focus'=>array($model,'student_first_name'),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
	'enableAjaxValidation'=>false,
)); ?>

<fieldset>
<legend>Student Information</legend>

	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($model ,'Name',array('class'=>'lbl_header')); ?>
			<?php echo $form->labelEx($model,$model->student_title.' '.$model->student_first_name.' '.$model->student_middle_name.' '.$model->student_last_name); ?>
		</div>
		<div class="row-right"> 
			<?php echo CHtml::image(Yii::app()->request->baseUrl.'/college_data/stud_images/'.$model->student_photo,'image',array('width'=>100,'height'=>115,'id'=>'aImgShow')); ?>
		</div>
	</div>
	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($model,'Merit No',array('class'=>'lbl_header')); ?>
			<?php echo $form->labelEx($model,$model->student_merit_no); ?>

		</div>
		<div class="row-right">
			<?php echo $form->labelEx($model,'Merit Marks',array('class'=>'lbl_header')); ?>
			<?php echo $form->labelEx($model,$model->student_merit_marks); ?>
		</div>
	</div>

	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($model,'Category',array('class'=>'lbl_header')); ?>
			<?php echo $form->labelEx($model,Category::model()->findByPK($model->student_category_id)->category_name); ?>
		</div>
		<div class = "row-right">
			<?php echo $form->labelEx($model,'Gender',array('class'=>'lbl_header')); ?>
			<?php echo $form->labelEx($model,$model->student_gender); ?>
		</div>
	</div>
	<div class="row">
		<div class = "row-left">
			<?php echo $form->labelEx($model,'Branch',array('class'=>'lbl_header')); ?>
			<label><?php echo Branch::model()->findByPk($model->student_branch_id)->branch_name; ?></label>
		</div>
		<div class = "row-right">
			<?php echo $form->labelEx($model,'Board',array('class'=>'lbl_header')); ?>
			<?php echo $form->labelEx($model,$model->student_board); ?>
		</div>
	</div>
	<div class="row">
		<div class = "row-left">
			<?php echo $form->labelEx($model,'Date of Birth',array('class'=>'lbl_header')); ?>
			<?php echo $form->labelEx($model,($model->student_dob == 0000-00-00) ? "Not Set" : date_format(new DateTime($model->student_dob), "d-m-Y")); ?>
		</div>
		<div class = "row-right">
			<?php echo $form->labelEx($model,'Place of Birth',array('class'=>'lbl_header')); ?>
			<?php echo $form->labelEx($model,$model->student_place_of_birth); ?>
		</div>
	</div>

	<div class="row">
		<div class = "row-left">	
			<?php echo $form->labelEx($model,'Current Address',array('class'=>'lbl_header')); ?>
			<label><?php echo $model->student_current_address; ?></label>

		</div>
		<div class = "row-right">

			<?php echo $form->labelEx($model,'Permanent Address',array('class'=>'lbl_header')); ?>		
			<label><?php echo $model->student_permanent_address; ?></label>
		</div>
	</div>
	<div class="row">
		<div class = "row-left">
			<?php echo $form->labelEx($model,'E-mail',array('class'=>'lbl_header')); ?>
			<label><?php echo $model->student_email_id; ?></label>
		</div>	
		<div class = "row-right">
			<?php echo $form->labelEx($model,'Phone No',array('class'=>'lbl_header')); ?>
			<?php echo $form->labelEx($model,$model->student_phoneno); ?>
		</div>	
	</div>
	<div class='row'>
		<div class='row-left'>
			<?php echo $form->labelEx($model,'Mobile No',array('class'=>'lbl_header')); ?>
			<?php echo $form->labelEx($model,$model->student_mobile); ?>
		</div>
	</div>
	<div class='row'>
		<div class='row-left'>
			<?php echo $form->labelEx($model,'Name of last school attended',array('class'=>'lbl_header')); ?>
			<?php echo $form->labelEx($model,$model->student_last_school_attended); ?>
		</div>
		<div class='row-right'>
			<?php echo $form->labelEx($model,'Address of last school attended',array('class'=>'lbl_header')); ?>
			<?php echo $form->labelEx($model,$model->student_last_school_attended_address); ?>
		</div>	
	</div>
</fieldset>

<fieldset>
<legend>Parent's Information</legend>
	<div class="row">
		<div class='row-left'>
			<?php echo $form->labelEx($model,'Father\'s Name',array('class'=>'lbl_header')); ?>
			<?php echo $model->student_father_name?>
		</div>
		<div class='row-right'>
			<?php echo $form->labelEx($model,'Mother\'s Name',array('class'=>'lbl_header')); ?>
			<?php echo $form->labelEx($model,$model->student_mother_name); ?>
		</div>
	</div>

	<div class="row">
		<div class='row-left'>
			<?php echo $form->labelEx($model,'Father\'s Occupation',array('class'=>'lbl_header')); ?>
			<?php echo $form->labelEx($model,$model->student_father_occupation); ?>
		</div>
		<div class='row-right'>

			<?php echo $form->labelEx($model,'Father\'s Occupation',array('class'=>'lbl_header')); ?>
			<?php echo $form->labelEx($model,$model->student_mother_occupation); ?>
		</div>
	</div>

	<div class="row">
		<div class='row-left'>
			<?php echo $form->labelEx($model,'Father\'s Office Address',array('class'=>'lbl_header')); ?>
			<label><?php echo $model->studnet_father_office_address; ?></label>
		</div>
		<div class='row-right'>
			<?php echo $form->labelEx($model,'Father\'s Office Address',array('class'=>'lbl_header')); ?>
			<label><?php echo $model->student_mother_office_address; ?></label>
		</div>
	</div>

	<div class="row">
		<div class='row-left'>
			<?php echo $form->labelEx($model,'Parents\'s Phone No',array('class'=>'lbl_header')); ?>
			<?php echo $form->labelEx($model,$model->student_guardian_phoneno); ?>
		</div>
		<div class='row-right'>
			<?php echo $form->labelEx($model,'Parents\'s Mobile No',array('class'=>'lbl_header')); ?>
			<?php echo $form->labelEx($model,$model->student_guardian_mobile); ?>
		</div>
	</div>

</fieldset>
<fieldset>
<legend>Academic Information</legend>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$acdmInfoModel->search(),
	'summaryText'=>'', 
	'columns'=>array(
		'examination',
		'year_of_passing',
		'name_of_board',
		'medium',
		'class_obtained',
		'marks_obtained',
		'marks_out_of',
		'percentage',
	),
)); ?>
</fieldset>
<?php $this->endWidget(); ?>

</div><!-- form -->
