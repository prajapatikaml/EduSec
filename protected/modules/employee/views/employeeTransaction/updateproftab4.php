<script>
$(document).ready(function () {
	$('#ckbox').click(function () {
			
		if ($("#ckbox").is(":checked"))
		{
			$('#p_add').hide();
		}
		else
			$('#p_add').show();
	});
	});
</script>
            <div class="clear-div"></div>
            <div class="profile-page-box">
                <!--===============================Page header start============================-->
                <div class="page-title-header"><i class="fa fa-plus"></i> Edit Employee Profile</div>
                <!--===============================Page header end============================-->
		<?php $empInfo = EmployeeTransaction::model()->findByPk($_REQUEST['id']); 
		      $emppicPath = EmployeePhotos::model()->findByPk($empInfo->employee_transaction_emp_photos_id);
			  $emp_photo=Yii::app()->baseUrl."/college_data/emp_images/".$emppicPath->employee_photos_path;		
		?>
                <!--Profile Tab Start-->
                <div class="profile-box-bg">
                	<div class="profilebox-left">
                    	<div class="profile-image-tab">
		<?php  if(Yii::app()->user->checkAccess('EmployeeTransaction.UpdateEmployeeData')  && (Yii::app()->user->getState('emp_id') == $_REQUEST['id']) || Yii::app()->user->checkAccess('EmployeeTransaction.UpdateAllEmployeeData') && $model->employee_status==0)  { ?>
		<a title="Change Picture" href ="<?php echo Yii::app()->baseUrl.'/employee/employeeTransaction/updateprofilephoto?id='.$_REQUEST['id']; ?>">      <?php   } ?>
                            <div class="profile-box-user"><img src="<?php echo $emp_photo;?>" width="200" height="200"></div></a>
                        </div>
                    </div>
                    <div class="profilebox-middle">
                    	<div class="profile-username"><?php echo $empInfo->Rel_Emp_Info->employee_first_name.' '.$empInfo->Rel_Emp_Info->employee_last_name ;?> </div>
                        <div style="color: #1EA076;font-size: 22px;font-family: serif;line-height: 40px;"><i class="fa fa-sort-amount-desc"></i> Department : <?php echo (!empty($empInfo->Rel_Department->department_name) ? $empInfo->Rel_Department->department_name : "Not Set");?></div>
                        <div style="color:#FD5042;font-size: 22px;font-family: serif;line-height: 40px;"><i class="fa fa-users"></i> Designation : <?php echo (!empty($empInfo->Rel_Designation->employee_designation_name) ? $empInfo->Rel_Designation->employee_designation_name : "Not Set");?></div>
			<?php if($empInfo->Rel_Emp_Info->employee_private_mobile != '')  { ?>
                        <div class="phoneno-display" style="color:#448ACC;font-size: 24px;font-family: serif;line-height: 40px;"><i class="fa fa-mobile"></i> <?php echo $empInfo->Rel_Emp_Info->employee_private_mobile; ?></div>
			<?php } ?>
                    </div>
                    <div class="profilebox-right">
                    	<div class="btn-group">
                            <ul class="button-display">
                                <li><?php echo CHtml::link('<i class="fa fa-angle-double-left"></i> Back', array('admin'), array('class'=>'btn btn-default btnradious'));?></li>
                                <li><?php  echo CHtml::link('<i class="fa fa-file-pdf-o"></i> PDF',array('ExportToPDFExcel/EmployeeFinalViewExportToPdf', 'id'=>$_REQUEST['id']),array('id'=>'pdf','class'=>'btn btn-pdf','target'=>'_blank')); ?></li>
                                <!--li><button name="color" type="button" class="btn btn-excel"><i class="fa fa-file-excel-o"></i> Excel</button></li-->
			<?php if(Yii::app()->user->checkAccess('Employee.EmployeeTransaction.Create')) { ?>
                                <li><?php echo CHtml::link('<i class="fa fa-plus-square"></i> Add', array('employeeTransaction/create'), array('class'=>'btn btn-add')); ?></li><?php } ?>
			<?php if(Yii::app()->user->checkAccess('Employee.EmployeeTransaction.Updateprofiletab1')) { ?>
                             
                                <li><?php echo CHtml::link('<i class="fa fa-wrench"></i> Edit', array('updateprofiletab4' ,'id'=>$model->employee_transaction_id), array('class'=>'btn btn-edit', 'id'=>'updateData'));?></li>
			<?php }
			 if(Yii::app()->user->checkAccess('Employee.EmployeeTransaction.Delete')) { ?>
                                <li><?php echo CHtml::link('<i class="fa fa-trash-o"></i> Delete', array('delete' ,'id'=>$empInfo->employee_transaction_id), array('class'=>'btn btn-delete btnradious-last'));?></li>
				<?php } ?>
                            </ul>
                      	</div>
                    </div>
                    <div class="clear-div"></div>  
                </div>
                <div class="profile-tab-he">                	
                	<ul class="pronav nav-tabs-update">
                      <li><a href="<?php echo Yii::app()->createUrl('employee/employeeTransaction/updateprofiletab1', array('id'=>$_REQUEST['id'])); ?>">Profile</a></li>
              <li><a href="<?php echo Yii::app()->createUrl('employee/employeeTransaction/updateprofiletab2', array('id'=>$_REQUEST['id'])); ?>">Guirdian Info</a></li>
              <li><a href="<?php echo Yii::app()->createUrl('employee/employeeTransaction/updateprofiletab3', array('id'=>$_REQUEST['id'])); ?>">Other Info</a></li>
	      <li class="activetab"><a href="<?php echo Yii::app()->createUrl('employee/employeeTransaction/updateprofiletab4', array('id'=>$_REQUEST['id'])); ?>">Address Info</a></li>
                    </ul><div class="clear-div"></div>  
                </div>
                <div id="tab1" class="tab-content active">
                    <div class="content-box-border" style="float: left;">
                        <div class="content-bg-he">Address Info</div>
                        <div class="content-bg-inner">
                            <div class="content-bg-inner-one"  style="float: left;">
