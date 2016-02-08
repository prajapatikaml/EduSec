<?php
$this->layout='//layouts/personal-profile';
$this->breadcrumbs=array(
	'Profile',
);?>
<div id="menulink">
	<div id="studentlogo">
	<?php
		if($model->Rel_Photos->student_photos_path != null)
			echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/stud_images/'.$photo->student_photos_path,"",array("width"=>"176px","height"=>"178px")),array('/stud_images/'.$photo->student_photos_path),array('id'=>'photo'))."</br></br>";
		
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
	</div> <?php $studid = Yii::app()->user->getState('stud_id'); ?>

	</br>
	<div id="divlink1" class="info-link">
		<?php echo CHtml::link('Info',array('studentprofile', 'id'=>$studid),array('title'=>'Info','style'=>'text-decoration:none;color:white;'));?>
	</div>
	<div id="divlink9" class="info-link">
		<?php echo CHtml::link('Certificates',array('studentcertificate', 'id'=>$studid),array('title'=>'Certificates','style'=>'text-decoration:none;color:white;'));?>
	</div>
	<div id="divlink5" class="info-link">
		<?php echo CHtml::link('Documents',array('studentdocs', 'id'=>$studid),array('title'=>'Documents','style'=>'text-decoration:none;color:white;'));?>
	</div>
	<div id="divlink6" class="info-link">
		<?php echo CHtml::link('Qualifications',array('studentacademicrecord', 'id'=>$studid),array('title'=>'Qualifications','style'=>'text-decoration:none;color:white;'));?>
	</div>
	<div id="divlink7" class="info-link">
		<?php echo CHtml::link('Performances',array('studentperformance', 'id'=>$studid),array('title'=>'Performances','style'=>'text-decoration:none;color:white;'));?>
	</div>
	<div id="divlink7" class="info-link">
		<?php echo CHtml::link('Subjects',array('mysubjects', 'id'=>$studid),array('title'=>'Current Semester Subjects List','style'=>'text-decoration:none;color:white;'));?>
	</div>
	<div id="divlink7" class="info-link">
		<?php echo CHtml::link('Holidays',array('myholidays', 'id'=>$studid),array('title'=>'Current Semester Holidays','style'=>'text-decoration:none;color:white;'));?>
	</div>
	<div id="divlink8" class="info-link">
		<?php echo CHtml::link('TimeTable',array('studentpersonaltimetable', 'student_id'=>$studid),array('style'=>'text-decoration:none;color:white;'));?>
	</div>

	<?php if(Yii::app()->user->getState('stud_id') || $_REQUEST['id'] ) { ?>	
	<div id="divlink8" class="info-link">
		<?php	echo CHtml::link('Paid Fees Details',array('studentFees'),array('style'=>'text-decoration:none;color:white;'));?>
	</div>
	<?php }	?>

	
	<div id="divlink8" class="info-link">
		<?php	echo CHtml::link('Attendance',array('studentAttendenceReport', 'id'=>$studid),array('style'=>'text-decoration:none;color:white;'));?>	
	</div>

	<div id="divlink8" class="info-link">			
		<?php	echo CHtml::link('History',array('studenthistory', 'id'=>$studid),array('style'=>'text-decoration:none;color:white;')); ?>	
	</div>
	</div>

</div><?php //end of menulink logo div?>
	
	
<div class="form profile-wrapper">
<?php
$n = Yii::app()->controller->action->id;
switch ($n)
{
   
   case 'studentcertificate':
       echo $this->renderPartial('studentcertificate', array('studentcertificate'=>$studentcertificate));
   break;

   case 'studentdocs':
       echo $this->renderPartial('studentdocstrans', array('studentdocstrans'=>$studentdocstrans));
   break;

   case 'studentacademicrecord':
       echo $this->renderPartial('studenntacademicrecord', array('stud_qua'=>$stud_qua));
   break;

   case 'studentperformance':
       echo $this->renderPartial('studentperformance', array('stud_feed'=>$stud_feed));
   break;

   default:
      echo $this->renderPartial('profile_form', array('model'=>$model,'info'=>$info,'photo'=>$photo,'address'=>$address,'lang'=>$lang,'parent'=>$parent));
} 
?>


</div>

