<?php
$this->breadcrumbs=array(
	'Student Infos'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List StudentInfo', 'url'=>array('index')),
	array('label'=>'Create StudentInfo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('student-info-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Student Infos</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-info-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'student_id',
		'student_roll_no',
		'student_merit_no',
		'student_enroll_no',
		'student_college_id',
		'student_first_name',
		/*
		'student_middle_name',
		'student_last_name',
		'student_father_name',
		'student_mother_name',
		'student_adm_date',
		'student_dob',
		'student_birthplace',
		'student_gender',
		'student_guardian_name',
		'student_guardian_relation',
		'student_guardian_qualification',
		'student_guardian_occupation',
		'student_guardian_income',
		'student_guardian_occupation_address',
		'student_guardian_occupation_city',
		'student_guardian_city_pin',
		'student_guardian_home_address',
		'student_guardian_phoneno',
		'student_guardian_mobile',
		'student_email_id_1',
		'student_email_id_2',
		'student_bloodgroup',
		'student_tally_id',
		'student_created_by',
		'student_creation_date',
		*/
		array(
			'class'=>'MyCButtonColumn',
		),
	),
)); ?>
