<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-notification-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>
  <div class="row">
 <?php echo $form->labelEx($model, 'student_notification_expire'); ?>
<?php       if(isset($model->student_notification_expire))
		{
		$this->widget('zii.widgets.jui.CJuiDatePicker',
		    array(
			'model'=>$model,
			'attribute'=>'student_notification_expire',
			'language' => 'en',
			
			'options' => array(
			    'dateFormat'=>'dd-mm-yy',
			    'changeMonth' => 'true',
			    'changeYear' => 'true',
			    'duration'=>'fast',
			    'showAnim' =>'slide',
			'yearRange'=>'1900:'.(date('Y')+1),
			//	'maxDate'=> '0',
			//	'minDate'=>'0',
			),
			'htmlOptions'=>array(//'tabindex'=>1,
			'style'=>'height:18px;
			    padding-left: 4px;width:168px;',
		'value'=>date("d-m-Y", strtotime($model->student_notification_expire)),

			)
		    )
		);
		}
		else
		{
			$this->widget('zii.widgets.jui.CJuiDatePicker',
		    array(
			'model'=>$model,
			'attribute'=>'student_notification_expire',
			'language' => 'en',
			
			'options' => array(
			    'dateFormat'=>'dd-mm-yy',
			    'changeMonth' => 'true',
			    'changeYear' => 'true',
			    'duration'=>'fast',
			    'showAnim' =>'slide',
			  //  'minDate'=>'date(Y/m/d)',
				'yearRange'=>'1900:'.(date('Y')+1),
			//	'maxDate'=> '0',
			//	'minDate'=>'0',
			),
			'htmlOptions'=>array(//'tabindex'=>1,
			'style'=>'height:18px;
			    padding-left: 4px;width:168px;',
		//	'value'=> date('Y-m-d'),

			)
		    )
		);	
		}?>
        <?php echo $form->error($model, 'student_notification_expire'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'student_notification_alert_after_date'); ?>
<?php       if(isset($model->student_notification_alert_after_date))
		{
		$this->widget('zii.widgets.jui.CJuiDatePicker',
		    array(
			'model'=>$model,
			'attribute'=>'student_notification_alert_after_date',
			'language' => 'en',
			
			'options' => array(
			    'dateFormat'=>'dd-mm-yy',
			    'changeMonth' => 'true',
			    'changeYear' => 'true',
			    'duration'=>'fast',
			    'showAnim' =>'slide',
			'yearRange'=>'1900:'.(date('Y')+1),
			//	'maxDate'=> '0',
			//	'minDate'=>'0',
			),
			'htmlOptions'=>array(//'tabindex'=>1,
			'style'=>'height:18px;
			    padding-left: 4px;width:168px;',
		'value'=>date("d-m-Y", strtotime($model->student_notification_alert_after_date)),

			)
		    )
		);
		}
		else
		{
			$this->widget('zii.widgets.jui.CJuiDatePicker',
		    array(
			'model'=>$model,
			'attribute'=>'student_notification_alert_after_date',
			'language' => 'en',
			
			'options' => array(
			    'dateFormat'=>'dd-mm-yy',
			    'changeMonth' => 'true',
			    'changeYear' => 'true',
			    'duration'=>'fast',
			    'showAnim' =>'slide',
			  //  'minDate'=>'date(Y/m/d)',
				'yearRange'=>'1900:'.(date('Y')+1),
			//	'maxDate'=> '0',
			//	'minDate'=>'0',
			),
			'htmlOptions'=>array(//'tabindex'=>1,
			'style'=>'height:18px;
			    padding-left: 4px;width:168px;',
		//	'value'=> date('Y-m-d'),

			)
		    )
		);	
		}?>        <?php echo $form->error($model, 'student_notification_alert_after_date'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'student_notification_alert_before_date'); ?>
