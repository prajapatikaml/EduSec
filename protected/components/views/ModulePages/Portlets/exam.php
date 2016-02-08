<?php
Yii::import('zii.widgets.CPortlet');
 
class Exam extends CPortlet
{
    protected function renderContent()
    {
?>
<ul class="links">
	<?php if(Yii::app()->user->checkAccess('Exam.ExamTypeTable.Admin')) : ?>	
	<li><?php echo CHtml::link("Type",array('/exam/examTypeTable/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Exam.ExamSubType.Admin')) : ?>	
	<li><?php echo CHtml::link("Category",array('/exam/examSubType/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Exam.ExamScheduled.Admin')) : ?>	
	<li><?php echo CHtml::link("Scheduling",array('/exam/examScheduled/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Exam.BranchSubjectwiseScheduling.Admin')) : ?>	
	<li><?php echo CHtml::link("Branchwise Scheduling",array('/exam/branchSubjectwiseScheduling/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Exam.ExamHallMapping.Admin')) : ?>	
	<li><?php echo CHtml::link("Hall Management",array('/exam/examHallMapping/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Exam.ExamSeatNumberMapping.Admin')) : ?>	
	<li><?php echo CHtml::link("Seat Number Management",array('/exam/examSeatNumberMapping/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Exam.ExamRoomAllocation.Admin')) : ?>	
	<li><?php echo CHtml::link("Room Allocation",array('/exam/examRoomAllocation/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Exam.ExamRoleManagement.Admin')) : ?>	
	<li><?php echo CHtml::link("Role Management",array('/exam/examRoleManagement/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Exam.ExamRoleAssignment.Admin')) : ?>	
	<li><?php echo CHtml::link("Role Assignment",array('/exam/examRoleAssignment/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Exam.ExamRoomAllocation.Facultyroomassigment')) : ?>	
	<li><?php echo CHtml::link("Supervisor Assignment",array('/exam/examRoomAllocation/facultyroomassigment', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Exam.ExamStudentAttendance.Admin')) : ?>	
	<li><?php echo CHtml::link("Exam Attendence",array('/exam/examStudentAttendance/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Exam.ExamStudentResult.Admin')) : ?>	
	<li><?php echo CHtml::link("Result",array('/exam/ExamStudentResult/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Exam.ExamFinalResult.Admin')) : ?>	
	<li><?php echo CHtml::link("Final Result",array('/exam/examFinalResult/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Exam.BranchSubjectwiseScheduling.ScheduleExamList')) : ?>	
	<li><?php echo CHtml::link("Scheduled Exam Report",array('/exam/branchSubjectwiseScheduling/scheduleExamList', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

</ul>
<?php
    }
}
?>
