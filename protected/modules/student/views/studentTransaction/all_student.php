<?php
$this->breadcrumbs=array(
	'Student'=>array('admin'),
	'All Student',
);

$this->menu=array(
	//array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	//array('label'=>'', 'url'=>array('Importationinstruction'),'linkOptions'=>array('class'=>'remaining_employee','title'=>'Importation Instruction')),
	//array('label'=>'', 'url'=>array('importation/StudentTransaction/import'),'linkOptions'=>array('class'=>'remaining_employee','title'=>'Importation')),
	array('label'=>'', 'url'=>array('ExportToPDFExcel/StudentTransactionExportPdf'),'linkOptions'=>array('class'=>'export-pdf','title'=>'Export To Pdf','target'=>'_blank')),	
	array('label'=>'', 'url'=>array('ExportToPDFExcel/StudentTransactionExportExcel'),'linkOptions'=>array('class'=>'export-excel','title'=>'Export To Excel','target'=>'_blank')),	
);

//echo CHtml::link('Export To Pdf',array('StudentTransaction/GeneratePdf'),array('style'=>'color:red'));


?>

<h1>All Students</h1>

<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->

<?php
 //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" >
<?php $this->renderPartial('_search_form',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->


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
	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		 array('name' => 'student_enroll_no',
		  
	              'value' => '$data->Rel_Stud_Info->student_enroll_no',
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
		array('name'=>'student_transaction_branch_id',
			'value'=>'Branch::model()->findByPk($data->student_transaction_branch_id)->branch_name',
			//'filter' =>CHtml::listData(Branch::model()->findAll(array('condition'=>'branch_organization_id='.Yii::app()->user->getState('org_id'))),'branch_id','branch_name'),
			 'filter'=>false,

		), 

		array('name'=>'student_academic_term_period_tran_id',
			'value'=>'AcademicTermPeriod::model()->findByPk($data->student_academic_term_period_tran_id)->academic_term_period',
			//'filter' =>CHtml::listData(AcademicTermPeriod::model()->findAll(array('condition'=>'academic_terms_period_organization_id='.Yii::app()->user->getState('org_id'))),'academic_terms_period_id','academic_term_period'),
			 'filter'=>false,
		), 
 
		array('name'=>'student_academic_term_name_id',
			'value'=>'AcademicTerm::model()->findByPk($data->student_academic_term_name_id)->academic_term_name',
		      //'filter' =>CHtml::listData(AcademicTerm::model()->findAll(array('condition'=>'academic_term_organization_id='.Yii::app()->user->getState('org_id'))),'academic_term_id','academic_term_name','academicTermPeriod.academic_term_period'),
			 'filter'=>false,

		), 
		 array('name' => 'student_dtod_regular_status',
	         'value' => '$data->Rel_Stud_Info->student_dtod_regular_status',
                     ),
		array('name' => 'student_transaction_detain_student_flag',
		      'value' => '$data->Rel_Status->status_name',
		    //  'filter'=>CHtml::listData(Studentstatusmaster::model()->findAll(),'id','status_name'),
			 'filter'=>false,
                ),

		array(
			'class'=>'MyCButtonColumn',
			'template' => '{view}',
			'buttons'=>array(
				'view' => array(
				                'label'=>'View Profile', 
						'url'=>'Yii::app()->createUrl("student/studentTransaction/update", array("id"=>$data->student_transaction_id))',
				        ),
				      ),
				
			),
	),
	'pager'=>array(
		'class'=>'AjaxList',
	//	'maxButtonCount'=>25,
		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),

)); ?>
