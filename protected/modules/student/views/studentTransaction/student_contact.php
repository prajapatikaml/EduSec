<script>
$("#student-transaction-grid_c1").hover(function(){
  $("#student-transaction-grid_c1").css("background-color","yellow");
  },function(){
  $("#student-transaction-grid_c1").css("background-color","pink");
}); 
</script>
<?php
$this->breadcrumbs=array(
	'Student'=>array('admin'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	//array('label'=>'', 'url'=>array('Importationinstruction'),'linkOptions'=>array('class'=>'remaining_employee','title'=>'Importation Instruction')),
	//array('label'=>'', 'url'=>array('importation/StudentTransaction/import'),'linkOptions'=>array('class'=>'remaining_employee','title'=>'Importation')),
	//array('label'=>'', 'url'=>array('ExportToPDFExcel/StudentTransactionExportPdf'),'linkOptions'=>array('class'=>'export-pdf','title'=>'Export To Pdf','target'=>'_blank')),	
	//array('label'=>'', 'url'=>array('ExportToPDFExcel/StudentTransactionExportExcel'),'linkOptions'=>array('class'=>'export-excel','title'=>'Export To Excel','target'=>'_blank')),
	
);

?>

<h1>Students Contact</h1>

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
		    //  'htmlOptions'=>'hi',
                     ),

		array('name' => 'student_last_name',
	              'value' => '$data->Rel_Stud_Info->student_last_name',
                     ),
		array('name'=>'student_transaction_branch_id',
			'value'=>'Branch::model()->findByPk($data->student_transaction_branch_id)->branch_name',
			'filter' =>CHtml::listData(Branch::model()->findAll(array('condition'=>'branch_organization_id='.Yii::app()->user->getState('org_id'))),'branch_id','branch_name'),

		), 
		array('name'=>'student_transaction_quota_id',
			'value'=>'Quota::model()->findByPk($data->student_transaction_quota_id)->quota_name',
			'filter' =>CHtml::listData(Quota::model()->findAll(array('condition'=>'quota_organization_id='.Yii::app()->user->getState('org_id'))),'quota_id','quota_name'),

		),

		array('name'=>'student_academic_term_period_tran_id',
			'value'=>'AcademicTermPeriod::model()->findByPk($data->student_academic_term_period_tran_id)->academic_term_period',
		), 
 
		array('name'=>'student_academic_term_name_id',
			'value'=>'AcademicTerm::model()->findByPk($data->student_academic_term_name_id)->academic_term_name',
			'filter' =>CHtml::listData(AcademicTerm::model()->findAll(array('condition'=>'academic_term_organization_id='.Yii::app()->user->getState('org_id'))),'academic_term_id','academic_term_name','academicTermPeriod.academic_term_period'),

		), 
/*
		array('name' => 'student_dtod_regular_status',
	         'value' => '$data->Rel_Stud_Info->student_dtod_regular_status',
                     ),
*/		array('name' => 'status_name',
		      'value' => '$data->Rel_Status->status_name',
                ),
		array('name' => 'student_mobile_no',
	         'value' => '$data->Rel_Stud_Info->student_mobile_no',
		 'filter' => false,
                     ),
		array('name' => 'student_guardian_mobile',
	         'value' => '$data->Rel_Stud_Info->student_guardian_mobile',
		 'filter' => false,
                     ),

		
	),
	'pager'=>array(
		'class'=>'AjaxList',
	//	'maxButtonCount'=>25,
		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),

)); ?>
