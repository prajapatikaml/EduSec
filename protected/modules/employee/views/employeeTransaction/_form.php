<?php
$this->layout='//layouts/personal-profile';
?>

<div id="menulink">
	<div id="studentlogo">
	<?php
		if($model->Rel_Photo->employee_photos_path != null)
			echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/college_data//emp_images/'.$photo->employee_photos_path,"",array("width"=>"178px","height"=>"176px")),array('/college_data/emp_images/'.$photo->employee_photos_path),array('id'=>'imagelink'))."</br></br>";
	
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
			    },);
		$this->widget('application.extensions.fancybox.EFancyBox', array('target'=>'#imagelink', 'config'=>$config));?>
	
	</div></br>
	
	<div id="divlink1" class="info-link">
	<?php echo CHtml::link('Personal Info',array('employeeTransaction/updateprofiletab1', 'id'=>$model->employee_transaction_id),array('title'=>'Personal Info','style'=>'text-decoration:none;color:white;'));?>
	</div>
	<div id="divlink2" class="info-link">
	<?php echo CHtml::link('Guardian Info',array('employeeTransaction/updateprofiletab2', 'id'=>$model->employee_transaction_id),array('title'=>'Guardian Info','style'=>'text-decoration:none;color:white;'));?>
	</div>
	<div id="divlink3" class="info-link">
	<?php echo CHtml::link('Other Info',array('employeeTransaction/updateprofiletab3', 'id'=>$model->employee_transaction_id),array('title'=>'Other Info','style'=>'text-decoration:none;color:white;'));?>
	</div>
	<div id="divlink4" class="info-link">
	<?php echo CHtml::link('Address Info',array('employeeTransaction/updateprofiletab4', 'id'=>$model->employee_transaction_id),array('title'=>'Address Info','style'=>'text-decoration:none;color:white;'));?>
	</div>
	<div id="divlink5" class="info-link">
	<?php echo CHtml::link('Document',array('employeeTransaction/employeedocs','id'=>$_REQUEST['id']),array('title'=>'My Documents'));?>
	</div>
	<div id="divlink8" class="info-link">
	<?php echo CHtml::link('Certificates',array('employeeTransaction/employeeCertificates','id'=>$_REQUEST['id']),array('title'=>'My Certificates', 'style'=>'text-decoration:none;color:white;'));?>
	</div>
	<div id="divlink6" class="info-link">
	<?php echo CHtml::link('Qualification',array('employeeTransaction/employeeAcademicRecords','id'=>$_REQUEST['id']),array('title'=>'My Qualifications'));?>
	</div>
	<div id="divlink7" class="info-link">
	<?php echo CHtml::link('Experience',array('employeeTransaction/employeeExperience','id'=>$_REQUEST['id']),array('title'=>'My Experience'));?>
	</div>
	<div id="divlink7" class="info-link">
		<?php echo CHtml::link('Holidays',array('/report/myholidays', 'id'=>$_REQUEST['id']),array('title'=>'Current Year Holidays','style'=>'text-decoration:none;color:white;'));?>
	</div>
	<?php 
	if($info->employee_type == 1){ ?>
	<div id="divlink8" class="info-link">
	<?php echo CHtml::link('TimeTable',array('/timetable/TimeTable/FacultyPersonalTimetable', 'faculty_id'=>$model->employee_transaction_id),array('title'=>'My Timetable','style'=>'text-decoration:none;color:white;'));?>
	</div>
	<?php } ?>
	<div id="divlink8" class="info-link">
	<?php
	echo CHtml::link('Leave Report',array('/hrms/employeeLeaveApplication/leavereport', 'id'=>$model->employee_transaction_id),array('title'=>'My Leave Report','style'=>'text-decoration:none;color:white;'));
	?>
	</div>
	<div id="divlink8" class="info-link">
	<?php echo CHtml::link('Monthly Attendance',array('employeeAttendence/Singlemonthattendence', 'id'=>$model->employee_transaction_id),array('title'=>'My Attendance','style'=>'text-decoration:none;color:white;')); ?>
	</div>
	<div id="divlink8" class="info-link">
	<?php echo CHtml::link('Salary Structure',array('/hrms/employeeSalaryStructure/Employeesalaryhead', 'id'=>$model->employee_transaction_id),array('title'=>'My Salary Info','style'=>'text-decoration:none;color:white;')); ?>
	</div>
	<div id="divlink8" class="info-link">
	<?php echo CHtml::link('Salary Slip',array('/hrms/employeeSalaryStructure/Mysalaryslip', 'id'=>$model->employee_transaction_id),array('title'=>'My Salary Slip','style'=>'text-decoration:none;color:white;')); ?>
	</div>
	<div id="divlink8" class="info-link">
	<?php echo CHtml::link('Salary Report',array('/hrms/employeeSalarySlip/Singleempsalaryreport', 'id'=>$_REQUEST['id']),array('style'=>'text-decoration:none;color:white;','target'=>'_blank'));?>
	</div>
</div>

<div class="form profile-wrapper">
<?php
$n = Yii::app()->controller->action->id;
switch ($n)
{
   case 'updateprofiletab1':
       echo $this->renderPartial('updateproftab1', array('model'=>$model,'info'=>$info));
   break;

   case 'updateprofiletab2':
       echo $this->renderPartial('updateproftab2', array('model'=>$model,'info'=>$info));
   break;

   case 'updateprofiletab3':
       echo $this->renderPartial('updateproftab3', array('model'=>$model,'info'=>$info,'lang'=>$lang)); 
   break;

   case 'updateprofiletab4':
       echo $this->renderPartial('updateproftab4', array('address'=>$address));
   break;

   case 'employeeCertificates':
       echo $this->renderPartial('/employeeCertificateDetailsTable/employeecertificate', array('employeecertificate'=>$emp_certificate));
   break;

   case 'employeedocs':
       echo $this->renderPartial('/employeeDocsTrans/employeedocs', array('emp_doc'=>$emp_doc));
   break;

   case 'employeeAcademicRecords':
       echo $this->renderPartial('/employeeAcademicRecordTrans/employeerecords', array('employeerecords'=>$employeerecords));
   break;

   case 'employeeExperience':
       echo $this->renderPartial('/employeeExperienceTrans/employeeexperience', array('employeeexperience'=>$emp_exp));
   break;

   default:
      echo $this->renderPartial('profile_form', array('model'=>$model,'info'=>$info,'photo'=>$photo,'address'=>$address,'lang'=>$lang));
} 
?>
</div>
