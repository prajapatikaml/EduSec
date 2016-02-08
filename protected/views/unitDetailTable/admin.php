<?php echo CHtml::link('Add New +', array('unitDetailTable/create', 'courseid'=>$_REQUEST['id'],'unit_id'=>$unitid), array('class'=>'btn green'))?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'unit-detail-table-grid',
	'dataProvider'=>$lesson->unitwisesearch(),
	'selectionChanged'=>"function(id){
		window.location='" . Yii::app()->urlManager->createUrl('unitDetailTable/view', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);
	}",
	'columns'=>array(
		'unit_detail_title',
		array(
		'name'=>'unit_detail_desc',
		'type'=>'raw',
		'value'=>'$data->unit_detail_desc',
		),
		array(
		'name'=>'unit_lec_date',
		'value'=>'date_format(new DateTime($data->unit_lec_date), "d-m-Y")'
		)
	),
)); ?>
