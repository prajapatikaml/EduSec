<?php
$this->breadcrumbs=array(
	'Excel Sheet Formats'=>array('admin'),
	$model->excel_sheet_format_id,
);

$this->menu=array(
//	array('label'=>'','url'=>array('index')),
	array('label'=>'','url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	array('label'=>'','url'=>array('update','id'=>$model->excel_sheet_format_id),'linkOptions'=>array('class'=>'Edit','title'=>'Update')),
	array('label'=>'','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->excel_sheet_format_id),'confirm'=>'Are you sure you want to delete this item?','confirm'=>'Are you sure you want to delete this item?', 'class'=>'Delete','title'=>'Delete')),
	array('label'=>'','url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>View ExcelSheetFormat</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'excel_sheet_format_id',
		'excel_sheet_name',
		'excel_sheet_path',
		'created_by',
		'creation_date',
		'excel_sheet_format_org_id',
	),
)); ?>
