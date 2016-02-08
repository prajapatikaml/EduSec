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
		
		'message',
		array(
                    'class'=>'JToggleColumn',
                    'name'=>'message_of_day_active', // boolean model attribute (tinyint(1) with values 0 or 1)
                    'filter' => array('1' => 'Yes','0' => 'No'), // filter
		    'action'=>'switch', // other action, default is 'toggle' action
		    'checkedButtonLabel'=>Yii::app()->baseUrl.'/images/checked.png', // tooltip
                    'uncheckedButtonLabel'=>Yii::app()->baseUrl.'/images/unchecked.png',
	            'checkedButtonTitle'=>"", // tooltip
                    'uncheckedButtonTitle'=>"Display",

		    'labeltype'=>'image',
                    'htmlOptions'=>array('style'=>'text-align:center')
	                ),
	),
)); ?>
