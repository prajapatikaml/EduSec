
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
		?>
	</div> 
<br />
	<div id="divlink1" class="info-link">
		<?php
		echo CHtml::link('Personal Info',array('/student/studentTransaction/update','id'=>Yii::app()->user->getState('stud_id')),array('title'=>'Personal Info'));
		?>
	</div>
	<div id="divlink5" class="info-link">
		<?php echo CHtml::link('Documents',array('/student/studentTransaction/studentdocs', 'id'=>Yii::app()->user->getState('stud_id')),array('title'=>'Documents','style'=>'text-decoration:none;color:white;'));?>
	</div>

	<div id="divlink7" class="info-link">
		<?php echo CHtml::link('Course Details',array('/report/courseDetails', 'id'=>Yii::app()->user->getState('stud_id')),array('title'=>'Course Details','style'=>'text-decoration:none;color:white;'));?>
	</div>
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
</div>

<?php
} 
else

{
?>
<div id="menulink">
	<div id="divlink1" class="info-link">
		<?php
		echo CHtml::link('Organizations',array('Organization/admin'),array('title'=>'Organizations'));
		?>
	</div>

	<div id="divlink3" class="info-link">
		<?php
		echo CHtml::link('User Management',array('/rights'),array('title'=>'User Management'));
		?>
	</div>

	
</div>
<?php
}
?>
