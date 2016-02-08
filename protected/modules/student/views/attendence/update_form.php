
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'attendence-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php // echo $form->errorSummary($model); ?>

	<div class="block-error">
		<?php echo Yii::app()->user->getFlash('not-select-attendece'); ?>
	</div>

	
	<!--<div class="row">
		<?php echo $form->labelEx($model,'st_id'); ?>
		<?php echo $form->textField($model,'st_id'); ?>
		<?php echo $form->error($model,'st_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'attendence'); ?>
		<?php echo $form->textField($model,'attendence',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'attendence'); ?>
	</div> -->

	<div class="row">
		<?php echo $form->labelEx($model,'shift_id'); ?>
		<?php //echo $form->textField($model,'shift_id'); ?>
		<?php //echo $form->dropDownList($model,'shift_id', CHtml::listData(Shift::model()->findAll(), 'shift_id', 'shift_type'));?>
		<?php echo $form->dropDownList($model,'shift_id',Shift::items(), array('empty' => '---------------Select-------------','tabindex'=>1)); ?><span class="status">&nbsp;</span>

		<?php echo $form->error($model,'shift_id'); ?>
	</div>
<!--
	<div class="row">
		<?php echo $form->labelEx($model,'sem_id'); ?>
		<?php //echo $form->textField($model,'sem_id'); ?>
		<?php //echo $form->dropDownList($model,'sem_id', CHtml::listData(AcademicTermPeriod::model()->findAll(), 'academic_terms_period_id', 'academic_terms_period_name'));?>
		<?php echo $form->dropDownList($model,'sem_id',AcademicTermPeriod::items(), array('empty' => '---------------Select-------------','tabindex'=>2)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'sem_id'); ?>
	</div>
-->




	<div class="row">
	<div>
        <?php echo $form->labelEx($model,'sem_id'); ?>
        <?php //echo $form->dropDownList($model,'student_academic_term_period_tran_id',AcademicTermPeriod::items(), array('empty' => '-----------Select---------','tabindex'=>17)); ?>
	<?php
			echo $form->dropDownList($model,'sem_id',AcademicTermPeriod::items(),
			array(
			'prompt' => '---------------Select-------------','tabindex'=>2,
			'ajax' => array(
			'type'=>'POST', 
			'url'=>CController::createUrl('Attendence/getItemName'), 
			'update'=>'#Attendence_sem_name_id', //selector to update
			
			))); 
			 
			?><span class="status">&nbsp;</span>
        <?php echo $form->error($model,'sem_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'sem_name_id'); ?>
	        <?php //echo $form->dropDownList($model,'student_academic_term_name_id',array()); ?>
		<?php 
			
			if(isset($model->sem_name_id))
				echo $form->dropDownList($model,'sem_name_id', CHtml::listData(AcademicTerm::model()->findAll(array('condition'=>'academic_term_id='.$model->sem_name_id)), 'academic_term_id', 'academic_term_name'));
			else
				echo $form->dropDownList($model,'sem_name_id',array('prompt' => '---------------Select-------------'),array('tabindex'=>3)); 
		?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'sem_name_id'); ?>
	</div>	


    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'branch_id'); ?>
		<?php //echo $form->textField($model,'branch_id'); ?>
		<?php //echo $form->dropDownList($model,'branch_id', CHtml::listData(Branch::model()->findAll(), 'branch_id', 'branch_name'));?>
		<?php echo $form->dropDownList($model,'branch_id',Branch::items(), array('empty' => '---------------Select-------------','tabindex'=>4)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'branch_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'div_id'); ?>
		<?php //echo $form->textField($model,'div_id'); ?>
		<?php //echo $form->dropDownList($model,'div_id', CHtml::listData(Division::model()->findAll(), 'division_id', 'division_name'));?>
		<?php echo $form->dropDownList($model,'div_id',Division::items(), array('empty' => '---------------Select-------------','tabindex'=>5)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'div_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sub_id'); ?>
		<?php //echo $form->textField($model,'sub_id'); ?>
		<?php //echo $form->dropDownList($model,'sub_id', CHtml::listData(SubjectMaster::model()->findAll(), 'subject_master_id', 'subject_master_name'));?>
		<?php echo $form->dropDownList($model,'sub_id',SubjectMaster::items(), array('empty' => '---------------Select-------------','tabindex'=>6)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'sub_id'); ?>
	</div>

	<div class="row">
        <?php echo $form->labelEx($model,'batch_id'); ?>
        <?php //echo $form->textField($model,'batch_id'); ?>
        <?php //echo $form->dropDownList($model,'batch_id', CHtml::listData(Batch::model()->findAll(), 'batch_id', 'batch_name'));?>
        <?php echo $form->dropDownList($model,'batch_id',Batch::items(), array('empty' => '---------------Select-------------','tabindex'=>7)); ?><span class="status">&nbsp;</span>
        <?php echo $form->error($model,'batch_id'); ?>
    </div>
		
	<!--<div class="row">
		<?php echo $form->labelEx($model,'timetable_id'); ?>
		<?php echo $form->textField($model,'timetable_id'); ?>
		<?php echo $form->error($model,'timetable_id'); ?>
	</div> -->
<?php // var_dump($row1); ?>
	  <div class="row">
	  <?php 
		$date = date('Y/m/d');		
		echo $form->labelEx($model,'attendence_date'); ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker',
		    array(
			'model'=>$model,
			'attribute'=>'attendence_date',
			'language' => 'en',
			
			'options' => array(
			    'dateFormat'=>'yy-mm-dd',
			    'changeMonth' => 'true',
			    'changeYear' => 'true',
			    'duration'=>'fast',
			    'showAnim' =>'slide',
			),
			'htmlOptions'=>array('tabindex'=>8,
			'style'=>'height:18px;
			    padding-left: 4px;width:168px;',
			'value'=> date('Y-m-d'),

			)
		    )
		);
		 
	?>
	<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'attendence_date'); ?>
	</div> 

	<div class="row buttons">
		<?php echo CHtml::button('Search', array('class'=>'submit','submit' => array('updatecreate'),'tabindex'=>9)); ?>
	</div>

