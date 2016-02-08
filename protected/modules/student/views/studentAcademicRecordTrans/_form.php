<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Add Academic Record
 </div>
<div class="ui-tabs-panel form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-academic-record-trans-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>
	<?php
		     $org = Yii::app()->user->getState('org_id');
		     if(isset($model->student_academic_record_trans_qualification_id))
		     {
			$query = 'qualification_id not in(select student_academic_record_trans_qualification_id from student_academic_record_trans where qualification_id <>'.$model->student_academic_record_trans_qualification_id.' AND student_academic_record_trans_stud_id ='.$model->student_academic_record_trans_stud_id.')';

		     }
		     else {
		     $query = 'qualification_id  not in(select student_academic_record_trans_qualification_id from student_academic_record_trans where student_academic_record_trans_stud_id ='.$_REQUEST['id'].')';
		     }
		     $remaining_course = Yii::app()->db->createCommand()
                    ->select('qualification_id,qualification_name')
                    ->from('qualification')
                    ->where($query)
                    ->queryAll();
		    
	?>
	
	<div class="row">
        <?php echo $form->labelEx($model,'student_academic_record_trans_qualification_id'); ?>  
	<?php echo $form->dropDownList($model,'student_academic_record_trans_qualification_id',CHtml::listData($remaining_course,'qualification_id','qualification_name'),array('empty' => 'Select Course','tabindex'=>1));?><span class="status">&nbsp;</span>
	 <?php echo $form->error($model,'student_academic_record_trans_qualification_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'student_academic_record_trans_eduboard_id'); ?>
		<?php echo $form->dropDownList($model,'student_academic_record_trans_eduboard_id',Eduboard::items(), array('empty' => 'Select Eduboard','tabindex'=>2)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'student_academic_record_trans_eduboard_id'); ?>
	</div>
	<div class="row">
		<?php $y = date('Y');
			$py = $y- 50;
			$arr = array_combine(range($py,$y,1), range($py,$y,1));
		?>
		<?php echo $form->labelEx($model,'student_academic_record_trans_record_trans_year_id'); ?>
		<?php echo $form->dropDownList($model,'student_academic_record_trans_record_trans_year_id',$arr, array('empty' => 'Select Year','tabindex'=>3)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'student_academic_record_trans_record_trans_year_id'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'theory_mark_max'); ?>
		<?php echo $form->textField($model,'theory_mark_max', array('tabindex'=>4,'size'=>3)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'theory_mark_max'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'theory_mark_obtained'); ?>
		<?php echo $form->textField($model,'theory_mark_obtained', array('tabindex'=>5,'size'=>3)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'theory_mark_obtained'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'theory_percentage'); ?>
		<?php echo $form->textField($model,'theory_percentage', array('tabindex'=>6,'size'=>3)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'theory_percentage'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'practical_mark_max'); ?>
		<?php echo $form->textField($model,'practical_mark_max', array('tabindex'=>7,'size'=>3)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'practical_mark_max'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'practical_mark_obtained'); ?>
		<?php echo $form->textField($model,'practical_mark_obtained', array('tabindex'=>8,'size'=>3)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'practical_mark_obtained'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'practical_percentage'); ?>
		<?php echo $form->textField($model,'practical_percentage', array('tabindex'=>9,'size'=>3)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'practical_percentage'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save', array('class'=>'submit','tabindex'=>10)); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
