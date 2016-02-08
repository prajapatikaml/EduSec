<?php
$this->breadcrumbs=array(
	'Student Paid Fees Details'=>array('index'),
	$model->student_paid_fees_id=>array('view','id'=>$model->student_paid_fees_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List StudentPaidFeesDetails', 'url'=>array('index')),
	array('label'=>'Create StudentPaidFeesDetails', 'url'=>array('create')),
	array('label'=>'View StudentPaidFeesDetails', 'url'=>array('view', 'id'=>$model->student_paid_fees_id)),
	array('label'=>'Manage StudentPaidFeesDetails', 'url'=>array('admin')),
);
?>

<h1>Edit Paid Fees Detail<?php //echo $model->student_paid_fees_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
