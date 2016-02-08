<?php
$this->breadcrumbs=array(
	'Parent Logins'=>array('admin'),
	'Manage',
);

$this->menu=array(
	array('label'=>'','url'=>Yii::app()->controller->createUrl('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'','url'=>Yii::app()->controller->createUrl('GeneratePdf'),'linkOptions'=>array('class'=>'export-pdf','title'=>'Export To PDF','target'=>'_blank')),
	array('label'=>'','url'=>Yii::app()->controller->createUrl('GenerateExcel'),'linkOptions'=>array('class'=>'export-excel','title'=>'Export To Excel','target'=>'_blank')),

);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('parent-login-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Parent Logins</h1>

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
	'id'=>'parent-login-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(
	array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		'parent_id',
		'parent_user_name',
		'parent_password',
		'created_by',
		'creation_date',
		array(
			'class'=>'MyCButtonColumn',
		),
	),
	
)); ?>
