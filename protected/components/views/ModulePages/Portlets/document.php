<?php
Yii::import('zii.widgets.CPortlet');
 
class Document extends CPortlet
{
    protected function renderContent()
    {
?>
<ul class="links">
	<?php if(Yii::app()->user->checkAccess('DocumentCategoryMaster.Admin')) : ?>
	<li><?php echo CHtml::link('Document Category', array('/documentCategoryMaster/admin', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Report.StudentDocumentsearch')) : ?>
	<li><?php echo CHtml::link('Student Document', array('/report/studentDocumentsearch', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Report.Documentsearch')) : ?>
	<li><?php echo CHtml::link('Employee Document', array('/report/documentsearch', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>	
</ul>
<?php
    }
}
?>
