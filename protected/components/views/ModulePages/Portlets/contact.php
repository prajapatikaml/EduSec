<?php
Yii::import('zii.widgets.CPortlet');
 
class Contact extends CPortlet
{
    protected function renderContent()
    {
?>
<ul class="links">
	<?php if(Yii::app()->user->checkAccess('Student.StudentTransaction.Studentcontact')) : ?>	
		<li><?php echo CHtml::link("Student Contact",array('/student/studentTransaction/studentcontact', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
		<?php endif; ?>

		<?php if(Yii::app()->user->checkAccess('Employee.EmployeeTransaction.Employeecontact')) : ?>	
		<li><?php echo CHtml::link("Employee Contact",array('/employee/employeeTransaction/employeecontact', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
		<?php endif; ?>
		<?php if(Yii::app()->user->checkAccess('Report.PostLabelStudent')) : ?>	
		<li><?php echo CHtml::link("Postal Address",array('/report/PostLabelStudent', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
		<?php endif; ?>
</ul>
<?php
    }
}
?>
