<?php
$this->breadcrumbs=array(
	'Profile',
);?>
<div id="menulink">
	<div id="studentlogo">
	<?php
		if($model->Rel_Photos->student_photos_path != null)
			echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/college_data/stud_images/'.$photo->student_photos_path,"",array("width"=>"176px","height"=>"178px")),array('/college_data/stud_images/'.$photo->student_photos_path),array('id'=>'photo'))."</br></br>";
		if(Yii::app()->user->checkAccess('StudentTransaction.UpdateStudentData') || Yii::app()->user->checkAccess('StudentTransaction.*')) 
		{
			 echo CHtml::link('Edit',array('updateprofilephoto','id'=>$model->student_transaction_id),array('id'=>'photoid','title'=>'Update Photo','style'=>'padding-right:50px;'));
		}
		 $config = array( 
					'scrolling' => 'no',
					'autoDimensions' => false,
					'width' => 'auto',
					'height' => 'auto', 
				 //   'titleShow' => false,
				       'overlayColor' => '#000',
				       'padding' => '0',
				       'showCloseButton' => true,			
				       'onClose' => function() {
						return window.location.reload();
					},

				// change this as you need
				);
				$this->widget('application.extensions.fancybox.EFancyBox', array('target'=>'#photo', 'config'=>$config));
		?>
	</div> <?php //end of student logo div?>

	</br>
		<div id="divlink1" class="info-link">
			<?php echo CHtml::link('Personal Info',array('studentTransaction/updateprofiletab1', 'id'=>$model->student_transaction_id),array('title'=>'Personal Info','style'=>'text-decoration:none;color:white;'));?>
		</div>
		<div id="divlink2" class="info-link">
			<?php echo CHtml::link('Guardian Info',array('studentTransaction/updateprofiletab2', 'id'=>$model->student_transaction_id),array('title'=>'Guardian Info','style'=>'text-decoration:none;color:white;'));?>
		</div>
		<div id="divlink3" class="info-link">
			<?php echo CHtml::link('Other Info',array('studentTransaction/updateprofiletab3', 'id'=>$model->student_transaction_id),array('title'=>'Other Info','style'=>'text-decoration:none;color:white;'));?>
		</div>
		<div id="divlink4" class="info-link">
			<?php echo CHtml::link('Address Info',array('studentTransaction/updateprofiletab4', 'id'=>$model->student_transaction_id),array('title'=>'Address Info','style'=>'text-decoration:none;color:white;'));?>
		</div>

		<div id="divlink5" class="info-link">
			<?php echo CHtml::link('Documents',array('studentTransaction/studentdocs', 'id'=>$model->student_transaction_id),array('title'=>'Documents','style'=>'text-decoration:none;color:white;'));?>
		</div>
		<div id="divlink7" class="info-link">
			<?php echo CHtml::link('Course Details',array('/report/courseDetails', 'id'=>$model->student_transaction_id),array('title'=>'Current Semester Subjects List','style'=>'text-decoration:none;color:white;'));?>
		</div>
	</div>

</div>
	
	
<div class="form profile-wrapper">
<?php
$n = Yii::app()->controller->action->id;
$check_user = User::model()->findByPk(Yii::app()->user->id);

if($check_user->user_type=='student' && Yii::app()->user->getState('stud_id')!=$_REQUEST['id'])
{
	$this->redirect(array('studentTransaction/error'));
}
else
{
switch ($n)
{
   case 'updateprofiletab1':
       echo $this->renderPartial('updateproftab1', array('model'=>$model,'info'=>$info));
   break;

   case 'updateprofiletab2':
       echo $this->renderPartial('updateproftab2', array('model'=>$model,'info'=>$info,'parent'=>$parent));
   break;

   case 'updateprofiletab3':
       echo $this->renderPartial('updateproftab3', array('model'=>$model,'info'=>$info,'lang'=>$lang,'user'=>$user)); 
   break;

   case 'updateprofiletab4':
       echo $this->renderPartial('updateproftab4', array('address'=>$address));
   break;

   case 'studentcertificate':
       echo $this->renderPartial('/studentCertificateDetailsTable/studentcertificate', array('studentcertificate'=>$studentcertificate));
   break;

   case 'studentdocs':
       echo $this->renderPartial('/studentDocsTrans/studentdocstrans', array('studentdocstrans'=>$studentdocstrans));
   break;


   default:
      echo $this->renderPartial('profile_form', array('model'=>$model,'info'=>$info,'photo'=>$photo,'address'=>$address,'lang'=>$lang,'parent'=>$parent));
}

}

	
?>


</div>

