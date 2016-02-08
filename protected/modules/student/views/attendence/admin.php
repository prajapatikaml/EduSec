<?php
$this->breadcrumbs=array(
	'Student Attendances'=>array('admin'),
	'Manage',
);

$this->menu=array(
	array('label'=>'', 'url'=>array('index'),),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'', 'url'=>array('ExportToPDFExcel/AttendenceExportToPdf'),'linkOptions'=>array('class'=>'export-pdf','title'=>'Export To PDF','target'=>'_blank')),
	array('label'=>'', 'url'=>array('ExportToPDFExcel/AttendenceExportToExcel'),'linkOptions'=>array('class'=>'export-excel','title'=>'Export To Excel','target'=>'_blank')),
	
);



Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('attendence-grid', {
		data: $(this).serialize()
	});
	return false;
});
");

?>
<h1>Manage Student Attendances</h1>
<h5>Here Attendance of last 2 days will be displayed.! </h5>
<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php //$this->renderPartial('_search',array(
	//'model'=>$model,
//)); 
?>
</div>
<?php
$dataProvider = $model->search();
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];

$dataProvider->getPagination()->setPageSize($pageSize);
$acdm_terms = AcademicTerm::model()->findAll('current_sem=1 and academic_term_organization_id='.Yii::app()->user->getState('org_id'));	
	$data = array();	
	foreach($acdm_terms as $list)	
	{
		$data[] = $list['academic_term_id'];
	}
	$str=0;
	if(!empty($data))
	$str = implode(',',$data);


?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'attendence-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'afterAjaxUpdate' => 'reInstallDatepicker',
	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
			),

		//'id',
		//'st_id',
		
		array(
		'name'=>'student_enroll_no',
//                'type'=>'raw',		
                'value'=> '$data->rel_atd_student->student_enroll_no',
	          ),
		array(
		'name'=>'student_first_name',
//                'type'=>'raw',		
                'value'=> '$data->rel_atd_student->student_first_name',
	          ),
		'attendence',
		array(
		'name'=>'employee_first_name',
//                'type'=>'raw',		
                'value'=> '$data->rel_atd_employee->employee_first_name',
	          ),	
		
		array('name'=>'branch_id',
			'value'=>'Branch::model()->findByPk($data->branch_id)->branch_name',
			'filter' =>CHtml::listData(Branch::model()->findAll(array('condition'=>'branch_organization_id='.Yii::app()->user->getState('org_id'))),'branch_id','branch_name'),

		), 
		array('name'=>'sub_id',
	'value'=>'SubjectMaster::model()->findByPk($data->sub_id)->subject_master_name',
			'filter' =>CHtml::listData(SubjectMaster::model()->findAll(array('condition'=>'subject_master_organization_id='.Yii::app()->user->getState('org_id').' and subject_master_academic_terms_name_id IN('.$str.')')),
'subject_master_id','subject','Rel_branch_id.branch_name'),

		),
		array('name'=>'subject_type_name',
			'value'=>'$data->rel_atd_subject->Rel_sub_type->subject_type_name',

		), 
		array('name'=>'sem_name_id',
			'value'=>'AcademicTerm::model()->findByPk($data->sem_name_id)->academic_term_name',
			'filter' =>CHtml::listData(AcademicTerm::model()->findAll(array('condition'=>'current_sem=1 and academic_term_organization_id='.Yii::app()->user->getState('org_id'))),'academic_term_id','academic_term_name'),

		), 
		array('name'=>'sem_id',
			'value'=>'AcademicTermPeriod::model()->findByPk($data->sem_id)->academic_term_period',
			//'filter' =>CHtml::listData(AcademicTermPeriod::model()->findAll(array('condition'=>'academic_terms_period_organization_id='.Yii::app()->user->getState('org_id'))),'academic_terms_period_id','academic_term_period'),

		), 




		//'student_attendence_period_id',
		//'shift_id',
		//'sem_id',
		//'branch_id',
		/*
		'div_id',
		'sub_id',
		'batch_id',
		'timetable_id',
		*/
		//'attendence_date',

		
		array(
                        'name' => 'attendence_date',
			'value'=>'($data->attendence_date == 0000-00-00) ? "Not Set" : date_format(new DateTime($data->attendence_date), "d-m-Y")',
                         'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                'model' => $model, 
                                'attribute' => 'attendence_date',
				//'id'=>'date',
                                'options'=>array(
				'dateFormat'=>'dd-mm-yy',
				'changeYear'=>'true',
				'changeMonth'=>'true',
				'showAnim' =>'slide',
				'yearRange'=>'1900:'.(date('Y')+1),
				'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',			
		    ),
		    'htmlOptions'=>array(
			'id'=>'attendence_date',
		     ),
			
                        ), 
                        true),

                ),

		array(
			'class'=>'MyCButtonColumn',
			'template' => '{update}',
			 'buttons'=>array(
                        
                        'update' => array(
				'url'=>'Yii::app()->createUrl("/student/Attendence/update", array("id"=>$data->id))',
                        ),

                ),
			
		),
	),
		'pager'=>array(
		'class'=>'AjaxList',
		//'maxButtonCount'=>25,
		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),
)); 
Yii::app()->clientScript->registerScript('for-date-picker',"
function reInstallDatepicker(id, data){
        $('#attendence_date').datepicker({'dateFormat':'dd-mm-yy'});
	  
}
");

?>

