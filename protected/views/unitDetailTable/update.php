<?php
$this->breadcrumbs=array(
	'Unit Detail Tables'=>array('index'),
	$model->unit_detail_id=>array('view','id'=>$model->unit_detail_id),
	'Update',
);


?>

<h1>Update UnitDetailTable <?php echo $model->unit_detail_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
