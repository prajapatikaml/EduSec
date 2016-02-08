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
		'academic_term_name',
		'academic_term_start_date',
		'academic_term_end_date',
		'academicTermPeriod.academic_term_period',
		'current_sem',
	),
)); ?>
