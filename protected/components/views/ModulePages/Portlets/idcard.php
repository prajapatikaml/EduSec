<?php
Yii::import('zii.widgets.CPortlet');
 
class IdCard extends CPortlet
{
    protected function renderContent()
    {
?>
  <ul class="links">
	<?php if(Yii::app()->user->checkAccess('Report.Studentid')) : ?>
	<li><?php echo CHtml::link('Student ID Card', array('/report/studentid', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Report.Employeeid')) : ?>
	<li><?php echo CHtml::link('Employee ID Card', array('/report/employeeid', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>
	<?php if(Yii::app()->user->checkAccess('IdcardFieldFormat.Admin')) : ?>
	<li><?php echo CHtml::link('ID Card Templates', array('/idcardFieldFormat/admin', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>
        <?php if(Yii::app()->user->checkAccess('IdcardFieldFormat.Create')) : ?>
	<li><?php echo CHtml::link('Student ID Card Templates', array('/idcardFieldFormat/create', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>
        <?php if(Yii::app()->user->checkAccess('IdcardFieldFormat.EmployeeCardCreate')) : ?>
	<li><?php echo CHtml::link('Employee ID Card Templates', array('/idcardFieldFormat/EmployeeCardCreate', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
       <?php endif; ?>
  </ul>
<?php
    }
}
?>
