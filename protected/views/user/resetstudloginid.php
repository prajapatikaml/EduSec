<?php
$this->breadcrumbs=array(
	'Reset Student Login ID',
	
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('user-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Reset Student Login ID</h1>
<div class="portlet box blue">


 <div class="portlet-title"> Student List
 </div>

<?php
$dataProvider = $model->resetloginstudentsearch();
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];
$dataProvider->getPagination()->setPageSize($pageSize);
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(
		//'user_id',
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
			'filter' =>CHtml::listData(AcademicTermPeriod::model()->findAll(),'academic_terms_period_id','academic_term_period'),
		), 
 		array('name'=>'student_transaction_course_id',
		      'value'=>'CourseMaster::model()->findByPk($data->student_transaction_course_id)->course_name',
		      'filter' =>CHtml::listData(CourseMaster::model()->findAll(), 'course_master_id','course_name'),
		), 
 		array('name'=>'student_transaction_user_id',
		      'value'=>'User::model()->findByPk($data->student_transaction_user_id)->user_organization_email_id',
		      'filter' =>CHtml::listData(User::model()->findAll(array('condition'=>' 	user_type="student"')), 'user_id','user_organization_email_id'),
		), 

		/*array('name'=>'academic_term_name',
			'value'=>'AcademicTerm::model()->findByPk($data->student_academic_term_name_id)->academic_term_name',
		), 
		*/

		array('class'=>'CButtonColumn',
			'template' => '{Reset Loginid}',
	                'buttons'=>array(
                        'Reset Loginid' => array(
                                'label'=>'Reset login id', 
				'url'=>'Yii::app()->createUrl("user/updatestudloginid", array("id"=>$data->Rel_user->user_id))',
                                'imageUrl'=> Yii::app()->baseUrl.'/images/Reset Password.png', 
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
