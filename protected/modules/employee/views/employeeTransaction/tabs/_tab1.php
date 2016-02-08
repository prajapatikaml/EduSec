
<div class="row">
	
	<div class="row-left">
	      <?php echo $form->labelEx($info,'employee_no'); ?> 
              <?php echo $form->textField($info,'employee_no',array('size'=>11,'maxlength'=>10,'tabindex'=>1)); ?><span class="status">&nbsp;</span>
              <?php echo $form->error($info,'employee_no'); ?> 

	</div>
	

	<div class="row-right">
		<?php echo $form->labelEx($info,'employee_name_alias'); ?>
              <?php echo $form->textField($info,'employee_name_alias',array('size'=>18,'maxlength'=>25,'tabindex'=>2)); ?><span class="status">&nbsp;</span>
              <?php echo $form->error($info,'employee_name_alias'); ?>
	</div>
</div>
<div class="row">
	
	<div class="row-left">
	      <?php echo $form->labelEx($info,'employee_aicte_id'); ?> 
              <?php echo $form->textField($info,'employee_aicte_id',array('size'=>11,'maxlength'=>10,'tabindex'=>3)); ?><span class="status">&nbsp;</span>
              <?php echo $form->error($info,'employee_aicte_id'); ?> 

	</div>
	

	<div class="row-right">
		<?php echo $form->labelEx($info,'employee_gtu_id'); ?>
              <?php echo $form->textField($info,'employee_gtu_id',array('size'=>11,'maxlength'=>10,'tabindex'=>4)); ?><span class="status">&nbsp;</span>
              <?php echo $form->error($info,'employee_gtu_id'); ?>
	</div>
</div>
<div class="row">
	<div class="row-left">
		<?php  echo $form->labelEx($info,'employee_joining_date'); ?>
		<?php if(isset($info->employee_joining_date))
			{
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
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
			}
		else
		{
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
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
			'tabindex'=>5,
		    ),
			
		));
		}
	?><span class="status">&nbsp;</span>
		<?php echo $form->error($info,'employee_joining_date'); ?>
	</div>

	<div class="row-right">
	      <?php echo $form->labelEx($info,'employee_probation_period'); ?>
               <?php echo $form->textField($info,'employee_probation_period',array('size'=>18,'maxlength'=>10,'tabindex'=>6)); ?><span class="status">&nbsp;</span>
               <?php echo $form->error($info,'employee_probation_period'); ?>
	</div>
</div>
<div class="row">

	<div class="row-left">
	      <?php echo $form->labelEx($model,'employee_transaction_designation_id'); ?>
	      <?php echo $form->dropDownList($model,'employee_transaction_designation_id',EmployeeDesignation::items(), array('empty' => '-----------Select---------','tabindex'=>7)); ?><span class="status">&nbsp;</span>
	      <?php echo $form->error($model,'employee_transaction_designation_id'); ?>
	</div>

	<div class="row-right">
	      <?php echo $form->labelEx($model,'employee_transaction_department_id'); ?>
	      <?php echo $form->dropDownList($model,'employee_transaction_department_id',Department::items(), array('empty' => '-----------Select---------','tabindex'=>8)); ?><span class="status">&nbsp;</span>
	      <?php echo $form->error($model,'employee_transaction_department_id'); ?>
	</div>
</div>
<div class="row">

	<div class="row-left">
	      <?php echo $form->labelEx($model,'employee_transaction_shift_id'); ?>
	      <?php echo $form->dropDownList($model,'employee_transaction_shift_id',Shift::items(), array('empty' => '-----------Select---------','tabindex'=>9)); ?><span class="status">&nbsp;</span>
	      <?php echo $form->error($model,'employee_transaction_shift_id'); ?>
	</div>
<!--
	<div class="row-right">
	      <?php echo $form->labelEx($model,'employee_transaction_branch_id'); ?>
	      <?php echo $form->dropDownList($model,'employee_transaction_branch_id',Branch::items(), array('empty' => '-----------Select---------','tabindex'=>8)); ?><span class="status">&nbsp;</span>
	      <?php echo $form->error($model,'employee_transaction_branch_id'); ?>
	</div>