<?php       if(isset($model->student_notification_alert_before_date))
		{
		$this->widget('zii.widgets.jui.CJuiDatePicker',
		    array(
			'model'=>$model,
			'attribute'=>'student_notification_alert_before_date',
			'language' => 'en',
			
			'options' => array(
			    'dateFormat'=>'dd-mm-yy',
			    'changeMonth' => 'true',
			    'changeYear' => 'true',
			    'duration'=>'fast',
			    'showAnim' =>'slide',
			'yearRange'=>'1900:'.(date('Y')+1),
			//	'maxDate'=> '0',
			//	'minDate'=>'0',
			),
			'htmlOptions'=>array(//'tabindex'=>1,
			'style'=>'height:18px;
			    padding-left: 4px;width:168px;',
		'value'=>date("d-m-Y", strtotime($model->student_notification_alert_before_date)),

			)
		    )
		);
		}
		else
		{
			$this->widget('zii.widgets.jui.CJuiDatePicker',
		    array(
			'model'=>$model,
			'attribute'=>'student_notification_alert_before_date',
			'language' => 'en',
			
			'options' => array(
			    'dateFormat'=>'dd-mm-yy',
			    'changeMonth' => 'true',
			    'changeYear' => 'true',
			    'duration'=>'fast',
			    'showAnim' =>'slide',
			  //  'minDate'=>'date(Y/m/d)',
				'yearRange'=>'1900:'.(date('Y')+1),
			//	'maxDate'=> '0',
			//	'minDate'=>'0',
			),
			'htmlOptions'=>array(//'tabindex'=>1,
			'style'=>'height:18px;
			    padding-left: 4px;width:168px;',
		//	'value'=> date('Y-m-d'),

			)
		    )
		);	
		}?>	<?php echo $form->error($model, 'student_notification_alert_before_date'); ?>
    </div>
	<div class="row">
		<?php echo $form->labelEx($model,'student_notification_title'); ?>
		<?php echo $form->textField($model,'student_notification_title',array('size'=>20,'maxlength'=>20)); ?>
<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'student_notification_title'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'student_notification_content'); ?>
		<?php echo $form->textField($model,'student_notification_content',array('size'=>50,'maxlength'=>50)); ?>
<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'student_notification_content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_notification_link'); ?>
		<?php echo $form->textField($model,'student_notification_link',array('size'=>30,'maxlength'=>30)); ?>
<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'student_notification_link'); ?>
	</div>

	


	<div class="row">
		<?php echo $form->labelEx($model,'student_notification_to'); ?>
			<?php //echo $form->dropDownList($model,'student_notification_to', User :: items(), array('empty' => '-----------Select---------')); ?>				<?php echo $form->dropDownList($model,'student_notification_to', CHtml::listData(User::model()->findAll(array('condition'=> 'user_type="student" and user_organization_id='.Yii::app()->user->getState('org_id'))),'user_id','user_organization_email_id')
,array('empty' => 'All Students')); ?><span class="status">&nbsp;</span>
	<?php echo $form->error($model,'student_notification_to'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'student_notification_academic_period_id'); ?>
		<?php //echo $form->textField($model,'student_notification_academic_period_id');
	
			echo $form->dropDownList($model,'student_notification_academic_period_id',AcademicTermPeriod::items(),
			array(
			'prompt' => 'All Academic Year',
			'ajax' => array(
			'type'=>'POST', 
			'url'=>CController::createUrl('StudentNotification/getItemName'), 
			'update'=>'#StudentNotification_student_notification_academic_term_id', //selector to update
			
			))); 
		 ?>	 

		<?php echo $form->error($model,'student_notification_academic_period_id'); ?>
	</div>
		<div class="row">
		<?php echo $form->labelEx($model,'student_notification_academic_term_id'); ?>

		<?php //echo $form->textField($model,'student_notification_academic_term_id'); ?>
	<?php 
			
			if(isset($model->student_academic_term_name_id))
				echo $form->dropDownList($model,'student_notification_academic_term_id', CHtml::listData(AcademicTerm::model()->findAll(array('condition'=>'academic_term_period_id='.$model->student_academic_term_period_tran_id)), 'academic_term_id', 'academic_term_name'));
			else
				echo $form->dropDownList($model,'student_notification_academic_term_id',array('prompt' => 'All Semester')); 
		?><span class="status">&nbsp;</span>

		<?php echo $form->error($model,'student_notification_academic_term_id'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'student_notification_branch_id'); ?>
		<?php //echo $form->textField($model,'student_notification_branch_id'); ?>
		<?php echo $form->dropDownList($model,'student_notification_branch_id', Branch :: items(), array('empty' => 'All Branch')); ?><span class="status">&nbsp;</span>
	
		<?php echo $form->error($model,'student_notification_branch_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save',array('class'=>'submit')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
