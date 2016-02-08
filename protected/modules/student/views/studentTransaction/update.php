<?php
$this->breadcrumbs=array(
	'Student'=>array('admin'),
	$model->Rel_Stud_Info->student_first_name,
	'Edit',
);
?>
<style>
.grid-view {
    padding-top: 0px;
}
</style>
<h1>View Student Profile<?php //echo $key; ?></h1>

<?php echo $this->renderPartial('profile_form', array('model'=>$model,'info'=>$info,'user'=>$user,'photo'=>$photo,'address'=>$address,'lang'=>$lang,'studentdocstrans'=>$studentdocstrans, 'stud_qua'=>$stud_qua, 'flag'=>$flag)); ?>
