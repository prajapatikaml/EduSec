<div class="clear-div"></div>
<div class="profile-page-box">     
        <div class="page-title-header"><i class="fa fa-plus"></i> Edit Student Profile</div>
        
	<?php $studInfo = StudentTransaction::model()->findByPk($_REQUEST['id']); 
		$stdpicPath = StudentPhotos::model()->findByPk($studInfo->student_transaction_student_photos_id);
		  $stud_photo=Yii::app()->baseUrl."/college_data/stud_images/".$stdpicPath->student_photos_path;		
	?>
        <div class="profile-box-bg">
             <div class="profilebox-left">
            	<div class="profile-image-tab">
                    <a title="Change Picture" href ="<?php echo Yii::app()->baseUrl.'/student/studentTransaction/updateprofilephoto?id='.$_REQUEST['id']; ?>">
                            <div class="profile-box-user"><img src="<?php echo $stud_photo;?>" width="200" height="200"></div></a>
                </div>
            </div>

            <div class="profilebox-middle">
            	<div class="profile-username"><?php echo $studInfo->Rel_Stud_Info->student_first_name.' '.$studInfo->Rel_Stud_Info->student_last_name ;?> </div>
                <div style="color:#1EA076;font-size: 22px;font-family: serif;line-height: 40px;"><i class="fa fa-graduation-cap"></i> Course : <?php echo (!empty($studInfo->Rel_course->course_name) ? $studInfo->Rel_course->course_name : "Not Set");?></div>
                        <div style="color:#FD5042;font-size: 22px;font-family: serif;line-height: 40px;"><i class="fa fa-sitemap"></i> Batch : <?php echo (!empty($studInfo->Rel_Batch->batch_name) ? $studInfo->Rel_Batch->batch_name : "Not Set");?></div>
		<?php if($studInfo->Rel_Stud_Info->student_mobile_no != '')  { ?>
                <div class="phoneno-display" style="color:#448ACC;font-size: 24px;font-family: serif;line-height: 40px;"><i class="fa fa-mobile"></i> <?php echo $studInfo->Rel_Stud_Info->student_mobile_no; ?></div>
		<?php } ?>
            </div>

            <div class="profilebox-right">
            	<div class="btn-group">
                    <ul class="button-display">
                        <li><?php echo CHtml::link('<i class="fa fa-angle-double-left"></i> Back', array('admin'), array('class'=>'btn btn-default btnradious'));?></li>
                                <li><?php  echo CHtml::link('<i class="fa fa-file-pdf-o"></i> PDF',array('ExportToPDFExcel/StudentFinalViewExportToPdf', 'id'=>$_REQUEST['id']),array('id'=>'pdf','class'=>'btn btn-pdf','target'=>'_blank')); ?><!--button name="PDF" type="button" class="btn btn-pdf"><i class="fa fa-file-pdf-o"></i> PDF</button--></li>
                                <!--li><button name="color" type="button" class="btn btn-excel"><i class="fa fa-file-excel-o"></i> Excel</button></li-->
                                <li><?php echo CHtml::link('<i class="fa fa-plus-square"></i> Add', array('studentTransaction/create'), array('class'=>'btn btn-add')); ?></li>
                                <li><?php echo CHtml::link('<i class="fa fa-wrench"></i> Edit', array('updateprofiletab4', 'id'=>$_REQUEST['id']), array('class'=>'btn btn-edit', 'id'=>'updateData'));?></li>
                                <li><?php echo CHtml::link('<i class="fa fa-trash-o"></i> Delete', array('delete' ,'id'=>$studInfo->student_transaction_id), array('class'=>'btn btn-delete btnradious-last'));?></li>

                    </ul>
              	</div>
            </div>
            <div class="clear-div"></div>  
          </div>


        <div class="profile-tab-he">                	
        	<ul class="pronav nav-tabs-update">
              <li><a href="<?php echo Yii::app()->createUrl('student/studentTransaction/updateprofiletab1', array('id'=>$_REQUEST['id'])); ?>">Profile</a></li>
              <li><a href="<?php echo Yii::app()->createUrl('student/studentTransaction/updateprofiletab5', array('id'=>$_REQUEST['id'])); ?>">Academic Info</a></li>
              <li><a href="<?php echo Yii::app()->createUrl('student/studentTransaction/updateprofiletab2', array('id'=>$_REQUEST['id'])); ?>">Guardian Info</a></li>
	      <li class="activetab"><a href="<?php echo Yii::app()->createUrl('student/studentTransaction/updateprofiletab4', array('id'=>$_REQUEST['id'])); ?>">Address Info</a></li>
            </ul><div class="clear-div"></div>  
        </div>
        <div id="tab1" class="tab-content active">
            <div class="content-box-border" style="float: left;">
                <div class="content-bg-he">Address Info</div>
                <div class="content-bg-inner">
                    <div class="content-bg-inner-one" style="float: left;">
<div class="ui-tabs-panel form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-transaction-form',
	'enableAjaxValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

