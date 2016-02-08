<style>
.required{
   display:none;
}
.row{
   width:50%;	
}
</style>
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	
	<div class="row" >
		<?php echo $form->labelEx($model,'student_transaction_branch_id'); ?>
		<?php echo $form->dropDownList($model,'student_transaction_branch_id',CHtml::listData(Branch::model()->findAll(array('condition'=>'branch_organization_id='.Yii::app()->user->getState('org_id'))),'branch_id','branch_name'),array('empty' => 'Select Branch','tabindex'=>1));?>
	
        <?php echo $form->labelEx($model,'student_academic_term_period_tran_id'); ?>
	<?php
			echo $form->dropDownList($model,'student_academic_term_period_tran_id',AcademicTermPeriod::items(),
			array(
			'prompt' => 'Select Year','tabindex'=>2,
			'ajax' => array(
			'type'=>'POST', 
			'url'=>CController::createUrl('dependent/getAllStud'), 
			'update'=>'#StudentTransaction_student_academic_term_name_id', //selector to update
			
			))); 
			 
			?>
	</div>
	<div class="row">
	<?php echo $form->label($model,'student_academic_term_name_id'); ?>
	<?php if(!empty($_REQUEST['StudentTransaction']['student_academic_term_period_tran_id']))
	{
		$data = CHtml::listData(AcademicTerm::model()->findAll(array('condition'=>'academic_term_period_id='.$_REQUEST['StudentTransaction']['student_academic_term_period_tran_id'])),'academic_term_id','academic_term_name');
		echo $form->dropDownList($model,'student_academic_term_name_id',$data,array('empty'=>'Select Semester'));
	}
	else {		
 ?>
		<?php echo $form->dropDownList($model,'student_academic_term_name_id',array(),array('empty'=>'Select Semester')); ?>
	<?php } ?>
	
		<?php echo $form->labelEx($model,'student_transaction_detain_student_flag'); ?>
		<?php echo $form->dropDownList($model,'student_transaction_detain_student_flag',CHtml::listData(Studentstatusmaster::model()->findAll(),'id','status_name'),array('empty' => 'Select Status','tabindex'=>1));?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search',array('class'=>'submit')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
