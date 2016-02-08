<?php
Yii::import('zii.widgets.CPortlet');
 
class SmsEmail extends CPortlet
{
    protected function renderContent()
    {
?>
<ul class="links">
	<?php if(Yii::app()->user->checkAccess('Employee.EmployeeSmsEmailDetails.Admin')) : ?>
	<li><?php echo CHtml::link('Employee Sms/Email', array('/employee/employeeSmsEmailDetails/admin', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>
	<?php if(Yii::app()->user->checkAccess('Employee.EmployeeSmsEmailDetails.Employeebulksmsemail')) : ?>
	<li><?php echo CHtml::link('Compose Employee Sms/Email', array('/employee/employeeSmsEmailDetails/employeebulksmsemail', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>
	<?php if(Yii::app()->user->checkAccess('Employee.EmployeeSmsEmailDetails.Mycreate')) : ?>
	<li><?php echo CHtml::link('Departmentwise Employee Sms/Email', array('/employee/employeeSmsEmailDetails/mycreate', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>
	<?php if(Yii::app()->user->checkAccess('Student.StudentSmsEmailDetails.Admin')) : ?>
	<li><?php echo CHtml::link('Student Sms/Email', array('/student/studentSmsEmailDetails/admin', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>
        <?php if(Yii::app()->user->checkAccess('Student.StudentSmsEmailDetails.Studentbulksmsemail')) : ?>
	<li><?php echo CHtml::link('Compose Student Sms/Email', array('/student/studentSmsEmailDetails/studentbulksmsemail', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>
        <?php if(Yii::app()->user->checkAccess('Student.StudentSmsEmailDetails.Mycreate')) : ?>
	<li><?php echo CHtml::link('Send Student Sms/Email', array('/student/studentSmsEmailDetails/mycreate', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>
       	<?php if(Yii::app()->user->checkAccess('Student.StudentSmsEmailDetails.Schedulemessages')) : ?>
	<li><?php echo CHtml::link('Schedule Messages', array('/student/studentSmsEmailDetails/ScheduleMessages', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Student.StudentSmsEmailDetails.ScheduleFeesMessage')) : ?>
	<li><?php echo CHtml::link('Schedule Fees Message', array('/student/studentSmsEmailDetails/ScheduleFeesMessage', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>

        <?php if(Yii::app()->user->checkAccess('Student.StudentSmsEmailDetails.ScheduleAttendanceMessage')) : ?>
	<li><?php echo CHtml::link('Schedule Attendance Message', array('/student/studentSmsEmailDetails/ScheduleAttendanceMessage', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>

        <?php if(Yii::app()->user->checkAccess('Student.ScheduleTiming.Admin')) : ?>
	<li><?php echo CHtml::link('Schedule Timing', array('/student/scheduleTiming/admin', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>
<?php
    }
}
?>
