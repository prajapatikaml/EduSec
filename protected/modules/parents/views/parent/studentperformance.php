<?php
$this->breadcrumbs=array(
	'Student'=>'',
	'Performance',
);?>
<div id="form7" class="info-form">
<fieldset>
	<legend>Performance</legend>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'feedback-details-table-grid',
	'dataProvider'=>$stud_feed->mysearch(),
	//'filter'=>$model,
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
		
	),
	'pager'=>array(
		'class'=>'AjaxList',
	//	'maxButtonCount'=>25,
		'maxButtonCount'=>$stud_feed->count(),
		'header'=>''
	    ),
)); 

?>
</fielset>
</div>
