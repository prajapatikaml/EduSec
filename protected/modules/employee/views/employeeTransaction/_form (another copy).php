<script>
$(document).ready(function () {
	$('#form2').hide();
	$('#form3').hide();
	$('#form4').hide();
	$('#form5').hide();
	$('#form6').hide();
	$('#form7').hide();
	$('#form8').hide();
	$('#submitbut1').hide();

	$('select').attr('disabled',true);
	$('input:text').attr('disabled',true);
	$('input:checkbox').attr('disabled',true);
	$('textarea').attr('disabled',true);
	
	$('#ckbox').click(function () {
			
		if ($("#ckbox").is(":checked"))
		{
			$('#p_add').hide();
		}
		else
			$('#p_add').show();
	});

	//for navigate form
	$('#link1').click(function () {
		$('#form1').show();
		$('#form2').hide();
		$('#form3').hide();
		$('#form4').hide();
		$('#form5').hide();
		$('#form6').hide();
		$('#form7').hide();
		$('#form8').hide();
		$('#submitbut1').hide();
		$('#edit1').show();
		$('#form1 select').attr('disabled',true);
		$('#form1 input:text').attr('disabled',true);
		$('#form2 select').attr('disabled',true);
		$('#form2 input:text').attr('disabled',true);
		$('#form3 select').attr('disabled',true);
		$('#form3 input:text').attr('disabled',true);
		$('#form4 select').attr('disabled',true);
		$('#form4 input:text').attr('disabled',true);
	});
	$('#link2').click(function () {
		$('#form2').show();
		$('#form1').hide();
		$('#form3').hide();
		$('#form4').hide();
		$('#form5').hide();
		$('#form6').hide();
		$('#form7').hide();
		$('#form8').hide();
		$('#submitbut2').hide();
		$('#edit2').show();
		$('#form1 select').attr('disabled',true);
		$('#form1 input:text').attr('disabled',true);
		$('#form2 select').attr('disabled',true);
		$('#form2 input:text').attr('disabled',true);
		$('#form3 select').attr('disabled',true);
		$('#form3 input:text').attr('disabled',true);
		$('#form4 select').attr('disabled',true);
		$('#form4 input:text').attr('disabled',true);
	});
	$('#link3').click(function () {
		$('#form3').show();
		$('#form1').hide();
		$('#form2').hide();
		$('#form4').hide();
		$('#form5').hide();
		$('#form6').hide();
		$('#form7').hide();
		$('#form8').hide();
		$('#submitbut3').hide();
		$('#edit3').show();
		$('#form1 select').attr('disabled',true);
		$('#form1 input:text').attr('disabled',true);
		$('#form2 select').attr('disabled',true);
		$('#form2 input:text').attr('disabled',true);
		$('#form3 select').attr('disabled',true);
		$('#form3 input:text').attr('disabled',true);
		$('#form4 select').attr('disabled',true);
		$('#form4 input:text').attr('disabled',true);
	});
	$('#link4').click(function () {
		$('#form4').show();
		$('#form1').hide();
		$('#form2').hide();
		$('#form3').hide();
		$('#form5').hide();
		$('#form6').hide();
		$('#form7').hide();
		$('#form8').hide();
		$('#submitbut4').hide();
		$('#edit4').show();
		$('#form1 select').attr('disabled',true);
		$('#form1 input:text').attr('disabled',true);
		$('#form2 select').attr('disabled',true);
		$('#form2 input:text').attr('disabled',true);
		$('#form3 select').attr('disabled',true);
		$('#form3 input:text').attr('disabled',true);
		$('#form4 select').attr('disabled',true);
		$('#form4 input:text').attr('disabled',true);
	});
	$('#link5').click(function () {
		$('#form5').show();
		$('#form1').hide();
		$('#form2').hide();
		$('#form3').hide();
		$('#form4').hide();
		$('#form6').hide();
		$('#form7').hide();
		$('#form8').hide();
	});
	$('#link6').click(function () {
		$('#form6').show();
		$('#form1').hide();
		$('#form2').hide();
		$('#form3').hide();
		$('#form4').hide();
		$('#form5').hide();
		$('#form7').hide();
		$('#form8').hide();
	});
	$('#link7').click(function () {
		$('#form7').show();
		$('#form1').hide();
		$('#form2').hide();
		$('#form3').hide();
		$('#form4').hide();
		$('#form5').hide();
		$('#form6').hide();
		$('#form8').hide();
	});
	$('#link8').click(function () {
		$('#form7').hide();
		$('#form1').hide();
		$('#form2').hide();
		$('#form3').hide();
		$('#form4').hide();
		$('#form5').hide();
		$('#form6').hide();
		$('#form8').show();
	});

	//for making form enable
	$('#edit1').click(function () {
		$('#submitbut1').show();
		$('#edit1').hide();
		$('#form1 select').attr('disabled',false);
		$('#form1 input:text').attr('disabled',false);
	});
	$('#edit2').click(function () {
		$('#submitbut2').show();
		$('#edit2').hide();
		$('#form2 select').attr('disabled',false);
		$('#form2 input:text').attr('disabled',false);
	});
	$('#edit3').click(function () {
		$('#submitbut3').show();
		$('#edit3').hide();
		$('#form3 select').attr('disabled',false);
		$('#form3 input:text').attr('disabled',false);
		$('#form3 textarea').attr('disabled',false);
	});
	$('#edit4').click(function () {
		$('#submitbut4').show();
		$('#edit4').hide();
		$('#form4 select').attr('disabled',false);
		$('#form4 input:text').attr('disabled',false);
		$('input:checkbox').attr('disabled',false);
	});
});
</script>

<?php
   Yii::app()->clientScript->registerScript(
  'myHideEffect',
  '$(".flash-success").animate({opacity: 1.0}, 2000).fadeOut("slow");',
CClientScript::POS_READY
);

?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employee-transaction-form',
	'enableAjaxValidation'=>true,
	'focus'=>array($info,'employee_no','employee_guardian_name'),
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php // echo $form->errorSummary(array($info,$model,$photo,$address,$lang)); ?>
	<?php if(Yii::app()->user->hasFlash('data-save') && $flag==1) {?>
	<div class="flash-success">
			
			<?php echo Yii::app()->user->getFlash('data-save'); ?>
	</div>
	<?php } ?>
