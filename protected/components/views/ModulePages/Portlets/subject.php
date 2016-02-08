<?php
Yii::import('zii.widgets.CPortlet');
 
class Subject extends CPortlet
{
    protected function renderContent()
    {
?>
  <ul class="links">
	<?php if(Yii::app()->user->checkAccess('SubjectType.Admin')) : ?>
	<li><?php echo CHtml::link('Subject Type', array('/subjectType/admin', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('SubjectMaster.Admin')) : ?>
	<li><?php echo CHtml::link('Subject', array('/subjectMaster/admin', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('SubjectAllotment.Admin')) : ?>
	<li><?php echo CHtml::link('Subject Allotment', array('/subjectAllotment/admin'), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('ElectiveSubjectClass.Admin')) : ?>
	<li><?php echo CHtml::link('Elective Subject Class', array('/electiveSubjectClass/admin'), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>
    </ul>
<?php
    }
}
?>
