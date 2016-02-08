<?php
$this->breadcrumbs=array(
	'Semester'=>array('admin'),
	'Manage',
);

$this->menu=array(
//	array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'', 'url'=>array('ExportToPDFExcel/AcademicTermExportToPdf'),'linkOptions'=>array('class'=>'export-pdf','title'=>'Export To PDF','target'=>'_blank')),
	array('label'=>'', 'url'=>array('ExportToPDFExcel/AcademicTermExportToExcel'),'linkOptions'=>array('class'=>'export-excel','title'=>'Export To Excel','target'=>'_blank')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('academic-term-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Semester</h1>
<div class="operation">
<?php echo CHtml::link('PDF', array('exportToPDFExcel/academicTermExportToPdf'), array('class'=>'btnyellow', 'target'=>'_blank'));?>
<?php echo CHtml::link('Excel', array('exportToPDFExcel/academicTermExportToExcel'), array('class'=>'btnblue'));?>
</div>
<div class="portlet box blue">


 <div class="portlet-title"> Semesters
 </div>

<?php echo CHtml::link('Add New +', array('academicTerm/create'), array('class'=>'btn green'))?>

<?php
$dataProvider = $model->search();
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];
$dataProvider->getPagination()->setPageSize($pageSize);
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'academic-term-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'afterAjaxUpdate' => 'reInstallDatepicker',
	'selectionChanged'=>"function(id){
		window.location='" . Yii::app()->urlManager->createUrl('academicTerm/view', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);
	}",
	'columns'=>array(
		array(
		'header'=>'No.',
		'class'=>'IndexColumn',
		),

//		'academic_term_id',
		'academic_term_name',
		array(
                        'name' => 'academic_term_start_date',
			 'value'=>'($data->academic_term_start_date == 0000-00-00) ? "Not Set" : date_format(new DateTime($data->academic_term_start_date), "d-m-Y")',
                         'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                'model' => $model,
                                'attribute' => 'academic_term_start_date',
                                'options'=>array(
				'dateFormat'=>'dd-mm-yy',
				'changeYear'=>'true',
				'changeMonth'=>'true',
				'showAnim' =>'slide',
				'yearRange'=>'1900:'.(date('Y')+1),
				'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',			
		    ),
			'htmlOptions'=>array(
			'id'=>'academic_term_start_date',
		     ),
			
                        ), 
                        true),

                ),
		array(
                        'name' => 'academic_term_end_date',
			 'value'=>'($data->academic_term_end_date == 0000-00-00) ? "Not Set" : date_format(new DateTime($data->academic_term_end_date), "d-m-Y")',
                         'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                'model' => $model, 
                                'attribute' => 'academic_term_end_date',
                                'options'=>array(
				'dateFormat'=>'dd-mm-yy',
				'changeYear'=>'true',
				'changeMonth'=>'true',
				'showAnim' =>'slide',
				'yearRange'=>'1900:'.(date('Y')+1),
				'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',			
		    ),
			'htmlOptions'=>array(
			'id'=>'academic_term_end_date',
		     ),
			
                        ), 
                        true),

                ),
		
//		'academic_term_period_id',
		array('name'=>'academic_term_period_id',
			'value'=>'AcademicTermPeriod::model()->findByPk($data->academic_term_period_id)->academic_term_period',
			'filter' =>CHtml::listData(AcademicTermPeriod::model()->findAll(),'academic_terms_period_id','academic_term_period'),

		), 
		array(
                    'class'=>'JToggleColumn',
                    'name'=>'current_sem', // boolean model attribute (tinyint(1) with values 0 or 1)
                    'filter' => array('1' => 'Yes','0' => 'No'), // filter
		    'action'=>'toggle', // other action, default is 'toggle' action
		    'checkedButtonLabel'=>Yii::app()->baseUrl.'/images/checked.png', // tooltip
                    'uncheckedButtonLabel'=>Yii::app()->baseUrl.'/images/unchecked.png',
	            'labeltype'=>'image',
                    'htmlOptions'=>array('style'=>'text-align:center;min-width:60px;')
                ),

		
	),
	'pager'=>array(
		'class'=>'AjaxList',
		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),
));
?>
</div>
<?php
Yii::app()->clientScript->registerScript('for-date-picker',"
function reInstallDatepicker(id, data){
        $('#academic_term_start_date').datepicker({'dateFormat':'dd-mm-yy'});
	  $('#academic_term_end_date').datepicker({'dateFormat':'dd-mm-yy'});
}
"); 
?>