<div id="menulink">
	<div id="studentlogo">
	<?php
		if($model->Rel_Photo->employee_photos_path != null)
			echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/emp_images/'.$photo->employee_photos_path,"",array("width"=>"178px","height"=>"176px")),array('/emp_images/'.$photo->employee_photos_path),array('id'=>'imagelink'))."</br></br>";
	
		if(Yii::app()->user->checkAccess('EmployeeTransaction.UpdateEmployeeData') || Yii::app()->user->checkAccess('EmployeeTransaction.*')) 
		{
		echo CHtml::link('Edit',array('EmployeeTransaction/Updateprofilephoto','id'=>$model->employee_transaction_id),array('id'=>'photoid','title'=>'Update Photo','style'=>'padding-right:50px;'));
		}
		$config = array( 
		    'scrolling' => 'no',
		    'autoDimensions' => false,
		    'width' => '795',
		    'height' => '250', 
		    'titleShow' => false,
		    'overlayColor' => '#000',
		    'padding' => '0',
		    'showCloseButton' => true,
		    'onClose' => function() {
				return window.location.reload();
			    },

		// change this as you need
		);


		$this->widget('application.extensions.fancybox.EFancyBox', array('target'=>'#imagelink', 'config'=>$config));

?>
	
	</div></br>
	<div id="divlink1" class="info-link">
	<a href="#form1"  id="link1">Personal Info</a>
	</div>
	<div id="divlink2" class="info-link">
	<a href="#form2" id="link2">Guardian Info</a>
	</div>
	<div id="divlink3" class="info-link">
	<a href="#form3" id="link3">Other Info</a>
	</div>
	<div id="divlink4" class="info-link">
	<a href="#form4" id="link4">Address Info</a>
	</div>
	<div id="divlink5" class="info-link">
	<a href="#form5" id="link5">Documents</a>
	</div>
	<div id="divlink8" class="info-link">
	<a href="#form8" id="link8">Certificates</a>
	</div>
	<div id="divlink6" class="info-link">
	<a href="#form6" id="link6">Qualifications</a>
	</div>
	<div id="divlink7" class="info-link">
	<a href="#form7" id="link7">Experience</a>
	</div>
	
	<?php 
	$emp_id = $_REQUEST['id'];

	$emp_type = EmployeeInfo::model()->findByAttributes(array('employee_info_transaction_id'=>$emp_id));

	if($emp_type['employee_type'] == 1)	
	{
	?>
	<div id="divlink8" class="info-link">
	<?php
	echo CHtml::link('TimeTable',array('TimeTable/FacultyPersonalTimetable', 'faculty_id'=>$model->employee_transaction_id),array('style'=>'text-decoration:none;color:white;'));
	?>
	</div>
	<?php
	}
	?>
	<div id="divlink8" class="info-link">
	<?php
	echo CHtml::link('Leave Report',array('hrms/employeeLeaveApplication/leavereport', 'id'=>$emp_id),array('style'=>'text-decoration:none;color:white;','target'=>'_blank'));
	?>
	</div>
	<div id="divlink8" class="info-link">
	<?php
	echo CHtml::link('Monthly Attendance',array('employee_attendence/Singlemonthattendence', 'id'=>$emp_id),array('style'=>'text-decoration:none;color:white;','target'=>'_blank'));
	?>
	</div>
	<div id="divlink8" class="info-link">
	<?php
	echo CHtml::link('Salary Structure',array('hrms/employeeSalaryStructure/Employeesalaryhead', 'id'=>$emp_id),array('style'=>'text-decoration:none;color:white;','target'=>'_blank'));
	?>
	</div>
	<div id="divlink8" class="info-link">
	<?php
	echo CHtml::link('Salary Slip',array('hrms/employeeSalaryStructure/Mysalaryslip', 'id'=>$emp_id),array('style'=>'text-decoration:none;color:white;','target'=>'_blank'));
	?>
	</div>
	<div id="divlink8" class="info-link">
	<?php
	echo CHtml::link('Salary Report',array('hrms/employeeSalarySlip/Singleempsalaryreport', 'id'=>$emp_id),array('style'=>'text-decoration:none;color:white;','target'=>'_blank'));
	?>
	</div>
