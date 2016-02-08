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

</style>

<script>
 var imageTypes = ['jpeg', 'jpg', 'png']; //Validate the images to show
        function showImage(src, target)
        {
            var fr = new FileReader();
            fr.onload = function(e)
            {
                target.src = this.result;
            };
            fr.readAsDataURL(src.files[0]);

        }

        var uploadImage = function(obj)
        {
            var val = obj.value;
            var lastInd = val.lastIndexOf('.');
            var ext = val.slice(lastInd + 1, val.length);
            if (imageTypes.indexOf(ext) !== -1)
            {
                var id = $(obj).data('target');                    
                var src = obj;
                var target = $(id)[0];                    
                showImage(src, target);
            }
            else
            {

            }
        }
</script>
<?php
	$course = $model->admission_type;
	if($course == 0 || $course == 1)
		$org_id = 1;
	elseif($course == 2)
		$org_id = 2;
	elseif($course == 3)
		$org_id = 3;		
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-registration-info-form',
	'focus'=>array($model,'student_first_name'),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
	'enableAjaxValidation'=>true,
)); ?>

<fieldset>
<legend>Student Information</legend>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php // echo $form->errorSummary($model); ?>


	<div class='row'>
		<div class='row-right'>
			<?php echo $form->labelEx($model,'student_title'); ?>
			<?php echo $form->dropDownList($model,'student_title',array('Mr.'=>'Mr.','Mrs.'=>'Mrs.','Ms.'=>'Ms.'),array('empty'=>'Select Title')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_title'); ?>
		</div>
	</div>
	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($model,'student_first_name'); ?>
			<?php echo $form->textField($model,'student_first_name',array('size'=>13)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_first_name'); ?>
		</div>
		<div class="row-right">
			<?php echo $form->labelEx($model,'student_middle_name'); ?>
			<?php echo $form->textField($model,'student_middle_name',array('size'=>13)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_middle_name'); ?>
		</div>
	</div>

	<div class="row">
		<div class = "row-left">
			<?php echo $form->labelEx($model,'student_last_name'); ?>
			<?php echo $form->textField($model,'student_last_name',array('size'=>13)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_last_name'); ?>
		</div>
		<div class="row-right">
			<?php echo $form->labelEx($model,'student_merit_no'); ?>
			<?php echo $form->textField($model,'student_merit_no',array('size'=>13)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_merit_no'); ?>
		</div>
	</div>

	<div class="row">
		<div class = "row-left">
			<?php echo $form->labelEx($model,'student_merit_marks'); ?>
			<?php echo $form->textField($model,'student_merit_marks', array('size'=>13)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_merit_marks'); ?>
		</div>
		<div class="row-right">
			<?php echo $form->labelEx($model,'student_category_id'); ?>
			<?php echo $form->dropDownList($model,'student_category_id',CHtml::listData(Category::model()->findAll(),'category_id','category_name'),array('empty'=>'Select Category'),array('size'=>13)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_category_id'); ?>
		</div>
	</div>
	<div class="row">
		<div class = "row-left">
			<?php echo $form->labelEx($model,'student_gender'); ?>
			<?php echo $form->dropDownList($model,'student_gender',array('MALE'=>'MALE','FEMALE'=>'FEMALE'),array('empty'=>'Select Gender')); ?> <span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_gender'); ?>
		</div>

		<div class = "row-right">
			<?php echo $form->labelEx($model,'student_branch_id'); ?>
			<?php
			$data = array();
 			$data = CHtml::listData(Branch::model()->findAll(array('condition'=>'branch_organization_id = '.$org_id)),'branch_id','branch_name');		 
		$this->widget('ext.EchMultiSelect.EchMultiSelect', array(
		    'model' => $model,
		    'dropDownAttribute' => 'student_branch_id',     
		    'data' => $data,
		    'options'=>array('noneSelectedText'=>'Select Branch'),
		    'dropDownHtmlOptions'=> array(
			'style'=>'width:150px;',
		    ),
		));
			?>
			<?php //echo $form->dropDownList($model,'student_branch_id',CHtml::listData(Branch::model()->findAll(array('condition'=>'branch_organization_id = '.Yii::app()->user->getState('org_id'))),'branch_id','branch_name'),array('empty'=>'Select Branch')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_branch_id'); ?>
		</div>
	</div>
	<div class="row">
		<div class = "row-left">
			<?php echo $form->labelEx($model,'student_board'); ?>
			<?php echo $form->textField($model,'student_board',array('size'=>13)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_board'); ?>
		</div>
		<div class = "row-right">
			<?php echo $form->labelEx($model,'student_dob'); ?>
			<?php	
				 if($model->student_dob != 0000-00-00)
				$model->student_dob= date('d-m-Y',strtotime($model->student_dob));
			
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    	'model'=>$model, 
				'attribute'=>'student_dob',
			    	'options'=>array(
				'dateFormat'=>'dd-mm-yy',
				'changeYear'=>'true',
				'changeMonth'=>'true',
				'showAnim' =>'slide',
				'yearRange'=>'1950:'.(date('Y')-19),

			    	),
				'htmlOptions'=>array(
				'style'=>'width:165px;vertical-align:top',
				'readonly'=>true,
			    	),
				));

			?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_dob'); ?>
		</div>
	</div>
	<div class="row">
		<div class = "row-left">
			<?php echo $form->labelEx($model,'student_place_of_birth'); ?>
			<?php echo $form->textField($model,'student_place_of_birth',array('size'=>13)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_place_of_birth'); ?>
		</div>
	</div>


	<div class="row">
		<div class = "row-left">	
			<?php echo $form->labelEx($model,'student_current_address'); ?>
			<?php echo $form->textArea($model,'student_current_address',array('rows'=>3,'cols'=>15)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_current_address'); ?>

		</div>
		<div class = "row-right">

			<?php echo $form->labelEx($model,'student_permanent_address'); ?>
			<?php echo $form->textArea($model,'student_permanent_address',array('rows'=>3,'cols'=>15)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_permanent_address'); ?>

		</div>
	</div>
	<div class="row">
		<div class = "row-left">
			<?php echo $form->labelEx($model,'student_email_id'); ?>
			<?php echo $form->textField($model,'student_email_id',array('size'=>13)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_email_id'); ?>
		</div>	
		<div class = "row-right">
			<?php echo $form->labelEx($model,'student_phoneno'); ?>
			<?php echo $form->textField($model,'student_phoneno',array('size'=>13,'maxlength'=>12)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_phoneno'); ?>
		</div>	
	</div>
	<div class='row'>
		<div class='row-left'>
			<?php echo $form->labelEx($model,'student_mobile'); ?>
			<?php echo $form->textField($model,'student_mobile',array('size'=>13,'maxlength'=>10)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_mobile'); ?>
		</div>
	</div>
	<div class='row'>
		<div class='row-left'>
			<?php echo $form->labelEx($model,'student_photo'); ?>
			<?php echo $form->fileField($model, 'student_photo',array('onchange'=>'uploadImage(this)','data-target'=>'#aImgShow')); ?>
			<?php // echo $form->error($model,'student_photo'); ?>
		</div>
		<div class='row-right'>
			<?php echo CHtml::image(Yii::app()->request->baseUrl.'/college_data/stud_images/'.$model->student_photo,'image',array('width'=>70,'height'=>80,'id'=>'aImgShow')); ?>
		</div>
	</div>
	<div class='row'>
		<div class='row-left'>
			<?php echo $form->labelEx($model,'student_last_school_attended'); ?>
			<?php echo $form->textField($model,'student_last_school_attended',array('size'=>13)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_last_school_attended'); ?>
		</div>
		<div class='row-right'>
			<?php echo $form->labelEx($model,'student_last_school_attended_address'); ?>
			<?php echo $form->textArea($model,'student_last_school_attended_address',array('row'=>3,'cols'=>15)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_last_school_attended_address'); ?>
		</div>	
	</div>
</fieldset>
<fieldset>
<legend>Academic Information</legend>

	<div class="row">
		<p><b>S.S.C Examination Details</b></p>

		<?php echo $form->hiddenField($ssc,'examination',array('value'=>'S.S.C','name'=>'StudentRegistrationAcademicInfo[0][examination]')); ?>
	</div>
	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($ssc,'year_of_passing'); ?>
			<?php echo $form->textField($ssc,'year_of_passing',array('size'=>13 , 'name'=>'StudentRegistrationAcademicInfo[0][year_of_passing]')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($ssc,'year_of_passing'); ?>
			
		</div>
		<div class="row-right">
			<?php echo $form->labelEx($ssc,'name_of_board'); ?>
			<?php echo $form->textField($ssc,'name_of_board',array('size'=>13, 'name'=>'StudentRegistrationAcademicInfo[0][name_of_board]')); ?> <span class="status">&nbsp;</span>
			<?php echo $form->error($ssc,'name_of_board'); ?>
		</div>
	</div>
	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($ssc,'medium'); ?>
			<?php echo $form->textField($ssc,'medium',array('size'=>13, 'name'=>'StudentRegistrationAcademicInfo[0][medium]')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($ssc,'medium'); ?>
		</div>
		<div class="row-right">
			<?php echo $form->labelEx($ssc,'class_obtained'); ?>
			<?php echo $form->textField($ssc,'class_obtained',array('size'=>13, 'name'=>'StudentRegistrationAcademicInfo[0][class_obtained]')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($ssc,'class_obtained'); ?>
		</div>
	</div>
	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($ssc,'marks_obtained'); ?>
			<?php echo $form->textField($ssc,'marks_obtained',array('size'=>13, 'name'=>'StudentRegistrationAcademicInfo[0][marks_obtained]')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($ssc,'marks_obtained'); ?>
		</div>
		<div class="row-right">
			<?php echo $form->labelEx($ssc,'marks_out_of'); ?>
			<?php echo $form->textField($ssc,'marks_out_of',array('size'=>13, 'name'=>'StudentRegistrationAcademicInfo[0][marks_out_of]')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($ssc,'marks_out_of'); ?>
		</div>
	</div>
	<div class="row">
			<?php echo $form->labelEx($ssc,'percentage'); ?>
			<?php echo $form->textField($ssc,'percentage',array('size'=>13,'name'=>'StudentRegistrationAcademicInfo[0][percentage]')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($ssc,'percentage'); ?>
	</div>
	<div class="row">
	<?php if($course!=2 && $course!=1){ ?>
		<p><b>H.S.C Examination Details</b></p>
		<?php echo $form->hiddenField($hsc,'examination', array('value'=>'H.S.C', 'name'=>'StudentRegistrationAcademicInfo[1][examination]')); ?>
	</div>
	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($hsc,'year_of_passing'); ?>
			<?php echo $form->textField($hsc,'year_of_passing',array('size'=>13, 'name'=>'StudentRegistrationAcademicInfo[1][year_of_passing]')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($hsc,'year_of_passing'); ?>
		</div>
		<div class="row-right">
			<?php echo $form->labelEx($hsc,'name_of_board'); ?>
			<?php echo $form->textField($hsc,'name_of_board',array('size'=>13, 'name'=>'StudentRegistrationAcademicInfo[1][name_of_board]')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($hsc,'name_of_board'); ?>
		</div>
	</div>
	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($hsc,'medium'); ?>
			<?php echo $form->textField($hsc,'medium',array('size'=>13, 'name'=>'StudentRegistrationAcademicInfo[1][medium]')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($hsc,'medium'); ?>
		</div>
		<div class="row-right">
			<?php echo $form->labelEx($hsc,'class_obtained'); ?>
			<?php echo $form->textField($hsc,'class_obtained',array('size'=>13, 'name'=>'StudentRegistrationAcademicInfo[1][class_obtained]')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($hsc,'class_obtained'); ?>
		</div>
	</div>
	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($hsc,'marks_obtained'); ?>
			<?php echo $form->textField($hsc,'marks_obtained',array('size'=>13, 'name'=>'StudentRegistrationAcademicInfo[1][marks_obtained]')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($hsc,'marks_obtained'); ?>
		</div>
		<div class="row-right">
			<?php echo $form->labelEx($hsc,'marks_out_of'); ?>
			<?php echo $form->textField($hsc,'marks_out_of',array('size'=>13, 'name'=>'StudentRegistrationAcademicInfo[1][marks_out_of]')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($hsc,'marks_out_of'); ?>
		</div>
	</div>
	<div class="row">
			<?php echo $form->labelEx($hsc,'percentage'); ?>
			<?php echo $form->textField($hsc,'percentage',array('size'=>13,'name'=>'StudentRegistrationAcademicInfo[1][percentage]')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($hsc,'percentage'); ?>
	</div>
	<?php }
		if($course!=2 && $course!=1){ 
	 ?>
	<div class="row">
		<p><b>H.S.C + Guj.CET Examination Details</b></p>
		<?php echo $form->hiddenField($cet,'examination',array('value'=>'H.S.C + Guj.CET','name'=>'StudentRegistrationAcademicInfo[2][examination]')); ?>
	</div>
	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($cet,'year_of_passing'); ?>
			<?php echo $form->textField($cet,'year_of_passing',array('size'=>13, 'name'=>'StudentRegistrationAcademicInfo[2][year_of_passing]')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($cet,'year_of_passing'); ?>
		</div>
		<div class="row-right">
			<?php echo $form->labelEx($cet,'name_of_board'); ?>
			<?php echo $form->textField($cet,'name_of_board',array('size'=>13, 'name'=>'StudentRegistrationAcademicInfo[2][name_of_board]')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($cet,'name_of_board'); ?>
		</div>
	</div>
	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($cet,'medium'); ?>
			<?php echo $form->textField($cet,'medium',array('size'=>13, 'name'=>'StudentRegistrationAcademicInfo[2][medium]')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($cet,'medium'); ?>
		</div>
		<div class="row-right">
			<?php echo $form->labelEx($cet,'class_obtained'); ?>
			<?php /* echo $form->dropDownList($acdmInfoModel,'class_obtained',array('distinction'=>'Distinction', 'firstclass'=>'First Class', 'secondclass'=>'Second Class','passclass'=>'Pass Class'),array('empty'=>'Select Class obtained'),array('name'=>'StudentRegistrationAcademicInfo[2][class_obtained]')); */ ?>
			<?php echo $form->textField($cet,'class_obtained',array('size'=>13, 'name'=>'StudentRegistrationAcademicInfo[2][class_obtained]')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($cet,'class_obtained'); ?>
		</div>
	</div>
	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($cet,'marks_obtained'); ?>
			<?php echo $form->textField($cet,'marks_obtained',array('size'=>13, 'name'=>'StudentRegistrationAcademicInfo[2][marks_obtained]')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($cet,'marks_obtained'); ?>
		</div>
		<div class="row-right">
			<?php echo $form->labelEx($cet,'marks_out_of'); ?>
			<?php echo $form->textField($cet,'marks_out_of',array('size'=>13, 'name'=>'StudentRegistrationAcademicInfo[2][marks_out_of]')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($cet,'marks_out_of'); ?>
		</div>
	</div>
	<div class="row">
			<?php echo $form->labelEx($cet,'percentage'); ?>
			<?php echo $form->textField($cet,'percentage',array('size'=>13,'name'=>'StudentRegistrationAcademicInfo[2][percentage]')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($cet,'percentage'); ?>
	</div>
	<?php } ?>
</fieldset>

<fieldset>
<legend>Parent's Information</legend>
	<div class="row">
		<div class='row-left'>
			<?php echo $form->labelEx($model,'student_father_name'); ?>
			<?php echo $form->textField($model,'student_father_name',array('size'=>13)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_father_name'); ?>
		</div>
		<div class='row-right'>
			<?php echo $form->labelEx($model,'student_mother_name'); ?>
			<?php echo $form->textField($model,'student_mother_name',array('size'=>13)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_mother_name'); ?>
		

		</div>
	</div>

	<div class="row">
		<div class='row-left'>
			<?php echo $form->labelEx($model,'student_father_occupation'); ?>
			<?php echo $form->textField($model,'student_father_occupation',array('size'=>13)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_father_occupation'); ?>			
		</div>
		<div class='row-right'>

			<?php echo $form->labelEx($model,'student_mother_occupation'); ?>
			<?php echo $form->textField($model,'student_mother_occupation',array('size'=>13)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_mother_occupation'); ?>
		</div>
	</div>

	<div class="row">
		<div class='row-left'>
			<?php echo $form->labelEx($model,'studnet_father_office_address'); ?>
			<?php echo $form->textField($model,'studnet_father_office_address',array('size'=>13)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'studnet_father_office_address'); ?>
		</div>
		<div class='row-right'>
			<?php echo $form->labelEx($model,'student_mother_office_address'); ?>
			<?php echo $form->textField($model,'student_mother_office_address',array('size'=>13)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_mother_office_address'); ?>
		</div>
	</div>

	<div class="row">
		<div class='row-left'>
			<?php echo $form->labelEx($model,'student_guardian_phoneno'); ?>
			<?php echo $form->textField($model,'student_guardian_phoneno',array('size'=>13,'maxlength'=>12)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_guardian_phoneno'); ?>
		</div>
		<div class='row-right'>
			<?php echo $form->labelEx($model,'student_guardian_mobile'); ?>
			<?php echo $form->textField($model,'student_guardian_mobile',array('size'=>13,'maxlength'=>10)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_guardian_mobile'); ?>
		</div>
	</div>

</fieldset>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
