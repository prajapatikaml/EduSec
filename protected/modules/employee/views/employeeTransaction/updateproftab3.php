 <!-- chosen -->
	<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl?>/css/chosen/chosen.css">
	
	
	<!-- Bootstrap -->
	<script src="<?php echo Yii::app()->baseUrl?>/js/tags/bootstrap.min.js"></script>
    
    <!-- Chosen -->
	<script src="<?php echo Yii::app()->baseUrl?>/js/chosen/chosen.jquery.min.js"></script>
    
	<!-- Theme framework -->
	<script src="<?php echo Yii::app()->baseUrl?>/js/tags/eakroko.min.js"></script>            
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
			<a title="Change Picture" href ="<?php echo Yii::app()->baseUrl.'/employee/employeeTransaction/updateprofilephoto?id='.$_REQUEST['id']; ?>">    <?php  }?>
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
                            
                                <li><?php echo CHtml::link('<i class="fa fa-wrench"></i> Edit', array('updateprofiletab3' ,'id'=>$model->employee_transaction_id), array('class'=>'btn btn-edit', 'id'=>'updateData'));?></li>
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
              <li class="activetab"><a href="<?php echo Yii::app()->createUrl('employee/employeeTransaction/updateprofiletab3', array('id'=>$_REQUEST['id'])); ?>">Other Info</a></li>
	      <li><a href="<?php echo Yii::app()->createUrl('employee/employeeTransaction/updateprofiletab4', array('id'=>$_REQUEST['id'])); ?>">Address Info</a></li>
                    </ul><div class="clear-div"></div>  
                </div>
                <div id="tab1" class="tab-content active">
                    <div class="content-box-border" style="float: left;">
                        <div class="content-bg-he">Other Info</div>
                        <div class="content-bg-inner">
                            <div class="content-bg-inner-one"  style="float: left;">
<div class="ui-tabs-panel form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employee-transaction-form',
	'enableAjaxValidation'=>true,
	'focus'=>array($info,'employee_attendance_card_id'),
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>
	<div class="row">
	      <div class="row-left">
	       <?php echo $form->labelEx($info,'employee_attendance_card_id'); ?>
               <?php echo $form->textField($info,'employee_attendance_card_id',array('size'=>15)); ?><span class="status">&nbsp;</span>
               <?php echo $form->error($info,'employee_attendance_card_id'); ?>
	      </div>

	       <div class="row-right">
		       <?php echo $form->labelEx($info,'employee_curricular'); ?>
		       <?php echo $form->textArea($info,'employee_curricular',array('rows'=>2, 'cols'=>21,'style'=>'float:left')); ?><span class="status">&nbsp;</span>
		       <?php echo $form->error($info,'employee_curricular'); ?>
		      </div>
	</div>
		       
	<div class="row">
		     <div class="row-left">
		       <?php echo $form->labelEx($info,'employee_technical_skills'); ?>
		       <?php echo $form->textArea($info,'employee_technical_skills',array('rows'=>2, 'cols'=>21,'style'=>'float:left')); ?><span class="status">&nbsp;</span>
		       <?php echo $form->error($info,'employee_technical_skills'); ?>
		      </div>

		      <div class="row-right">
		       <?php echo $form->labelEx($info,'employee_project_details'); ?>
		       <?php echo $form->textArea($info,'employee_project_details',array('rows'=>2, 'cols'=>21,'style'=>'float:left'));?><span class="status">&nbsp;</span>
		       <?php echo $form->error($info,'employee_project_details'); ?>
		      </div>

	</div>
	
	<div class="row">
	<div class="row-left">
	<?php
	$data=LanguagesKnown::model()->findAll(array('condition'=>'languages_known_id='.$model->employee_transaction_languages_known_id));

	foreach($data as $d=>$row)
	{
		 $langss=$row['languages_known1'];
	}

	$langArr = array();
	$as=explode(',',$langss);

	foreach($as as $ai)
	{
	  $langArr[$ai] =  array('selected'=>true);
	}
	echo "<table>
		<tr>
		<td style='max-width: 144px;'>";
    echo $form->labelEx($lang,'Languages Known'); 
	echo "</td><td>";
    echo $form->dropDownList(
    $lang,
    'languages_known1[]',
    CHtml::listData(Languages::model()->findAll(), 'languages_name', 'languages_name'),
    array(
                'class'=>'chosen-select input-xxlarge',
		'multiple'=>'multiple',
                'maxlength'=>200,
                'options' => $langArr,
		
    )
);
	echo "</td><td><span class=\"status\" style='margin-left:-4px'>&nbsp;</span></td></tr></table>";							
?>
	<?php echo $form->error($lang,'languages_known1'); ?> 
</div>
	      
		      <div class="row-right">
		       <?php echo $form->labelEx($info,'employee_hobbies'); ?>
		       <?php echo $form->textArea($info,'employee_hobbies',array('rows'=>2, 'cols'=>21,'style'=>'float:left')); ?><span class="status">&nbsp;</span>
		       <?php echo $form->error($info,'employee_hobbies'); ?>
		      </div>
	</div>
		
	<div class="row">
		      <div class="row-left">
		       <?php echo $form->labelEx($info,'employee_reference'); ?>
		       <?php echo $form->textField($info,'employee_reference',array('size'=>13)); ?><span class="status">&nbsp;</span>
		       <?php echo $form->error($info,'employee_reference'); ?>
		      </div>

		      <div class="row-right">
		       <?php echo $form->labelEx($info,'employee_refer_designation'); ?>
		       <?php echo $form->textField($info,'employee_refer_designation',array('size'=>13)); ?><span class="status">&nbsp;</span>
		       <?php echo $form->error($info,'employee_refer_designation'); ?>
		      </div>
	</div>
	<div class="row">
     
		      <div class="row-right">
		       <?php echo $form->labelEx($info,'employee_pf_id'); ?>
		       <?php echo $form->textField($info,'employee_pf_id',array('size'=>13)); ?><span class="status">&nbsp;</span>
		       <?php echo $form->error($info,'employee_pf_id'); ?>
	     	      </div>
		     
      </div>
</div>
	<?php  if(Yii::app()->user->checkAccess('EmployeeTransaction.UpdateEmployeeData')  && (Yii::app()->user->getState('emp_id') == $_REQUEST['id']) || Yii::app()->user->checkAccess('EmployeeTransaction.UpdateAllEmployeeData') && $model->employee_status==0) { ?>
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
