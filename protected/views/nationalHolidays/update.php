<?php
$this->breadcrumbs=array(
	'Holidays'=>array('admin'),
	$model->national_holiday_name,
	'Update',
);

?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
