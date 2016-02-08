<?php
$this->breadcrumbs=array(
	'Former Student'=>array('admin'),
	'Manage',
);
?>

<div class="portlet box blue">
<i class="icon-reorder"></i>
<div class="portlet-title"><span class="box-title">Manage Former Student</span>
</div>

<?php
$dataProvider = $model->search();
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];
$dataProvider->getPagination()->setPageSize($pageSize);
?>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-archive-table-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),

		 array('name' => 'student_enroll_no',
	              'value' => '(!empty($data->Rel_Stud_Info->student_enroll_no)?$data->Rel_Stud_Info->student_enroll_no:"Not Set")',
			

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
		array('name'=>'student_archive_ac_t_p_id',
			'value'=>'AcademicTermPeriod::model()->findByPk($data->student_archive_ac_t_p_id)->academic_term_period',
			'filter' =>CHtml::listData(AcademicTermPeriod::model()->findAll(), 'academic_terms_period_id','academic_term_period'),

		), 
 
		array('name'=>'student_archive_ac_t_n_id',
			'value'=>'AcademicTerm::model()->findByPk($data->	student_archive_ac_t_n_id)->academic_term_name',
			'filter' =>CHtml::listData(AcademicTerm::model()->findAll(), 'academic_term_id','academic_term_name','academicTermPeriod.academic_term_period'),

		), 

		array('name' => 'status_name',
		      'value' => '$data->Rel_Status->status_name',
                ),
		
		array('name'=>'student_archive_branch_id',
			'value'=>'Branch::model()->findByPk($data->student_archive_branch_id)->branch_name',
			'filter' =>CHtml::listData(Branch::model()->findAll(), 'branch_id','branch_name'),

		), 
	),
	'pager'=>array(
		'class'=>'AjaxList',
		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),
)); ?>
</div>
