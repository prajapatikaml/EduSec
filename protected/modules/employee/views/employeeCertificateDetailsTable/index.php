<?php
$this->breadcrumbs=array(
	'Employee Certificate Details Tables',
);

$this->menu=array(
	array('label'=>'Create EmployeeCertificateDetailsTable', 'url'=>array('create')),
	array('label'=>'Manage EmployeeCertificateDetailsTable', 'url'=>array('admin')),
);
?>

<h1>Employee Certificate Details Tables</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
