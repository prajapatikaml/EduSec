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
			<a title="Change Picture" href ="<?php echo Yii::app()->baseUrl.'/employee/employeeTransaction/updateprofilephoto?id='.$_REQUEST['id']; ?>"> <?php    }?>
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
                                <li><?php echo CHtml::link('<i class="fa fa-wrench"></i> Edit', array('updateprofiletab1' ,'id'=>$model->employee_transaction_id), array('class'=>'btn btn-edit', 'id'=>'updateData'));?></li>
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
                      <li class="activetab"><a href="<?php echo Yii::app()->createUrl('employee/employeeTransaction/updateprofiletab1', array('id'=>$_REQUEST['id'])); ?>">Profile</a></li>
              <li><a href="<?php echo Yii::app()->createUrl('employee/employeeTransaction/updateprofiletab2', array('id'=>$_REQUEST['id'])); ?>">Guirdian Info</a></li>
              <li><a href="<?php echo Yii::app()->createUrl('employee/employeeTransaction/updateprofiletab3', array('id'=>$_REQUEST['id'])); ?>">Other Info</a></li>
	      <li><a href="<?php echo Yii::app()->createUrl('employee/employeeTransaction/updateprofiletab4', array('id'=>$_REQUEST['id'])); ?>">Address Info</a></li>
                    </ul><div class="clear-div"></div>  
                </div>
                <div id="tab1" class="tab-content active">
                    <div class="content-box-border" style="float: left;">
                        <div class="content-bg-he">Profile</div>
                        <div class="content-bg-inner">
                            <div class="content-bg-inner-one"  style="float: left;">
<div class="ui-tabs-panel form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employee-transaction-form',
	'enableAjaxValidation'=>true,
	'focus'=>array($info,'employee_no'),
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>
<?php
$emp_roll_no = EmployeeInfo::model()->findAll();
		if(Yii::app()->controller->action->id=='create'){
		if(empty($emp_roll_no))
		{
			$empno=$info->employee_unique_id=1;
		}
		else
		{
			foreach($emp_roll_no as $e)
			{
				$emp_no=EmployeeInfo::model()->findByPk($e['employee_unique_id']);
                    		$emp[]=$e['employee_unique_id'];
				$empno=$e['employee_unique_id']+1;
			}			
		}
	}
	else
	{
		if(!empty($emp_roll_no))
			{
			     $emp_no = EmployeeInfo::model()->findByAttributes(array('employee_info_transaction_id'=>$_REQUEST['id']));		
			   $empno=$emp_no->employee_unique_id;
									
				}			
	} 		
