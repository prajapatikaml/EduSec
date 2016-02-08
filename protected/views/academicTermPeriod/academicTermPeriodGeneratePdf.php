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
		'academic_term_period',
		'Rel_user.user_organization_email_id:Created By',
		'academic_terms_period_creation_date',
	),
)); ?>
