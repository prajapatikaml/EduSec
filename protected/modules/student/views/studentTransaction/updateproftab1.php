 <!-- chosen -->
	<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl?>/css/chosen/chosen.css">
	
	
	<!-- Bootstrap -->
	<script src="<?php echo Yii::app()->baseUrl; ?>/js/tags/bootstrap.min.js"></script>
    
    <!-- Chosen -->
	<script src="<?php echo Yii::app()->baseUrl; ?>/js/chosen/chosen.jquery.min.js"></script>
    
	<!-- Theme framework -->
	<script src="<?php echo Yii::app()->baseUrl; ?>/js/tags/eakroko.min.js"></script>
<div class="clear-div"></div>
<div class="profile-page-box">
     <div class="page-title-header"><i class="fa fa-plus"></i> Edit Student Profile</div>
	<?php $studInfo = StudentTransaction::model()->findByPk($_REQUEST['id']); 
		$stdpicPath = StudentPhotos::model()->findByPk($studInfo->student_transaction_student_photos_id);
		  $stud_photo=Yii::app()->baseUrl."/college_data/stud_images/".$stdpicPath->student_photos_path;		
		?>
        <!--Profile Tab Start-->

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
                                <li><?php echo CHtml::link('<i class="fa fa-wrench"></i> Edit', array('updateprofiletab1', 'id'=>$_REQUEST['id']), array('class'=>'btn btn-edit', 'id'=>'updateData'));?></li>
                                <li><?php echo CHtml::link('<i class="fa fa-trash-o"></i> Delete', array('delete' ,'id'=>$studInfo->student_transaction_id), array('class'=>'btn btn-delete btnradious-last'));?></li>

                    </ul>
              	</div>
            </div>
            <div class="clear-div"></div>  
        </div>
        <div class="profile-tab-he">                	
        	<ul class="pronav nav-tabs-update">
              <li class="activetab"><a href="<?php echo Yii::app()->createUrl('student/studentTransaction/updateprofiletab1', array('id'=>$_REQUEST['id'])); ?>">Profile</a></li>
              <li><a href="<?php echo Yii::app()->createUrl('student/studentTransaction/updateprofiletab5', array('id'=>$_REQUEST['id'])); ?>">Academic Info</a></li>
              <li><a href="<?php echo Yii::app()->createUrl('student/studentTransaction/updateprofiletab2', array('id'=>$_REQUEST['id'])); ?>">Guardian Info</a></li>
	      <li><a href="<?php echo Yii::app()->createUrl('student/studentTransaction/updateprofiletab4', array('id'=>$_REQUEST['id'])); ?>">Address Info</a></li>
            </ul><div class="clear-div"></div>  
        </div>
        <div id="tab1" class="tab-content active">
            <div class="content-box-border" style="float: left;">
                <div class="content-bg-he">Personal</div>
                <div class="content-bg-inner">
                    <div class="content-bg-inner-one"  style="float: left;">

