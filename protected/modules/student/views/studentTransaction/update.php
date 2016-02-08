<?php
$this->breadcrumbs=array(
	'Student'=>array('admin'),
	$model->Rel_Stud_Info->student_first_name,
	'Edit',
);
?>

<?php echo $this->renderPartial('profile_form', array('model'=>$model,'yearModel'=>$yearModel,'info'=>$info,'user'=>$user,'photo'=>$photo,'address'=>$address,'lang'=>$lang,'studentdocstrans'=>$studentdocstrans, 'stud_qua'=>$stud_qua,'flag'=>$flag,'studentcertificate'=>$studentcertificate,'parent'=>$parent)); ?>
