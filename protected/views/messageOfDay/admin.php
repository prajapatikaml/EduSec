<?php
$this->breadcrumbs=array(
	'Message Of The Day'=>array('admin'),
	'Manage',
);

$this->menu=array(
//	array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'', 'url'=>array('ExportToPDFExcel/messageExportToPdf'),'linkOptions'=>array('class'=>'export-pdf','title'=>'Export To PDF','target'=>'_blank')),
	array('label'=>'', 'url'=>array('ExportToPDFExcel/messageExportToExcel'),'linkOptions'=>array('class'=>'export-excel','title'=>'Export To Excel','target'=>'_blank')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('message-of-day-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Message Of The Day</h1>
<!--
<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php
$dataProvider = $model->search();
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];
$dataProvider->getPagination()->setPageSize($pageSize);
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'message-of-day-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(
//		'id',
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		
		'message',
		array(
                    'class'=>'JToggleColumn',
                    'name'=>'message_of_day_active', // boolean model attribute (tinyint(1) with values 0 or 1)
                    'filter' => array('1' => 'Yes','0' => 'No'), // filter
		    'action'=>'switch', // other action, default is 'toggle' action
		    'checkedButtonLabel'=>Yii::app()->baseUrl.'/images/checked.png', // tooltip
                    'uncheckedButtonLabel'=>Yii::app()->baseUrl.'/images/unchecked.png',
	            'checkedButtonTitle'=>"", // tooltip
                    'uncheckedButtonTitle'=>"Display",

		    'labeltype'=>'image',
                    'htmlOptions'=>array('style'=>'text-align:center')
	                ),

//		'created_by',
//		'creation_date',
		array(
			'class'=>'MyCButtonColumn',
		),
	),
	'pager'=>array(
			'class'=>'AjaxList',
			//'maxButtonCount'=>25,
			'maxButtonCount'=>$model->count(),
			'header'=>''
	),
)); ?>
