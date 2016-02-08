<?php
$this->breadcrumbs=array(
	'Employee'=>array('admin'),
	$model->Rel_Emp_Info->employee_first_name,
	'Edit',
);
?>
<style>
.grid-view {
    padding-top: 0px;
}
</style>

<?php echo $this->renderPartial('profile_form', array('model'=>$model,'info'=>$info,'photo'=>$photo,'address'=>$address,'lang'=>$lang,'emp_doc'=>$emp_doc,'emp_record'=>$emp_record,'emp_exp'=>$emp_exp,'emp_certificate'=>$emp_certificate)); ?>
