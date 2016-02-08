<?php
Yii::import('zii.widgets.CPortlet');
 
class Assignments extends CPortlet
{
    protected function renderContent()
    {
?>
  <ul class="links">
	<?php
	if(Yii::app()->user->getState('stud_id')){
	
	 if(Yii::app()->user->checkAccess('Assignment.Assignment.StudAssignments')) : ?>	
	<li><?php echo CHtml::link("Assignment Declaration",array('/assignment/assignment/studAssignments', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Assignment.AssignmentTrans.StudAssignments')) : ?>	
	<li><?php echo CHtml::link("Assignment Submission",array('/assignment/assignmentTrans/studAssignments', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php } 

	else { 	
	
	 if(Yii::app()->user->checkAccess('Assignment.Assignment.EmpAssignments')) : ?>	
	<li><?php echo CHtml::link("Submission report",array('/assignment/assignment/empAssignments', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Assignment.AssignmentTrans.Admin')) : ?>	
	<li><?php echo CHtml::link("Submission",array('/assignment/assignmentTrans/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>	

	<?php if(Yii::app()->user->checkAccess('Assignment.Assignment.Admin')) : ?>	
	<li><?php echo CHtml::link("Declaration",array('/assignment/assignment/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>			
	
	<?php } ?>
  </ul>
<?php
    }
}
?>
