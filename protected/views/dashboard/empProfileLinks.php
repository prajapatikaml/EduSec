<div class="profile-details">
 <div class="profile-pic">
   <?php $empId = EmployeeTransaction::model()->findByPk(Yii::app()->user->getState('emp_id'));
	 $pic = EmployeePhotos::model()->findByPk($empId->employee_transaction_emp_photos_id)->employee_photos_path;
	 echo CHtml::image(Yii::app()->baseUrl.'/college_data/emp_images/'.$pic);
   ?>
 </div>
 <div class="profile-link">
  <ul class="links">

	<li><?php echo CHtml::link('Holidays', array('/report/myholidays','id'=>$empId->employee_transaction_id)); ?></li>


  </ul>
 </div>
</div>
