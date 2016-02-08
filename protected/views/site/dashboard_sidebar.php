
<?php if(Yii::app()->user->getState('stud_id'))
{
$studentmodel = StudentTransaction::model()->find('student_transaction_id='.Yii::app()->user->getState('stud_id'));
$photo = StudentPhotos::model()->findByPk($studentmodel->student_transaction_student_photos_id);
?>
<div id="menulink">
	<div id="studentlogo">
	<?php
		if($photo->student_photos_path != null)
			echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/college_data/stud_images/'.$photo->student_photos_path,"",array("width"=>"176px","height"=>"178px")),array('/college_data/stud_images/'.$photo->student_photos_path),array('id'=>'photo'));
		/* $config = array( 
					'scrolling' => 'no',
					'autoDimensions' => false,
					'width' => 'auto',
					'height' => 'auto', 
				 //   'titleShow' => false,
				       'overlayColor' => '#000',
				       'padding' => '0',
				       'showCloseButton' => true,			
				       'onClose' => function() {
						return window.location.reload();
					},

				// change this as you need
				);
				$this->widget('application.extensions.fancybox.EFancyBox', array('target'=>'#photo', 'config'=>$config));*/
		?>
	</div> <?php //end of student logo div?>

	</br>
	<div id="divlink1" class="info-link">
		<?php
		echo CHtml::link('Personal Info',array('/student/studentTransaction/update','id'=>Yii::app()->user->getState('stud_id')),array('title'=>'Personal Info'));
		?>
	</div>
	<div id="divlink9" class="info-link">
		<?php echo CHtml::link('Certificates',array('/student/studentTransaction/studentcertificate', 'id'=>Yii::app()->user->getState('stud_id')),array('title'=>'Certificates','style'=>'text-decoration:none;color:white;'));?>
	</div>
	<div id="divlink5" class="info-link">
		<?php echo CHtml::link('Documents',array('/student/studentTransaction/studentdocs', 'id'=>Yii::app()->user->getState('stud_id')),array('title'=>'Documents','style'=>'text-decoration:none;color:white;'));?>
	</div>
	<div id="divlink6" class="info-link">
		<?php echo CHtml::link('Qualifications',array('/student/studentTransaction/studentacademicrecord', 'id'=>Yii::app()->user->getState('stud_id')),array('title'=>'Qualifications','style'=>'text-decoration:none;color:white;'));?>
	</div>
	<div id="divlink7" class="info-link">
		<?php echo CHtml::link('Performances',array('/student/studentTransaction/studentperformance', 'id'=>Yii::app()->user->getState('stud_id')),array('title'=>'Performances','style'=>'text-decoration:none;color:white;'));?>
	</div>
	<div id="divlink7" class="info-link">
		<?php echo CHtml::link('Subjects',array('/report/mysubjects', 'id'=>Yii::app()->user->getState('stud_id')),array('title'=>'Current Semester Subjects List','style'=>'text-decoration:none;color:white;'));?>
	</div>
	<div id="divlink7" class="info-link">
		<?php echo CHtml::link('Holidays',array('/report/myholidays', 'id'=>Yii::app()->user->getState('stud_id')),array('title'=>'Current Semester Holidays','style'=>'text-decoration:none;color:white;'));?>
	</div>
	<div id="divlink8" class="info-link">
	<?php 
	echo CHtml::link('TimeTable',array('/timetable/TimeTable/StudentPersonalTimetable', 'student_id'=>Yii::app()->user->getState('stud_id')),array('title'=>'My Timetable','style'=>'text-decoration:none;color:white;'));
	?>
	</div>

	<?php 
		if(Yii::app()->user->checkAccess('StudentFeesMaster.MyFees') ) {
	?>	<div id="divlink8" class="info-link">
	<?php	echo CHtml::link('Show Fees',array('/fees/studentFeesMaster/myfees', 'id'=>Yii::app()->user->getState('stud_id')),array('title'=>'My Fees','style'=>'text-decoration:none;color:white;'));
		
		?>	</div>
	<?php
	}	
		?>
	<div id="divlink8" class="info-link">
	<?php	echo CHtml::link('Paid Fees Details',array('/fees/feesPaymentTransaction/studentFeesReportwithoutform'),array('title'=>'My Paid Fees','style'=>'text-decoration:none;color:white;'));
		
		?>
	</div>
	<?php 		
		if(Yii::app()->user->checkAccess('Student.Attendence.StudentAttendenceReport') ) {
	?>	<div id="divlink8" class="info-link">
	<?php	echo CHtml::link('Attendance',array('/student/attendence/studentAttendenceReport', 'id'=>Yii::app()->user->getState('stud_id')),array('title'=>'My Attendance','style'=>'text-decoration:none;color:white;'));
		
		?>	</div>
	<?php
	}	
		?>
	<?php 
		if(Yii::app()->user->checkAccess('Report.Studenthistory') ) {
	?>	<div id="divlink8" class="info-link">
	<?php	echo CHtml::link('History',array('report/studenthistory', 'id'=>Yii::app()->user->getState('stud_id')),array('title'=>'My History','style'=>'text-decoration:none;color:white;'));
		?>
		</div>
		<?php
		}
		?>
		<?php if(Yii::app()->user->checkAccess('Exam.BranchSubjectwiseScheduling.Studentexamtimetable') ) { ?>	
	<div id="divlink8" class="info-link">			
		<?php	echo CHtml::link('Exam Timetable',array('/exam/branchSubjectwiseScheduling/studentexamtimetable','id'=>Yii::app()->user->getState('stud_id')),array('target'=>'_blank','style'=>'text-decoration:none;color:white;')); ?>	
	</div>
	<?php }	?>
	
</div>

<?php
} //end student if
 
