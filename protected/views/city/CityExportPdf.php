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
		'city_name',
	    	array(
		    'name'=>'state_id',
		    'value'=>'State::model()->findByPk($data->state_id)->state_name',
	    	    'filter'=>  State::items(),
		),
		array(
			'name'=>'country_id',
            		'value'=>'Country::model()->findByPk($data->country_id)->name',
            		'filter'=>  Country::items(),
        	),
		
	),
)); ?>
