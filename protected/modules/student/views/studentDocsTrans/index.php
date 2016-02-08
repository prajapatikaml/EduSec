<?php
$this->breadcrumbs=array(
	'Student Docs Trans',
);

?>

<h1>Student Docs Trans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