</div>
<?php echo $form->error($info,'employee_attendance_card_id'); ?>
<div id="form1" class="info-form">
	
	<fieldset >
		<legend>Personal Info</legend>
	
	<div class="row">
	
		<div class="row-left">
		      <?php echo $form->labelEx($info,'employee_no'); ?> 
		      <?php echo $form->textField($info,'employee_no',array('size'=>13)); ?><span class="status">&nbsp;</span>
		      <?php echo $form->error($info,'employee_no'); ?> 

		</div>
	

		<div class="row-right">
			<?php echo $form->labelEx($info,'employee_name_alias'); ?>
		      <?php echo $form->textField($info,'employee_name_alias',array('size'=>13)); ?><span class="status">&nbsp;</span>
		      <?php echo $form->error($info,'employee_name_alias'); ?>
		</div>
	</div>
	<div class="row">
	
		<div class="row-left">
		      <?php echo $form->labelEx($info,'employee_aicte_id'); ?> 
		      <?php echo $form->textField($info,'employee_aicte_id',array('size'=>13)); ?><span class="status">&nbsp;</span>
		      <?php echo $form->error($info,'employee_aicte_id'); ?> 

		</div>
	

		<div class="row-right">
			<?php echo $form->labelEx($info,'employee_gtu_id'); ?>
		      <?php echo $form->textField($info,'employee_gtu_id',array('size'=>13)); ?><span class="status">&nbsp;</span>
		      <?php echo $form->error($info,'employee_gtu_id'); ?>
		</div>
	</div>
	<div class="row">
		<div class="row-left">
			<?php $info->employee_joining_date= date('d-m-Y',strtotime($info->employee_joining_date));?>
			<?php  echo $form->labelEx($info,'employee_joining_date'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		    'model'=>$info, 
		    'attribute'=>'employee_joining_date',
		    'options'=>array(
			'dateFormat'=>'dd-mm-yy',
			'changeYear'=>'true',
			'changeMonth'=>'true',
			'maxDate'=>0,
			'showAnim' =>'slide',
			'yearRange'=>'1900:'.(date('Y')+1),
			'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',			
		    ),
			'htmlOptions'=>array(
			'size'=>13,
			'readonly'=>true,
		    ),
			
		));
		?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'employee_joining_date'); ?>
		</div>

		<div class="row-right">
		      <?php echo $form->labelEx($info,'employee_probation_period'); ?>
		       <?php echo $form->textField($info,'employee_probation_period',array('size'=>13)); ?><span class="status">&nbsp;</span>
		       <?php echo $form->error($info,'employee_probation_period'); ?>
		</div>
	</div>
	<div class="row">

		<div class="row-left">
		      <?php echo $form->labelEx($model,'employee_transaction_designation_id'); ?>
		      <?php echo $form->dropDownList($model,'employee_transaction_designation_id',EmployeeDesignation::items(), array('empty' => 'Select Designation')); ?><span class="status">&nbsp;</span>
		      <?php echo $form->error($model,'employee_transaction_designation_id'); ?>
		</div>

		<div class="row-right">
		      <?php echo $form->labelEx($model,'employee_transaction_department_id'); ?>
		      <?php echo $form->dropDownList($model,'employee_transaction_department_id',Department::items(), array('empty' => 'Select Department')); ?><span class="status">&nbsp;</span>
		      <?php echo $form->error($model,'employee_transaction_department_id'); ?>
		</div>
	</div>
	<div class="row">

		<div class="row-left">
		      <?php echo $form->labelEx($model,'employee_transaction_shift_id'); ?>
		      <?php echo $form->dropDownList($model,'employee_transaction_shift_id',Shift::items(), array('empty' => 'Select Shift')); ?><span class="status">&nbsp;</span>
		      <?php echo $form->error($model,'employee_transaction_shift_id'); ?>
		</div>

	<div class="row-right">
			<?php echo $form->labelEx($info,'title'); ?>   
			<?php echo $form->dropdownList($info,'title',$info->getTitleOptions(), array('empty' => 'Select Title')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'title'); ?>
	</div>
	</div>
	<div class="row">

		<div class="row-left">
			<?php echo $form->labelEx($info,'employee_first_name'); ?>
	<?php echo $form->textField($info,'employee_first_name',array('size'=>13)); ?><span class="status">&nbsp;</span>
			 <?php echo $form->error($info,'employee_first_name'); ?>
		</div>

		<div class="row-right">
		      <?php echo $form->labelEx($info,'employee_middle_name'); ?>
		      <?php echo $form->textField($info,'employee_middle_name',array('size'=>13)); ?><span class="status">&nbsp;</span>
		      <?php echo $form->error($info,'employee_middle_name'); ?>
		</div>
	</div>
	<div class="row">

		<div class="row-left">
		     <?php echo $form->labelEx($info,'employee_last_name'); ?>
		       <?php echo $form->textField($info,'employee_last_name',array('size'=>13)); ?><span class="status">&nbsp;</span>
		      <?php echo $form->error($info,'employee_last_name'); ?>
		</div>


		<div class="row-right">
		      <?php echo $form->labelEx($info,'employee_mother_name'); ?>
		      <?php echo $form->textField($info,'employee_mother_name',array('size'=>13)); ?><span class="status">&nbsp;</span>
		      <?php echo $form->error($info,'employee_mother_name'); ?>
		</div>
	</div>
	<div class="row">
		<div class="row-left">
			<?php	if($info->employee_dob)
				$info->employee_dob= date('d-m-Y',strtotime($info->employee_dob));?>
			<?php  echo $form->labelEx($info,'employee_dob'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		    'model'=>$info, 
		    'attribute'=>'employee_dob',
		    'options'=>array(
			'dateFormat'=>'dd-mm-yy',
			'changeYear'=>'true',
			'changeMonth'=>'true',
			'showAnim' =>'slide',
			'maxDate'=>0,
			'yearRange'=>'1900:'.(date('Y')+1),
			'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',			
		    ),
			'htmlOptions'=>array(
			'size'=>13,
			'readonly'=>true,
		    ),
			
		));
			?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'employee_dob'); ?>
		</div>

		<div class="row-right">
			<?php echo $form->labelEx($info,'employee_birthplace'); ?>
		        <?php echo $form->textField($info,'employee_birthplace',array('size'=>13)); ?><span class="status">&nbsp;</span>
		        <?php echo $form->error($info,'employee_birthplace'); ?>
		</div>
	</div>
	<div class="row">
		<div class="row-left">
		      <?php echo $form->labelEx($info,'employee_gender'); ?>
		      <?php echo $form->dropDownList($info,'employee_gender',$info->getGenderOptions(), array('empty' => 'Select Gender')); ?><span class="status">&nbsp;</span>
		      <?php echo $form->error($info,'employee_gender'); ?>
		</div>

		<div class="row-right">
			<?php echo $form->labelEx($info,'employee_bloodgroup'); ?>
		        <?php echo $form->dropDownList($info,'employee_bloodgroup',$info->getBloodGroup(), array('empty' => 'Select Blood Group')); ?><span class="status">&nbsp;</span>
		        <?php echo $form->error($info,'employee_bloodgroup'); ?>
		</div>
	</div>
	<div class="row">

		<div class="row-left">
		      <?php echo $form->labelEx($model,'employee_transaction_nationality_id'); ?>
		      <?php echo $form->dropDownList($model,'employee_transaction_nationality_id',Nationality::items(), array('empty' => 'Select Nationality')); ?><span class="status">&nbsp;</span>
		      <?php echo $form->error($model,'employee_transaction_nationality_id'); ?>
		</div>

		<div class="row-right">
			<?php echo $form->labelEx($info,'employee_marital_status'); ?>
		        <?php echo $form->dropDownList($info,'employee_marital_status',$info->getMaritialStatus(), array('empty' => 'Select Marital Status')); ?><span class="status">&nbsp;</span>
		        <?php echo $form->error($info,'employee_marital_status'); ?>
		</div>
	</div>
	<div class="row">

		<div class="row-left">
		      <?php echo $form->labelEx($model,'employee_transaction_religion_id'); ?>
		      <?php echo $form->dropDownList($model,'employee_transaction_religion_id',Religion::items(), array('empty' => 'Select Religion')); ?><span class="status">&nbsp;</span>
		      <?php echo $form->error($model,'employee_transaction_religion_id'); ?>
		</div>

		<div class="row-right">
		       <?php echo $form->labelEx($info,'employee_pancard_no'); ?>
		       <?php echo $form->textField($info,'employee_pancard_no',array('size'=>13)); ?><span class="status">&nbsp;</span>
		       <?php echo $form->error($info,'employee_pancard_no'); ?>
		</div>
	</div>
	<div class="row">

		<div class="row-left">
		       <?php echo $form->labelEx($info,'employee_account_no'); ?>
		       <?php echo $form->textField($info,'employee_account_no',array('size'=>13)); ?><span class="status">&nbsp;</span>
		       <?php echo $form->error($info,'employee_account_no'); ?>
		</div>

		<div class="row-right">
		      <?php echo $form->labelEx($model,'employee_transaction_category_id'); ?>
		      <?php echo $form->dropDownList($model,'employee_transaction_category_id',Category::items(), array('empty' => 'Select Category')); ?><span class="status">&nbsp;</span>
		      <?php echo $form->error($model,'employee_transaction_category_id'); ?>
		</div>
	</div>
	<div class="row">

		<div class="row-left">
		       	 <?php echo $form->labelEx($info,'employee_type'); ?>
		         <?php echo $form->dropDownList($info,'employee_type',array(""=>"Select Type","1"=>"Teaching","0"=>"Non Teaching")); ?><span class="status">&nbsp;</span>
		         <?php echo $form->error($info,'employee_type'); ?>
		</div>

		<div class="row-right">
		       <?php echo $form->labelEx($info,'employee_organization_mobile'); ?>
		       <?php echo $form->textField($info,'employee_organization_mobile',array('size'=>13)); ?><span class="status">&nbsp;</span>
		       <?php echo $form->error($info,'employee_organization_mobile'); ?>

		</div>

	</div>
	<div class="row">

		<div class="row-left">
		       <?php echo $form->labelEx($info,'employee_private_mobile'); ?>
		       <?php echo $form->textField($info,'employee_private_mobile',array('size'=>13)); ?><span class="status">&nbsp;</span>
		       <?php echo $form->error($info,'employee_private_mobile'); ?>
		</div>

		<div class="row-right">
		      <?php echo $form->labelEx($info,'employee_private_email'); ?>
		      <?php echo $form->textField($info,'employee_private_email',array('size'=>13)); ?><span class="status">&nbsp;</span>
		      <?php echo $form->error($info,'employee_private_email'); ?>
		</div>
	</div>
