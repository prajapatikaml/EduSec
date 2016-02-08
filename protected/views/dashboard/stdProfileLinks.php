<div class="profile-details">
 <div class="profile-pic">
   <?php $stdId = StudentTransaction::model()->findByPk(Yii::app()->user->getState('stud_id'));
	 $pic = StudentPhotos::model()->findByPk($stdId->student_transaction_student_photos_id)->student_photos_path;
	 echo CHtml::image(Yii::app()->baseUrl.'/college_data/stud_images/'.$pic);
   ?>
 </div>
 <div class="profile-link">
  <ul class="links">

	<li><?php echo CHtml::link('Performance', array('/student/feedbackDetailsTable/studentPerformance','id'=>$stdId->student_transaction_id)); ?></li>

	<li><?php echo CHtml::link('Subject', array('/report/mysubjects','id'=>$stdId->student_transaction_id)); ?></li>

	<li><?php echo CHtml::link('Holidays', array('/report/myholidays','id'=>$stdId->student_transaction_id)); ?></li>

	<li><?php echo CHtml::link('Student History', array('/report/studenthistory','id'=>$stdId->student_transaction_id)); ?></li>

	<li class="last-row"><?php echo CHtml::link('Exam Timetable', array('/exam/branchSubjectwiseScheduling/studentexamtimetable','id'=>$stdId->student_transaction_id)); ?></li>

	<li class="last-row"><?php echo CHtml::link('Assignment', array('/assignment/assignment/studAssignments','id'=>$stdId->student_transaction_id)); ?></li>
  </ul>
 </div>
</div>