else if(Yii::app()->user->getState('emp_id'))
{
$employeemodel = EmployeeTransaction::model()->find('employee_transaction_id='.Yii::app()->user->getState('emp_id'));
$info = EmployeeInfo::model()->findByPk($employeemodel->employee_transaction_employee_id);
$photo = EmployeePhotos::model()->findByPk($employeemodel->employee_transaction_emp_photos_id);

?>
<div id="menulink">
	
	<div id="studentlogo">
	<?php
		if($employeemodel->Rel_Photo->employee_photos_path != null)
			echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/college_data/emp_images/'.$photo->employee_photos_path,"",array("width"=>"178px","height"=>"176px")),array('/college_data/emp_images/'.$photo->employee_photos_path),array('id'=>'imagelink'))."</br></br>";
	
		/*
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
	$this->widget('application.extensions.fancybox.EFancyBox', array('target'=>'a#imagelink', 'config'=>$config));*/
		?>

	</div>
	</br>
	<div id="divlink1" class="info-link">
	<?php
		echo CHtml::link('Personal Info',array('employee/employeeTransaction/update','id'=>Yii::app()->user->getState('emp_id')),array('title'=>'Personal Info'));
	?>
	</div>
	<div id="divlink5" class="info-link">
	<?php
		echo CHtml::link('Document',array('employee/employeeTransaction/employeedocs','id'=>Yii::app()->user->getState('emp_id')),array('title'=>'My Documents'));
	?>
	</div>
	<div id="divlink8" class="info-link">
	<?php
		echo CHtml::link('Certificates',array('employee/employeeTransaction/employeeCertificates','id'=>Yii::app()->user->getState('emp_id')),array('title'=>'My Certificates', 'style'=>'text-decoration:none;color:white;'));
	?>
	</div>
	
	<div id="divlink6" class="info-link">
	<?php
		echo CHtml::link('Qualification',array('employee/employeeTransaction/employeeAcademicRecords','id'=>Yii::app()->user->getState('emp_id')),array('title'=>'My Qualifications'));
	?>
	</div>
	<div id="divlink7" class="info-link">
	<?php
		echo CHtml::link('Experience',array('employee/employeeTransaction/employeeExperience','id'=>Yii::app()->user->getState('emp_id')),array('title'=>'My Experience'));
	?>
	</div>
	<div id="divlink7" class="info-link">
		<?php echo CHtml::link('Holidays',array('/report/myholidays', 'id'=>Yii::app()->user->getState('emp_id')),array('title'=>'Current Year Holidays','style'=>'text-decoration:none;color:white;'));?>
	</div>
	<?php 

	if($info->employee_type == 1)	
	{
	?>
	<div id="divlink8" class="info-link">
	<?php
	echo CHtml::link('TimeTable',array('timetable/TimeTable/FacultyPersonalTimetable', 'faculty_id'=>$employeemodel->employee_transaction_id),array('title'=>'My Timetable','style'=>'text-decoration:none;color:white;'));
	?>
	</div>
	<?php
	}
	?>
	<div id="divlink8" class="info-link">
	<?php
	echo CHtml::link('Leave Report',array('hrms/employeeLeaveApplication/leavereport', 'id'=>$employeemodel->employee_transaction_id),array('title'=>'My Leave Report','style'=>'text-decoration:none;color:white;','target'=>'_blank'));
	?>
	</div>
	<div id="divlink8" class="info-link">
	<?php
	echo CHtml::link('Monthly Attendance',array('employee/employeeAttendence/Singlemonthattendence', 'id'=>$employeemodel->employee_transaction_id),array('title'=>'My Attendance','style'=>'text-decoration:none;color:white;','target'=>'_blank'));
	?>
	</div>
	<div id="divlink8" class="info-link">
	<?php
	echo CHtml::link('Salary Structure',array('hrms/employeeSalaryStructure/Employeesalaryhead', 'id'=>$employeemodel->employee_transaction_id),array('title'=>'My Salary Info','style'=>'text-decoration:none;color:white;','target'=>'_blank'));
	?>
	</div>
	<div id="divlink8" class="info-link">
	<?php
	echo CHtml::link('Salary Slip',array('hrms/employeeSalaryStructure/Mysalaryslip', 'id'=>Yii::app()->user->getState('emp_id')),array('title'=>'My Salary Slip','style'=>'text-decoration:none;color:white;','target'=>'_blank'));
	?>
	</div>
	<div id="divlink8" class="info-link">
	<?php
	echo CHtml::link('Salary Report',array('hrms/employeeSalarySlip/Singleempsalaryreport', 'id'=>Yii::app()->user->getState('emp_id')),array('style'=>'text-decoration:none;color:white;','target'=>'_blank'));
	?>
	</div>
	<div id="divlink8" class="info-link">
	<?php
	echo CHtml::link('Exam Timetable',array('exam/branchSubjectwiseScheduling/facultyexamtimetable', 'id'=>Yii::app()->user->getState('emp_id')),array('style'=>'text-decoration:none;color:white;','target'=>'_blank'));
	?>
	</div>
</div>

<?php
} //end employee if
else
//if(Yii::app()->user->isSuperuser)
{
?>
<div id="menulink">
	<div id="divlink1" class="info-link">
		<?php
		echo CHtml::link('Organizations',array('Organization/admin'),array('title'=>'Organizations'));
		?>
	</div>
	<div id="divlink2" class="info-link">
		<?php
		echo CHtml::link('Add Admin',array('User/admin'),array('title'=>'Create Admin'));
		?>
	</div>
	<div id="divlink3" class="info-link">
		<?php
		echo CHtml::link('User Management',array('/rights'),array('title'=>'User Management'));
		?>
	</div>
	<div id="divlink4" class="info-link">
		<?php
		echo CHtml::link('Assign Company',array('assignCompanyUserTable/admin'),array('title'=>'Assigned Company User'));
		?>
	</div>
	
</div>
<?php
}
?>
