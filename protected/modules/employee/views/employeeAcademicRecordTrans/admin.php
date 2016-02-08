<?php
$this->breadcrumbs=array(
	'Employee Academic Record Trans'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
//	array('label'=>'', 'url'=>array('index'),'linkOptions'=>array('class'=>'List','title'=>'List')),

);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('employee-academic-record-trans-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Employee Academic Record</h1>

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
	'id'=>'employee-academic-record-trans-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'employee_academic_record_trans_id',
		'employee_academic_record_trans_user_id',
		'employee_academic_record_trans_qualification_id',
		'employee_academic_record_trans_eduboard_id',
		'employee_academic_record_trans_year_id',
		'theory_mark_obtained',
		/*
		'theory_mark_max',
		'theory_percentage',
		'practical_mark_obtained',
		'practical_mark_max',
		'practical_percentage',
		*/
		array(
			'class'=>'MyCButtonColumn',
		),
	),
)); ?>
