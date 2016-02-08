<?php
$this->breadcrumbs=array(
	'Qualification'=>array('admin'),
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('qualification-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Qualifications</h1>
<div class="operation">
<?php echo CHtml::link('PDF', array('exportToPDFExcel/qualificationExportToPdf'), array('class'=>'btnyellow', 'target'=>'_blank'));?>
<?php echo CHtml::link('Excel', array('exportToPDFExcel/qualificationExportToExcel'), array('class'=>'btnblue'));?>
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


 <div class="portlet-title"> Qualification
 </div>

<?php echo CHtml::link('Add New +', array('qualification/create'), array('class'=>'btn green'))?>

<?php
$dataProvider = $model->search();
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];
$dataProvider->getPagination()->setPageSize($pageSize);
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'qualification-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'selectionChanged'=>"function(id){
		window.location='" . Yii::app()->urlManager->createUrl('qualification/view', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);
	}",
	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		//'qualification_id',
		'qualification_name',
		//'qualification_organization_id',
		//'qualification_created_by',
		//'qualification_created_date',
		/*
		array('name'=>'Organization',
			'value'=>'Organization::model()->findByPk($data->qualification_organization_id)->organization_name',
			'filter' => false,
		),
		
		array(
			'name'=>'qualification_organization_id',
                	'value'=>'Organization::item($data->qualification_organization_id)',
                 	'filter'=>  Organization::items(),
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