<div class="ui-tabs-panel form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employee-transaction-form',
	'enableAjaxValidation'=>true,
	'focus'=>array($address,'employee_address_c_line1'),
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>
<p style="padding:0px 5px 5px 0px;color:#00C0EF;font-weight:bold;font-family: 'Source Sans Pro', sans-serif;border-bottom:2px solid #FF503F">Local Address</p>
	<div class="row">
		 <?php echo $form->labelEx($address,'employee_address_c_line1'); ?>
		 <?php echo $form->textField($address,'employee_address_c_line1',array('size'=>59,'style'=>'width:auto')); ?><span class="status">&nbsp;</span>
		 <?php echo $form->error($address,'employee_address_c_line1'); ?>
	</div>

	   
	<div class="row">
		 <?php echo $form->labelEx($address,'employee_address_c_line2'); ?>
		 <?php echo $form->textField($address,'employee_address_c_line2',array('size'=>59,'style'=>'width:auto')); ?><span class="status">&nbsp;</span>
		 <?php echo $form->error($address,'employee_address_c_line2'); ?>
	</div>
	<div class="row">

		<div class="row-right">
		 <?php echo $form->labelEx($address,'employee_address_c_country'); ?>
		 <?php
			echo $form->dropDownList($address,'employee_address_c_country' ,Country::items(),
				array(
				'prompt' => 'Select Country',
				'ajax' => array(
				'type'=>'POST', 
				'url'=>CController::createUrl('dependent/UpdateEmpCStates'), 
				'update'=>'#EmployeeAddress_employee_address_c_state', //selector to update
			
				))); 
		 ?><span class="status">&nbsp;</span>
		 <?php echo $form->error($address,'employee_address_c_country'); ?>
	   	</div>

		<div class="row-left">
		 <?php echo $form->labelEx($address,'employee_address_c_state'); ?>
		 <?php 
				if(!empty($address->employee_address_c_state) && !empty($address->employee_address_c_country) ) {

				echo $form->dropDownList($address,'employee_address_c_state', CHtml::listData(State::model()->findAll(array('condition'=>'country_id='.$address->employee_address_c_country)), 'state_id', 'state_name'),
				array(
				'prompt' => 'Select State',
				'ajax' => array(
				'type'=>'POST', 
				'url'=>CController::createUrl('dependent/UpdateEmpCCities'), 
				'update'=>'#EmployeeAddress_employee_address_c_city', //selector to update
			
				))); }
				else	{
				echo $form->dropDownList($address,'employee_address_c_state',array(),
				array(
				'prompt' => 'Select State',
				'ajax' => array(
				'type'=>'POST', 
				'url'=>CController::createUrl('dependent/UpdateEmpCCities'), 
				'update'=>'#EmployeeAddress_employee_address_c_city', //selector to update
			
				))); } ?><span class="status">&nbsp;</span>
		 <?php echo $form->error($address,'employee_address_c_state'); ?>
	   	</div>
	</div>

	<div class="row">

		<div class="row-left">
		<?php echo $form->labelEx($address,'employee_address_c_city'); ?>
		<?php 
		
			if(!empty($address->employee_address_c_city) && !empty($address->employee_address_c_state))
			echo $form->dropDownList($address,'employee_address_c_city', CHtml::listData(City::model()->findAll(array('condition'=>'state_id='.$address->employee_address_c_state)), 'city_id', 'city_name'));
			else

			echo $form->dropDownList($address,'employee_address_c_city',array(),array('empty' => 'Select City')); ?><span class="status">&nbsp;</span>


		 <?php echo $form->error($address,'employee_address_c_city'); ?>
	   	</div>

		<div class="row-right">
		 <?php echo $form->labelEx($address,'employee_address_c_pincode'); ?>
		 <?php echo $form->textField($address,'employee_address_c_pincode',array('size'=>13)); ?><span class="status">&nbsp;</span>
		 <?php echo $form->error($address,'employee_address_c_pincode'); ?>
	   	</div>

	</div>
	<div class="row">
		<div class="row-left">
				<?php echo $form->labelEx($address,'employee_address_c_mobile'); ?>
				<?php echo $form->textField($address,'employee_address_c_mobile',array('size'=>10,'maxlength'=>10)); ?><span class="status">&nbsp;</span>
				<?php echo $form->error($address,'employee_address_c_mobile'); ?>
		</div>
		<div class="row-right">
				<?php echo $form->labelEx($address,'employee_address_c_phone'); ?>
				<?php echo $form->textField($address,'employee_address_c_phone',array('size'=>10,'maxlength'=>15)); ?><span class="status">&nbsp;</span>
				<?php echo $form->error($address,'employee_address_c_phone'); ?>
		</div>
	</div>
	<div class="row">	
		<div class="row-right">
				<?php echo $form->labelEx($address,'employee_c_house_no'); ?>
				<?php echo $form->textField($address,'employee_c_house_no',array('size'=>10,'maxlength'=>20)); ?><span class="status">&nbsp;</span>
				<?php echo $form->error($address,'employee_c_house_no'); ?>
		</div>
	</div>
