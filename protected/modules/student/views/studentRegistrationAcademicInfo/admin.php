<?php
$this->breadcrumbs=array(
	'Student Registration Academic Infos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List StudentRegistrationAcademicInfo', 'url'=>array('index')),
	array('label'=>'Create StudentRegistrationAcademicInfo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('student-registration-academic-info-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Student Registration Academic Info</h1>

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
	'id'=>'student-registration-academic-info-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'student_registration_academic_id',
		'examination',
		'year_of_passing',
		'name_of_board',
		'medium',
		'class_obtained',
		/*
		'marks_obtained',
		'marks_out_of',
		'percentage',
		'student_registration_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
