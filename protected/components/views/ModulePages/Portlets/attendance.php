<?php
Yii::import('zii.widgets.CPortlet');
 
class Attendance extends CPortlet
{
    protected function renderContent()
    {
?>
<ul class="links">
	<?php if(Yii::app()->user->checkAccess('Timetable.TimeTable.Employeelist')) : ?>	
	<li><?php echo CHtml::link('Take Attendance', array('/timetable/timeTable/employeelist', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Student.Attendence.Create')) : ?>
	<li><?php echo CHtml::link('Take Manual Attendance', array('/student/attendence/create', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Student.Attendence.Admin')) : ?>
	<li><?php echo CHtml::link('Student Attendance', array('/student/attendence/admin', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>
</ul>
<?php
    }
}
?>
