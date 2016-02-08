<?php
$this->breadcrumbs=array(
	'Student Status'=>array('admin'),
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('studentstatusmaster-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Student Status</h1>
<div class="operation">
<?php echo CHtml::link('PDF', array('exportToPDFExcel/StudentStatusExportToPdf'), array('class'=>'btnyellow', 'target'=>'_blank'));?>
<?php echo CHtml::link('Excel', array('exportToPDFExcel/StudentStatusExportToExcel'), array('class'=>'btnblue'));?>
</div>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->


<div class="portlet box blue">


 <div class="portlet-title"> Student Status
 </div>

<?php echo CHtml::link('Add New +', array('studentstatusmaster/create'), array('class'=>'btn green'))?>


<?php
$dataProvider = $model->search();
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];
$dataProvider->getPagination()->setPageSize($pageSize);
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'studentstatusmaster-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'selectionChanged'=>"function(id){
		window.location='" . Yii::app()->urlManager->createUrl('studentstatusmaster/view', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);
	}",
	'columns'=>array(
		//'id',
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		'status_name',
		//'creation_date',
		//'created_by',
		//'organization_id',
		/*
		array('name'=>'Organization',
			'value'=>'Organization::model()->findByPk($data->organization_id)->organization_name',
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