<!--<span style="float: left; margin-left: 15px; margin-bottom: 10px; font-family: 'Open Sans',sans-serif ! important; font-weight: bold;">Local Address :</span> -->
<p style="padding:0px 5px 5px 0px;color:#00C0EF;font-weight:bold;font-family: 'Source Sans Pro', sans-serif;border-bottom:2px solid #FF503F">Local Address</p>
	<div class="row">
		<?php echo $form->labelEx($address,'student_address_c_line1'); ?>
		<?php echo $form->textField($address,'student_address_c_line1',array('size'=>60,'style'=>'width:auto')); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($address,'student_address_c_line1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($address,'student_address_c_line2'); ?>
		<?php echo $form->textField($address,'student_address_c_line2',array('size'=>60,'style'=>'width:auto')); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($address,'student_address_c_line2'); ?>
	</div>

	<div class="row">
		<div class="row-right">
			<?php echo $form->labelEx($address,'student_address_c_country'); ?>
			<?php echo $form->dropDownList($address,'student_address_c_country' ,Country::items(),
					array(
					'prompt' => 'Select Country',
					'ajax' => array(
					'type'=>'POST', 
					'url'=>CController::createUrl('dependent/UpdateStudCStates'), 
					'update'=>'#StudentAddress_student_address_c_state', //selector to update
			
					))); 
			?><span class="status">&nbsp;</span>
			<?php echo $form->error($address,'student_address_c_country'); ?>
		</div>
		<div class="row-left">
			<?php echo $form->labelEx($address,'student_address_c_state'); ?>
			<?php 
				if($address->student_address_c_state!=null  && $address->student_address_c_country!=null)
				echo $form->dropDownList($address,'student_address_c_state', CHtml::listData(State::model()->findAll(array('condition'=>'country_id='.$address->student_address_c_country)), 'state_id', 'state_name'),
				array(
				'prompt' => 'Select State',
				'ajax' => array(
				'type'=>'POST', 
				'url'=>CController::createUrl('dependent/UpdateStudCCities'), 
				'update'=>'#StudentAddress_student_address_c_city', //selector to update
			
				)));
				else	
				echo $form->dropDownList($address,'student_address_c_state',array(),
				array(
				'prompt' => 'Select State',
				'ajax' => array(
				'type'=>'POST', 
				'url'=>CController::createUrl('dependent/UpdateStudCCities'), 
				'update'=>'#StudentAddress_student_address_c_city', //selector to update
			
				)));?><span class="status">&nbsp;</span>
			<?php echo $form->error($address,'student_address_c_state'); ?>
		</div>
	</div>

	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($address,'student_address_c_city'); ?>
			<?php 	
				if($address->student_address_c_city!=null && $address->student_address_c_state!=null)
					echo $form->dropDownList($address,'student_address_c_city', CHtml::listData(City::model()->findAll(array('condition'=>'state_id='.$address->student_address_c_state)), 'city_id', 'city_name'),array('prompt'=>'Select State'));
				else
					echo $form->dropDownList($address,'student_address_c_city',array(), array('empty' => 'Select City')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($address,'student_address_c_city'); ?>
		</div>
		<div class="row-right">
			<?php echo $form->labelEx($address,'student_address_c_pin'); ?>
			<?php echo $form->textField($address,'student_address_c_pin',array('size'=>13,'maxlength'=>6)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($address,'student_address_c_pin'); ?>
		</div>
	</div>
	<div class="row">
			<div class="row-left">
			<?php echo $form->labelEx($address,'student_address_c_mobile'); ?>
			<?php echo $form->textField($address,'student_address_c_mobile',array('size'=>10,'maxlength'=>10)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($address,'student_address_c_mobile'); ?>
		</div>
	<div class="row-right">
			<?php echo $form->labelEx($address,'student_address_c_phone'); ?>
			<?php echo $form->textField($address,'student_address_c_phone',array('size'=>10,'maxlength'=>15)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($address,'student_address_c_phone'); ?>
		</div>
	</div>
	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($address,'student_c_house_no'); ?>
			<?php echo $form->textField($address,'student_c_house_no',array('size'=>10,'maxlength'=>10)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($address,'student_c_house_no'); ?>
		</div>
	</div>
<!-- <span style="float: left; margin-left: 15px; margin-bottom: 10px; font-family: 'Open Sans',sans-serif ! important; font-weight: bold;">International Address :</span> -->
<p style="padding:5px 5px 5px 0px;color:#00C0EF;font-weight:bold;font-family: 'Source Sans Pro', sans-serif;border-bottom:2px solid #FF503F">International Address</p>	<div class="row">
		<?php echo $form->labelEx($address,'student_address_p_line1'); ?>
		<?php echo $form->textField($address,'student_address_p_line1',array('size'=>60,'style'=>'width:auto')); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($address,'student_address_p_line1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($address,'student_address_p_line2'); ?>
		<?php echo $form->textField($address,'student_address_p_line2',array('size'=>60,'style'=>'width:auto')); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($address,'student_address_p_line2'); ?>
	</div>

	<div class="row">
		<div class="row-right">
			<?php echo $form->labelEx($address,'student_address_p_country'); ?>
			<?php 
				echo $form->dropDownList($address,'student_address_p_country',Country::items(), 				array(
					'prompt' => 'Select Country',
					'ajax' => array(
					'type'=>'POST', 
					'url'=>CController::createUrl('dependent/UpdateStudPStates'), 
					'update'=>'#StudentAddress_student_address_p_state', //selector to update
			
					))); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($address,'student_address_p_country'); ?>
		</div>

		<div class="row-left">
			<?php echo $form->labelEx($address,'student_address_p_state'); ?>
			<?php 
				if(!empty($address->student_address_p_state)  && !empty($address->student_address_p_country))
				echo $form->dropDownList($address,'student_address_p_state', CHtml::listData(State::model()->findAll(array('condition'=>'country_id='.$address->student_address_p_country)), 'state_id', 'state_name'),
				array(
				'prompt' => 'Select State',
				'ajax' => array(
				'type'=>'POST', 
				'url'=>CController::createUrl('dependent/UpdateStudPCities'), 
				'update'=>'#StudentAddress_student_address_p_city', //selector to update
			
				)));
			else
				echo $form->dropDownList($address,'student_address_p_state',array(), 		
			array(
			'prompt' => 'Select State',
			'ajax' => array(
			'type'=>'POST', 
			'url'=>CController::createUrl('dependent/UpdateStudPCities'), 
			'update'=>'#StudentAddress_student_address_p_city', //selector to update
			))); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($address,'student_address_p_state'); ?>
		</div>
	</div>

	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($address,'student_address_p_city'); ?>
			<?php 
				if(!empty($address->student_address_p_city) && !empty($address->student_address_p_state))
				echo $form->dropDownList($address,'student_address_p_city', CHtml::listData(City::model()->findAll(array('condition'=>'state_id='.$address->student_address_p_state)), 'city_id', 'city_name'),array('prompt'=>'Select State'));
				else
				echo $form->dropDownList($address,'student_address_p_city',array(), array('empty' => 'Select City')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($address,'student_address_p_city'); ?>
		</div>
		<div class="row-right">
			<?php echo $form->labelEx($address,'student_address_p_pin'); ?>
			<?php echo $form->textField($address,'student_address_p_pin',array('size'=>13,'maxlength'=>6)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($address,'student_address_p_pin'); ?>
		</div>
	</div>

	<!--div class="row last">
		<div class="row-left">
			<?php // echo $form->labelEx($address,'student_c_address_phone'); ?>
			<?php //echo $form->textField($address,'student_c_address_phone',array('size'=>13,'maxlength'=>15)); ?><span class="status">&nbsp;</span>
			<?php //echo $form->error($address,'student_c_address_phone'); ?>
		</div>	
		<div class="row-right">
			<?php // echo $form->labelEx($address,'student_c_address_mobile'); ?>
			<?php //echo $form->textField($address,'student_c_address_mobile',array('size'=>10,'maxlength'=>10)); ?><span class="status">&nbsp;</span>
			<?php //echo $form->error($address,'student_c_address_mobile'); ?>
		</div>

	</div-->
<div class="row">
	<div class="row-left">
			<?php echo $form->labelEx($address,'student_address_p_mobile'); ?>
			<?php echo $form->textField($address,'student_address_p_mobile',array('size'=>10,'maxlength'=>10)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($address,'student_address_p_mobile'); ?>
	</div>
	<div class="row-right">
			<?php echo $form->labelEx($address,'student_address_p_phone'); ?>
			<?php echo $form->textField($address,'student_address_p_phone',array('size'=>10,'maxlength'=>15)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($address,'student_address_p_phone'); ?>
	</div>
</div>
<div class="row">	
	<div class="row-right">
			<?php echo $form->labelEx($address,'student_p_house_no'); ?>
			<?php echo $form->textField($address,'student_p_house_no',array('size'=>10,'maxlength'=>10)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($address,'student_p_house_no'); ?>
	</div>
</div>
	<div class="form5">
		<?php echo ('&nbsp;'); ?>
	</div>
</div>
	<div class="row buttons last">
		<?php
		if(Yii::app()->user->checkAccess('StudentTransaction.UpdateStudentData')  && (Yii::app()->user->getState('stud_id') == $_REQUEST['id']) || Yii::app()->user->checkAccess('StudentTransaction.UpdateAllStudentData'))
		 echo CHtml::submitButton('Save', array('class'=>'submit')); ?>
	
		<?php echo CHtml::link('Cancel', array('update','id'=>$_REQUEST['id']), array('class'=>'btnCan')); ?>
   	</div>

<?php  $this->endWidget(); ?>
                </div>
            </div>
        </div> 
    </div>             
</div>
