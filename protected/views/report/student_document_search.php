<?php
$this->breadcrumbs=array('Report',
	' Student Document Search',
	
);?>

<div class="form"></br>
<h1> Student Document Search</h1></br>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'document-search',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),

)); ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
<?php
	$org_id=Yii::app()->user->getState('org_id');
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
	<div class="row">
		<?php echo $form->labelEx($model,'document_category'); ?>
		<?php echo $form->dropDownList($model,'document_category',CHtml::listData(DocumentCategoryMaster::model()->findAll(),'doc_category_id','doc_category_name'), array('empty' => 'Select Document'));?>
		<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'document_category'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'academic_year'); ?>
		<?php echo $form->dropDownList($model,'academic_year',$period,array('prompt' => 'Select Year'));?>
		<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'academic_year'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sem'); ?>
		<?php echo $form->dropDownList($model,'sem',$acdterm, array('empty' => 'Select Semester'));?>
		<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'sem'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'branch'); ?>
		<?php echo $form->dropDownList($model,'branch',Branch::items(), array('empty' => 'Select Branch'));?>
		<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'branch'); ?>
	</div>	
	

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search', array('class'=>'submit','name'=>'search')); ?>
	</div>	

<?php $this->endWidget(); ?>	

</div>
