<?php
$this->breadcrumbs=array(
	'Student'=>array('admin'),
	'All Student',
);

$this->menu=array(
	array('label'=>'', 'url'=>array('ExportToPDFExcel/StudentTransactionExportPdf'),'linkOptions'=>array('class'=>'export-pdf','title'=>'Export To Pdf','target'=>'_blank')),	
	array('label'=>'', 'url'=>array('ExportToPDFExcel/StudentTransactionExportExcel'),'linkOptions'=>array('class'=>'export-excel','title'=>'Export To Excel','target'=>'_blank')),	
);?>


<div class="search-form" >
<?php /*$this->renderPartial('_search_form',array(
	'model'=>$model,
)); */?>
</div>
<div class="portlet box blue" style="margin-top:20px">
<i class="icon-reorder"></i>
<div class="portlet-title"><span class="box-title">All Students</span>
<div class="operation">
<?php echo CHtml::link('PDF', array('/site/export.exportPDF', 'model'=>get_class($model)), array('class'=>'btnyellow', 'target'=>'_blank'));?>
<?php echo CHtml::link('Excel', array('/site/export.exportExcel', 'model'=>get_class($model)), array('class'=>'btnblue'));?>
</div>
</div>
<?php
$dataProvider = $model->allstudent();
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];
$dataProvider->getPagination()->setPageSize($pageSize);
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-transaction-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
		'selectionChanged'=>"function(id){
		window.location='" . Yii::app()->urlManager->createUrl('student/studentTransaction/update', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);
	}",
	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		 array('name' => 'student_roll_no',
		  
	              'value' => '$data->Rel_Stud_Info->student_roll_no',
                 ),

		 array('name' => 'student_first_name',
		  
	              'value' => '$data->Rel_Stud_Info->student_first_name',
                     ),

		array('name' => 'student_middle_name',
	              'value' => '$data->Rel_Stud_Info->student_middle_name',
                     ),

		array('name' => 'student_last_name',
	              'value' => '$data->Rel_Stud_Info->student_last_name',
                     ),
		array('name'=>'student_transaction_batch_id',
			'value'=>'($data->student_transaction_batch_id==0)?"":Batch::model()->findByPk($data->student_transaction_batch_id)->batch_code',
			'filter' =>CHtml::listData(Batch::model()->findAll(),'batch_id','batch_code'),
		), 

	),
	'pager'=>array(
		'class'=>'AjaxList',
	//	'maxButtonCount'=>25,
		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),

)); ?></div>
