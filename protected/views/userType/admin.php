<?php
$this->breadcrumbs=array(
	'User Types'=>array('admin'),
	'Manage',
);
?>
<div class="portlet box blue">
<div class="portlet-title"><i class="fa fa-plus"></i><span class="box-title">Manage User Types</span>
</div>
<div class="operation">
<?php echo CHtml::link('<i class="fa fa-plus-square"></i>Add', array('userType/create'), array('class'=>'btn green'))?>
<?php echo CHtml::link('<i class="fa fa-file-pdf-o"></i>PDF', array('site/export.exportPDF', 'model'=>get_class($model)), array('class'=>'btnyellow', 'target'=>'_blank'));?>
<?php echo CHtml::link('<i class="fa fa-file-excel-o"></i>Excel', array('site/export.exportExcel', 'model'=>get_class($model)), array('class'=>'btnblue'));?>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-type-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'selectionChanged'=>"function(id){
		window.location='" . Yii::app()->urlManager->createUrl('userType/view', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);
	}",
	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		'user_type_name',
		 array(
		'class'=>'MyCButtonColumn',
	   ),
		),
)); ?></div>