<?php if(Yii::app()->user->checkAccess('EmployeeTransaction.UpdateEmployeeData') || Yii::app()->user->checkAccess('EmployeeTransaction.*')) {?>	
	<div class="row buttons">
		<?php echo CHtml::button('Save',array('id'=>'submitbut1','class'=>'submit','submit'=>array('Updateprofiletab1','id'=>$_REQUEST['id']))); 
		      echo CHtml::button('Edit',array('class'=>'submit', 'id'=>'edit1')); 
		?>
        </div>
<?php } ?>
	</fieldset>
</div>
<div id="form2" class="info-form">
	<fieldset>
		<legend>Guardian Info</legend>
	 <div class="row">
	     <div class="row-left">
	      <?php echo $form->labelEx($info,'employee_guardian_name'); ?>
              <?php echo $form->textField($info,'employee_guardian_name',array('size'=>13)); ?><span class="status">&nbsp;</span>
              <?php echo $form->error($info,'employee_guardian_name'); ?>
	     </div>

             <div class="row-right">
	      <?php echo $form->labelEx($info,'employee_guardian_relation'); ?>
              <?php echo $form->textField($info,'employee_guardian_relation',array('size'=>13)); ?><span class="status">&nbsp;</span>
              <?php echo $form->error($info,'employee_guardian_relation'); ?>
	     </div>
	</div>
	<div class="row">
		       <div class="row-left">
		      <?php echo $form->labelEx($info,'employee_guardian_qualification'); ?>
		      <?php echo $form->textField($info,'employee_guardian_qualification',array('size'=>13)); ?><span class="status">&nbsp;</span>
		      <?php echo $form->error($info,'employee_guardian_qualification'); ?>
		      </div>
		      <div class="row-right">
		      <?php echo $form->labelEx($info,'employee_guardian_occupation'); ?>
		      <?php echo $form->textField($info,'employee_guardian_occupation',array('size'=>13)); ?><span class="status">&nbsp;</span>
		      <?php echo $form->error($info,'employee_guardian_occupation'); ?>
		      </div>
	</div>



	<div class="row">

		       <div class="row-left">
		      <?php echo $form->labelEx($info,'employee_guardian_phone_no'); ?>
		      <?php echo $form->textField($info,'employee_guardian_phone_no',array('size'=>13)); ?><span class="status">&nbsp;</span>
		      <?php echo $form->error($info,'employee_guardian_phone_no'); ?>
		     </div>

		       <div class="row-right">
		      <?php echo $form->labelEx($info,'employee_guardian_income'); ?>
		      <?php echo $form->textField($info,'employee_guardian_income',array('size'=>13)); ?><span class="status">&nbsp;</span>
		      <?php echo $form->error($info,'employee_guardian_income'); ?>
		      </div>
	</div>

	
	<div class="row">
		     <div class="row-left">           
		      <?php echo $form->labelEx($info,'employee_guardian_mobile1'); ?>
		      <?php echo $form->textField($info,'employee_guardian_mobile1',array('size'=>13)); ?><span class="status">&nbsp;</span>
		      <?php echo $form->error($info,'employee_guardian_mobile1'); ?>
		     </div>


		     <div class="row-right">
		      <?php echo $form->labelEx($info,'employee_guardian_mobile2'); ?>
		      <?php echo $form->textField($info,'employee_guardian_mobile2',array('size'=>13)); ?><span class="status">&nbsp;</span>
		      <?php echo $form->error($info,'employee_guardian_mobile2'); ?>
		     </div>
	</div>

	<div class="row">
		      <?php echo $form->labelEx($info,'employee_guardian_home_address'); ?>
		      <?php echo $form->textField($info,'employee_guardian_home_address',array('size'=>59)); ?><span class="status">&nbsp;</span>
		      <?php echo $form->error($info,'employee_guardian_home_address'); ?>
	</div>

	<div class="row">
		      <?php echo $form->labelEx($info,'employee_guardian_occupation_address'); ?>
		      <?php echo $form->textField($info,'employee_guardian_occupation_address',array('size'=>59)); ?><span class="status">&nbsp;</span>
		      <?php echo $form->error($info,'employee_guardian_occupation_address'); ?>
	</div>
	
	<div class="row">

		     <div class="row-left">
		      <?php echo $form->labelEx($info,'employee_guardian_occupation_city'); ?>
		      <?php echo $form->dropDownList($info,'employee_guardian_occupation_city', City::items(), array('empty' => 'Select City')); ?><span class="status">&nbsp;</span>
		      <?php echo $form->error($info,'employee_guardian_occupation_city'); ?>
		     </div>


		     <div class="row-right">
		      <?php echo $form->labelEx($info,'employee_guardian_city_pin'); ?>
		      <?php echo $form->textField($info,'employee_guardian_city_pin',array('size'=>13)); ?><span class="status">&nbsp;</span>
		      <?php echo $form->error($info,'employee_guardian_city_pin'); ?>
		     </div>

	</div>
	 
<?php if(Yii::app()->user->checkAccess('EmployeeTransaction.UpdateEmployeeData') || Yii::app()->user->checkAccess('EmployeeTransaction.*')) {
?>       
	<div class="row buttons">
		<?php echo CHtml::button('Save',array('id'=>'submitbut2','class'=>'submit','submit'=>array('Updateprofiletab2','id'=>$_REQUEST['id']))); 
		      echo CHtml::button('Edit',array('class'=>'submit', 'id'=>'edit2')); 
		?>
	</div>
<?php } ?>
	</fieldset>
