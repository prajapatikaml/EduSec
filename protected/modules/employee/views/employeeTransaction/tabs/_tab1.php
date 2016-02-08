<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'personal-profile-form',
//	'enableAjaxValidation'=>true,
)); ?>
	<?php echo $form->errorSummary(array($model, $info)); ?>
<div class="row">
	<div class="row-left">
	      <?php echo $form->labelEx($info,'employee_no'); ?> 
              <?php echo $form->textField($info,'employee_no',array('size'=>11, 'tabindex'=>1)); ?><span class="status">&nbsp;</span>
              <?php echo $form->error($info,'employee_no'); ?> 
	</div>
	<div class="row-left">
	      <?php echo $form->labelEx($info,'employee_attendance_card_id'); ?> 
              <?php echo $form->textField($info,'employee_attendance_card_id',array('size'=>11, 'tabindex'=>2)); ?><span class="status">&nbsp;</span>
              <?php echo $form->error($info,'employee_attendance_card_id'); ?> 
	</div>
</div>

<div class="row">
	<div class="row-right">
		<?php echo $form->labelEx($info,'title'); ?>   
		<?php echo $form->dropdownList($info,'title',$info->getTitleOptions(), array('empty' => '-----------Select---------','tabindex'=>10)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($info,'title'); ?>
	</div>
	<div class="row-left">
		<?php echo $form->labelEx($info,'employee_first_name'); ?>
<?php echo $form->textField($info,'employee_first_name',array('size'=>18,'maxlength'=>25,'tabindex'=>11)); ?><span class="status">&nbsp;</span>
		 <?php echo $form->error($info,'employee_first_name'); ?>
	</div>

	<div class="row-right">
              <?php echo $form->labelEx($info,'employee_last_name'); ?>
              <?php echo $form->textField($info,'employee_last_name',array('size'=>18,'maxlength'=>25,'tabindex'=>12)); ?><span class="status">&nbsp;</span>
	      <?php echo $form->error($info,'employee_last_name'); ?>
	</div>
</div>

<div class="row">

	<div class="row-right">
		<?php echo $form->labelEx($info,'employee_name_alias'); ?>
              <?php echo $form->textField($info,'employee_name_alias',array('size'=>18,'maxlength'=>25,'tabindex'=>2)); ?><span class="status">&nbsp;</span>
              <?php echo $form->error($info,'employee_name_alias'); ?>
	</div>

	<div class="row-left">
	      <?php echo $form->labelEx($info,'employee_gender'); ?>
              <?php echo $form->dropDownList($info,'employee_gender',$info->getGenderOptions(), array('empty' => '-----------Select---------','tabindex'=>17)); ?><span class="status">&nbsp;</span>
              <?php echo $form->error($info,'employee_gender'); ?>
	</div>
</div>

<div class="row">
	<div class="row-left">
		<?php  echo $form->labelEx($info,'employee_dob'); ?>
		<?php  $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    'model'=>$info, 
			    'attribute'=>'employee_dob',
			    'options'=>array(
				'dateFormat'=>'dd-mm-yy',
				'changeYear'=>'true',
				'changeMonth'=>'true',
				'showAnim' =>'slide',
				'yearRange'=>'1900:'.date('Y'),
				'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',
						
			    ),
				'htmlOptions'=>array(
				'style'=>'width:80px;vertical-align:top',
				'value'=>date("d-m-Y", strtotime($info->employee_dob)),
			    ),
				));

		?><span class="status">&nbsp;</span>
		<?php echo $form->error($info,'employee_dob'); ?>
	</div>
	<div class="row-right">
		<?php echo $form->labelEx($info,'employee_bloodgroup'); ?>
              <?php echo $form->dropDownList($info,'employee_bloodgroup',$info->getBloodGroup(), array('empty' => '-----------Select---------','tabindex'=>18)); ?><span class="status">&nbsp;</span>
              <?php echo $form->error($info,'employee_bloodgroup'); ?>
	</div>
</div>

