<?php
$this->breadcrumbs=array(
	'Batches'=>array('admin'),
	'Manage',
);
?>
<div class="portlet box blue">

<div class="portlet-title"><i class="fa fa-plus"></i><span class="box-title">Manage Batches</span>
</div>
<div class="operation">
<?php echo CHtml::link('<i class="fa fa-plus-square"></i>Add', array('batch/create'), array('class'=>'btn green'))?>
<?php echo CHtml::link('<i class="fa fa-file-pdf-o"></i>PDF', array('site/export.exportPDF', 'model'=>get_class($model)), array('class'=>'btnyellow', 'target'=>'_blank'));?>
<?php echo CHtml::link('<i class="fa fa-file-excel-o"></i>Excel', array('site/export.exportExcel', 'model'=>get_class($model)), array('class'=>'btnblue'));?>

</div>

<?php
$dataProvider = $model->search();
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];
$dataProvider->getPagination()->setPageSize($pageSize);
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'batch-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'selectionChanged'=>"function(id){
		window.location='" . Yii::app()->urlManager->createUrl('batch/view', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);
	}",
  	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		'batch_name',
		array(
		'name'=>'course_id',
		'value'=>'$data->course_id ? $data->Rel_course->course_name : "Not Set"',
		),
		'batch_fees',
		/* array(
		'name'=>'academic_term_id',
		'value'=>'$data->academic_term_id?$data->Rel_academicTerm->academic_term_name:null',
		),*/
		array(
		'name'=>'batch_intake',
		'value'=>'($data->batch_intake==0)?"Not Set":$data->batch_intake',
		),
		array(
		'name'=>'batch_start_date',
		'value'=>'($data->batch_start_date == NULL || $data->batch_start_date == \'0000-00-00\') ? "Not Set" : date_format(new DateTime($data->batch_start_date), "d-m-Y")',
		),
		array(
		'name'=>'batch_end_date',
		'value'=>'($data->batch_end_date == NULL || $data->batch_end_date == \'0000-00-00\') ? "Not Set" : date_format(new DateTime($data->batch_end_date), "d-m-Y")',
		),
		 array(
		'class'=>'MyCButtonColumn',
	   ),
		
	),
	'pager'=>array(
		'class'=>'AjaxList',
		//'maxButtonCount'=>25,
		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),
)); ?>
</div>
