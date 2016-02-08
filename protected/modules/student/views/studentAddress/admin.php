<?php
$this->breadcrumbs=array(
	'Student Addresses'=>array('index'),
	'Manage',
);

$this->menu=array(
//	array('label'=>'List StudentAddress', 'url'=>array('index')),
	array('label'=>'Create StudentAddress', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('student-address-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Student Addresses</h1>

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
	'id'=>'student-address-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		/*'student_address_id',
		'student_address_c_line1',
		'student_address_c_line2',*/
		'student_address_c_city',
		'student_address_c_state',
		'student_address_c_country',
		//'student_address_c_pin',
		/*
		
		'student_address_p_line1',
		'student_address_p_line2',*/
		'student_address_p_city',
		//'student_address_p_pin',
		'student_address_p_state',
		'student_address_p_country',
		/*'student_address_phone',
		'student_address_mobile',
		*/
		array(
			'class'=>'MyCButtonColumn',
		),
	),
)); ?>
