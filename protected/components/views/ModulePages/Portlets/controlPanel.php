<?php
Yii::import('zii.widgets.CPortlet');
 
class ControlPanel extends CPortlet
{
    protected function renderContent()
    {
?>
<ul class="links">
	<li><?php echo CHtml::link('Manage Institute', array('/organization/admin', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
	<li><?php echo CHtml::link('User Management', array('/rights', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
</ul>
<?php
    }
}
?>
