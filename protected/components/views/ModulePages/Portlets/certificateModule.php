<?php
Yii::import('zii.widgets.CPortlet');
 
class CertificateModule extends CPortlet
{
    protected function renderContent()
    {
?>
  <ul class="links">
	<?php if(Yii::app()->user->checkAccess('Certificate.Admin')) : ?>
	<li><?php echo CHtml::link('Certificate', array('/certificate/admin', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Student.StudentCertificateDetailsTable.Admin')) : ?>
	<li><?php echo CHtml::link('Student Certificate', array('/student/studentCertificateDetailsTable/admin', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>

	
	<?php if(Yii::app()->user->checkAccess('Employee.EmployeeCertificateDetailsTable.Admin')) : ?>
	<li><?php echo CHtml::link('Employee Certificate', array('/employee/employeeCertificateDetailsTable/admin', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>
  </ul>
<?php
    }
}
?>
