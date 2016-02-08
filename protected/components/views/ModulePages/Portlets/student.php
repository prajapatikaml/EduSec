<?php
Yii::import('zii.widgets.CPortlet');
 
class Student extends CPortlet
{
    protected function renderContent()
    {
?>
  <ul class="links">

	<?php if(Yii::app()->user->checkAccess('Student.StudentTransaction.Create')) : ?>
	<li><?php echo CHtml::link('Add Student', array('/student/studentTransaction/create', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Student.StudentTransaction.Admin')) : ?>
	<li><?php echo CHtml::link('List Students', array('/student/studentTransaction/admin', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>
	
	<?php if(Yii::app()->user->checkAccess('Resetlogin')) : ?>
	<li><?php echo CHtml::link('Reset Login', array('/user/resetstudloginid', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Resetpassword')) : ?>
	<li><?php echo CHtml::link('Reset Password', array('/user/resetstudpassword', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>
  </ul>
<?php
    }
}
?>
