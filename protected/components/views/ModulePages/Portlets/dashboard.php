<?php
Yii::import('zii.widgets.CPortlet');
 
class Dashboard extends CPortlet
{
    protected function renderContent()
    {
?>
<ul class="links">
 	<?php if(Yii::app()->user->checkAccess('MessageOfDay.Admin')) : ?>	
	<li><?php echo CHtml::link("Message Of Day",array('/messageOfDay/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Notification.StudentNotification.Admin')) : ?>	
	<li><?php echo CHtml::link("Student Notice",array('/notification/studentNotification/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Notification.EmployeeNotification.Admin')) : ?>	
	<li><?php echo CHtml::link("Employee Notice",array('/notification/employeeNotification/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>
 </ul>

<?php
    }
}
?>
