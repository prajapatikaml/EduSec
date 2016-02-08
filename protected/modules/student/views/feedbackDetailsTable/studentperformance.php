<?php
$this->breadcrumbs=array(
	'Student'=>array('update', 'id'=>$_REQUEST['id']),
	'Performance',
);?>

<div class="portlet box blue">
<i class="icon-reorder"></i>
<div class="portlet-title"><span class="box-title">Student Performance</span>

<?php  if(Yii::app()->user->checkAccess('StudentTransaction.UpdateStudentData')  && (Yii::app()->user->getState('stud_id') == $_REQUEST['id']) || Yii::app()->user->checkAccess('StudentTransaction.UpdateAllStudentData')) {
?>
<div class="operation">
<?php echo CHtml::link('Add New', array('feedbackDetailsTable/create', 'id'=>$_REQUEST['id']), array('class'=>'btn green'));  ?>
 		<?php echo CHtml::link('Back', array('studentTransaction/update', 'id'=>$_REQUEST['id']) , array('class'=>'btnback')); ?>
</div>
<?php } ?>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'feedback-details-table-grid',
	'dataProvider'=>$stud_feed->mysearch(),
	'enableSorting'=>false,
	'columns'=>array(
		
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		array('name'=>'feedback_category_master_id',
			'value'=>'FeedbackCategoryMaster::model()->findByPk($data->feedback_category_master_id)->feedback_category_name',
		),
		'feedback_details_remarks',
		array(
                'name'=>'feedback_details_table_creation_date',
                'value'=>'date_format(new DateTime($data->feedback_details_table_creation_date), "d-m-Y")',
	        ),
		array('name'=>'feedback_details_table_created_by',
		      'value'=>'EmployeeTransaction::model()->findByAttributes(array("employee_transaction_user_id"=>$data->feedback_details_table_created_by)) == NULL ? "admin" : EmployeeInfo::model()->findByPk(EmployeeTransaction::model()->findByAttributes(array("employee_transaction_user_id"=>$data->feedback_details_table_created_by))->employee_transaction_employee_id)->employee_first_name',

		),
		array(
			'class'=>'MyCButtonColumn',
			'template' => '{update}{delete}',
	                'buttons'=>array(
				'update' => array(
					'url'=>'Yii::app()->createUrl("/student/feedbackDetailsTable/update", array("id"=>$data->feedback_details_table_id))',
					'options'=>array('id'=>'update-feedback'),
					'visible'=>Yii::app()->user->getState('stud_id')?"false":"true",
		                ),
				'delete' => array(
					'url'=>'Yii::app()->createUrl("/student/feedbackDetailsTable/delete", array("id"=>$data->feedback_details_table_id))',
					'visible'=>Yii::app()->user->getState('stud_id')?"false":"true",
		                ),
			),
		),
	),
	'pager'=>array(
		'class'=>'AjaxList',
		'maxButtonCount'=>$stud_feed->count(),
		'header'=>''
	    ),
)); 
?>
</div>
