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
		'organization_name',
		'address_line1',
		'Rel_org_city.city_name',
		'Rel_org_state.state_name',
		'Rel_org_country.name',
		'pin',
		'phone',
		'website',
		'email',
		'fax_no',
		'Rel_user.user_organization_email_id',
		'organization_creation_date',
	),
)); ?>
