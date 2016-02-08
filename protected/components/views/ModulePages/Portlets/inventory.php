<?php
Yii::import('zii.widgets.CPortlet');
 
class Inventory extends CPortlet
{
    protected function renderContent()
    {
?>
<ul class="links">
	<?php if(Yii::app()->user->checkAccess('Inventory.Inward.Admin')) : ?>
	<li><?php echo CHtml::link('Inward', array('/inventory/inward/admin', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Inventory.Assets.Admin')) : ?>
	<li><?php echo CHtml::link('Assets', array('/inventory/assets/admin', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Inventory.Outward.Admin')) : ?>
	<li><?php echo CHtml::link('Outward', array('/inventory/outward/admin', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>	
</ul>
<?php
    }
}
?>
