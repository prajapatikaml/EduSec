<div class="employee">
<?php
$this->breadcrumbs=array(
	'Employee'=>array('admin'),
	$model->Rel_Emp_Info->employee_first_name,
);
 if(Yii::app()->user->checkAccess('EmployeeTransaction.Create')) {
$this->menu=array(
/*	array('label'=>'List EmployeeTransaction', 'url'=>array('index')),*/
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	array('label'=>'', 'url'=>array('update', 'id'=>$model->employee_transaction_id),'linkOptions'=>array('class'=>'Edit','title'=>'Update')),
	array('label'=>'', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->employee_transaction_id),'confirm'=>'Are you sure you want to delete this item?','class'=>'Delete','title'=>'Delete')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
	array('label'=>'', 'url'=>array('employeeDocsTrans/create', 'id'=>$model->employee_transaction_id),'linkOptions'=>array('id'=>'emp_doc_id','class'=>'Stud_doc','title'=>'Employee Document')),
	array('label'=>'', 'url'=>array('ExportToPDFExcel/EmployeeFinalViewExportToPdf', 'id'=>$_REQUEST['id']),'linkOptions'=>array('class'=>'export-pdf','title'=>'Export To Pdf')),
	
		array('label'=>'', 'url'=>array('employeeAcademicRecordTrans/create', 'id'=>$model->employee_transaction_id),'linkOptions'=>array('id'=>'emp_doc_id1','class'=>'Stud_qua','title'=>'Employee Qualification')),
		array('label'=>'', 'url'=>array('employeeExperienceTrans/create', 'id'=>$model->employee_transaction_id),'linkOptions'=>array('id'=>'emp_exp_id','class'=>'experience-link','title'=>'Create Employee Experience')),


		array('label'=>'', 'url'=>array('TimeTable/FacultyPersonalTimetable', 'faculty_id'=>$model->employee_transaction_id),'linkOptions'=>array('id'=>'faculty_timetable','class'=>'faculty_master','title'=>'Show My Timetable')),
);
}
?>
<h1>View Employee</h1>

<?php
        // create tabs
        $tab_1 = $this->renderPartial('tabs/view_tab1', array('model'=>$model),true);
        $tab_2 = $this->renderPartial('tabs/view_tab2', array('model'=>$model),true);
        $tab_3 = $this->renderPartial('tabs/view_tab3', array('model'=>$model),true);
        $tab_4 = $this->renderPartial('tabs/view_tab4', array('model'=>$model),true);

       
         $this->widget('zii.widgets.jui.CJuiTabs', array(
		'headerTemplate'=>'<li><a href="{url}" title="{title}">{title}</a></li>',
                'tabs'=>array(
                   'Personal Info' =>array('content'=>$tab_1),
                   'Guardian Info' =>array('content'=>$tab_2),
                   'Other Info' =>array('content'=>$tab_3),
                   'Address Info' =>array('content'=>$tab_4),
                ),

                // additional javascript options for the tabs plugin
                'options'=>array(
                        'collapsible'=>false,
                ),
		'htmlOptions'=>array(
                     'class'=>'employee-final-view'),
		
        ));

?>
<div>&nbsp;</div>
<div>&nbsp;</div>
<h4 class="final_view_doc">Attached Documents</h4>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'employee-docs-final_view',
	'dataProvider'=>$emp_doc->mysearch(),
