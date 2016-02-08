<?php
$this->breadcrumbs=array(
	'Student Academic Record Trans',
);

$this->menu=array(
	//array('label'=>'Create StudentAcademicRecordTrans', 'url'=>array('create')),
	//array('label'=>'Manage StudentAcademicRecordTrans', 'url'=>array('admin')),

	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Student Academic Record Trans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
