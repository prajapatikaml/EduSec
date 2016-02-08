<?php
$this->breadcrumbs=array(
	'Reset Student Password',
	
);?>
<?php



Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('student-transaction-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Reset Student Password</h1>
<div class="portlet box blue">


 <div class="portlet-title"> Student List
 </div>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<?php
$dataProvider = $model->resetloginstudentsearch();
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];
$dataProvider->getPagination()->setPageSize($pageSize);
?>

<div class="block-error">
		<?php echo Yii::app()->user->getFlash('resetstudpassword'); ?>
	</div>
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

		 array('name' => 'student_first_name',
	              'value' => '$data->Rel_Stud_Info->student_first_name',
                     ),

		array('name' => 'student_last_name',
	              'value' => '$data->Rel_Stud_Info->student_last_name',
                     ),

		array('name'=>'student_academic_term_period_tran_id',
			'value'=>'AcademicTermPeriod::model()->findByPk($data->student_academic_term_period_tran_id)->academic_term_period',
			'filter' =>CHtml::listData(AcademicTermPeriod::model()->findAll(), 'academic_terms_period_id','academic_term_period'),

		), 
		array('name'=>'student_transaction_course_id',
		      'value'=>'CourseMaster::model()->findByPk($data->student_transaction_course_id)->course_name',
		      'filter' =>CHtml::listData(CourseMaster::model()->findAll(), 'course_master_id','course_name'),
		), 
 		array('name'=>'student_transaction_user_id',
		      'value'=>'User::model()->findByPk($data->student_transaction_user_id)->user_organization_email_id',
		      'filter' =>CHtml::listData(User::model()->findAll(array('condition'=>' 	user_type="student"')), 'user_id','user_organization_email_id'),
		), 


		array(
			'class'=>'CButtonColumn',
			'template' => '{Reset Password}',
	                'buttons'=>array(
                        'Reset Password' => array(
                                'label'=>'Reset Password', 
				  'url'=>'Yii::app()->createUrl("user/update_stud_password", array("id"=>$data->student_transaction_user_id))',
                                'imageUrl'=> Yii::app()->baseUrl.'/images/Reset Password.png',  
				'options'=>array('id'=>'update-student-status'),
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
)); ?>

</div>

