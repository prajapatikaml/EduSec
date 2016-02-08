<?php
   $info = EmployeeInfo::model()->findByAttributes(array('employee_info_transaction_id'=>Yii::app()->user->getState('emp_id')));
   $tranDetails = EmployeeTransaction::model()->findByPk(Yii::app()->user->getState('emp_id'));
   $picPath = EmployeePhotos::model()->findByPk($tranDetails->employee_transaction_emp_photos_id);
?>
<div class="image-tab">
<div class="image-box-user"><img src="<?php echo Yii::app()->baseUrl; ?>/college_data/emp_images/<?php echo $picPath->employee_photos_path; ?>" width="112" height="112"></div>
</div>
<div class="info-tab">
<div class="myinfo">
	<div class="info-title">My Information</div>
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td class="info-label">Name - </td>
        <td class="info-content"><?php echo $info->employee_first_name.' '.$info->employee_last_name; ?></td>
        <td class="info-label">Birth Date -</td>
        <td class="info-content"><?php if(!empty($info->employee_dob) && $info->employee_dob!='0000-00-00') { echo $info->employee_dob; }else { echo "Not Set";} ?></td>
      </tr>
      <tr>
        <td class="info-label">Gender - </td>
        <td class="info-content"><?php echo (!empty($info->employee_gender) ? $info->employee_gender : "Not Set"); ?></td>
        <td class="info-label">Designation  -</td>
        <td class="info-content"><?php echo (!empty($tranDetails->Rel_Designation->employee_designation_name) ? $tranDetails->Rel_Designation->employee_designation_name : "Not Set"); ?></td>
      </tr>
      <tr>
        <td class="info-label">Department - </td>
        <td class="info-content"><?php echo (!empty($tranDetails->Rel_Department->department_name) ? $tranDetails->Rel_Department->department_name : "Not Set"); ?></td>
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
         <td class="info-content-center" style="color: #FF604F;">My Time Table</td>
        <td class="info-content-center" style="color: #FF604F;">My Time Table</td>
      </tr>                    
    </table>
</div>
<!--Personal info tab date end-->