<div class="row">

	<div class="row-left">
	      <?php echo $form->labelEx($model,'employee_transaction_nationality_id'); ?>
	      <?php echo $form->dropDownList($model,'employee_transaction_nationality_id',Nationality::items(), array('empty' => '-----------Select---------','tabindex'=>19)); ?><span class="status">&nbsp;</span>
	      <?php echo $form->error($model,'employee_transaction_nationality_id'); ?>
	</div>

	<div class="row-right">
		<?php echo $form->labelEx($info,'employee_marital_status'); ?>
	        <?php echo $form->dropDownList($info,'employee_marital_status',$info->getMaritialStatus(), array('empty' => 'Select Marital Status')); ?><span class="status">&nbsp;</span>
	        <?php echo $form->error($info,'employee_marital_status'); ?>
	</div>

</div>


<div class="row">
	<div class="row-left">
		<?php  echo $form->labelEx($info,'employee_joining_date'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    'model'=>$info, 
			    'attribute'=>'employee_joining_date',
			    'options'=>array(
				'dateFormat'=>'dd-mm-yy',
				'changeYear'=>'true',
				'changeMonth'=>'true',
				'showAnim' =>'slide',
				'yearRange'=>'1900:'.date('Y'),
				'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',
						
			    ),
				'htmlOptions'=>array(
				'style'=>'width:80px;vertical-align:top',
				
				'value'=>date("d-m-Y", strtotime($info->employee_joining_date)),
			    ),
		));
	?><span class="status">&nbsp;</span>
		<?php echo $form->error($info,'employee_joining_date'); ?>
	</div>
	<div class="row-right">
	      <?php echo $form->labelEx($model,'employee_transaction_department_id'); ?>
	      <?php echo $form->dropDownList($model,'employee_transaction_department_id',Department::items(), array('empty' => '-----------Select---------','tabindex'=>8)); ?><span class="status">&nbsp;</span>
	      <?php echo $form->error($model,'employee_transaction_department_id'); ?>
	</div>
</div>

<div class="row">

	<div class="row-left">
	      <?php echo $form->labelEx($model,'employee_transaction_designation_id'); ?>
	      <?php echo $form->dropDownList($model,'employee_transaction_designation_id',EmployeeDesignation::items(), array('empty' => '-----------Select---------','tabindex'=>7)); ?><span class="status">&nbsp;</span>
	      <?php echo $form->error($model,'employee_transaction_designation_id'); ?>
	</div>
	<div class="row-left">
	      <?php echo $form->labelEx($info,'employee_faculty_of'); ?>
	      <?php echo $form->textField($info,'employee_faculty_of'); ?><span class="status">&nbsp;</span>
	      <?php echo $form->error($info,'employee_faculty_of'); ?>
	</div>
</div>

<div class="row">

	<div class="row-left">
	      <?php echo $form->labelEx($info,'employee_private_mobile'); ?>
               <?php echo $form->textField($info,'employee_private_mobile',array('size'=>18,'maxlength'=>15,'tabindex'=>27)); ?><span class="status">&nbsp;</span>
               <?php echo $form->error($info,'employee_private_mobile'); ?>
	</div>

	<div class="row-right">
	      <?php echo $form->labelEx($info,'employee_private_email'); ?>
              <?php echo $form->textField($info,'employee_private_email',array('size'=>18,'maxlength'=>60,'tabindex'=>28)); ?><span class="status">&nbsp;</span>
	</div>
</div>
<div class="row">

	<div class="row-left">
	       	 <?php echo $form->labelEx($info,'employee_type'); ?>
              <?php echo $form->dropDownList($info,'employee_type',array(""=>"---------Select---------","1"=>"Teaching","0"=>"Non Teaching"),array('tabindex'=>25)); ?><span class="status">&nbsp;</span>
              <?php echo $form->error($info,'employee_type'); ?>
	</div>
</div>

<div class="row last">
   <?php echo CHtml::button('Save', array('submit' => array('updateTab1'))); ?>
</div>

