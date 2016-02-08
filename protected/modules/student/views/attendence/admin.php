<?php
$this->breadcrumbs=array(
	'Student Attendances'=>array('admin'),
	'Manage',
);
?>
<h5 style="float: left; width: 100%; margin: 0px; padding: 0px; font-size: 15px;">Here Attendance of last 3 days will be displayed.! </h5>
<div class="portlet box blue">
<div class="portlet-title"> <i class="icon-reorder"></i>
<span class="box-title">Manage Student Attendances</span>
<div class="operation">
<?php echo CHtml::link('PDF', array('/site/export.exportPDF', 'model'=>get_class($model)), array('class'=>'btnyellow', 'target'=>'_blank'));?>
<?php echo CHtml::link('Excel', array('/site/export.exportExcel', 'model'=>get_class($model)), array('class'=>'btnblue'));?>
</div>
</div><?php
$dataProvider = $model->search();
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];

$dataProvider->getPagination()->setPageSize($pageSize);
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

		array(
		'name'=>'student_first_name',
                'value'=> '$data->rel_atd_student->student_first_name',
	          ),
		'attendence',
		array(
		'name'=>'employee_first_name',
                'value'=> '$data->rel_atd_employee->employee_first_name',
	          ),	
		
		array('name'=>'sub_id',
	'value'=>'SubjectMaster::model()->findByPk($data->sub_id)->subject_master_name',
			'filter' =>CHtml::listData(SubjectMaster::model()->findAll(),
'subject_master_id','subject'),

		),
		array('name'=>'subject_type_name',
			'value'=>'$data->rel_atd_subject->Rel_sub_type->subject_type_name',

		), 
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
		'student_attendence_period_id',
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

