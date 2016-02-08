<div class="row">
	  
	<div class="row-column1">
		<?php echo CHtml::label('Student No. :','student_roll_no'); ?>   
		<?php echo (!empty($info->student_roll_no) ? $info->student_roll_no : "Not Set") ;?>
	</div>
	<div class="row-column1">
		<?php echo CHtml::label('Course :','course'); ?>
		<?php echo (!empty($model->Rel_course->course_name) ? $model->Rel_course->course_name : "Not Set");?>    
	</div>
	
</div>
<div class="row">
	<div class="row-column2">   
        	<?php echo CHtml::label('Semester :','semester'); ?>
		<?php echo (!empty($model->Rel_student_academic_terms_name->academic_term_name) ? $model->Rel_student_academic_terms_name->academic_term_name : "Not Set");?>    
        </div> 
	
	
	<div class="row-column2">
		<?php echo CHtml::label('Year :','student_academic_term_period_tran_id'); ?>
	       <?php echo (!empty ($model->Rel_student_academic_terms_period_name->academic_term_period) ? $model->Rel_student_academic_terms_period_name->academic_term_period : "Not Set ");?>	
		
	</div>

</div>


<div class="row">   
	<div class="row-column2">   
		<?php echo CHtml::label('Batch :','student_transaction_batch_id'); ?>
		<?php echo (!empty($model->Rel_Batch->batch_name) ? $model->Rel_Batch->batch_name : "Not Set"  );?>
	</div>    

</div>
