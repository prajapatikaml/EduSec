<div class="user-image">
<?php 
  $pic = StudentPhotos::model()->findByPk($checkUser->student_transaction_student_photos_id)->student_photos_path;?>
<?php echo CHtml::image(Yii::app()->baseUrl.'/college_data/stud_images/'.$pic, 'Student', array('height'=>200,'width'=>'200')); ?>

</div>

<?php
   $user = User::model()->findByPk(Yii::app()->user->id)->user_organization_email_id;
?>
<ul class="unstyled span10 personal-profile">
<li><label>First Name:</label><?php echo $student->student_first_name; ?></li>
<li><label>Last Name:</label><?php echo $student->student_last_name; ?></li>
<li><label>Gender:</label> <?php echo $student->student_gender; ?></li>
<li><label>Birth Date:</label> <?php echo $student->student_dob; ?></li>
<li><label>Email:</label><?php echo $student->student_email_id_1; ?> </li>
</ul>
<div class="portlet box blue" style="width:92%;	">
<i class="icon-reorder"></i>
 <div class="portlet-title">My Course Details
 </div>

<?php $courseModel = CourseMaster::model()->findByPk($checkUser->student_transaction_course_id); 

 $this->widget('application.extensions.DetailView4Col', array(
	'data'=>$courseModel,
	'attributes'=>array(
		'course_name',
		'course_level',
		'course_completion_hours',
		'course_code',
		array(
		  'name'=>'course_cost',
		  'type'=>'raw',
		  'value'=>$courseModel->concated,
		),
	),
	'htmlOptions'=> array('class'=>'custom-view'),	
)); ?>

</div>