</div>
<div id="form3" class="info-form">
	<fieldset>
		<legend>Other Info</legend>
	<div class="row">
	      <div class="row-left">
	       <?php echo $form->labelEx($info,'employee_attendance_card_id'); ?>
               <?php echo $form->textField($info,'employee_attendance_card_id',array('size'=>13)); ?><span class="status">&nbsp;</span>
               <?php //echo $form->error($info,'employee_attendance_card_id'); ?>
	      </div>

	      <div class="row-right">
	       <?php echo $form->labelEx($info,'employee_faculty_of'); ?>
               <?php echo $form->textField($info,'employee_faculty_of',array('size'=>13)); ?><span class="status">&nbsp;</span>
               <?php echo $form->error($info,'employee_faculty_of'); ?>
	      </div>
	</div>
		       
	<div class="row-textarea">
		      <div class="row-left">
		       <?php echo $form->labelEx($info,'employee_curricular'); ?>
		       <?php echo $form->textArea($info,'employee_curricular',array('rows'=>2, 'cols'=>19)); ?><span class="status">&nbsp;</span>
		       <?php echo $form->error($info,'employee_curricular'); ?>
		      </div>


		      <div class="row-right">
		       <?php echo $form->labelEx($info,'employee_project_details'); ?>
		       <?php echo $form->textArea($info,'employee_project_details',array('rows'=>2, 'cols'=>19));?><span class="status">&nbsp;</span>
		       <?php echo $form->error($info,'employee_project_details'); ?>
		      </div>

	</div>
	<div class="row-textarea">
		      <div class="row-left">
		       <?php echo $form->labelEx($info,'employee_technical_skills'); ?>
		       <?php echo $form->textArea($info,'employee_technical_skills',array('rows'=>2, 'cols'=>19)); ?><span class="status">&nbsp;</span>
		       <?php echo $form->error($info,'employee_technical_skills'); ?>
		      </div>


		      <div class="row-right">
		       <?php echo $form->labelEx($info,'employee_hobbies'); ?>
		       <?php echo $form->textArea($info,'employee_hobbies',array('rows'=>2, 'cols'=>19)); ?><span class="status">&nbsp;</span>
		       <?php echo $form->error($info,'employee_hobbies'); ?>
		      </div>
	</div>
	<div class="row">
		      <div class="row-left">
			<?php echo $form->labelEx($lang,'languages_known1'); ?>
			<?php echo $form->dropDownList($lang,'languages_known1',Languages::items(),array('empty'=>'Select Language')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($lang,'languages_known1'); ?>
		      </div>


		      <div class="row-right">
			<?php echo $form->labelEx($lang,'languages_known2');?>
			<?php echo $form->dropDownList($lang,'languages_known2',Languages::items(),array('empty'=>'Select Language')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($lang,'languages_known2'); ?>
		      </div>
	</div>
	<div class="row">
		      <div class="row-left">
			<?php echo $form->labelEx($lang,'languages_known3');?>
			<?php echo $form->dropDownList($lang,'languages_known3',Languages::items(),array('empty'=>'Select Language')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($lang,'languages_known3'); ?>
		      </div>


		      <div class="row-right">
			<?php echo $form->labelEx($lang,'languages_known4');?>
			<?php echo $form->dropDownList($lang,'languages_known4',Languages::items(),array('empty'=>'Select Language')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($lang,'languages_known4');?>
		      </div>


	</div>	
	<div class="row">
		      <div class="row-left">
		       <?php echo $form->labelEx($info,'employee_reference'); ?>
		       <?php echo $form->textField($info,'employee_reference',array('size'=>13)); ?><span class="status">&nbsp;</span>
		       <?php echo $form->error($info,'employee_reference'); ?>
		      </div>

		      <div class="row-right">
		       <?php echo $form->labelEx($info,'employee_refer_designation'); ?>
		       <?php echo $form->textField($info,'employee_refer_designation',array('size'=>13)); ?><span class="status">&nbsp;</span>
		       <?php echo $form->error($info,'employee_refer_designation'); ?>
		      </div>
		      <div class="row">
		       <?php echo $form->labelEx($model,'employee_transaction_organization_id'); ?>
		       <?php $org=Organization::model()->findByPk($model->employee_transaction_organization_id)->organization_name;?>
		       <?php echo $form->textField($model,'organization_id',array('value'=>$org,'ReadOnly'=>true,'size'=>13)); ?><span class="status">&nbsp;</span>
		       <?php echo $form->error($model,'employee_transaction_organization_id'); ?>
		     
		      </div>
	
	</div> 
<?php if(Yii::app()->user->checkAccess('EmployeeTransaction.UpdateEmployeeData') || Yii::app()->user->checkAccess('EmployeeTransaction.*')) {
?>  
	<div class="row buttons">
		<?php echo CHtml::button('Save',array('id'=>'submitbut3','class'=>'submit','submit'=>array('Updateprofiletab3','id'=>$_REQUEST['id']))); 
			echo CHtml::button('Edit',array('class'=>'submit', 'id'=>'edit3'));  
		?>
    	</div>
<?php } ?>
	</fieldset>
</div>
<div id="form4" class="info-form">
	<fieldset>
		<legend>Address Info</legend>
	<div class="form5">
		<?php echo ('<b><u>Current Address :</u></b>'); ?>
   	</div>

        <div class="form5">
	<?php echo ('&nbsp;'); ?>
        </div>


	<div class="row">
		 <?php echo $form->labelEx($address,'employee_address_c_line1'); ?>
		 <?php echo $form->textField($address,'employee_address_c_line1',array('size'=>59)); ?><span class="status">&nbsp;</span>
		 <?php echo $form->error($address,'employee_address_c_line1'); ?>
	</div>

	   
	<div class="row">
		 <?php echo $form->labelEx($address,'employee_address_c_line2'); ?>
		 <?php echo $form->textField($address,'employee_address_c_line2',array('size'=>59)); ?><span class="status">&nbsp;</span>
		 <?php echo $form->error($address,'employee_address_c_line2'); ?>
	</div>
	<div class="row">

		<div class="row-left">
		 <?php echo $form->labelEx($address,'employee_address_c_taluka'); ?>
		 <?php echo $form->textField($address,'employee_address_c_taluka',array('size'=>13)); ?><span class="status">&nbsp;</span>
		 <?php echo $form->error($address,'employee_address_c_taluka'); ?>
	   	</div>

		<div class="row-right">
		 <?php echo $form->labelEx($address,'employee_address_c_district'); ?>
		 <?php echo $form->textField($address,'employee_address_c_district',array('size'=>13)); ?><span class="status">&nbsp;</span>
		 <?php echo $form->error($address,'employee_address_c_district'); ?>
	   	</div>

	</div>
	<div class="row">

		<div class="row-right">
		 <?php echo $form->labelEx($address,'employee_address_c_country'); ?>
		 <?php
			echo $form->dropDownList($address,'employee_address_c_country' ,Country::items(),
				array(
				'prompt' => 'Select Country',
				'ajax' => array(
				'type'=>'POST', 
				'url'=>CController::createUrl('dependent/UpdateEmpCStates'), 
				'update'=>'#EmployeeAddress_employee_address_c_state', //selector to update
			
				))); 
		 ?><span class="status">&nbsp;</span>
		 <?php echo $form->error($address,'employee_address_c_country'); ?>
	   	</div>

		<div class="row-left">
		 <?php echo $form->labelEx($address,'employee_address_c_state'); ?>
		 <?php 
				if(!empty($address->employee_address_c_state))
				echo $form->dropDownList($address,'employee_address_c_state', CHtml::listData(State::model()->findAll(array('condition'=>'country_id='.$address->employee_address_c_country)), 'state_id', 'state_name'),
				array(
				'prompt' => 'Select State',
				'ajax' => array(
				'type'=>'POST', 
				'url'=>CController::createUrl('dependent/UpdateEmpCCities'), 
				'update'=>'#EmployeeAddress_employee_address_c_city', //selector to update
			
				)));
				else	
				echo $form->dropDownList($address,'employee_address_c_state',array(),
				array(
				'prompt' => 'Select State',
				'ajax' => array(
				'type'=>'POST', 
				'url'=>CController::createUrl('dependent/UpdateEmpCCities'), 
				'update'=>'#EmployeeAddress_employee_address_c_city', //selector to update
			
				)));?><span class="status">&nbsp;</span>
		 <?php echo $form->error($address,'employee_address_c_state'); ?>
	   	</div>


	</div>

	<div class="row">

		<div class="row-left">
		<?php echo $form->labelEx($address,'employee_address_c_city'); ?>
		<?php 
		
			if($address->employee_address_c_city!=null)
			echo $form->dropDownList($address,'employee_address_c_city', CHtml::listData(City::model()->findAll(array('condition'=>'state_id='.$address->employee_address_c_state)), 'city_id', 'city_name'));
			else

			echo $form->dropDownList($address,'employee_address_c_city',array(),array('empty' => 'Select City')); ?><span class="status">&nbsp;</span>


		 <?php echo $form->error($address,'employee_address_c_city'); ?>
	   	</div>

		<div class="row-right">
		 <?php echo $form->labelEx($address,'employee_address_c_pincode'); ?>
		 <?php echo $form->textField($address,'employee_address_c_pincode',array('size'=>13)); ?><span class="status">&nbsp;</span>
		 <?php echo $form->error($address,'employee_address_c_pincode'); ?>
	   	</div>

	</div>
<div class="row">	

	   		<!--<input type="checkbox" name="address" id="ckbox">
			<em>Check this box if Current Address and Permanent Address are the same.</em>
	<br />
	<br />-->
	<?php  echo $form->checkBox($address,'address_chkbox',array('value'=>1, 'uncheckValue'=>0,'id'=>'ckbox')); 
	      echo '&nbsp;&nbsp;Check this box if Current Address and Permanent Address are the same.';
	?>
</div>
<div id="p_add">
	    <div class="form5">
		<?php echo ('<b><u>Permanent Address :</u></b>'); ?>
	    </div>

	    <div class="form5">
		<?php echo ('&nbsp;'); ?>
	    </div>

	   
	<div class="row">
		 <?php echo $form->labelEx($address,'employee_address_p_line1'); ?>
		 <?php echo $form->textField($address,'employee_address_p_line1',array('size'=>59)); ?><span class="status">&nbsp;</span>
		 <?php echo $form->error($address,'employee_address_p_line1'); ?>
	</div>

	   
	<div class="row">
		 <?php echo $form->labelEx($address,'employee_address_p_line2'); ?>
		 <?php echo $form->textField($address,'employee_address_p_line2',array('size'=>59)); ?><span class="status">&nbsp;</span>
		 <?php echo $form->error($address,'employee_address_p_line2'); ?>
	</div>

	<div class="row">

		<div class="row-left">
		 <?php echo $form->labelEx($address,'employee_address_p_taluka'); ?>
		 <?php echo $form->textField($address,'employee_address_p_taluka',array('size'=>13)); ?><span class="status">&nbsp;</span>
		 <?php echo $form->error($address,'employee_address_p_taluka'); ?>
	   	</div>

		<div class="row-right">
		 <?php echo $form->labelEx($address,'employee_address_p_district'); ?>
		 <?php echo $form->textField($address,'employee_address_p_district',array('size'=>13)); ?><span class="status">&nbsp;</span>
		 <?php echo $form->error($address,'employee_address_p_district'); ?>
	   	</div>

	</div>
  
	<div class="row">

		 <div class="row-right">
		 <?php echo $form->labelEx($address,'employee_address_p_country'); ?>
		 <?php //echo $form->dropDownList($address,'employee_address_p_country',Country::items(), array('empty' => '-----------Select---------','tabindex'=>12)); 
			echo $form->dropDownList($address,'employee_address_p_country' ,Country::items(),
				array(
				'prompt' => 'Select Country',
				'ajax' => array(
				'type'=>'POST', 
				'url'=>CController::createUrl('dependent/UpdateEmpPStates'), 
				'update'=>'#EmployeeAddress_employee_address_p_state', //selector to update
			
				))); 
		 ?><span class="status">&nbsp;</span>
		 <?php echo $form->error($address,'employee_address_p_country'); ?>
	   	 </div>
		 
		 <div class="row-left">
		 <?php echo $form->labelEx($address,'employee_address_p_state'); ?>
		 <?php 
				if(!empty($address->employee_address_p_state))
				echo $form->dropDownList($address,'employee_address_p_state', CHtml::listData(State::model()->findAll(array('condition'=>'country_id='.$address->employee_address_p_country)), 'state_id', 'state_name'),
				array(
				'prompt' => 'Select State',
				'ajax' => array(
				'type'=>'POST', 
				'url'=>CController::createUrl('dependent/UpdateEmpPCities'), 
				'update'=>'#EmployeeAddress_employee_address_p_city', //selector to update
			
				)));
				else			
				echo $form->dropDownList($address,'employee_address_p_state',array(),
				array(
				'prompt' => 'Select State',
				'ajax' => array(
				'type'=>'POST', 
				'url'=>CController::createUrl('dependent/UpdateEmpPCities'), 
				'update'=>'#EmployeeAddress_employee_address_p_city', //selector to update
			
				)));?><span class="status">&nbsp;</span>
		 <?php echo $form->error($address,'employee_address_p_state'); ?>
	   	 </div>

	   
	</div>
	 
	<div class="row">
		<div class="row-left">
		<?php echo $form->labelEx($address,'employee_address_p_city'); ?>
		<?php 
		
			if($address->employee_address_p_city!=null)
			echo $form->dropDownList($address,'employee_address_p_city', CHtml::listData(City::model()->findAll(array('condition'=>'state_id='.$address->employee_address_p_state)), 'city_id', 'city_name'));
			else

			echo $form->dropDownList($address,'employee_address_p_city', array(), array('empty' => 'Select City')); ?><span class="status">&nbsp;</span>
		 <?php echo $form->error($address,'employee_address_p_city'); ?>
	   	</div>



		<div class="row-right">
		 <?php echo $form->labelEx($address,'employee_address_p_pincode'); ?>
		 <?php echo $form->textField($address,'employee_address_p_pincode',array('size'=>13)); ?><span class="status">&nbsp;</span>
		 <?php echo $form->error($address,'employee_address_p_pincode'); ?>
		</div>

	</div>
</div> <!-- p_add is finish here-->	
	
<?php if(Yii::app()->user->checkAccess('EmployeeTransaction.UpdateEmployeeData') || Yii::app()->user->checkAccess('EmployeeTransaction.*')) {
?>  	
	<div class="row buttons">
		<?php echo CHtml::button('Save',array('id'=>'submitbut4','class'=>'submit','submit'=>array('Updateprofiletab4','id'=>$_REQUEST['id'])));  
			 echo CHtml::button('Edit',array('class'=>'submit', 'id'=>'edit4')); 
		?>
        </div>
<?php } ?>
	</fieldset>

</div>
<div id="form5" class="info-form">
<fieldset>
	<legend>Documents</legend>

<?php
 
?>

<?php /*
$config = array( 
		    'scrolling' => 'no',
		    'autoDimensions' => false,
		    'width' => '755',
		    'height' => '325', 
		    'titleShow' => false,
		    'overlayColor' => '#000',
		    'padding' => '0',
		    'showCloseButton' => true,
		    'onClose' => function() {
				return window.location.reload();
			    },

		// change this as you need
		);


		$this->widget('application.extensions.fancybox.EFancyBox', array('target'=>'#docid', 'config'=>$config));*/

?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'employee-docs-final_view',
	'dataProvider'=>$emp_doc->mysearch(),
//	'filter'=>$model,
	'enableSorting'=>false,
	'columns'=>array(
		//'employee_docs_trans_id',
		//'employee_docs_trans_user_id',
		//'employee_docs_trans_emp_docs_id',
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		array(
                'name'=>'Title',
                'type'=>'raw',
                'value'=>'CHtml::link(CHtml::encode($data->Rel_Emp_doc->title),Yii::app()->baseUrl."/emp_docs/".$data->Rel_Emp_doc->employee_docs_path, $htmlOptions=array("target"=>"_blank"))',

          	),
		array('name' => 'Document Category',
	              'value' => 'DocumentCategoryMaster::model()->findByPk($data->Rel_Emp_doc->doc_category_id)->doc_category_name',
                ),

		array(
                'name'=>'Description',
                //'type'=>'raw',
                'value'=>'$data->Rel_Emp_doc->employee_docs_desc',

          	),
		array(
                'name'=>'Submit Date',
               // 'type'=>'raw',
                //'value'=>'$data->Rel_Stud_doc->student_docs_submit_date',
	        'value'=>'date_format(new DateTime($data->Rel_Emp_doc->employee_docs_submit_date), "d-m-Y")',
          	),

		array(
			'class'=>'CButtonColumn',
			'template' => '{delete}',
			'buttons'=>array(
                        
                        'delete' => array(
				
				'url'=>'Yii::app()->createUrl("employeeDocsTrans/delete", array("id"=>$data->employee_docs_trans_id))',

                        ),
		   ),
		),
	),
	'pager'=>array(
		'class'=>'AjaxList',
	//	'maxButtonCount'=>25,
		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),
)); ?>

</fieldset>
</div>
<div id="form8" class="info-form">
<fieldset>
	<legend>Certificates</legend>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'employee-certificate-details-table-grid',
	'dataProvider'=> $emp_certificate->EmployeeSearch(),
	//'filter'=>$model,
	'columns'=>array(
	array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		array(
			'header'=>'First Name',
			'name'=>'employee_first_name',
			'value'=>'$data->cer_employee_id->employee_first_name',
			//'value'=>'$data->a.\' \'.$data->b.\' \'.$data->c',
		),		

		array('name'=>'employee_certificate_type_id',
			'value'=>'Certificate::model()->findByPk($data->employee_certificate_type_id)->certificate_title',
			'filter' =>CHtml::listData(Certificate::model()->findAll(array('condition'=>'certificate_organization_id='.Yii::app()->user->getState('org_id'))),'certificate_id','certificate_title'),

		),
		array('name'=>'Organization',
			'value'=>'Organization::model()->findByPk($data->employee_certificate_org_id)->organization_name',
			'filter' => false,
		),
		array(
			'class'=>'CButtonColumn',
			'template' => '{view}',
			 'buttons'=>array(
			'view' => array(
				'url'=>'Yii::app()->createUrl("certificate/EmployeeCertificategeneration", array("id"=>$data->employee_certificate_type_id,"eno"=>EmployeeInfo::model()->findByAttributes(array("employee_info_transaction_id"=>$data->employee_certificate_details_table_emp_id))->employee_attendance_card_id))',
			 'options' => array('target'=>'_blank'),
                        ),
		),
	),),
	'pager'=>array(
		'class'=>'AjaxList',
		'maxButtonCount'=>$model->count(),
//		'maxButtonCount'=>25,
		'header'=>''
	    ),
)); ?>
</fieldset>
</div>
<div id="form6" class="info-form">
<fieldset>
	<legend>Qualifications</legend>