</div>-->
<div class="row-right">
		<?php echo $form->labelEx($info,'title'); ?>   
		<?php echo $form->dropdownList($info,'title',$info->getTitleOptions(), array('empty' => '-----------Select---------','tabindex'=>10)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($info,'title'); ?>
</div>
</div>
<div class="row">

	<div class="row-left">
		<?php echo $form->labelEx($info,'employee_first_name'); ?>
<?php echo $form->textField($info,'employee_first_name',array('size'=>18,'maxlength'=>25,'tabindex'=>11)); ?><span class="status">&nbsp;</span>
		 <?php echo $form->error($info,'employee_first_name'); ?>
	</div>

	<div class="row-right">
              <?php echo $form->labelEx($info,'employee_middle_name'); ?>
              <?php echo $form->textField($info,'employee_middle_name',array('size'=>18,'maxlength'=>25,'tabindex'=>12)); ?><span class="status">&nbsp;</span>
	      <?php echo $form->error($info,'employee_middle_name'); ?>
	</div>
</div>
<div class="row">

	<div class="row-left">
             <?php echo $form->labelEx($info,'employee_last_name'); ?>
               <?php echo $form->textField($info,'employee_last_name',array('size'=>18,'maxlength'=>25,'tabindex'=>13)); ?><span class="status">&nbsp;</span>
              <?php echo $form->error($info,'employee_last_name'); ?>
	</div>


	<div class="row-right">
		<?php echo $form->labelEx($info,'employee_mother_name'); ?>
              <?php echo $form->textField($info,'employee_mother_name',array('size'=>18,'maxlength'=>25,'tabindex'=>14)); ?><span class="status">&nbsp;</span>
              <?php echo $form->error($info,'employee_mother_name'); ?>
	</div>
</div>
<div class="row">
	<div class="row-left">
		<?php  echo $form->labelEx($info,'employee_dob'); ?>
		<?php if(isset($info->employee_dob))
			{
			    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
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
			}
		else
		{
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
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
			'tabindex'=>15,
		    ),
			
		));
		}
		?><span class="status">&nbsp;</span>
		<?php echo $form->error($info,'employee_dob'); ?>
	</div>

	<div class="row-right">
		<?php echo $form->labelEx($info,'employee_birthplace'); ?>
              <?php echo $form->textField($info,'employee_birthplace',array('size'=>18,'maxlength'=>25,'tabindex'=>16)); ?><span class="status">&nbsp;</span>
              <?php echo $form->error($info,'employee_birthplace'); ?>
	</div>
</div>
<div class="row">
	<div class="row-left">
	      <?php echo $form->labelEx($info,'employee_gender'); ?>
              <?php echo $form->dropDownList($info,'employee_gender',$info->getGenderOptions(), array('empty' => '-----------Select---------','tabindex'=>17)); ?><span class="status">&nbsp;</span>
              <?php echo $form->error($info,'employee_gender'); ?>
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
              <?php echo $form->dropDownList($info,'employee_marital_status',$info->getMaritialStatus(), array('empty' => '-----------Select---------','tabindex'=>20)); ?><span class="status">&nbsp;</span>
              <?php echo $form->error($info,'employee_marital_status'); ?>
	</div>
</div>
<div class="row">

	<div class="row-left">
	      <?php echo $form->labelEx($model,'employee_transaction_religion_id'); ?>
	      <?php echo $form->dropDownList($model,'employee_transaction_religion_id',Religion::items(), array('empty' => '-----------Select---------','tabindex'=>21)); ?><span class="status">&nbsp;</span>
	      <?php echo $form->error($model,'employee_transaction_religion_id'); ?>
	</div>

	<div class="row-right">
	      <?php echo $form->labelEx($info,'employee_pancard_no'); ?>
               <?php echo $form->textField($info,'employee_pancard_no',array('size'=>18,'maxlength'=>15,'tabindex'=>22)); ?><span class="status">&nbsp;</span>
               <?php echo $form->error($info,'employee_pancard_no'); ?>
	</div>
</div>
<div class="row">

	<div class="row-left">
	      <?php echo $form->labelEx($info,'employee_account_no'); ?>
               <?php echo $form->textField($info,'employee_account_no',array('size'=>18,'maxlength'=>20,'tabindex'=>23)); ?><span class="status">&nbsp;</span>
               <?php echo $form->error($info,'employee_account_no'); ?>
	</div>

	<div class="row-right">
	      <?php echo $form->labelEx($model,'employee_transaction_category_id'); ?>
	      <?php echo $form->dropDownList($model,'employee_transaction_category_id',Category::items(), array('empty' => '-----------Select---------','tabindex'=>24)); ?><span class="status">&nbsp;</span>
	      <?php echo $form->error($model,'employee_transaction_category_id'); ?>
	</div>
</div>
<div class="row">

	<div class="row-left">
	       	 <?php echo $form->labelEx($info,'employee_type'); ?>
              <?php echo $form->dropDownList($info,'employee_type',array(""=>"---------Select---------","1"=>"Teaching","0"=>"Non Teaching"),array('tabindex'=>25)); ?><span class="status">&nbsp;</span>
              <?php echo $form->error($info,'employee_type'); ?>
	</div>

	<div class="row-right">
	      <?php echo $form->labelEx($info,'employee_organization_mobile'); ?>
               <?php echo $form->textField($info,'employee_organization_mobile',array('size'=>18,'maxlength'=>15,'tabindex'=>26)); ?><span class="status">&nbsp;</span>
               <?php echo $form->error($info,'employee_organization_mobile'); ?>

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
	      <?php echo $form->labelEx($photo,'employee_photos_path'); ?>
	      <?php CHtml::form('','post',array('enctype'=>'multipart/form-data')); ?>
	      <?php echo CHtml::activeFileField($photo, 'employee_photos_path',array('tabindex'=>29)); ?><span class="status">&nbsp;</span>
	      <?php CHtml::endForm(); ?>
	      <?php if(isset($photo->employee_photos_path))
			{
				echo CHtml::image(Yii::app()->baseUrl.'/emp_images/'.$photo->employee_photos_path,"",array("width"=>"50px","height"=>"50px"));
			}
		?>

              <?php echo $form->error($info,'employee_private_email'); ?>
	  
</div>
