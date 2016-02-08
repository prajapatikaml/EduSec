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
                                <li><?php echo CHtml::link('<i class="fa fa-wrench"></i> Edit', array('updateprofiletab2', 'id'=>$_REQUEST['id']), array('class'=>'btn btn-edit', 'id'=>'updateData'));?></li>
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
      <li class="activetab"><a href="<?php echo Yii::app()->createUrl('student/studentTransaction/updateprofiletab2', array('id'=>$_REQUEST['id'])); ?>">Guardian Info</a></li>
      <li><a href="<?php echo Yii::app()->createUrl('student/studentTransaction/updateprofiletab4', array('id'=>$_REQUEST['id'])); ?>">Address Info</a></li>
    </ul><div class="clear-div"></div>  
</div>

<div id="tab1" class="tab-content active">
    <div class="content-box-border" style="float: left;">
        <div class="content-bg-he">Guardian Info</div>
        <div class="content-bg-inner">
            <div class="content-bg-inner-one" style="float: left;">

<div class="ui-tabs-panel form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-transaction-form',
	'enableAjaxValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($info,'student_guardian_name'); ?>
			<?php echo $form->textField($info,'student_guardian_name',array('size'=>13,'maxlength'=>100)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_guardian_name'); ?>
		</div>
	
		<div class="row-right">
			<?php echo $form->labelEx($info,'student_guardian_relation'); ?>
			<?php echo $form->textField($info,'student_guardian_relation',array('size'=>13,'maxlength'=>20)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_guardian_relation'); ?>
		</div>
	</div>

	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($info,'student_guardian_qualification'); ?>
			<?php echo $form->textField($info,'student_guardian_qualification',array('size'=>13,'maxlength'=>50)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_guardian_qualification'); ?>
		</div>

		<div class="row-right">
			<?php echo $form->labelEx($info,'student_guardian_occupation'); ?>
			<?php echo $form->textField($info,'student_guardian_occupation',array('size'=>13,'maxlength'=>50)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_guardian_occupation'); ?>
		</div>
  
	</div>

	<div class="row">
		<div class="row-left">        
			<?php echo $form->labelEx($info,'student_guardian_income'); ?>
			<?php echo $form->textField($info,'student_guardian_income',array('size'=>13,'maxlength'=>15)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_guardian_income'); ?>
		</div>      
	</div>
	<div class="row">
		<?php if($model->student_transaction_parent_id != 0) 
			   $parent->parent_user_name = ParentLogin::model()->findByPk($model->student_transaction_parent_id)->parent_user_name;
		?>
		<?php if (isset(Yii::app()->modules['parents'])) { ?>
		<?php echo $form->labelEx($parent,'parent_user_name'); ?>
		<?php echo $form->textField($parent,'parent_user_name',array('size'=>59,'maxlength'=>60)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($parent,'parent_user_name'); ?>
	</div>
		<?php } ?>

	<div class="row">
		<?php echo $form->labelEx($info,'student_guardian_occupation_address'); ?>
		<?php echo $form->textArea($info,'student_guardian_occupation_address',array('size'=>59,'maxlength'=>100,'style'=>'width:500px;height:80px;margin-bottom:15px')); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($info,'student_guardian_occupation_address'); ?>
	</div>

	<div class="row">
        	<?php echo $form->labelEx($info,'student_guardian_home_address'); ?>
        	<?php echo $form->textArea($info,'student_guardian_home_address',array('size'=>59,'maxlength'=>100,'style'=>'width:500px;height:80px;margin-bottom:15px')); ?><span class="status">&nbsp;</span>
        	<?php echo $form->error($info,'student_guardian_home_address'); ?>
	</div>

	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($info,'student_guardian_occupation_city'); ?>
			<?php echo $form->dropdownList($info,'student_guardian_occupation_city', City::items(), array('empty' => 'Select City')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_guardian_occupation_city'); ?>
		</div>
		<div class="row-right">
			<?php echo $form->labelEx($info,'student_guardian_city_pin'); ?>
			<?php echo $form->textField($info,'student_guardian_city_pin',array('size'=>13,'maxlength'=>6)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_guardian_city_pin'); ?>
		</div>
    	</div>

    	<div class="row last">
		<div class="row-left">
			<?php echo $form->labelEx($info,'student_guardian_phoneno'); ?>
			<?php echo $form->textField($info,'student_guardian_phoneno',array('size'=>13,'maxlength'=>15)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_guardian_phoneno'); ?>
		</div>
		<div class="row-right">
			<?php echo $form->labelEx($info,'student_guardian_mobile'); ?>
			<?php echo $form->textField($info,'student_guardian_mobile',array('size'=>10,'maxlength'=>10)); ?><span class="status">&nbsp;</span><br/><br/><b style="color:red">
			<?php echo $form->error($info,'student_guardian_mobile'); ?></b>
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
