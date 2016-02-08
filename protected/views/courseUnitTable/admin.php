<?php echo CHtml::link('Add New +', array('courseUnitTable/create', 'courseid'=>$_REQUEST['id']), array('class'=>'btn green'))?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'course-unit-table-grid',
	'dataProvider'=>$unit->coursewisesearch(),
	'summaryText'=>'',
	'selectionChanged'=>"function(id){
		window.location='" . Yii::app()->urlManager->createUrl('courseUnitTable/view', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);
	}",
	'columns'=>array(
		'course_unit_ref_code',
		'course_unit_name',
		'course_unit_level',
		'course_unit_credit',
		'course_unit_hours',
	),
)); ?>

