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
$(document).ready(function () {
	$('#ckbox').click(function () {
			
		if ($("#ckbox").is(":checked"))
		{
			$('#p_add').hide();
		}
		else
			$('#p_add').show();
	});
	});
</script>
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
	$org_id = $model->organization_id;
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
		<div class='row-left'>
			<?php echo $form->labelEx($model,'student_title'); ?>
			<?php echo $form->dropDownList($model,'student_title',array('Mr.'=>'Mr.','Mrs.'=>'Mrs.','Ms.'=>'Ms.'),array('empty'=>'Select Title')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_title'); ?>
		</div>
		<div class="row-right">
			<?php echo $form->labelEx($model,'student_first_name'); ?>
			<?php echo $form->textField($model,'student_first_name',array('size'=>13)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_first_name'); ?>
		</div>
	</div>
	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($model,'student_middle_name'); ?>
			<?php echo $form->textField($model,'student_middle_name',array('size'=>13)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_middle_name'); ?>
		</div>
		<div class = "row-right">
			<?php echo $form->labelEx($model,'student_last_name'); ?>
			<?php echo $form->textField($model,'student_last_name',array('size'=>13)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_last_name'); ?>
		</div>
	</div>

	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($model,'student_merit_no'); ?>
			<?php echo $form->textField($model,'student_merit_no',array('size'=>13)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_merit_no'); ?>
		</div>
		<div class = "row-right">
			<?php echo $form->labelEx($model,'student_merit_marks'); ?>
			<?php echo $form->textField($model,'student_merit_marks', array('size'=>13)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_merit_marks'); ?>
		</div>
	</div>

	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($model,'student_category_id'); ?>
			<?php echo $form->dropDownList($model,'student_category_id',CHtml::listData(Category::model()->findAll(),'category_id','category_name'),array('empty'=>'Select Category'),array('size'=>13)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_category_id'); ?>
		</div>
		<div class = "row-right">
			<?php echo $form->labelEx($model,'student_gender'); ?>
			<?php echo $form->dropDownList($model,'student_gender',array('MALE'=>'MALE','FEMALE'=>'FEMALE'),array('empty'=>'Select Gender')); ?> <span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_gender'); ?>
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
				'yearRange'=>'1970:'.(date('Y')-19),

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
		<div class = "row-right">
			<?php echo $form->labelEx($model,'student_email_id'); ?>
			<?php echo $form->textField($model,'student_email_id',array('size'=>13)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_email_id'); ?>
		</div>	
	</div>
	<div class="row">
		<div class = "row-left">
			<?php echo $form->labelEx($model,'student_phoneno'); ?>
			<?php echo $form->textField($model,'student_phoneno',array('size'=>13,'maxlength'=>12)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_phoneno'); ?>
		</div>	
		<div class='row-right'>
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
	<div class='row'>
		<div class='row-left'>
			<?php echo $form->labelEx($model,"student_status"); ?>
			<?php echo $form->dropDownList($model,'student_status',array('1'=>'Regular','2'=>'DTOD'),array('empty'=>'Select Status')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_status'); ?>
		</div>
	</div>
</fieldset>

<fieldset>
	<legend>Address Info</legend>
	
	<div class="form5">
		<?php echo ('<b><u>Current Address :</u></b>'); ?>
	</div>
	<div class="form5">
		<?php echo ('&nbsp;'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_address_c_line1'); ?>
		<?php echo $form->textField($model,'student_address_c_line1',array('size'=>59,'maxlength'=>100)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'student_address_c_line1'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'student_address_c_line2'); ?>
		<?php echo $form->textField($model,'student_address_c_line2',array('size'=>59,'maxlength'=>100)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'student_address_c_line2'); ?>
	</div>
		
	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($model,'student_address_c_taluka'); ?>
			<?php echo $form->textField($model,'student_address_c_taluka',array('size'=>13,'maxlength'=>50)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_address_c_taluka'); ?>
		</div>
		
		<div class="row-right">
			<?php echo $form->labelEx($model,'student_address_c_district'); ?>
			<?php echo $form->textField($model,'student_address_c_district',array('size'=>13,'maxlength'=>50)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_address_c_district'); ?>
		</div>
	</div>

	<div class="row">
		<div class="row-right">
			<?php echo $form->labelEx($model,'student_address_c_country'); ?>
			<?php echo $form->dropDownList($model,'student_address_c_country' ,Country::items(),
					array(
					'prompt' => 'Select Country',
					'ajax' => array(
					'type'=>'POST', 
					'url'=>CController::createUrl('dependent/UpdateStudCStates1'), 
					'update'=>'#StudentRegistrationInfo_student_address_c_state', //selector to update
			
					))); 
			?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_address_c_country'); ?>
		</div>
		<div class="row-left">
			<?php echo $form->labelEx($model,'student_address_c_state'); ?>
			<?php 
				if(!empty($model->student_address_c_country))
				echo $form->dropDownList($model,'student_address_c_state', CHtml::listData(State::model()->findAll(array('condition'=>'country_id='.$model->student_address_c_country)), 'state_id', 'state_name'),
				array(
				'prompt' => 'Select State',
				'ajax' => array(
				'type'=>'POST', 
				'url'=>CController::createUrl('dependent/UpdateStudCCities1'), 
				'update'=>'#StudentRegistrationInfo_student_address_c_city', //selector to update
				)));
				else	
				echo $form->dropDownList($model,'student_address_c_state',array(),
				array(
				'prompt' => 'Select State',
				'ajax' => array(
				'type'=>'POST', 
				'url'=>CController::createUrl('dependent/UpdateStudCCities1'), 
				'update'=>'#StudentRegistrationInfo_student_address_c_city', //selector to update
				)));
				?>
			<?php echo $form->error($model,'student_address_c_state'); ?>
		</div>
	</div>

	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($model,'student_address_c_city'); ?>
			<?php 	
				if(!empty($model->student_address_c_state))
					echo $form->dropDownList($model,'student_address_c_city', CHtml::listData(City::model()->findAll(array('condition'=>'state_id='.$model->student_address_c_state)), 'city_id', 'city_name'),array('prompt'=>'Select State'));
				else
					echo $form->dropDownList($model,'student_address_c_city',array(), array('empty' => 'Select City')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_address_c_city'); ?>
		</div>
		<div class="row-right">
			<?php echo $form->labelEx($model,'student_address_c_pin'); ?>
			<?php echo $form->textField($model,'student_address_c_pin',array('size'=>13,'maxlength'=>6)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_address_c_pin'); ?>
		</div>
	</div>
	
	<div class="row">	
		<?php  echo $form->checkBox($model,'stud_address_chkbox',array('value'=>1, 'uncheckValue'=>0,'id'=>'ckbox')); 
	      echo '&nbsp;&nbsp;Check this box if Current Address and Permanent Address are the same.';?>
	</div>

<div id="p_add">
	<div class="form5">
		<?php echo ('<b><u>Permanent Address :</u></b>'); ?>
	</div>

	<div class="form5">
		<?php echo ('&nbsp;'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'student_address_p_line1'); ?>
		<?php echo $form->textField($model,'student_address_p_line1',array('size'=>59,'maxlength'=>100)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'student_address_p_line1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_address_p_line2'); ?>
		<?php echo $form->textField($model,'student_address_p_line2',array('size'=>59,'maxlength'=>100)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'student_address_p_line2'); ?>
	</div>

	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($model,'student_address_p_taluka'); ?>
			<?php echo $form->textField($model,'student_address_p_taluka',array('size'=>13,'maxlength'=>50)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_address_p_taluka'); ?>
		</div>		
		<div class="row-right">
			<?php echo $form->labelEx($model,'student_address_p_district'); ?>
			<?php echo $form->textField($model,'student_address_p_district',array('size'=>13,'maxlength'=>50)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_address_p_district'); ?>
		</div>
	</div>

	<div class="row">
		<div class="row-right">
			<?php echo $form->labelEx($model,'student_address_p_country'); ?>
			<?php 
				echo $form->dropDownList($model,'student_address_p_country',Country::items(), 				array(
					'prompt' => 'Select Country',
					'ajax' => array(
					'type'=>'POST', 
					'url'=>CController::createUrl('dependent/UpdateStudPStates1'), 
					'update'=>'#StudentRegistrationInfo_student_address_p_state', //selector to update
					))); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_address_p_country'); ?>
		</div>

		<div class="row-left">
			<?php echo $form->labelEx($model,'student_address_p_state'); ?>
			<?php 
				if(!empty($model->student_address_p_state)  && !empty($model->student_address_p_country))
				echo $form->dropDownList($model,'student_address_p_state', CHtml::listData(State::model()->findAll(array('condition'=>'country_id='.$model->student_address_p_country)), 'state_id', 'state_name'),
				array(
				'prompt' => 'Select State',
				'ajax' => array(
				'type'=>'POST', 
				'url'=>CController::createUrl('dependent/UpdateStudPCities1'), 
				'update'=>'#StudentRegistrationInfo_student_address_p_city', //selector to update
			
				)));
			else
			echo $form->dropDownList($model,'student_address_p_state',array(), 		
			array(
			'prompt' => 'Select State',
			'ajax' => array(
			'type'=>'POST', 
			'url'=>CController::createUrl('dependent/UpdateStudPCities1'), 
			'update'=>'#StudentRegistrationInfo_student_address_p_city', //selector to update
			))); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_address_p_state'); ?>
		</div>
	</div>

	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($model,'student_address_p_city'); ?>
			<?php 
				if(!empty($model->student_address_p_city) && !empty($model->student_address_p_state))
				echo $form->dropDownList($model,'student_address_p_city', CHtml::listData(City::model()->findAll(array('condition'=>'state_id='.$model->student_address_p_state)), 'city_id', 'city_name'),array('prompt'=>'Select State'));
				else
				echo $form->dropDownList($model,'student_address_p_city',array(), array('empty' => 'Select City')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_address_p_city'); ?>
		</div>
		<div class="row-right">
			<?php echo $form->labelEx($model,'student_address_p_pin'); ?>
			<?php echo $form->textField($model,'student_address_p_pin',array('size'=>13,'maxlength'=>6)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_address_p_pin'); ?>
		</div>
	</div>
</div> <!-- p_add div finish here -->
</fieldset>


<fieldset>
<legend>Academic Information</legend>

	<table border='1'>
		<tr>
		<th>Examination</th>
		<th>Year of Passing</th>
		<th>Name of Board</th>
		<th>Medium</th>
		<th>Class Obtained</th>
		<th>Marks Obtained</th>
		<th>Marks Out Of</th>
		<th>Percentage</th>
		</tr>

		<?php foreach($acdmInfoModel as $i=>$item): ?>
			<tr>
			<td><?php echo CHtml::activeTextField($item,"[$i]examination",array('size'=>13,'readOnly'=>true)); ?></td>
			<td><?php echo CHtml::activeTextField($item,"[$i]year_of_passing",array('size'=>13)); ?></td>
			<td><?php echo CHtml::activeTextField($item,"[$i]name_of_board",array('size'=>13)); ?></td>
			<td><?php echo CHtml::activeTextField($item,"[$i]medium",array('size'=>13)); ?></td>
			<td><?php echo CHtml::activeTextField($item,"[$i]class_obtained",array('size'=>13)); ?></td>
			<td><?php echo CHtml::activeTextField($item,"[$i]marks_obtained",array('size'=>13)); ?></td>
			<td><?php echo CHtml::activeTextField($item,"[$i]marks_out_of",array('size'=>13)); ?></td>
			<td><?php echo CHtml::activeTextField($item,"[$i]percentage",array('size'=>13)); ?></td>
			</tr>
		<?php endforeach; ?>

	</table>

</fieldset>
<fieldset>
<legend>ACPC Fees Detail</legend>
	<div class="row">
		<div class='row-left'>
			<?php echo $form->labelEx($model,'acpc_fees_receipt_no'); ?>
			<?php echo $form->textField($model,'acpc_fees_receipt_no'); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'acpc_fees_receipt_no'); ?>
		</div>
		<div class='row-right'>
			<?php echo $form->labelEx($model,'acpc_fees_amount'); ?>
			<?php echo $form->textField($model,'acpc_fees_amount'); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'acpc_fees_amount'); ?>
		</div>
	</div>

	<div class="row">
		<div class='row-left'>
			<?php echo $form->labelEx($model,'acpc_fees_bank'); ?>
			<?php echo $form->textField($model,'acpc_fees_bank'); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'acpc_fees_bank'); ?>			
		</div>
		<div class='row-right'>

			<?php echo $form->labelEx($model,'acpc_fees_date'); ?>
			<?php 
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model'=>$model,
			'attribute'=>'acpc_fees_bank',
			'options'=>array(
			'dateFormat'=>'dd-mm-yy',
			'changeYear'=>'true',
			'changeMonth'=>'true',
			'showAnim' =>'slide',
			'yearRange'=>'1970',
			    ),
			'htmlOptions'=>array(
			'style'=>'width:165px;vertical-align:top',
			'id'=>'acpc_fees_bank',
			    ),
			));
			?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'acpc_fees_date'); ?>
		</div>
	</div>
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
<fieldset>
<legend>Select Branches</legend>
<?php
	
	$data=$dt=array();
	$data = CHtml::listData(Branch::model()->findAll(array('condition'=>'branch_organization_id = '.$org_id)),'branch_id','branch_name');		 
	foreach(unserialize($model->student_branch_id) as $a){
		$dt[$a]=Branch::model()->findByPk($a)->branch_name;
	}
	foreach($data as $key=>$val){
		foreach($dt as $k=>$v){
			if($key == $k)
				unset($data[$key]);
		}
	}

	   $this->widget('ext.multiselects.XMultiSelects',array(
	    'leftTitle'=>'<b>List of Branch</b>',
	    'leftName'=>'student_branch',
	    'leftList'=>$data,
	    'rightTitle'=>'<b>Preferred Branch</b>',
	    'rightName'=>'StudentRegistrationInfo[student_branch_id][]',
	    'rightList'=>$dt,
	    'size'=>10,
	    'width'=>'200px',
	));
/*
$this->widget('ext.jmultiselect2side.Jmultiselect2side',array(
                    'name'=>'Model[]',
                    'labelsx'=>'Disponible',
                    'labeldx'=>'Seleccionado',
                    'moveOptions'=>false,
                  'list'=>array('id1'=>'name1','id2'=>'name2') ,
             ));
*/
?>
</fieldset>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
<?php $this->endWidget(); ?>

</div><!-- form -->
