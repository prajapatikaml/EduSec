<?php
Yii::import('zii.widgets.CPortlet');
 
class Hrms extends CPortlet
{
    protected function renderContent()
    {
?>
<ul class="links">

	<?php if(Yii::app()->user->checkAccess('Employee.EmployeeAttendence.Admin')) : ?>	
	<li><?php echo CHtml::link('Employee Attendance', array('/employee/employeeAttendence/admin', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Hrms.EmployeeLeaveApplication.Admin')) : ?>	
	<li><?php echo CHtml::link('Apply for Leave', array('/hrms/employeeLeaveApplication/admin', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Hrms.EmployeeLeaveApplication.Level2reportinglist')) : ?>	
	<li><?php echo CHtml::link('Leave Applications', array('/hrms/employeeLeaveApplication/Level2reportinglist', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Hrms.EmployeeLeaveApplication.reportinglist')) : ?>	
	<li><?php echo CHtml::link('Reporting List', array('/hrms/employeeLeaveApplication/reportinglist', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>

       <?php if(Yii::app()->user->checkAccess('Hrms.EmployeeLeaveApplication.Leavecancellist')) : ?>
	<li><?php echo CHtml::link('Cancel Leave List', array('/hrms/employeeLeaveApplication/Leavecancellist', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Hrms.NationalHolidays.Admin')) : ?>	
	<li><?php echo CHtml::link("National Holidays",array('/hrms/nationalHolidays/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Hrms.LeaveMaster.Admin')) : ?>	
	<li><?php echo CHtml::link("Leave Master",array('/hrms/leaveMaster/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Hrms.LeaveRuleMaster.Admin')) : ?>	
	<li><?php echo CHtml::link("Leave Rule Master",array('/hrms/leaveRuleMaster/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Hrms.LeaveTransaction.Admin')) : ?>	
	<li><?php echo CHtml::link("Leave Characteristics",array('/hrms/leaveTransaction/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Hrms.LeaveStatusMaster.Admin')) : ?>	
	<li><?php echo CHtml::link("Leave Status Master",array('/hrms/leaveStatusMaster/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Hrms.LeaveStructureDesignationDuration.Admin')) : ?>	
	<li><?php echo CHtml::link("Leave Duration",array('/hrms/leaveStructureDesignationDuration/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Hrms.EmployeeReportingTable.Admin')) : ?>	
	<li><?php echo CHtml::link("Employee Reporting",array('/hrms/employeeReportingTable/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Hrms.LeaveStructureDesignation.Admin')) : ?>	
	<li><?php echo CHtml::link("Designation Wise Leave",array('/hrms/leaveStructureDesignation/newadmin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Hrms.SalaryStructureDesignationDuration.Admin')) : ?>	
	<li><?php echo CHtml::link("Salary Duration",array('/hrms/salaryStructureDesignationDuration/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Hrms.SalaryHeadMaster.Admin')) : ?>	
	<li><?php echo CHtml::link("Salary Head Master",array('/hrms/salaryHeadMaster/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Hrms.EmployeeSalaryStructure.Admin')) : ?>	
	<li><?php echo CHtml::link("Salary Structure",array('/hrms/employeeSalaryStructure/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Hrms.EmployeeSalaryStructure.Monthlyempsalary')) : ?>	
	<li><?php echo CHtml::link("Salary Slip",array('/hrms/employeeSalaryStructure/monthlyempsalary', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Hrms.EmployeeSalarySlip.Salaryslipdata')) : ?>	
	<li><?php echo CHtml::link("Salary Bill",array('/hrms/employeeSalarySlip/salaryslipdata', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Hrms.EmployeeSalarySlip.Salarybankreport')) : ?>	
	<li><?php echo CHtml::link("Salary BankStatement",array('/hrms/employeeSalarySlip/salarybankreport', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Hrms.Weekoff.Admin')) : ?>	
	<li><?php echo CHtml::link("Week Off",array('/hrms/weekoff/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>
</ul>
<?php
    }
}
?>
