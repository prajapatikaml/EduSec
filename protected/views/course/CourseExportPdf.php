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
		'course_name',
		'course_code',
		'section_name',
		'course_fees',
		'Rel_user.user_organization_email_id:Created By',
		'created_date',
	),
)); ?>
