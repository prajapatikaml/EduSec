<?php
$this->breadcrumbs=array(
	'Employee Docs Trans',
);

?>

<h1>Employee Docs Trans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
