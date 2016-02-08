<?php
$this->breadcrumbs=array(
	'Student Attendences'=>array('admin'),
	StudentInfo::model()->findByAttributes(array('student_info_transaction_id'=>$model->st_id))->student_first_name,
	'Edit',
);
echo $this->renderPartial('update_atten_form', array('model'=>$model)); ?>
