<?php
$this->breadcrumbs=array(
	'Employee Certificate Details Tables'=>array('admin'),
	$model->employee_certificate_details_table_id,
	'Update',
);

$this->menu=array(
//	array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	array('label'=>'', 'url'=>array('view', 'id'=>$model->employee_certificate_details_table_id),'linkOptions'=>array('class'=>'View','title'=>'View')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Update EmployeeCertificateDetailsTable</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>