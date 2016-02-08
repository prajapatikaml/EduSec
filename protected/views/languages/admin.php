<?php
$this->breadcrumbs=array(
	'Languages'=>array('admin'),
	'Manage',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('languages-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Languages</h1>
<div class="operation">
<?php echo CHtml::link('PDF', array('exportToPDFExcel/LanguageExportToPdf'), array('class'=>'btnyellow', 'target'=>'_blank'));?>
<?php echo CHtml::link('Excel', array('exportToPDFExcel/LanguageExportToExcel'), array('class'=>'btnblue'));?>
</div>

<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->


<div class="portlet box blue">


 <div class="portlet-title"> Languages
 </div>

<?php echo CHtml::link('Add New +', array('languages/create'), array('class'=>'btn green'))?>

<?php
$dataProvider = $model->search();
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];
$dataProvider->getPagination()->setPageSize($pageSize);
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'languages-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'selectionChanged'=>"function(id){
		window.location='" . Yii::app()->urlManager->createUrl('languages/view', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);
	}",
	'columns'=>array(
		//'languages_id',
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		'languages_name',
		//'languages_organization_id',
		//'languages_created_by',
		//'languages_created_date',
		/*
		array('name'=>'Organization',
			'value'=>'Organization::model()->findByPk($data->languages_organization_id)->organization_name',
			'filter' => false,

		),*/


	),
	'pager'=>array(
		'class'=>'AjaxList',
		//'maxButtonCount'=>25,
		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),
)); ?>
</div>
