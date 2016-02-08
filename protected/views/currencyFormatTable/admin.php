<?php
$this->breadcrumbs=array(
	'Currency Formats'=>array('index'),
	'Manage',
);
?>

<h1>Currency Formats </h1>
<div class="portlet box blue">
 <div class="portlet-title"> Currency Formats
 </div>
<?php echo CHtml::link('Add New +', array('currencyFormatTable/create'), array('class'=>'btn green'))?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'currency-format-table-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'selectionChanged'=>"function(id){
		window.location='" . Yii::app()->urlManager->createUrl('currencyFormatTable/view', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);
	}",
	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		'currency_format_name',
		'currency_format',
	),
)); ?>
</div>
