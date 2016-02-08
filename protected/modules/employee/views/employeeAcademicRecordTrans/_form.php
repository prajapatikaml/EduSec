<?php $years=array();  
      $years=range(date('Y')-50,date('Y'));
      foreach($years as $y)
	$acd_years[$y]=$y; 	
?>
<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title"><span class="box-title">Fil Details</span>
 </div>
<div class="form two-coloumn">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employee-academic-record-trans-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>
	<?php
		     $id = $_REQUEST['id'];
		     if(isset($model->employee_academic_record_trans_qualification_id))
		     {
			$query = 'qualification_id  not in(select employee_academic_record_trans_qualification_id from  employee_academic_record_trans where qualification_id <>'.$model->employee_academic_record_trans_qualification_id.' )';
		     }
		     else
		     $query = 'qualification_id  not in(select employee_academic_record_trans_qualification_id from  employee_academic_record_trans where employee_academic_record_trans_user_id='.$id.') ';
		     $remaining_course = Yii::app()->db->createCommand()
                    ->select('qualification_id,qualification_name')
                    ->from('qualification')
                    ->where($query)
                    ->queryAll();
	?>
	<div class="row">
        <?php echo $form->labelEx($model,'employee_academic_record_trans_qualification_id'); ?>  
	<?php echo $form->dropDownList($model,'employee_academic_record_trans_qualification_id',CHtml::listData($remaining_course,'qualification_id','qualification_name'),array('empty' => 'Select Course','tabindex'=>1));?><span class="status">&nbsp;</span>
	 <?php echo $form->error($model,'employee_academic_record_trans_qualification_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'employee_academic_record_trans_eduboard_id'); ?>
		<?php echo $form->dropDownList($model,'employee_academic_record_trans_eduboard_id',Eduboard::items(), array('empty' => 'Select Eduboard','tabindex'=>2)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'employee_academic_record_trans_eduboard_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'employee_academic_record_trans_year_id'); ?>
		<?php echo $form->dropDownList($model,'employee_academic_record_trans_year_id',$acd_years, array('empty' => 'Select Year','selected'=>'selected','tabindex'=>3)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'employee_academic_record_trans_year_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'theory_mark_max'); ?>
		<?php echo $form->textField($model,'theory_mark_max',array('tabindex'=>4,'size'=>3));?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'theory_mark_max'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'theory_mark_obtained'); ?>
		<?php echo $form->textField($model,'theory_mark_obtained',array('tabindex'=>5,'size'=>3)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'theory_mark_obtained'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'theory_percentage'); ?>
		<?php echo $form->textField($model,'theory_percentage',array('tabindex'=>6,'size'=>3)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'theory_percentage'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'practical_mark_max'); ?>
		<?php echo $form->textField($model,'practical_mark_max',array('tabindex'=>7,'size'=>3)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'practical_mark_max'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'practical_mark_obtained'); ?>
		<?php echo $form->textField($model,'practical_mark_obtained',array('tabindex'=>8,'size'=>3)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'practical_mark_obtained'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'practical_percentage'); ?>
		<?php echo $form->textField($model,'practical_percentage',array('tabindex'=>9,'size'=>3)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'practical_percentage'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save', array('class'=>'submit','tabindex'=>10)); ?>
		<?php echo CHtml::link('Cancel', array('employeeTransaction/update','id'=>$id), array('class'=>'btnCan')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
