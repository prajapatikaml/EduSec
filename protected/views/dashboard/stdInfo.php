<?php
   $info = StudentInfo::model()->findByAttributes(array('student_info_transaction_id'=>Yii::app()->user->getState('stud_id')));
    $stu_tran = StudentTransaction::model()->findByPk(Yii::app()->user->getState('stud_id'));
    $picPath = StudentPhotos::model()->findByPk($stu_tran->student_transaction_student_photos_id);
?>

<div class="image-tab">
<div class="image-box-user"><img src="<?php echo Yii::app()->baseUrl; ?>/college_data/stud_images/<?php echo $picPath->student_photos_path; ?>" width="112" height="112" alt="No Image"></div>
</div>
<div class="info-tab">
<div class="myinfo">
	<div class="info-title">My Information</div>
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td class="info-label">Name - </td>
        <td class="info-content"><?php echo $info->student_first_name.' '.$info->student_last_name; ?></td>
        <td class="info-label">Birth Date -</td>
        <td class="info-content"><?php if(!empty($info->student_dob) && $info->student_dob!='0000-00-00') { echo $info->student_dob; }else { echo "Not Set";} ?></td>
      </tr>
      <tr>
        <td class="info-label">Gender - </td>
        <td class="info-content"><?php echo (!empty($info->student_gender) ? $info->student_gender : "Not Set"); ?></td>
        <td class="info-label">Course  -</td>
        <td class="info-content"><?php echo (!empty($stu_tran->Rel_course->course_name) ? $stu_tran->Rel_course->course_name : "Not Set"); ?></td>
      </tr>
      <tr>
        <td class="info-label">Batch - </td>
        <td class="info-content"><?php echo $stu_tran->Rel_Batch->batch_name; ?></td>
        <td class="info-label">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
</div>
<div class="important-link">
	<div class="info-title">Important Links</div>
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td><div class="mytime-table-icon">&nbsp;</div></td>
        <td><div class="attendance-icon">&nbsp;</div></td>
      </tr>
      <tr>
        <td class="info-content-center" style="color: #f05922;">My Time Table</td>
        <td class="info-content-center" style="color: #92c46b;">My Attendance</td>
      </tr>                    
    </table>
</div>
<!--Personal info tab date end-->
