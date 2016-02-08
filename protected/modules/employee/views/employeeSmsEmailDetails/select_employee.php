<script>
$(document).ready(function(){
	//alert("hi1");
    $("#submitbtn").click(function(){
        var selected = $("#employee-transaction-sms-grid").selGridView("getAllSelection");
     
	      $("#selectedempid").val(selected);
			
    });
});
</script>
<?php
$this->breadcrumbs=array(
	'Employee SMS Emails'=>array('admin'),
	'Select Employees',
);
?>
<div class="portlet box blue">

<div class="portlet-title"><i class="fa fa-plus"></i><span class="box-title">Compose Employee Sms/Email</span>
</div>
<?php
$form=$this->beginWidget('CActiveForm', array(
        'id'=>'book-search-form',
//      'enableAjaxValidation'=>true,
        'htmlOptions'=>array('enctype' => 'multipart/form-data')
));
?>
<?php
    Yii::app()->clientScript->registerScript(
   'myHideEffect',
   '$(".flash-error").animate({opacity: 1.0}, 3000).fadeOut("slow");',
 CClientScript::POS_READY
);

    Yii::app()->clientScript->registerScript(
   'myHideEffect1',
   '$(".flash-success").animate({opacity: 1.0}, 3000).fadeOut("slow");',
 CClientScript::POS_READY
);
?>
<div id="statusMsg">
<?php
	if(Yii::app()->user->hasFlash('error')) { ?>
	<div class="flash-error">
		<?php echo Yii::app()->user->getFlash('error'); ?>
	</div>
<?php } ?>
<?php
	if(Yii::app()->user->hasFlash('success')) { ?>
	<div class="flash-success">
		<?php echo Yii::app()->user->getFlash('success'); ?>
	</div>
<?php } ?>

</div>
<?php
$dataProvider = $model->smssearch();
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];
$dataProvider->getPagination()->setPageSize($pageSize);
?>


<?php $this->widget('ext.selgridview.SelGridView', array(
	'id'=>'employee-transaction-sms-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'selectableRows'=>2,
	'columns'=>array(
		 array(
		'class'=>'CCheckBoxColumn',
                ),
		
		array('name' => 'employee_no',
	              'value' => '$data->Rel_Emp_Info->employee_no',
                     ),
		array(
		      'header' => 'Attendence Card No',
                      'name' => 'employee_attendance_card_id',
	              'value' => '$data->Rel_Emp_Info->employee_attendance_card_id',
                     ),
		 array(
		      'header' => 'Name',
		      'name' => 'employee_first_name',
	              'value' => '$data->Rel_Emp_Info->employee_first_name',
                     ),

		 array(
		      'header' => 'Surame',
		      'name' => 'employee_last_name',
	              'value' => '$data->Rel_Emp_Info->employee_last_name',
                     ),
		 array('name' => 'employee_transaction_designation_id',
			'filter'=>EmployeeDesignation::items(),
			'value' =>'$data->Rel_Designation->employee_designation_name',
                     ),
		 array('name' => 'employee_transaction_department_id',
			'filter'=>Department::items(),
	              'value' => '$data->Rel_Department->department_name',
                     ),
		 array(
			 'header' => 'Private Mobile',
			 'name' => 'employee_private_mobile',
			 'value' => '$data->Rel_Emp_Info->employee_private_mobile',

		),
		 array(
		      'header' => 'Private Email',
		      'name' => 'employee_private_email',
	              'value' => '$data->Rel_Emp_Info->employee_private_email',
                     ),
	),

	'pager'=>array(
			'class'=>'AjaxList',
			'maxButtonCount'=>$model->count(),
			'header'=>''
		   ),
)); ?>

<?php 
		echo CHtml::hiddenField('selectedempid');
                echo CHtml::button('Compose',array('id'=>'submitbtn','submit' => array('DoChacked'),'class'=>'submit'));

?>

<?php $this->endWidget(); ?>
</div>
