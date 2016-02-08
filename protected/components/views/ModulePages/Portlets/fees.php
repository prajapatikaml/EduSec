<?php
Yii::import('zii.widgets.CPortlet');
 
class Fees extends CPortlet
{
    protected function renderContent()
    {
?>
  <ul class="links">

	<?php if(Yii::app()->user->checkAccess('Fees.BankMaster.Admin')) : ?>	
	<li><?php echo CHtml::link("Bank Master",array('/fees/bankMaster/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Fees.FeesPaymentTransaction.Addfees')) : ?>	
	<li><?php echo CHtml::link("Add Student Fees",array('/fees/feesPaymentTransaction/addfees', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

 </ul>

<?php
    }
}
?>