<?php $this->endWidget(); ?>

<?php
	

?>

<?php if(!empty($row1)) {
	$shift = $model->shift_id; 
	$branch = $model->branch_id; 
	$sem_name = $model->sem_name_id; 
	$div_id = $model->div_id; 
	$sub_id = $model->sub_id; 
	$sem_period_id = $model->sem_id; 



 ?>
<div class="form">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'attendence-grid',
	'dataProvider'=>$model->update_search($shift,$branch,$sem_name,$sem_period_id,$div_id,$sub_id),
	//'filter'=>$model,
	'columns'=>array(
		array(
		'header'=>'SN.',
		'class'=>'IndexColumn',
			),

		//'id',
		//'st_id',

		//'shift_id',
		//'sem_id',
		array(
		'name'=>'student_first_name',
//                'type'=>'raw',		
                'value'=> 'StudentInfo::model()->findByPk($data->st_id)->student_first_name',
	          ),	
		'attendence',
		array(
		'name'=>'branch_id',
//                'type'=>'raw',		
                'value'=> 'Branch::model()->findByPk($data->branch_id)->branch_name',
	          ),
		array(
		'name'=>'Sem_name',
//                'type'=>'raw',		
                'value'=> 'AcademicTerm::model()->findByPk($data->sem_name_id)->academic_term_name;',
	          ),	
		array(
		'name'=>'Sem_period',
//                'type'=>'raw',		
                'value'=> 'AcademicTermPeriod::model()->findByPk($data->sem_id)->academic_term_period',
	          ),
		array(
		'name'=>'subject_name',
//                'type'=>'raw',		
                'value'=> 'SubjectMaster::model()->findByPk($data->sub_id)->subject_master_name',
	          ),
//		'div_id',
//		'sub_id',
//		'batch_id',
//		'timetable_id',
		
		'attendence_date',
		array(
			'class'=>'CButtonColumn',
			'template' => '{update}',
		     ),

		)
)); ?>
</div>
<?php } ?>
