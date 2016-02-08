<div class="user-image">
<?php 
  $pic = EmployeePhotos::model()->findByPk($checkUser->employee_transaction_emp_photos_id)->employee_photos_path;?>
<?php echo CHtml::image(Yii::app()->baseUrl.'/college_data/emp_images/'.$pic, 'Employee', array('height'=>200,'width'=>'200')); ?>

</div>

<?php
   $user = User::model()->findByPk(Yii::app()->user->id)->user_organization_email_id;
?>
<ul class="unstyled span10 personal-profile">
<li><label>First Name:</label><?php echo $employee->employee_first_name; ?></li>
<li><label>Last Name:</label><?php echo $employee->employee_last_name; ?></li>
<li><label>Gender:</label> <?php echo $employee->employee_gender; ?></li>
<li><label>Birth Date:</label> <?php echo $employee->employee_dob; ?></li>
<li><label>Email:</label><?php echo $employee->employee_private_email; ?> </li>
</ul>

<?php
$model = CourseMaster::model()->findAll(array(
    "order" => "course_master_id DESC",
    "limit" => 3,
));
?>
<div class="portlet box blue" style="width: 50%; clear: left; min-height: 232px;">
<i class="icon-reorder"></i>
 <div class="portlet-title">New Publish Course
 </div>
<?php if(!empty($model)) { ?>
<table class="course-details">
<tr>
<th>Course Name</th>
<th>Course Level</th>
<th>Course Code</th>
<th>Course Cost</th>
</tr>
<?php
  foreach($model as $list) {
	echo '<tr>';
	echo '<td>'.$list['course_name'].'</td>';
	echo '<td>'.$list['course_level'].'</td>';
	echo '<td>'.$list['course_code'].'</td>';
	echo '<td>'.$list['course_cost'].'</td>';
	echo '</tr>';
  }
?>
</table>
<?php }
else
echo '<span style="padding: 20px;">No course availabel</span>';
?>
</div>

<?php
$recStud = StudentTransaction::model()->findAll(array(
    "order" => "student_transaction_id DESC",
    "limit" => 3,
));
?>
<div class="portlet box green" style="width: 47%; margin-left: 25px; min-height: 232px;">
<i class="icon-reorder"></i>
 <div class="portlet-title">Latest Enrolled Student
 </div>
<?php if(!empty($recStud)) { ?>
<table class="course-details">
<tr>
<th style="width:140px;">Student Name</th>
<th style="width:140px;">Enroll in Course</th>
<th style="width:140px;">Joining Date</th>
</tr>
<?php
  foreach($recStud as $list) {
	$info = StudentInfo::model()->findByPk($list['student_transaction_student_id']);
	echo '<tr>';
	echo '<td>'.$info->student_first_name.'</td>';
	echo '<td>'.CourseMaster::model()->findByPk($list['student_transaction_course_id'])->course_name.'</td>';
	echo '<td>'.$info->student_adm_date.'</td>';
	echo '</tr>';
  }
?>
</table>
<?php }
else
echo '<span style="padding: 20px;">Student not Exist</span>';
?>
</div>

