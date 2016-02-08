<?php
Yii::import('zii.widgets.CPortlet');
 
class Employee extends CPortlet
{
    protected function renderContent()
    {
?>
	<ul class="links">
		
		<?php if(Yii::app()->user->checkAccess('Employee.EmployeeTransaction.Create')) : ?>	
		<li><?php echo CHtml::link('Add Employee', array('/employee/employeeTransaction/create', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
		<?php endif; ?>
		<?php if(Yii::app()->user->checkAccess('Employee.EmployeeTransaction.Admin')) : ?>	
		<li><?php echo CHtml::link('Manage Employee', array('/employee/employeeTransaction/admin', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
		<?php endif; ?>
		
		<?php if(Yii::app()->user->checkAccess('Resetlogin')) : ?>
		<li><?php echo CHtml::link('Reset Login', array('/user/resetemploginid', 'page'=>Yii::app()->request->getParam('page')), array	('class'=>'changeForm')); ?></li>
		<?php endif; ?>
	
		<?php if(Yii::app()->user->checkAccess('Resetpassword')) : ?>
		<li><?php echo CHtml::link('Reset Password', array('/user/resetemppassword', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
		<?php endif; ?>

		<?php //if(Yii::app()->user->checkAccess('Timetable.Timetable.FacultyPersonalTimetable')) : ?>
		<!--li><?php //echo CHtml::link('Employee Personal Timetable', array('/timetable/timetable/FacultyPersonalTimetable'), array('class'=>'changeForm')); ?></li-->
		<?php //endif; ?>
	</ul>
<?php
    }
}
?>