<?php


 if(Yii::app()->user->checkAccess('EmployeeTransaction.UpdateEmployeeData') || Yii::app()->user->checkAccess('EmployeeTransaction.*')) {
 
echo CHtml::link('Add',array('EmployeeAcademicRecordTrans/create', 'id'=>$model->employee_transaction_id),array('id'=>'quaid','class'=>'submit','style'=>'text-decoration:none;'));
}
$config = array( 
		    'scrolling' => 'no',
		    'autoDimensions' => false,
		    'width' => '755',
		    'height' => '430', 
		    'titleShow' => false,
		    'overlayColor' => '#000',
		    'padding' => '0',
		    'showCloseButton' => true,
		    'onClose' => function() {
				return window.location.reload();
			    },

		// change this as you need
		);


		$this->widget('application.extensions.fancybox.EFancyBox', array('target'=>'#quaid', 'config'=>$config));
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'employee-academic-record-trans-grid',
	'dataProvider'=>$emp_record->mysearch(),
	//'filter'=>$model,
	'enableSorting'=>false,
	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		
		array('name' => 'employee_academic_record_trans_qualification_id',
	              'value' => '$data->Rel_employee_qualification->qualification_name',
                     ),
		array('name' => 'employee_academic_record_trans_eduboard_id',
			'value' => '$data->Rel_employee_eduboard->eduboard_name',
                     ),
		array('name' => 'employee_academic_record_trans_year_id',
			'value' => '$data->Rel_employee_year->year',
                     ),
		array('name' => 'theory_mark_obtained',
			'value' => '$data->theory_mark_obtained',
                     ),
		array('name' => 'theory_mark_max',
			'value' => '$data->theory_mark_max',
                     ),
		array('name' => 'theory_percentage',
			'value' => '$data->theory_percentage',
                     ),
		array('name' => 'practical_mark_obtained',
			'value' => '$data->practical_mark_obtained',
                     ),
		array('name' => 'practical_mark_max',
			'value' => '$data->practical_mark_max',
                     ),
		array('name' => 'practical_percentage',
			'value' => '$data->practical_percentage',
                     ),
		
		array(
			'class'=>'CButtonColumn',
			'template' => '{update}{delete}',
	                'buttons'=>array(
/*			'view' => array(
				'url'=>'Yii::app()->createUrl("employeeAcademicRecordTrans/view", array("id"=>$data->employee_academic_record_trans_id))',
                        ),*/
			'update' => array(
				'url'=>'Yii::app()->createUrl("employeeAcademicRecordTrans/update", array("id"=>$data->employee_academic_record_trans_id))',
				'options'=>array('id'=>'update-qualification'),
                        ),
			'delete' => array(
				'url'=>'Yii::app()->createUrl("employeeAcademicRecordTrans/delete", array("id"=>$data->employee_academic_record_trans_id))',
                        ),
			),
		),
	),
	'pager'=>array(
		'class'=>'AjaxList',
	//	'maxButtonCount'=>25,
		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),
));
$config = array( 
		    'scrolling' => 'no',
		    'autoDimensions' => false,
		    'width' => '755',
		    'height' => '430', 
		    'titleShow' => false,
		    'overlayColor' => '#000',
		    'padding' => '0',
		    'showCloseButton' => true,
		    'onClose' => function() {
				return window.location.reload();
			    },

		// change this as you need
		);


		$this->widget('application.extensions.fancybox.EFancyBox', array('target'=>'a#update-qualification', 'config'=>$config));

