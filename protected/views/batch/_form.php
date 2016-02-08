<div class="portlet box blue">
 <div class="portlet-title"><i class="fa fa-plus"></i><span class="box-title">Fill Details</span>
</div>        
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'batch-form',
	'enableAjaxValidation'=>true,
	 'clientOptions'=>array('validateOnSubmit'=>true,'validateOnCnange'=>true),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php  //echo $form->errorSummary($model); 
?>

	<div class="row">
		<?php echo $form->labelEx($model,'batch_name'); ?>
		<?php echo $form->error($model,'batch_name'); ?>
		<?php echo $form->textField($model,'batch_name',array('size'=>25,'maxlength'=>60)); ?><span class="status">&nbsp;</span>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'batch_start_date'); ?>
		<?php echo $form->error($model,'batch_start_date'); ?>
		<?php if($model->batch_start_date != '' && $model->batch_start_date !='0000-00-00')
				$model->batch_start_date= date('d-m-Y',strtotime($model->batch_start_date));
			else
				$model->batch_start_date = '';
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    	'model'=>$model, 
				'attribute'=>'batch_start_date',
			    	'options'=>array(
				//'showOn'=> "button",
				'dateFormat'=>'dd-mm-yy',
				'changeYear'=>'true',
				'changeMonth'=>'true',
				'showAnim' =>'slide',
				'yearRange'=>'1900:'.(date('Y')+1),
				'buttonImage'=>Yii::app()->theme->baseUrl.'/images/calendar.png',			
			    	),
				'htmlOptions'=>array(
				'style'=>'width:250px;vertical-align:top',
				'readonly'=>true,
			    	),
			));
			?><span class="status">&nbsp;</span>
	</div>
<div class="row">
		<?php echo $form->labelEx($model,'batch_end_date'); ?>
		<?php echo $form->error($model,'batch_end_date'); ?>
		<?php if($model->batch_end_date != '' && $model->batch_end_date !='0000-00-00')
				$model->batch_end_date= date('d-m-Y',strtotime($model->batch_end_date));
			else
				$model->batch_end_date = '';
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    	'model'=>$model, 
				'attribute'=>'batch_end_date',
			    	'options'=>array(
				// 'showOn'=> "button",
				'dateFormat'=>'dd-mm-yy',
				'changeYear'=>'true',
				'changeMonth'=>'true',
				'showAnim' =>'slide',
				'yearRange'=>'1900:'.(date('Y')+1),
				'buttonImage'=>Yii::app()->theme->baseUrl.'/images/calendar.png',			
			    	),
				'htmlOptions'=>array(
				'style'=>'width:250px;vertical-align:top',
				'readonly'=>true,
			    	),
			));
			?><span class="status">&nbsp;</span>
	</div>

     <?php if(empty($_REQUEST['courseId'])) { ?>
	<div class="row">
		<?php echo $form->labelEx($model,'course_id'); ?>
		<?php echo $form->error($model,'course_id'); ?>
		<?php echo $form->dropDownList($model,'course_id',
					CHtml::listData(Course::model()->findAll(),'course_id','course_name'),
					array(
					'prompt' => 'Select Course',
					'ajax' => array(
					'type'=>'POST', 
					'url'=>CController::createUrl('dependent/getSem'),	 	
					'update'=>'#Batch_academic_term_id',
					))); ?><span class="status">&nbsp;</span>
	</div>
     <?php }
	else
	     echo $form->hiddenField($model,'course_id',array('value'=>$_REQUEST['courseId'])); 
     ?>
	
	<!--div class="row">
		<?php
			/*$acd = Yii::app()->db->createCommand()
				->select('*')
				->from('academic_term')
				->where('current_sem=1 ORDER BY academic_term_name ASC')
				->queryAll();
			$acdterm=CHtml::listData($acd,'academic_term_id','academic_term_name');	
			$pe_data = AcademicTermPeriod::model()->findByPk($acd[0]['academic_term_period_id']);
			$period[$pe_data->academic_terms_period_id] = $pe_data->academic_term_period; 
		*/ ?>
	
		<!--div class="row-right">
			<?php //echo $form->labelEx($model,'academic_term_id'); ?>
			<?php /* if(empty($model->academic_term_id))
				{
				// echo $form->dropDownList($model,'academic_term_id',CHtml::listData(AcademicTerm::model()->findAll(),'academic_term_id','academic_term_name','academicTermPeriod.academic_term_period'),array('prompt' => 'Select Semester')); 
				} 
				else {
				//echo $form->dropDownList($model,'academic_term_id',CHtml::listData(AcademicTerm::model()->findAll('course_id='.$model->course_id),'academic_term_id','academic_term_name'),array('prompt' => 'Select Semester')); 
				} */ ?><span class="status">&nbsp;</span>
			<?php //echo $form->error($model,'academic_term_id'); ?>
		</div>
	</div-->
	<div class="row">
		<?php echo $form->labelEx($model,'batch_intake'); ?>
		<?php echo $form->textField($model,'batch_intake',array('size'=>5,'maxlength'=>5)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'batch_intake'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'batch_fees'); ?>
		<?php echo $form->textField($model,'batch_fees',array('size'=>10,'maxlength'=>100)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'batch_fees'); ?>
	</div>
</div><!-- form -->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save',array('class'=>'submit')); ?>
		<?php if(isset($_REQUEST['flag'])) {?>
		<?php echo CHtml::link('Cancel', array('/course/'.$model->course_id), array('class'=>'btnCan')); }
		elseif(isset($_REQUEST['courseId']))
		{
		 echo CHtml::link('Cancel', array('/course/'.$_REQUEST['courseId']), array('class'=>'btnCan'));
		}
		else	{ ?>	
		<?php echo CHtml::link('Cancel', array('admin'), array('class'=>'btnCan')); } ?>	
	</div>

<?php $this->endWidget(); ?>
</div>

