<?php
Yii::import('zii.widgets.CPortlet');
 
class Configuration extends CPortlet
{
    protected function renderContent()
    {
?>
	<ul class="links">

	<?php if(Yii::app()->user->checkAccess('AcademicTermPeriod.Admin')) : ?>	
	<li><?php echo CHtml::link("Academic Year",array('/academicTermPeriod/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>
	
	<?php if(Yii::app()->user->checkAccess('Course.Admin')) : ?>	
	<li><?php echo CHtml::link("Course",array('/course/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('AcademicTerm.Admin')) : ?>	
	<li><?php echo CHtml::link("Semester",array('/academicTerm/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>


	<?php if(Yii::app()->user->checkAccess('Batch.Admin')) : ?>	
	<li><?php echo CHtml::link("Batch",array('/batch/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>
	
	<?php if(Yii::app()->user->checkAccess('Department.Admin')) : ?>	
	<li><?php echo CHtml::link("Department",array('/department/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('EmployeeDesignation.Admin')) : ?>	
	<li><?php echo CHtml::link("Employee Designation",array('/employeeDesignation/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Nationality.Admin')) : ?>	
	<li><?php echo CHtml::link("Nationality",array('/nationality/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Country.Admin')) : ?>	
	<li><?php echo CHtml::link("Country",array('/country/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('State.Admin')) : ?>	
	<li><?php echo CHtml::link("State / Province",array('/state/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('City.Admin')) : ?>	
	<li><?php echo CHtml::link("City",array('/city/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Languages.Admin')) : ?>	
	<li><?php echo CHtml::link("Languages",array('/languages/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Eduboard.Admin')) : ?>	
	<li><?php echo CHtml::link("Education Board",array('/eduboard/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Qualification.Admin')) : ?>	
	<li><?php echo CHtml::link("Qualification",array('/qualification/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Year.Admin')) : ?>	
	<li><?php echo CHtml::link("Year",array('/year/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>
	
	<?php if(Yii::app()->user->checkAccess('UserType.Admin')) : ?>	
	<li><?php echo CHtml::link("UserType",array('/userType/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>
	
	<?php if(Yii::app()->user->checkAccess('Studentstatusmaster.Admin')) : ?>	
	<li><?php echo CHtml::link("Student Status",array('/studentstatusmaster/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('NationalHolidays.Admin')) : ?>	
	<li><?php echo CHtml::link("National Holiday",array('/nationalHolidays/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	</ul>
<?php
    }
}
?>
