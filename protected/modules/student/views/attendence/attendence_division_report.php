<?php
$this->breadcrumbs=array(
	'Attedance Division Report',	
);
?>
<script>
$(document).ready(function() {
$('#sem').change(function() {
			$('#branch_name').val(0);
			});
});
</script>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'attendence-division',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
	
)); ?>
<?php   $org_id=Yii::app()->user->getState('org_id');
	$acd = Yii::app()->db->createCommand()
		->select('*')
		->from('academic_term')
		->where('current_sem=1 and academic_term_organization_id='.$org_id)
		->queryAll();
	$acdterm=CHtml::listData($acd,'academic_term_id','academic_term_name');
	$period=array();
	if(!empty($acdterm)){	
	$pe_data = AcademicTermPeriod::model()->findByPk($acd[0]['academic_term_period_id']);
	$period[$pe_data->academic_terms_period_id] = $pe_data->academic_term_period; 
	}?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<div class="row">        
		<?php echo $form->labelEx($model,'sem_id'); ?>
		<?php echo $form->dropDownList($model,'sem_id',$period,array('tabindex'=>1,'prompt' => 'Select Year')); ?>
		<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'sem_id'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'sem_name_id'); ?>
		<?php echo $form->dropDownList($model,'sem_name_id',$acdterm,array('tabindex'=>2,'empty' => 'Select Semester'));  ?>
		<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'sem_name_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'branch_id'); ?>
		<?php echo $form->dropDownList($model,'branch_id', CHtml::listData(Branch::model()->findAll(array('condition'=>'branch_organization_id='.$org_id)),'branch_id','branch_name'), array(
			'tabindex'=>3,'empty' => 'Select Branch',
			'ajax' => array(
			'type'=>'POST', 
			'url'=>CController::createUrl('dependent/getattendancediv'), 
			'update'=>'#Attendence_div_id', //selector to update
			))); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'branch_id'); ?>		
	 </div>
	<div class="row">
		<?php echo $form->labelEx($model,'div_id'); ?>
		<?php echo $form->dropDownList($model,'div_id', array(), array('empty' => 'Select Division','tabindex'=>4)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'div_id'); ?>		
	 </div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Search', array('class'=>'submit','tabindex'=>5));
			//echo CHtml::button('search',array('class'=>'submit','submit'=>array('')); 
		?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