?>
</fieldset>
</div>

<div id="form7" class="info-form">
<fieldset>
	<legend>Experience</legend>
	
<?php

if(Yii::app()->user->checkAccess('EmployeeTransaction.UpdateEmployeeData') || Yii::app()->user->checkAccess('EmployeeTransaction.*')) {
 
echo CHtml::link('Add',array('EmployeeExperienceTrans/create', 'id'=>$model->employee_transaction_id),array('id'=>'expid','class'=>'submit','style'=>'text-decoration:none;'));
	}
$config = array( 
		    'scrolling' => 'no',
		    'autoDimensions' => false,
		    'width' => '790',
		    'height' => '330', 
		    'titleShow' => false,
		    'overlayColor' => '#000',
		    'padding' => '0',
		    'showCloseButton' => true,
		    'onClose' => function() {
				return window.location.reload();
			    },

		// change this as you need
		);


		$this->widget('application.extensions.fancybox.EFancyBox', array('target'=>'#expid', 'config'=>$config));
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'employee-experience-trans-grid',
	'dataProvider'=>$emp_exp->mysearch(),
	//'filter'=>$model,
	'columns'=>array(
		//'employee_experience_trans_id',
		//'employee_experience_trans_user_id',
		//'employee_experience_trans_emp_experience_id',
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		array('name' => 'employee_experience_organization_name',
		      'header'=>'Organization',
	              'value' => '$data->Rel_Emp_exp->employee_experience_organization_name',
                     ),
		array('name' => 'employee_experience_designation',
			 'header'=>'Designation',
			'value' => '$data->Rel_Emp_exp->employee_experience_designation',
                     ),
		array('name' => 'employee_experience_from',
			 'header'=>'From Date',
			'value' => 'date_format(date_create($data->Rel_Emp_exp->employee_experience_from), "d-m-Y")',
                    ),
		array('name' => 'employee_experience_to',
			 'header'=>'To Date',
			'value' => 'date_format(date_create($data->Rel_Emp_exp->employee_experience_to), "d-m-Y")',
                     ),
		
		
		array('name' => 'employee_experience',
			 'header'=>'Total Experience',
			'value' => '$data->Rel_Emp_exp->employee_experience',
                     ),
		array(
			'class'=>'CButtonColumn',
			'template' => '{update}{delete}',
			'buttons'=>array(
			'view' => array(
				'url'=>'Yii::app()->createUrl("employeeAcademicRecordTrans/view", array("id"=>$data->employee_academic_record_trans_id))',
                        ),
			'update' => array(
				'url'=>'Yii::app()->createUrl("employeeExperienceTrans/update", array("id"=>$data->employee_experience_trans_id))',
				'options'=>array('id'=>'update_exp'),
				
                        ),
			                        
                        'delete' => array(
				'url'=>'Yii::app()->createUrl("employeeExperienceTrans/delete", array("id"=>$data->employee_experience_trans_id))',
                        ),
		   ),
		),

	),
	'pager'=>array(
		'class'=>'AjaxList',
	//	'maxButtonCount'=>25,
		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),
)); 

$config = array( 
		    'scrolling' => 'no',
		    'autoDimensions' => false,
		    'width' => '795',
		    'height' => '250', 
		    'titleShow' => false,
		    'overlayColor' => '#000',
		    'padding' => '0',
		    'showCloseButton' => true,
		    'onClose' => function() {
				return window.location.reload();
			    },

		// change this as you need
		);


		$this->widget('application.extensions.fancybox.EFancyBox', array('target'=>'a#update_exp', 'config'=>$config));
?>
</fieldset>
</div>
<?php $this->endWidget(); ?>

</div><!-- form -->
