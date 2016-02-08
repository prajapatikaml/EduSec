<?php
Yii::import('zii.widgets.CPortlet');
 
class Transport extends CPortlet
{
    protected function renderContent()
    {
?>
<ul class="links">
	<?php if(Yii::app()->user->checkAccess('Transport.TransportBusMaster.Admin')) : ?>	
	<li><?php echo CHtml::link("Bus",array('/transport/transportBusMaster/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Transport.TransportDriverRegistration.Admin')) : ?>	
	<li><?php echo CHtml::link("Driver Details",array('/transport/transportDriverRegistration/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Transport.TransportRouteMaster.Admin')) : ?>	
	<li><?php echo CHtml::link("Route",array('/transport/transportRouteMaster/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Transport.TransportBusRouteAllocation.Admin')) : ?>	
	<li><?php echo CHtml::link("Route Allocation",array('/transport/transportBusRouteAllocation/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Transport.TransportStudentRegistration.StudentList')) : ?>	
	<li><?php echo CHtml::link("Transport Registration",array('/transport/transportStudentRegistration/studentList', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Transport.TransportStudentRegistration.Admin')) : ?>	
	<li><?php echo CHtml::link("Registered Student",array('/transport/transportStudentRegistration/admin', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm'));?></li>
	<?php endif; ?>
</ul>
<?php
    }
}
?>
