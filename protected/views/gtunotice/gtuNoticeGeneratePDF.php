<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$model,
	'summaryText'=>false,
	'enableSorting'=>false,
	'enablePagination' => false,

	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		'Description',
		array(
		'name'=>'Link',
		'value'=>'CHtml::link($data->Link,$data->Link,array("target"=>"_blank"))',
		'type'=>'raw',
		),
	),
)); ?>
