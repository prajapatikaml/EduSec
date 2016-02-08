<?php
$this->breadcrumbs=array(
	'Employee List'=>array('admin'),
	'Update Details',
);?>

<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Update Details
 </div>

<div class="profile-tab profile-edit ui-tabs ui-widget ui-widget-content ui-corner-all ui-tabs-collapsible">

<ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
<li class="ui-state-default ui-corner-top ui-tabs-selected ui-state-active">
  <?php echo CHtml::link('Personal Profile', array('updateTab1', 'id'=>$_REQUEST['id'])); ?></li>
<li class="ui-state-default ui-corner-top">
  <?php echo CHtml::link('Gaurdian Info', array('updateprofiletab2', 'id'=>$_REQUEST['id'])); ?></li>
<li class="ui-state-default ui-corner-top">
   <?php echo CHtml::link('Address Info', array('updateprofiletab3', 'id'=>$_REQUEST['id'])); ?></li>
<li class="ui-state-default ui-corner-top">
   <?php echo CHtml::link('Academic Record', array('EmployeeAcademicRecords', 'id'=>$_REQUEST['id'])); ?></li>
<li class="ui-state-default ui-corner-top">
   <?php echo CHtml::link('Document', array('Employeedocs', 'id'=>$_REQUEST['id'])); ?></li>
</ul>

<div class="ui-tabs-panel form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employee-transaction-form',
	'enableAjaxValidation'=>true,
	'focus'=>array($info,'employee_no'),
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

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
	<div class="row-col1">
		<?php echo $form->labelEx($info,'title'); ?>   
		<?php echo $form->dropdownList($info,'title',$info->getTitleOptions(), array('empty' => '-----------Select---------','tabindex'=>10)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($info,'title'); ?>
	</div>
	<div class="row-col2">
		<?php echo $form->labelEx($info,'employee_first_name'); ?>
<?php echo $form->textField($info,'employee_first_name',array('size'=>18,'maxlength'=>25,'tabindex'=>11)); ?><span class="status">&nbsp;</span>
		 <?php echo $form->error($info,'employee_first_name'); ?>
	</div>

	<div class="row-col3">
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
				'value'=>($info->employee_dob!=null)?date("d-m-Y", strtotime($info->employee_dob)):"",
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
	       	 <?php echo $form->labelEx($info,'employee_type'); ?>
              <?php echo $form->dropDownList($info,'employee_type',array("empty"=>"---------Select---------","1"=>"Teaching","0"=>"Non Teaching"),array('tabindex'=>25)); ?><span class="status">&nbsp;</span>
              <?php echo $form->error($info,'employee_type'); ?>
	</div>
	<div class="row-right">
	       	 <?php echo $form->labelEx($lang,'languages_known1'); ?>
              <?php echo $form->dropDownList($lang,'languages_known1', CHtml::listData(Languages::model()->findAll(),'languages_id','languages_name'), array('empty'=>'select','tabindex'=>25)); ?><span class="status">&nbsp;</span>
              <?php echo $form->error($lang,'languages_known1'); ?>
	</div>
</div>
<div class="row last">
	<div class="row-right">
	      <?php echo $form->labelEx($info,'employee_private_email'); ?>
              <?php echo $form->textField($info,'employee_private_email',array('size'=>18,'maxlength'=>60,'tabindex'=>28)); ?><span class="status">&nbsp;</span>
	</div>
	<div class="row-left">
	      <?php echo $form->labelEx($info,'employee_private_mobile'); ?>
               <?php echo $form->textField($info,'employee_private_mobile',array('size'=>18,'maxlength'=>15,'tabindex'=>27)); ?><span class="status">&nbsp;</span>
               <?php echo $form->error($info,'employee_private_mobile'); ?>
	</div>
	
</div>
	<div class="row">
	      <?php echo $form->labelEx($photo,'employee_photos_path'); ?>
	      <?php echo $form->fileField($photo, 'employee_photos_path',array('tabindex'=>1)); ?><span class="status">&nbsp;</span>
	      
   	 </div>

	<div class="row buttons last">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save',array('class'=>'submit')); 
		?>
		<?php echo CHtml::link('Cancel', array('admin'), array('class'=>'btnCan')); ?>
	</div>

<?php $this->endWidget(); ?>
</div>
</div>
</div>
