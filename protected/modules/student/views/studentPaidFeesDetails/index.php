<?php
$this->breadcrumbs=array(
	'Student Paid Fees Details',
);

$this->menu=array(
	array('label'=>'Create StudentPaidFeesDetails', 'url'=>array('create')),
	array('label'=>'Manage StudentPaidFeesDetails', 'url'=>array('admin')),
);
?>

<h1>Student Paid Fees Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
