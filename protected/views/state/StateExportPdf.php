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
	
		'state_name',           
		array(
            		'name'=>'country_id',
            		'value'=>'Country::model()->findByPk($data->country_id)->name',
            		'filter'=>Country::items(),
        	),
		
	),
)); ?>
