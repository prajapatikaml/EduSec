<?php
Yii::import('zii.widgets.CPortlet');
 
class Room extends CPortlet
{
    protected function renderContent()
    {
?>
  <ul class="links">
	<?php if(Yii::app()->user->checkAccess('RoomCategory.Admin')) : ?>
	<li><?php echo CHtml::link('Room Category Master', array('/roomCategory/admin', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('RoomDetailsMaster.Admin')) : ?>
	<li><?php echo CHtml::link('Room Details', array('/roomDetailsMaster/admin', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>
  </ul>
<?php
    }
}
?>
