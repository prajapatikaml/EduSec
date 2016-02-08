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
		<a title="Change Picture" href ="<?php echo Yii::app()->baseUrl.'/employee/employeeTransaction/updateprofilephoto?id='.$_REQUEST['id']; ?>">   <?php   } ?>
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
                                <li><?php echo CHtml::link('<i class="fa fa-wrench"></i> Edit', array('updateprofiletab2' ,'id'=>$model->employee_transaction_id), array('class'=>'btn btn-edit', 'id'=>'updateData'));?></li>
			<?php }
			 if(Yii::app()->user->checkAccess('Employee.EmployeeTransaction.Delete')) { ?>
                                <li><?php echo CHtml::link('<i class="fa fa-trash-o"></i> Delete', array('delete' ,'id'=>$empInfo->employee_transaction_id), array('class'=>'btn btn-delete btnradious-last'));?></li>
		<?php   } ?>                     
		       </ul>
                      	</div>
                    </div>
                    <div class="clear-div"></div>  
                </div>
                <div class="profile-tab-he">                	
                	<ul class="pronav nav-tabs-update">
                      <li><a href="<?php echo Yii::app()->createUrl('employee/employeeTransaction/updateprofiletab1', array('id'=>$_REQUEST['id'])); ?>">Profile</a></li>
              <li class="activetab"><a href="<?php echo Yii::app()->createUrl('employee/employeeTransaction/updateprofiletab2', array('id'=>$_REQUEST['id'])); ?>">Guirdian Info</a></li>
              <li><a href="<?php echo Yii::app()->createUrl('employee/employeeTransaction/updateprofiletab3', array('id'=>$_REQUEST['id'])); ?>">Other Info</a></li>
	      <li><a href="<?php echo Yii::app()->createUrl('employee/employeeTransaction/updateprofiletab4', array('id'=>$_REQUEST['id'])); ?>">Address Info</a></li>
                    </ul><div class="clear-div"></div>  
                </div>
                <div id="tab1" class="tab-content active">
                    <div class="content-box-border" style="float: left;">
                        <div class="content-bg-he">Guirdian Info</div>
                        <div class="content-bg-inner">
                            <div class="content-bg-inner-one"  style="float: left;">
<div class="ui-tabs-panel form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employee-transaction-form',
	'enableAjaxValidation'=>true,
	'focus'=>array($info,'employee_guardian_name'),
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	 <div class="row">
	     <div class="row-left">
	      <?php echo $form->labelEx($info,'employee_guardian_name'); ?>
              <?php echo $form->textField($info,'employee_guardian_name',array('size'=>13)); ?><span class="status">&nbsp;</span>
              <?php echo $form->error($info,'employee_guardian_name'); ?>
	     </div>

             <div class="row-right">
	      <?php echo $form->labelEx($info,'employee_guardian_relation'); ?>
              <?php echo $form->textField($info,'employee_guardian_relation',array('size'=>13)); ?><span class="status">&nbsp;</span>
              <?php echo $form->error($info,'employee_guardian_relation'); ?>
	     </div>
	</div>
	<div class="row">
		       <div class="row-left">
		      <?php echo $form->labelEx($info,'employee_guardian_qualification'); ?>
		      <?php echo $form->textField($info,'employee_guardian_qualification',array('size'=>13)); ?><span class="status">&nbsp;</span>
		      <?php echo $form->error($info,'employee_guardian_qualification'); ?>
		      </div>
		      <div class="row-right">
		      <?php echo $form->labelEx($info,'employee_guardian_occupation'); ?>
		      <?php echo $form->textField($info,'employee_guardian_occupation',array('size'=>13)); ?><span class="status">&nbsp;</span>
		      <?php echo $form->error($info,'employee_guardian_occupation'); ?>
		      </div>
	</div>



	<div class="row">

		       <div class="row-left">
		      <?php echo $form->labelEx($info,'employee_guardian_phone_no'); ?>
		      <?php echo $form->textField($info,'employee_guardian_phone_no',array('size'=>13)); ?><span class="status">&nbsp;</span>
		      <?php echo $form->error($info,'employee_guardian_phone_no'); ?>
		     </div>

		       <div class="row-right">
		      <?php echo $form->labelEx($info,'employee_guardian_income'); ?>
		      <?php echo $form->textField($info,'employee_guardian_income',array('size'=>13)); ?><span class="status">&nbsp;</span>
		      <?php echo $form->error($info,'employee_guardian_income'); ?>
		      </div>
	</div>

	
	<div class="row">
		     <div class="row-left">           
		      <?php echo $form->labelEx($info,'employee_guardian_mobile1'); ?>
		      <?php echo $form->textField($info,'employee_guardian_mobile1',array('size'=>13)); ?><span class="status">&nbsp;</span>
		     <br/><br/><b style="color:red;"> <?php echo $form->error($info,'employee_guardian_mobile1'); ?></b>
		     </div>


		     <div class="row-right">
		      <?php echo $form->labelEx($info,'employee_guardian_mobile2'); ?>
		      <?php echo $form->textField($info,'employee_guardian_mobile2',array('size'=>13)); ?><span class="status">&nbsp;</span>
		     <br/><br/><b style="color:red;"> <?php echo $form->error($info,'employee_guardian_mobile2'); ?></b>
		     </div>
	</div>

	<div class="row">
		      <?php echo $form->labelEx($info,'employee_guardian_home_address'); ?>
		      <?php echo $form->textField($info,'employee_guardian_home_address',array('size'=>59,'style'=>'width:auto')); ?><span class="status">&nbsp;</span>
		      <?php echo $form->error($info,'employee_guardian_home_address'); ?>
	</div>

	<div class="row">
		      <?php echo $form->labelEx($info,'employee_guardian_occupation_address'); ?>
		      <?php echo $form->textField($info,'employee_guardian_occupation_address',array('size'=>59,'style'=>'width:auto')); ?><span class="status">&nbsp;</span>
		      <?php echo $form->error($info,'employee_guardian_occupation_address'); ?>
	</div>
	
	<div class="row">

		     <div class="row-left">
		      <?php echo $form->labelEx($info,'employee_guardian_occupation_city'); ?>
		      <?php echo $form->dropDownList($info,'employee_guardian_occupation_city', City::items(), array('empty' => 'Select City')); ?><span class="status">&nbsp;</span>
		      <?php echo $form->error($info,'employee_guardian_occupation_city'); ?>
		     </div>


		     <div class="row-right">
		      <?php echo $form->labelEx($info,'employee_guardian_city_pin'); ?>
		      <?php echo $form->textField($info,'employee_guardian_city_pin',array('size'=>13)); ?><span class="status">&nbsp;</span>
		      <?php echo $form->error($info,'employee_guardian_city_pin'); ?>
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
