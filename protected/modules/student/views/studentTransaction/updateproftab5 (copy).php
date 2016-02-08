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
                    <div class="profile-box-user"><img src="<?php echo $stud_photo;?>" width="200" height="200"></div>
                </div>
            </div>
            
	    <div class="profilebox-middle">
            	<div class="profile-username"><?php echo $studInfo->Rel_Stud_Info->student_first_name.' '.$studInfo->Rel_Stud_Info->student_last_name ;?> </div>
                <div class="email-display"><i class="fa fa-envelope"></i> <a href="mailto:pramila@edu.com"><?php echo $studInfo->Rel_Stud_Info->student_email_id_1 ;?></a></div>
		<?php if($studInfo->Rel_Stud_Info->student_mobile_no != '')  { ?>
                <div class="phoneno-display"><i class="fa fa-mobile"></i> <?php echo $studInfo->Rel_Stud_Info->student_mobile_no; ?></div>
		<?php } ?>
            </div>

            <div class="profilebox-right">
            	<div class="btn-group">
                    <ul class="button-display">
                        <li><?php echo CHtml::link('<i class="fa fa-angle-double-left"></i> Back', array('admin'), array('class'=>'btn btn-default btnradious'));?></li>
                        <li><button name="PDF" type="button" class="btn btn-pdf"><i class="fa fa-file-pdf-o"></i> PDF</button></li>
                        <li><button name="color" type="button" class="btn btn-excel"><i class="fa fa-file-excel-o"></i> Excel</button></li>
                        <li><button name="Excel" type="button" class="btn btn-add"><i class="fa fa-plus-square"></i> Add</button></li>
                        <li><?php echo CHtml::link('<i class="fa fa-wrench"></i> Edit', array('updateprofiletab1', 'id'=>$_REQUEST['id']), array('class'=>'btn btn-edit'));?></li>
                        <li><button name="Delete" type="button" class="btn btn-delete btnradious-last"><i class="fa fa-trash-o"></i> Delete</button></li>
                    </ul>
              	</div>
            </div>
            <div class="clear-div"></div>  
        </div>

        <div class="profile-tab-he">                	
        	<ul class="pronav nav-tabs-update">
              <li><a href="<?php echo Yii::app()->createUrl('student/studentTransaction/updateprofiletab1', array('id'=>$_REQUEST['id'])); ?>">Profile</a></li>
              <li class="activetab"><a href="<?php echo Yii::app()->createUrl('student/studentTransaction/updateprofiletab5', array('id'=>$_REQUEST['id'])); ?>">Academic Info</a></li>
              <li><a href="<?php echo Yii::app()->createUrl('student/studentTransaction/updateprofiletab2', array('id'=>$_REQUEST['id'])); ?>">Guardian Info</a></li>
	      <li><a href="<?php echo Yii::app()->createUrl('student/studentTransaction/updateprofiletab4', array('id'=>$_REQUEST['id'])); ?>">Address Info</a></li>
            </ul><div class="clear-div"></div>  
        </div>

        <div id="tab1" class="tab-content active">
            <div class="content-box-border" style="float: left;">
                <div class="content-bg-he">Academic Info</div>
                <div class="content-bg-inner">
                    <div class="content-bg-inner-one" style="float: left;">

<div class="ui-tabs-panel form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-transaction-form',
	'enableAjaxValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<?php 
		$stud_roll_no = StudentInfo::model()->findAll();
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
			{		foreach($stud_roll_no as $s)
				{
					$stud_no=StudentInfo::model()->findByPk($s['student_roll_no']);
					$stud[]=$s['student_roll_no'];
					$rollno=$s['student_roll_no'];				
				}			
			}
		}		
	?>
	<div class="row">
		  
		<div class="row-left">
			<?php echo $form->labelEx($info,'student_roll_no'); ?>   
			<?php echo $form->textField($info,'student_roll_no',array('size'=>13,'readonly'=>'true','value'=>$rollno)); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_roll_no'); ?>
		</div>		
		
	<?php
			$acd = Yii::app()->db->createCommand()
				->select('*')
				->from('academic_term')
				->where('current_sem=1')
				->queryAll();
			$acdterm=CHtml::listData($acd,'academic_term_id','academic_term_name');
			$period=array();
			if(!empty($acdterm))	
			{
			$pe_data = AcademicTermPeriod::model()->findByPk($acd[0]['academic_term_period_id']);
			$period[$pe_data->academic_terms_period_id] = $pe_data->academic_term_period; 
			}
			else
			{	
				$period='';
			}
		?>
		<div class="row-right">
		<?php //print_r($period); ?>
			<?php echo $form->labelEx($model,'academic_term_period_id'); ?>
			<?php echo $form->dropDownList($model,'academic_term_period_id',$period,array('prompt' => 'Select Year'));?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'academic_term_period_id'); ?>
		</div>	
	</div>
	<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($model,'course_id'); ?>
			<?php
				echo $form->dropDownList($model,'course_id',
					CHtml::listData(Course::model()->findAll(),'course_id','course_name'),
					array(
					'prompt' => 'Select Course',
					'ajax' => array(
					'type'=>'POST', 
					'url'=>CController::createUrl('dependent/getSem'), 
					'update'=>'#StudentTransaction_academic_term_id', //selector to update
					)));
				 	?><span class="status">&nbsp;</span>

			
			<?php echo $form->error($model,'course_id'); ?>
		</div>	

	<?php
			/*$acd = Yii::app()->db->createCommand()
				->select('*')
				->from('academic_term')
				->where('current_sem=1 ORDER BY academic_term_name ASC')
				->queryAll();
			$acdterm=CHtml::listData($acd,'academic_term_id','academic_term_name');	
			$pe_data = AcademicTermPeriod::model()->findByPk($acd[0]['academic_term_period_id']);
			$period[$pe_data->academic_terms_period_id] = $pe_data->academic_term_period; 
	*/	?>
	
		<!--div class="row-right">
			<?php //echo $form->labelEx($model,'academic_term_id'); ?>
			<?php /* echo $form->dropDownList($model,'academic_term_id',CHtml::listData(AcademicTerm::model()->findAll('course_id='.$model->course_id),'academic_term_id','academic_term_name'),array(
					'prompt' => 'Select Semester',
					'ajax' => array(
					'type'=>'POST', 
					'url'=>CController::createUrl('dependent/getBatch'), 
					'update'=>'#StudentTransaction_student_transaction_batch_id', //selector to update
					))); */ ?>

			
			<span class="status">&nbsp;</span>
			<?php //echo $form->error($model,'academic_term_id'); ?>

			
		</div-->
		<div class="row-right">
		<?php echo $form->labelEx($model,'student_transaction_batch_id'); ?>
		<?php //echo $model->academic_term_id." ".$model->course_id;
	 		if(!empty($model->student_transaction_batch_id))
			  echo $form->dropDownList($model,'student_transaction_batch_id',CHtml::listData(Batch::model()->findAll('academic_term_id ='. $model->academic_term_id.' OR course_id='.$model->course_id),'batch_id','batch_name'),array('prompt'=>"Select Batch"));
	 		else	
	 		  echo $form->dropDownList($model,'student_transaction_batch_id',array(), array('prompt' => 'Select Batch')); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'student_transaction_batch_id'); ?>
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
    </div>               
</div>