<div class="ui-tabs-panel form" >

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-transaction-form',
	'enableAjaxValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<?php //echo $form->errorSummary($info); ?>
	<?php
		 echo $form->error($info,'student_enroll_no'); ?>
	<?php 	$stud_roll_no = StudentInfo::model()->findAll();
		if(Yii::app()->controller->action->id=='create'){
			if(empty($stud_roll_no))
			{
				$rollno=$info->student_roll_no=1;
			}
			else
			{
				foreach($stud_roll_no as $s)
				{
					$stud_no=StudentInfo::model()->findByPk($s['student_roll_no']);
					$stud[]=$s['student_roll_no'];
					$rollno=$s['student_roll_no']+1;				
				}			
			}
		}
		else{
			if(!empty($stud_roll_no))
			{		
					$stud_no=StudentInfo::model()->findByAttributes(array('student_info_transaction_id'=>$_REQUEST['id']));
					$rollno=$stud_no->student_roll_no;		
			}
		}		
	?>
	<div class="row">
		<?php //$org_id=Yii::app()->user->getState('org_id'); ?>    
		<div class="row-left">
			<?php echo $form->labelEx($info,'student_roll_no'); ?>   
			<?php echo $form->textField($info,'student_roll_no',array('size'=>13,'readonly'=>'true','value'=>$rollno)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_roll_no'); ?>
		</div>
		<div class="row-right">
		  	<?php echo $form->labelEx($info,'student_adm_date'); 
			?>
			<?php if($info->student_adm_date != '')
				$info->student_adm_date= date('d-m-Y',strtotime($info->student_adm_date));
			
				$this->widget('CustomDatePicker', array(
			    	'model'=>$info, 
				'attribute'=>'student_adm_date',
			    	'options'=>array(
				'dateFormat'=>'dd-mm-yy',
				'changeYear'=>'true',
				'changeMonth'=>'true',
				'showAnim' =>'slide',
				'yearRange'=>'1900:'.(date('Y')+1),
				'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',			
			    	),
				'htmlOptions'=>array(
				'style'=>'vertical-align:top',
				'readonly'=>true,
			    	),
			));
			?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_adm_date'); ?>
		</div>		
	</div>	
		<!--div class="row-right">
			<?php echo $form->labelEx($info,'student_no'); ?>   
			<?php echo $form->textField($info,'student_no',array('size'=>6)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_no'); ?>
		</div-->
	
	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($info,'title'); ?>   
			<?php echo $form->dropdownList($info,'title',$info->getTitleOptions(), array('empty' => 'Select Title')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'title'); ?>

		</div>
		<div class="row-right">
			<?php echo $form->labelEx($info,'student_first_name'); ?>
			<?php echo $form->textField($info,'student_first_name',array('size'=>13,'maxlength'=>25)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_first_name'); ?>  
		</div>
	</div>

	<div class="row">   
    		<div class="row-left">   
			<?php echo $form->labelEx($info,'student_middle_name'); ?>
			<?php echo $form->textField($info,'student_middle_name',array('size'=>13,'maxlength'=>25)); ?><span class="status">&nbsp;</span>        
			<?php echo $form->error($info,'student_middle_name'); ?>      
    		</div>   
		<div class="row-right">   
			<?php echo $form->labelEx($info,'student_last_name'); ?>
			<?php echo $form->textField($info,'student_last_name',array('size'=>13,'maxlength'=>25)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_last_name'); ?>
    		</div>   
	</div>

	<div class="row">   
  
		<div class="row-right">
			<?php echo $form->labelEx($info,'student_gender'); ?>
			<?php echo $form->dropdownList($info,'student_gender',$info->getGenderOptions(), array('empty' => 'Select Gender')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_gender'); ?>
		</div>
		<div class="row-left">
			<?php echo $form->labelEx($info,'student_email_id_1'); ?>
        		<?php echo $form->textField($info,'student_email_id_1', array('size'=>10,'maxlength'=>100)); ?><span class="status">&nbsp;</span><br/><br/><b style="color:red">
 			<?php echo $form->error($info,'student_email_id_1'); ?></b>
		</div>
   	</div>


	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($info,'student_dob'); ?>
			<?php 
				if($info->student_dob != null || $info->student_dob !=0000-00-00)
					$info->student_dob= date('d-m-Y',strtotime($info->student_dob));		
				
				$this->widget('CustomDatePicker', array(
				'model'=>$info, 
				'attribute'=>'student_dob',
				'options'=>array(
				'dateFormat'=>'dd-mm-yy',
				'changeYear'=>'true',
				'changeMonth'=>'true',
				'showAnim' =>'slide',
				'yearRange'=>'1900:'.(date('Y')+1),
				'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',			
				 ),
				'htmlOptions'=>array(
				'style'=>'vertical-align:top',
				'readonly'=>true,
				),));
			?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_dob'); ?>
		</div>
	
		<div class="row-right">

			<?php echo $form->labelEx($model,'student_transaction_nationality_id'); ?>
			<?php echo $form->dropDownList($model,'student_transaction_nationality_id',Nationality::items(), array('empty' => 'Select Nationality')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'student_transaction_nationality_id'); ?>
		</div>
	</div>
	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($info,'student_mobile_no'); ?>   
			<?php echo $form->textField($info,'student_mobile_no',array('size'=>10,'maxlength'=>10)); ?><span class="status">&nbsp;</span><br/><br/><b style="color:red;">
			<?php echo $form->error($info,'student_mobile_no'); ?></b>
		</div>

		<div class="row-right">
	 	  <?php echo $form->labelEx($info,'Emergency Contact Name'); ?>
		   <?php echo $form->textField($info,'emergency_cont_name',array('size'=>13)); ?><span class="status">&nbsp;</span>
		   <?php echo $form->error($info,'emergency_cont_name'); ?>
		</div>
	</div>
	<div class="row">
		<div class="row-left">
				<?php echo $form->labelEx($info,'passport_no'); ?>
				<?php echo $form->textField($info,'passport_no',array('size'=>13,'maxlength'=>20)); ?>
				<?php echo $form->error($info,'passport_no'); ?><span class="status">&nbsp;</span>
		</div>
		<div class="row-right">
		   <?php echo $form->labelEx($info,'Emergency Contact No'); ?>
		   <?php echo $form->textField($info,'emergency_cont_no',array('size'=>13,'maxlength'=>15)); ?><span class="status">&nbsp;</span>
		  <?php echo $form->error($info,'emergency_cont_no'); ?>
		</div>
	</div>
	<div class="row">
		<div class = "row-left">
		<?php echo $form->labelEx($info,'visa_exp_date'); ?>
		<?php if($info->visa_exp_date != '' && $info->visa_exp_date != 0000-00-00)
			$info->visa_exp_date= date('d-m-Y',strtotime($info->visa_exp_date));
			else
			$info->visa_exp_date='';
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		    	'model'=>$info,
			'attribute'=>'visa_exp_date',
		    	'options'=>array(
			'dateFormat'=>'dd-mm-yy',
			'changeYear'=>'true',
			'changeMonth'=>'true',
			'showAnim' =>'slide',
			'yearRange'=> '1910:2020',
		
		    	),
			'htmlOptions'=>array(
			'size'=>13,
		    	),
			));

		?><span class="status">&nbsp;</span>
		<?php echo $form->error($info,'visa_exp_date'); ?>
		</div>
		<div class="row-right">
<table style="width:auto">
<tr>
<td style='max-width: 144px;'>
		<?php
		$data=LanguagesKnown::model()->findAll(array('condition'=>'languages_known_id='.$model->student_transaction_languages_known_id));

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

		echo $form->labelEx($lang,'Languages Known',array('style'=>'width:143px')); 
		echo "</td><td>";
		echo $form->dropDownList($lang, 'languages_known1[]', CHtml::listData(Languages::model()->findAll(), 'languages_name', 'languages_name'), array(
		        'class'=>'chosen-select input-xxlarge',
			'multiple'=>'multiple',
		        'maxlength'=>200,
		        'options' => $langArr,
		
	    ));	
	echo "</td><td><span class=\"status\" style='margin-left:-4px'>&nbsp;</span></td></tr></table>";							
	?>
	<?php echo $form->error($lang,'languages_known1'); ?> 
	</div>
</div>
	<div class="row">
	<div class = "row-left">
		<?php echo $form->labelEx($info,'passport_exp_date'); ?>
		<?php if($info->passport_exp_date != '' && $info->passport_exp_date != 0000-00-00)
			$info->passport_exp_date= date('d-m-Y',strtotime($info->passport_exp_date));
			else
			$info->passport_exp_date='';
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		    	'model'=>$info,
			'attribute'=>'passport_exp_date',
		    	'options'=>array(
			'dateFormat'=>'dd-mm-yy',
			'changeYear'=>'true',
			'changeMonth'=>'true',
			'showAnim' =>'slide',
			'yearRange'=> (date('Y')).':2099',
		
		    	),
			'htmlOptions'=>array(
			'size'=>13,
		    	),
			));

		?><span class="status">&nbsp;</span>
		<?php echo $form->error($info,'passport_exp_date'); ?>
		</div>
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
