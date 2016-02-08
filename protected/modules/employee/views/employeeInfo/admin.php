<?php
$this->breadcrumbs=array(
	'Employee Infos'=>array('index'),
	'Manage',
);

$this->menu=array(
//	array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('employee-info-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Employee Infos</h1>

<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'employee-info-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'employee_id',
		'employee_no',
		'employee_first_name',
		'employee_middle_name',
		'employee_last_name',
		'employee_name_alias',
		/*
		'employee_dob',
		'employee_birthplace',
		'employee_gender',
		'employee_bloodgroup',
		'employee_marital_status',
		'employee_private_email',
		'employee_organization_mobile',
		'employee_private_mobile',
		'employee_pancard_no',
		'employee_account_no',
		'employee_joining_date',
		'employee_probation_period',
		'employee_hobbies',
		'employee_technical_skills',
		'employee_project_details',
		'employee_curricular',
		'employee_reference',
		'employee_refer_designation',
		'employee_guardian_name',
		'employee_guardian_relation',
		'employee_guardian_home_address',
		'employee_guardian_qualification',
		'employee_guardian_occupation',
		'employee_guardian_income',
		'employee_guardian_occupation_address',
		'employee_guardian_occupation_city',
		'employee_guardian_city_pin',
		'employee_guardian_phone_no',
		'employee_guardian_mobile1',
		'employee_guardian_mobile2',
		'employee_faculty_of',
		'employee_attendance_card_id',
		'employee_tally_id',
		'employee_created_by',
		'employee_creation_date',
		*/
		array(
			'class'=>'MyCButtonColumn',
		),
	),
)); ?>