//	'filter'=>$model,
	'enableSorting'=>false,
	'columns'=>array(
		//'employee_docs_trans_id',
		//'employee_docs_trans_user_id',
		//'employee_docs_trans_emp_docs_id',
		array(
		'header'=>'SN.',
		'class'=>'IndexColumn',
		),
		array(
                'name'=>'employee_docs_trans_emp_docs_id',
                'type'=>'raw',
                'value'=>'CHtml::link(CHtml::encode($data->Rel_Emp_doc->employee_docs_desc),Yii::app()->baseUrl."/emp_docs/".$data->Rel_Emp_doc->employee_docs_path, $htmlOptions=array("target"=>"_blank"))',

          	),

		array(
			'class'=>'CButtonColumn',
			'template' => '{delete}',
			'buttons'=>array(
                        
                        'delete' => array(
				
				'url'=>'Yii::app()->createUrl("employeeDocsTrans/delete", array("id"=>$data->employee_docs_trans_id))',

                        ),
		   ),
		),
	),
)); ?>
<div>&nbsp;</div>
<div>&nbsp;</div>
<h4 class="final_view_doc">Employee Qualification</h4>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'employee-academic-record-trans-grid',
	'dataProvider'=>$emp_record->mysearch(),
	//'filter'=>$model,
	'enableSorting'=>false,
	'columns'=>array(
		array(
		'header'=>'SN.',
		'class'=>'IndexColumn',
		),
		
		array('name' => 'employee_academic_record_trans_qualification_id',
	              'value' => '$data->Rel_employee_qualification->qualification_name',
                     ),
		array('name' => 'employee_academic_record_trans_eduboard_id',
			'value' => '$data->Rel_employee_eduboard->eduboard_name',
                     ),
		array('name' => 'employee_academic_record_trans_year_id',
			'value' => '$data->Rel_employee_year->year',
                     ),
		array('name' => 'theory_mark_obtained',
			'value' => '$data->theory_mark_obtained',
                     ),
		array('name' => 'theory_mark_max',
			'value' => '$data->theory_mark_max',
                     ),
		array('name' => 'theory_percentage',
			'value' => '$data->theory_percentage',
                     ),
		array('name' => 'practical_mark_obtained',
			'value' => '$data->practical_mark_obtained',
                     ),
		array('name' => 'practical_mark_max',
			'value' => '$data->practical_mark_max',
                     ),
		array('name' => 'practical_percentage',
			'value' => '$data->practical_percentage',
                     ),
		
		array(
			'class'=>'CButtonColumn',
			'template' => '{update}{delete}',
	                'buttons'=>array(
/*			'view' => array(
				'url'=>'Yii::app()->createUrl("employeeAcademicRecordTrans/view", array("id"=>$data->employee_academic_record_trans_id))',
                        ),*/
			'update' => array(
				'url'=>'Yii::app()->createUrl("employeeAcademicRecordTrans/update", array("id"=>$data->employee_academic_record_trans_id))',
				'options'=>array('id'=>'update-qualification'),
                        ),
			'delete' => array(
				'url'=>'Yii::app()->createUrl("employeeAcademicRecordTrans/delete", array("id"=>$data->employee_academic_record_trans_id))',
                        ),
			),
		),
	),
)); ?>
<div>&nbsp;</div>
<div>&nbsp;</div>
<h4 class="final_view_doc">Employee Experience</h4>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'employee-experience-trans-grid',
	'dataProvider'=>$emp_exp->mysearch(),
	//'filter'=>$model,
	'columns'=>array(
		//'employee_experience_trans_id',
		//'employee_experience_trans_user_id',
		//'employee_experience_trans_emp_experience_id',
		array(
		'header'=>'SN.',
		'class'=>'IndexColumn',
		),
		array('name' => 'employee_experience_organization_name',
	              'value' => '$data->Rel_Emp_exp->employee_experience_organization_name',
                     ),
		array('name' => 'employee_experience_designation',
			'value' => '$data->Rel_Emp_exp->employee_experience_designation',
                     ),
		array('name' => 'employee_experience_from',
			'value' => 'date_format(date_create($data->Rel_Emp_exp->employee_experience_from), "d-m-Y")',
                    ),
		array('name' => 'employee_experience_to',
			'value' => 'date_format(date_create($data->Rel_Emp_exp->employee_experience_to), "d-m-Y")',
                     ),
		
		
		array('name' => 'employee_experience',
			'value' => '$data->Rel_Emp_exp->employee_experience',
                     ),
		array(
			'class'=>'CButtonColumn',
			'template' => '{update}{delete}',
			'buttons'=>array(
			'view' => array(
				'url'=>'Yii::app()->createUrl("employeeAcademicRecordTrans/view", array("id"=>$data->employee_academic_record_trans_id))',
                        ),
			'update' => array(
				'url'=>'Yii::app()->createUrl("employeeExperienceTrans/update", array("id"=>$data->employee_experience_trans_id))',
				'options'=>array('id'=>'update_exp'),
				
                        ),
			                        
                        'delete' => array(
				'url'=>'Yii::app()->createUrl("employeeExperienceTrans/delete", array("id"=>$data->employee_experience_trans_id))',
                        ),
		   ),
		),

	),
)); ?>
</div>
<!-- fancybox for employee document -->
<?php
$config = array( 
    'scrolling' => 'no',
    'autoDimensions' => false,
    'width' => '615',
    'height' => '280', 
    'titleShow' => false,
    'overlayColor' => '#000',
    'padding' => '0',
    'showCloseButton' => true,
    'onClose' => function() {
               return window.location.reload();
           },
// change this as you need
);

$this->widget('application.extensions.fancybox.EFancyBox', array('target'=>'#emp_doc_id', 'config'=>$config));

?>


<!-- fancybox for employee qualification -->
<?php
$config = array( 
    'scrolling' => 'no',
    'autoDimensions' => false,
    'width' => '755',
    'height' => '420', 
   'titleShow' => false,
    'overlayColor' => '#000',
    'padding' => '0',
    'showCloseButton' => true,
    'onClose' => function() {
               return window.location.reload();
           },
// change this as you need
);

$this->widget('application.extensions.fancybox.EFancyBox', array('target'=>'#emp_doc_id1', 'config'=>$config));

?>
<?php
$config = array( 
    'scrolling' => 'no',
    'autoDimensions' => false,
    'width' => '755',
    'height' => '420', 
   'titleShow' => false,
    'overlayColor' => '#000',
    'padding' => '0',
    'showCloseButton' => true,
    'onClose' => function() {
               return window.location.reload();
           },
// change this as you need
);

$this->widget('application.extensions.fancybox.EFancyBox', array('target'=>'a#update-qualification', 'config'=>$config));

?>
<!-- fancybox for employee experience -->
<?php
$config = array( 
    'scrolling' => 'no',
    'autoDimensions' => false,
    'width' => '755',
    'height' => '280', 
   'titleShow' => false,
    'overlayColor' => '#000',
    'padding' => '0',
    'showCloseButton' => true,
    'onClose' => function() {
               return window.location.reload();
           },
// change this as you need
);

$this->widget('application.extensions.fancybox.EFancyBox', array('target'=>'#emp_exp_id', 'config'=>$config));

?>
<?php
$config = array( 
    'scrolling' => 'no',
    'autoDimensions' => false,
    'width' => '755',
    'height' => '280', 
  'titleShow' => false,
    'overlayColor' => '#000',
    'padding' => '0',
    'showCloseButton' => true,
    'onClose' => function() {
               return window.location.reload();
           },
// change this as you need
);

$this->widget('application.extensions.fancybox.EFancyBox', array('target'=>'a#update_exp', 'config'=>$config));
?>

