<?php
$this->breadcrumbs=array(
	'Excel Sheet Formats'=>array('admin'),
	'Manage',
);

$this->menu=array(
//	array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	array('label'=>'','url'=>Yii::app()->controller->createUrl('GeneratePdf'),'linkOptions'=>array('class'=>'export-pdf','title'=>'Export PDF')),
	array('label'=>'','url'=>Yii::app()->controller->createUrl('GenerateExcel'), 'linkOptions'=>array('target'=>'_blank'),'linkOptions'=>array('class'=>'export-excel','title'=>'Export Excel')),

);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('excel-sheet-format-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Excel Sheet Formats</h1>

<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
-->
<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php $dataProvider = $model->search();
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
$dataProvider->getPagination()->setPageSize($pageSize);?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'excel-sheet-format-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(
	array(
		'header'=>'SN.',
		'class'=>'IndexColumn',
		),
		//'excel_sheet_format_id',
		'excel_sheet_name',
		/*'excel_sheet_path',
		'created_by',
		'creation_date',
		'excel_sheet_format_org_id',*/
		array(
			'class'=>'MyCButtonColumn',
		),
	),
	'pager'=>array(
		'class'=>'AjaxList',

//		'maxButtonCount'=>25,
		'header'=>''
	    ),
)); ?>
