<?php
$this->breadcrumbs=array(
	'Bank'=>array('admin'),
	'Manage',
);
?>
<div class="portlet box blue">
<div class="portlet-title"> <i class="fa fa-plus"></i><span class="box-title">Bank List</span>
</div>
<div class="operation">
<?php echo CHtml::link('<i class="fa fa-plus-square"></i>Add', array('create'), array('class'=>'btn green'))?>

<?php echo CHtml::link('<i class="fa fa-file-pdf-o"></i>PDF', array('/site/export.exportPDF', 'model'=>get_class($model)), array('class'=>'btnyellow', 'target'=>'_blank'));?>
<?php echo CHtml::link('<i class="fa fa-file-excel-o"></i>Excel', array('/site/export.exportExcel', 'model'=>get_class($model)), array('class'=>'btnblue'));?>
</div>



<?php
$dataProvider = $model->search();
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];
$dataProvider->getPagination()->setPageSize($pageSize);
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'bank-master-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'selectionChanged'=>"function(id){
		window.location='" . Yii::app()->urlManager->createUrl('/fees/bankMaster/view', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);
	}",
	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		'bank_full_name',
		'bank_short_name',
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
)); ?></div>
