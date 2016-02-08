<?php
$this->breadcrumbs=array(
	'Fees Collection',
);
?>

<h1>Student Fees Collection</h1>

<div class="operation">
<?php echo CHtml::link('Back', array('admin'), array('class'=>'btnback'));?>
</div>

<div class="portlet box blue">
 <div class="portlet-title">Student List
 </div>
<?php
$dataProvider = $stud_model->search();
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];
$dataProvider->getPagination()->setPageSize($pageSize);
?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-transaction-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$stud_model,
	'ajaxUpdate'=>false,
	'columns'=>array(

		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		
		 array('name' => 'student_enroll_no',
		       'value' => '$data->Rel_Stud_Info->student_enroll_no',
                     ),

		array('name' => 'student_first_name',
		      'value' => '$data->Rel_Stud_Info->student_first_name',
                     ),
		array('name' => 'student_last_name',
		      'value' => '$data->Rel_Stud_Info->student_last_name',
                     ),


		array('name'=>'student_academic_term_period_tran_id',
		      'value'=>'AcademicTermPeriod::model()->findByPk($data->student_academic_term_period_tran_id)->academic_term_period',
		     ), 
		array('name'=>'student_academic_term_name_id',
		      'value'=>'isset($data->student_academic_term_name_id) ? AcademicTerm::model()->findByPk($data->student_academic_term_name_id)->academic_term_name :  "N/A" ',
		      'filter' =>CHtml::listData(AcademicTerm::model()->findAll(array('condition'=>'current_sem=1')),'academic_term_id','academic_term_name'),
   		     ), 

		array('name' => 'status_name',
		      'value' => '$data->Rel_Status->status_name',
                     ),

		array(
			'class'=>'MyCButtonColumn',
			'template' => '{Add Fees}',
	                'buttons'=>array(
                        'Add Fees' => array(
                                'label'=>'Take Fees', 
				'url'=>'Yii::app()->createUrl("student/studentPaidFeesDetails/create", array("id"=>$data->student_transaction_id))',
                                'imageUrl'=> Yii::app()->baseUrl.'/images/add.jpeg',
                                'options' => array('class'=>'fees'),
                        ),
                   ),

		),
	),
	'pager'=>array(
		'class'=>'AjaxList',
		'maxButtonCount'=>$stud_model->count(),
		'header'=>''
	    ),

)); ?>
</div>
