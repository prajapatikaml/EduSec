<div class="portlet box blue">
 <div class="portlet-title"><i class="fa fa-plus"></i><span class="box-title">Fill Details</span>
</div>        


<?php /*       
if($model->scenario == 'insert')
$name = "Add Semester";
else
$name = "Edit Semester";

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'mydialog',
	// additional javascript options for the dialog plugin
	'options'=>array(
		'title'=>$name,
		'autoOpen'=>true,
		'modal'=>true,	
                'height'=>'auto',
                'width'=>450,
                'resizable'=>false,
                'draggable'=>false,
		
		'close' => 'js:function(event, ui) { location.href = "'.Yii::app()->createUrl("academicTerm/admin").'"; }'
	),
)); */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'academic-term-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php 
		//$org_data = Organization::model()->findByPk(Yii::app()->user->getState('org_id'));
		//$semester_array = range(0,$org_data['no_of_semester'],1);
		$semester_array[0] = 'Select Semester';
	//echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'academic_term_period_id'); ?>
		<?php //echo $form->textField($model,'academic_term_period_id'); ?>
		<?php echo $form->dropDownList($model,'academic_term_period_id',CHtml::listData(AcademicTermPeriod::model()->findAll(),'academic_terms_period_id','academic_term_period'),array('empty' => 'Select  Year')); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'academic_term_period_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'academic_term_name'); ?>
		<?php echo $form->dropDownList($model,'academic_term_name',array(""=>"---------Select---------",1=>"1",2=>"2",3=>"3",4=>"4",5=>"5",6=>"6",7=>"7",8=>"8"))
			?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'academic_term_name'); ?>
	</div>	
	<div class="row">
		<?php echo $form->labelEx($model,'academic_term_start_date'); ?>
	
	        <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		    'model'=>$model, 
		    'attribute'=>'academic_term_start_date',
		    'options'=>array(
			'dateFormat'=>'dd-mm-yy',
			'changeYear'=>'true',
			'changeMonth'=>'true',
			'showAnim' =>'slide',
			'yearRange'=>'1900:'.(date('Y')+1),
			'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',			
		    ),
			'htmlOptions'=>array(
			'style'=>'width:80px;vertical-align:top',
			'readonly'=>true,
		    ),
			
		));
		
?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'academic_term_start_date'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'academic_term_end_date'); ?>
	
	 <?php  $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		    'model'=>$model, 
		    'attribute'=>'academic_term_end_date',
		    'options'=>array(
			'dateFormat'=>'dd-mm-yy',
			'changeYear'=>'true',
			'changeMonth'=>'true',
			'showAnim' =>'slide',
			'yearRange'=>'1900:'.(date('Y')+1),
			'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',			
		    ),
			'htmlOptions'=>array(
			'style'=>'width:80px;vertical-align:top',
			'readonly'=>true,
		    ),
			
		)); 
?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'academic_term_end_date'); ?>
	</div>
	<div class="row">
	<?php echo $form->labelEx($model,'course_id'); ?>
		<?php echo $form->error($model,'course_id'); ?>
		<?php echo $form->dropDownList($model,'course_id',
					CHtml::listData(Course::model()->findAll(),'course_id','course_name'),
					array(
					'prompt' => 'Select Course',
					)); ?><span class="status">&nbsp;</span>
	</div>
	<div class="row">
		 <?php echo $form->labelEx($model,'current_sem'); ?>
	   	 <?php echo $form->checkBox($model,'current_sem', array('value'=>1, 'uncheckValue'=>0)); ?>
	   	 <?php echo $form->error($model,'current_sem'); ?>
	</div>
   </div><!-- form -->
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save',array('class'=>'submit')); 
		?>
		<?php echo CHtml::link('Cancel', array('admin'), array('class'=>'btnCan')); ?>	
	</div>

<?php $this->endWidget(); ?>
<?php
//$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
</div>
