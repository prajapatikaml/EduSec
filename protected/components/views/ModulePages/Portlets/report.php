<?php
Yii::import('zii.widgets.CPortlet');
 
class Report extends CPortlet
{
    protected function renderContent()
    {
?>
  <ul class="links">
	<?php if(Yii::app()->user->checkAccess('Report.StudInfoReport')) : ?>
	<li><?php echo CHtml::link('Student', array('/report/studInfoReport', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Report.EmployeeInfoReport')) : ?>
	<li><?php echo CHtml::link('Employee', array('/report/employeeInfoReport', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Report.Studenthistory')) : ?>
	<li><?php echo CHtml::link("Student History",array('/report/Studenthistory', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm')); ?></li>
	<?php endif; ?>


	<?php if(Yii::app()->user->checkAccess('Student.Attendence.ChartReport')) : ?>
	<li><?php echo CHtml::link('Attendance Chart', array('/student/attendence/chartReport', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Fees.FeesPaymentTransaction.StudentFeesReport')) : ?>
	<li><?php echo CHtml::link('Student Fees Report', array('/fees/feesPaymentTransaction/studentfeesreport', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Student.Attendence.Studentwisereport')) : ?>
	<li><?php echo CHtml::link('Student Attendance Report', array('/student/attendence/studentwisereport', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>
	
	<?php if(Yii::app()->user->checkAccess('Report.StudMonthlyAllsubjectAttendenceReport')) : ?>
        <li><?php echo CHtml::link("Monthwise All Subject Report",array('/report/StudMonthlyAllsubjectAttendenceReport', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm'));?></li>
        <?php endif; ?> 


	<?php if(Yii::app()->user->checkAccess('Student.StudentTransaction.Allstudent')) : ?>
	<li><?php echo CHtml::link('All Students', array('/student/studentTransaction/allstudent', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>
	<li><?php if(Yii::app()->user->checkAccess('Report.DepartmentwiseEmployeeInfoReport')) : ?>
        <?php echo CHtml::link("Employee Register",array('/report/DepartmentwiseEmployeeInfoReport', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm'));?>
        <?php endif; ?>  </li>



  </ul>
<?php
    }
}
?>
