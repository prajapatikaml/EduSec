<?php
$this->breadcrumbs=array(
	'Dashboard',
);?>
<h1>Dashboard</h1>
<?php 

$checkUser = StudentTransaction::model()->findByAttributes(array('student_transaction_user_id'=>Yii::app()->user->id)); 

if($checkUser) {
    $student = StudentInfo::model()->findByPk($checkUser->student_transaction_student_id);
    echo $this->renderPartial('application.views.site.studDash', array('student'=>$student, 'checkUser'=>$checkUser));
}
else {
  $checkUser = EmployeeTransaction::model()->findByAttributes(array('employee_transaction_user_id'=>Yii::app()->user->id)); 
  if($checkUser) {
   $employee = EmployeeInfo::model()->findByPk($checkUser->employee_transaction_employee_id);
   echo $this->renderPartial('application.views.site.empDash', array('employee'=>$employee, 'checkUser'=>$checkUser));
  }
  else{
       echo $this->renderPartial('application.views.site.admDash', array());
  }
}

?>
