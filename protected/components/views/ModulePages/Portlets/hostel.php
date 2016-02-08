<?php
Yii::import('zii.widgets.CPortlet');
 
class Hostel extends CPortlet
{
    protected function renderContent()
    {
?>
<ul class="links">
	<?php if(Yii::app()->user->checkAccess('Hostel.HostelType.Admin')) : ?>	
	<li><?php echo CHtml::link("Hostel Type",array('/hostel/hostelType/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Hostel.HostelFeesStructure.Admin')) : ?>	
	<li><?php echo CHtml::link("Hostel Fees Master",array('/hostel/hostelFeesStructure/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Hostel.HostelInformation.Admin')) : ?>	
	<li><?php echo CHtml::link("Hostel Details",array('/hostel/hostelInformation/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>
	
	<?php if(Yii::app()->user->checkAccess('Hostel.HostelBlocks.Admin')) : ?> 	
	<li><?php echo CHtml::link("Hostel Blocks",array('/hostel/hostelBlocks/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?>
	<?php endif; ?>
	<?php if(Yii::app()->user->checkAccess('Hostel.HostelRoomMaster.Admin')) : ?>	
	<li><?php echo CHtml::link("Room Details",array('/hostel/hostelRoomMaster/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Hostel.HostelStudentRegistration.Studentlist')) : ?>	
	<li><?php echo CHtml::link("Hostel Registration",array('/hostel/hostelStudentRegistration/studentlist', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Hostel.HostelStudentRegistration.Admin')) : ?>	
	<li><?php echo CHtml::link("Registered Student List",array('/hostel/hostelStudentRegistration/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php  if(Yii::app()->user->checkAccess('Report.HostelRoomAllocation')) : ?> 	
	<li><?php echo CHtml::link("Room Allocation Report",array('/report/hostelRoomAllocatoin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>
</ul>
<?php
    }
}
?>