<p style="padding:0px 5px 5px 0px;color:#00C0EF;font-weight:bold;font-family: 'Source Sans Pro', sans-serif;border-bottom:2px solid #FF503F">International Address</p>
	<div class="row">
		 <?php echo $form->labelEx($address,'employee_address_p_line1'); ?>
		 <?php echo $form->textField($address,'employee_address_p_line1',array('size'=>59,'style'=>'width:auto')); ?><span class="status">&nbsp;</span>
		 <?php echo $form->error($address,'employee_address_p_line1'); ?>
	</div>

	   
	<div class="row">
		 <?php echo $form->labelEx($address,'employee_address_p_line2'); ?>
		 <?php echo $form->textField($address,'employee_address_p_line2',array('size'=>59,'style'=>'width:auto')); ?><span class="status">&nbsp;</span>
		 <?php echo $form->error($address,'employee_address_p_line2'); ?>
	</div>

	<!--div class="row">

		<div class="row-left">
		 <?php //echo $form->labelEx($address,'employee_address_p_taluka'); ?>
		 <?php //echo $form->textField($address,'employee_address_p_taluka',array('size'=>13)); ?><span class="status">&nbsp;</span>
		 <?php //echo $form->error($address,'employee_address_p_taluka'); ?>
	   	</div>

		<div class="row-right">
		 <?php //echo $form->labelEx($address,'employee_address_p_district'); ?>
		 <?php //echo $form->textField($address,'employee_address_p_district',array('size'=>13)); ?><span class="status">&nbsp;</span>
		 <?php //echo $form->error($address,'employee_address_p_district'); ?>
	   	</div>

	</div-->
  
	<div class="row">

		 <div class="row-right">
		 <?php echo $form->labelEx($address,'employee_address_p_country'); ?>
		 <?php echo $form->dropDownList($address,'employee_address_p_country' ,Country::items(),
				array(
				'prompt' => 'Select Country',
				'ajax' => array(
				'type'=>'POST', 
				'url'=>CController::createUrl('dependent/UpdateEmpPStates'), 
				'update'=>'#EmployeeAddress_employee_address_p_state', //selector to update
			
				))); 
		 ?><span class="status">&nbsp;</span>
		 <?php echo $form->error($address,'employee_address_p_country'); ?>
	   	 </div>
		 
		 <div class="row-left">
		 <?php echo $form->labelEx($address,'employee_address_p_state'); ?>
		 <?php 
				
				if(!empty($address->employee_address_p_state) && !empty($address->employee_address_p_country) ) {
				echo $form->dropDownList($address,'employee_address_p_state', CHtml::listData(State::model()->findAll(array('condition'=>'country_id='.$address->employee_address_p_country)), 'state_id', 'state_name'),
				array(
				'prompt' => 'Select State',
				'ajax' => array(
				'type'=>'POST', 
				'url'=>CController::createUrl('dependent/UpdateEmpPCities'), 
				'update'=>'#EmployeeAddress_employee_address_p_city', //selector to update
			
				)));
				}
				else
				{			
				echo $form->dropDownList($address,'employee_address_p_state',array(),
				array(
				'prompt' => 'Select State',
				'ajax' => array(
				'type'=>'POST', 
				'url'=>CController::createUrl('dependent/UpdateEmpPCities'), 
				'update'=>'#EmployeeAddress_employee_address_p_city', //selector to update
			
				)));?><span class="status">&nbsp;</span>
		 <?php echo $form->error($address,'employee_address_p_state'); } ?>
	   	 </div>

	   
	</div>
	 
	<div class="row">
		<div class="row-left">
		<?php echo $form->labelEx($address,'employee_address_p_city'); ?>
		<?php 
		
			if(!empty($address->employee_address_p_city) && !empty($address->employee_address_p_state))
			{
			echo $form->dropDownList($address,'employee_address_p_city', CHtml::listData(City::model()->findAll(array('condition'=>'state_id='.$address->employee_address_p_state)), 'city_id', 'city_name'));
			}
			else
			{
			echo $form->dropDownList($address,'employee_address_p_city', array(), array('empty' => 'Select City')); } ?><span class="status">&nbsp;</span>
		 <?php echo $form->error($address,'employee_address_p_city'); ?>
	   	</div>



		<div class="row-right">
		 <?php echo $form->labelEx($address,'employee_address_p_pincode'); ?>
		 <?php echo $form->textField($address,'employee_address_p_pincode',array('size'=>13)); ?><span class="status">&nbsp;</span>
		 <?php echo $form->error($address,'employee_address_p_pincode'); ?>
		</div>

	</div>
	<div class="row">
		<div class="row-left">
				<?php echo $form->labelEx($address,'employee_address_p_mobile'); ?>
				<?php echo $form->textField($address,'employee_address_p_mobile',array('size'=>10,'maxlength'=>10)); ?><span class="status">&nbsp;</span>
				<?php echo $form->error($address,'employee_address_p_mobile'); ?>
		</div>
		<div class="row-right">
				<?php echo $form->labelEx($address,'employee_address_p_phone'); ?>
				<?php echo $form->textField($address,'employee_address_p_phone',array('size'=>10,'maxlength'=>15)); ?><span class="status">&nbsp;</span>
				<?php echo $form->error($address,'employee_address_p_phone'); ?>
		</div>
	</div>
	<div class="row">	
		<div class="row-right">
				<?php echo $form->labelEx($address,'employee_p_house_no'); ?>
				<?php echo $form->textField($address,'employee_p_house_no',array('size'=>10,'maxlength'=>20)); ?><span class="status">&nbsp;</span>
				<?php echo $form->error($address,'employee_p_house_no'); ?>
		</div>
	</div>
</div>
	<?php  if(Yii::app()->user->checkAccess('EmployeeTransaction.UpdateEmployeeData')  && (Yii::app()->user->getState('emp_id') == $_REQUEST['id']) || Yii::app()->user->checkAccess('EmployeeTransaction.UpdateAllEmployeeData') && $model->employee_status==0) { ?>
	<div class="row buttons last">
		<?php echo CHtml::submitButton('Save',array('class'=>'submit')); ?>
		<?php echo CHtml::link('Cancel', array('employeeTransaction/update','id'=>$_REQUEST['id']), array('class'=>'btnCan')); ?>

        </div>
	<?php  } ?>
<?php $this->endWidget(); ?>

                </div>
            </div>
        </div> 
    </div>             
</div>