?>
	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($info,'employee_unique_id'); ?>   
			<?php echo $form->textField($info,'employee_unique_id',array('size'=>6,'readonly'=>'true','value'=>$empno)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'employee_unique_id'); ?>
		</div>
		<div class="row-right">
			<?php echo $form->labelEx($info,'employee_no'); ?>   
			<?php echo $form->textField($info,'employee_no',array('size'=>13)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'employee_no'); ?>
		</div>
		
	</div>
	<div class="row">
		<!--div class="row-left">
		      <?php //echo $form->labelEx($info,'employee_aicte_id'); ?> 
		      <?php //echo $form->textField($info,'employee_aicte_id',array('size'=>13)); ?><span class="status">&nbsp;</span>
		      <?php //echo $form->error($info,'employee_aicte_id'); ?> 

		</div-->
		<div class="row-left">
			<?php echo $form->labelEx($info,'employee_name_alias'); ?>
		      <?php echo $form->textField($info,'employee_name_alias',array('size'=>13)); ?><span class="status">&nbsp;</span>
		      <?php echo $form->error($info,'employee_name_alias'); ?>
		</div>
		<div class="row-right">
			<?php $info->employee_joining_date= date('d-m-Y',strtotime($info->employee_joining_date));?>
			<?php  echo $form->labelEx($info,'employee_joining_date'); ?>
			<?php $this->widget('CustomDatePicker', array(
		    'model'=>$info, 
		    'attribute'=>'employee_joining_date',
		    'options'=>array(
			'dateFormat'=>'dd-mm-yy',
			'changeYear'=>'true',
			'changeMonth'=>'true',
			'showAnim' =>'slide',
			'yearRange'=>'1900:'.(date('Y')+1),
			'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',			
		    ),
			'htmlOptions'=>array(
			'size'=>13,
			'readonly'=>true,
		    ),
			
		));
		?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'employee_joining_date'); ?>
		</div>
	</div>
	<!--div class="row">
		

		<!--div class="row-right">
			<?php //echo $form->labelEx($info,'employee_gtu_id'); ?>
		      <?php //echo $form->textField($info,'employee_gtu_id',array('size'=>13)); ?><span class="status">&nbsp;</span>
		      <?php //echo $form->error($info,'employee_gtu_id'); ?>
		</div>
	</div-->
	<div class="row">
		<div class="row-left">
		      <?php echo $form->labelEx($model,'employee_transaction_designation_id'); ?>
		      <?php echo $form->dropDownList($model,'employee_transaction_designation_id',EmployeeDesignation::items(), array('empty' => 'Select Designation')); ?><span class="status">&nbsp;</span>
		      <?php echo $form->error($model,'employee_transaction_designation_id'); ?>
		</div>
		<div class="row-right">
		      <?php echo $form->labelEx($info,'employee_probation_period'); ?>
		       <?php echo $form->textField($info,'employee_probation_period',array('size'=>13)); ?><span class="status">&nbsp;</span>
		       <?php echo $form->error($info,'employee_probation_period'); ?>
		</div>
	</div>
	<div class="row">
		<div class="row-left">
		      <?php echo $form->labelEx($model,'employee_transaction_department_id'); ?>
		      <?php echo $form->dropDownList($model,'employee_transaction_department_id',Department::items(), array('empty' => 'Select Department')); ?><span class="status">&nbsp;</span>
		      <?php echo $form->error($model,'employee_transaction_department_id'); ?>
		</div>
		<div class="row-right">
			<?php echo $form->labelEx($info,'title'); ?>   
			<?php echo $form->dropdownList($info,'title',$info->getTitleOptions(), array('empty' => 'Select Title')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'title'); ?>
		</div>
	</div>
	<div class="row">
		
		<div class="row-left">
			<?php echo $form->labelEx($info,'employee_first_name'); ?>
	<?php echo $form->textField($info,'employee_first_name',array('size'=>13)); ?><span class="status">&nbsp;</span>
			 <?php echo $form->error($info,'employee_first_name'); ?>
		</div>
		<div class="row-right">
		      <?php echo $form->labelEx($info,'employee_middle_name'); ?>
		      <?php echo $form->textField($info,'employee_middle_name',array('size'=>13)); ?><span class="status">&nbsp;</span>
		      <?php echo $form->error($info,'employee_middle_name'); ?>
		</div>
	</div>
	<div class="row">

		<div class="row-left">
		     <?php echo $form->labelEx($info,'employee_last_name'); ?>
		       <?php echo $form->textField($info,'employee_last_name',array('size'=>13)); ?><span class="status">&nbsp;</span>
		      <?php echo $form->error($info,'employee_last_name'); ?>
		</div>
		<div class="row-right">
		      <?php echo $form->labelEx($info,'employee_mother_name'); ?>
		      <?php echo $form->textField($info,'employee_mother_name',array('size'=>13)); ?><span class="status">&nbsp;</span>
		      <?php echo $form->error($info,'employee_mother_name'); ?>
		</div>
	</div>
	<div class="row">
		
		<div class="row-left">
			<?php	if($info->employee_dob)
				$info->employee_dob= date('d-m-Y',strtotime($info->employee_dob));?>
			<?php  echo $form->labelEx($info,'employee_dob'); ?>
			<?php $this->widget('CustomDatePicker', array(
		    'model'=>$info, 
		    'attribute'=>'employee_dob',
		    'options'=>array(
			'dateFormat'=>'dd-mm-yy',
			'changeYear'=>'true',
			'changeMonth'=>'true',
			'showAnim' =>'slide',
			'yearRange'=>'1900:'.(date('Y')+1),
			'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',			
		    ),
			'htmlOptions'=>array(
			'size'=>13,
			'readonly'=>true,
		    ),
			
		));
			?><span class="status">&nbsp;</span>
			<br/><br/><b style="color:red;"><?php echo $form->error($info,'employee_dob'); ?></b>
		</div>
		<div class="row-right">
			<?php echo $form->labelEx($info,'employee_birthplace'); ?>
		        <?php echo $form->textField($info,'employee_birthplace',array('size'=>13)); ?><span class="status">&nbsp;</span>
		        <?php echo $form->error($info,'employee_birthplace'); ?>
		</div>
	</div>
	<div class="row">
		<div class="row-left">
		      <?php echo $form->labelEx($info,'employee_gender'); ?>
		      <?php echo $form->dropDownList($info,'employee_gender',$info->getGenderOptions(), array('empty' => 'Select Gender')); ?><span class="status">&nbsp;</span>
		      <?php echo $form->error($info,'employee_gender'); ?>
		</div>
		
		<div class="row-right">
			<?php echo $form->labelEx($info,'employee_bloodgroup'); ?>
		        <?php echo $form->dropDownList($info,'employee_bloodgroup',$info->getBloodGroup(), array('empty' => 'Select Blood Group')); ?><span class="status">&nbsp;</span>
		        <?php echo $form->error($info,'employee_bloodgroup'); ?>
		</div>
	</div>
	<div class="row">
		<div class="row-left">
		      <?php echo $form->labelEx($model,'employee_transaction_nationality_id'); ?>
		      <?php echo $form->dropDownList($model,'employee_transaction_nationality_id',Nationality::items(), array('empty' => 'Select Nationality')); ?><span class="status">&nbsp;</span>
		      <?php echo $form->error($model,'employee_transaction_nationality_id'); ?>
		</div>
		<!--div class="row-right">
		       <?php //echo $form->labelEx($info,'employee_pancard_no'); ?>
		       <?php //echo $form->textField($info,'employee_pancard_no',array('size'=>13)); ?><span class="status">&nbsp;</span>
		       <?php //echo $form->error($info,'employee_pancard_no'); ?>
		</div-->
		<div class="row-right">
		       	 <?php echo $form->labelEx($info,'employee_type'); ?>
		         <?php echo $form->dropDownList($info,'employee_type',array(""=>"Select Type","1"=>"Teaching","0"=>"Non Teaching")); ?><span class="status">&nbsp;</span>
		         <?php echo $form->error($info,'employee_type'); ?>
		</div>
	</div>
	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($info,'employee_marital_status'); ?>
		        <?php echo $form->dropDownList($info,'employee_marital_status',$info->getMaritialStatus(), array('empty' => 'Select Marital Status')); ?><span class="status">&nbsp;</span>
		        <?php echo $form->error($info,'employee_marital_status'); ?>
		</div>
		<div class="row-right">
		       <?php echo $form->labelEx($info,'employee_private_mobile'); ?>
		       <?php echo $form->textField($info,'employee_private_mobile',array('size'=>13)); ?><span class="status">&nbsp;</span>
		    <br/><br/><b style="color:red;"><?php echo $form->error($info,'employee_private_mobile'); ?></b>
		</div>
		
		
	</div>
	<div class="row">

		<div class="row-left">
		       <?php echo $form->labelEx($info,'employee_account_no'); ?>
		       <?php echo $form->textField($info,'employee_account_no',array('size'=>13)); ?><span class="status">&nbsp;</span>
		       <?php echo $form->error($info,'employee_account_no'); ?>
		</div>
		<div class="row-right">
		       <?php echo $form->labelEx($info,'employee_organization_mobile'); ?>
		       <?php echo $form->textField($info,'employee_organization_mobile',array('size'=>13)); ?><span class="status">&nbsp;</span>
		    <br><br><b style="color:red">   <?php echo $form->error($info,'employee_organization_mobile'); ?></b>

		</div>
		
	</div>
	<div class="row">
		
		<div class="row-left">
		      <?php echo $form->labelEx($info,'employee_private_email'); ?>
		      <?php echo $form->textField($info,'employee_private_email',array('size'=>13)); ?><span class="status">&nbsp;</span>
		      <?php echo $form->error($info,'employee_private_email'); ?>
		</div>
	</div>
</div>
	<?php  if(Yii::app()->user->checkAccess('EmployeeTransaction.UpdateEmployeeData')  && (Yii::app()->user->getState('emp_id') == $_REQUEST['id']) || Yii::app()->user->checkAccess('EmployeeTransaction.UpdateAllEmployeeData') && $model->employee_status==0)  { ?>

	<div class="row buttons last">
		<?php echo CHtml::submitButton('Save',array('class'=>'submit')); ?>
		<?php echo CHtml::link('Cancel', array('employeeTransaction/update','id'=>$_REQUEST['id']), array('class'=>'btnCan')); ?>

        </div>
	<?php } ?>
<?php $this->endWidget(); ?>

                </div>
            </div>
        </div> 
    </div>             
</div>
