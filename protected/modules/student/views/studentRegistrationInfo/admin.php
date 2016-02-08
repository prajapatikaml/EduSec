<?php
$this->breadcrumbs=array(
	'Student Registration Information'=>array('admin'),
	'Manage',
);

$this->menu=array(
	array('label'=>'', 'url'=>array('studentRegistration', 'page'=>Yii::app()->request->getParam('page')),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('student-registration-info-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Student Registration Information</h1>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php
/*
	if(Yii::user->hasFlash('admin')){
		Yii::user->getFlash('index');
	}
*/
?>
	
<?php

if(Yii::app()->user->hasFlash('notice')):?>
    <div class='flash-error'>
        <?php echo Yii::app()->user->getFlash('notice'); ?>
    </div>
<?php endif ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-registration-info-grid',
	'dataProvider'=>$model->search(),
	'afterAjaxUpdate'=>'reInstallDatepicker',
	'filter'=>$model,
	'columns'=>array(
		array(
			'header'=>'SI No',
			'class'=>'IndexColumn',
		),
		//'student_registration_id',
		//'student_title',
		'student_first_name',
		//'student_middle_name',
		'student_last_name',
		'student_merit_no',
		'student_merit_marks',
		//'student_category_id',
		//'student_gender',
		//'student_date_of_registration',
		//'student_branch_id',
		/*array(
				'name'=>'student_branch_id',
				'value'=>'Branch::model()->findByPk($data->student_branch_id)->branch_name',
			'filter' =>CHtml::listData(Branch::model()->findAll(array('condition'=>'branch_organization_id='.Yii::app()->user->getState('org_id'))),'branch_id','branch_name'),
			),*/
		//'student_board',
		//'student_dob',
			array(
                        'name' => 'student_date_of_registration',
			'value'=>'($data->student_date_of_registration == 0000-00-00) ? "Not Set" : date_format(new DateTime($data->student_date_of_registration), "d-m-Y")',
                         'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                'model' => $model, 
                                'attribute' => 'student_date_of_registration',
				 'options'=>array(
				'dateFormat'=>'dd-mm-yy',
				'changeYear'=>'true',
				'changeMonth'=>'true',
				'showAnim' =>'slide',
				'yearRange'=>'1900:'.(date('Y')+1),
				'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',			
		    ),
		    'htmlOptions'=>array(
			'id'=>'student_dob',
		     ),
			
                        ), 
                        true),

                ),
		array(
			'name'=>'organization_id',
			'value'=>'Organization::model()->findByPk($data->organization_id)->organization_name',
		),
		array(
			'name'=>'student_status',
			'value'=>'$data->student_status==1?"Regular":"DTOD"',
		),
		//'student_place_of_birth',
		//'student_current_address',
		//'student_permanent_address',
		//'student_email_id',
		/*'student_phoneno',
		'student_mobile',
		'student_guardian_phoneno',
		'student_guardian_mobile',
		'student_last_school_attended',
		'student_last_school_attended_address',
		'student_father_name',
		'student_mother_name',
		'student_father_occupation',
		'student_mother_occupation',
		'studnet_father_office_address',
		'student_mother_office_address',
		'student_photo',
		*/
		array(
			'class'=>'MyCButtonColumn',
			'header'=>'Confirm Registration',
			'template'=>'{aprove}',
			'buttons'=> array(
					'aprove'=> array(
					'label'=>'Aprove',
					'imageUrl'=>Yii::app()->request->baseUrl.'/images/checked.png',
					'url'=> 'Yii::app()->controller->createUrl("aprove",array("id"=>$data->student_registration_id))',
						),	
					),
		),
		array(
			'class'=>'MyCButtonColumn',
			),
	),
)); 

Yii::app()->clientScript->registerScript('for-date-picker',"
function reInstallDatepicker(id, data){
        $('#student_dob').datepicker({'dateFormat':'dd-mm-yy','changeMonth':'true','changeYear':'true','showAnim':'slide','showAnim':'slide'});
	 
}
");


?>
