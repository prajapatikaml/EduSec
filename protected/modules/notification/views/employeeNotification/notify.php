<script>
$(document).ready(function(){
	//alert("hi1");
    $("#submitbtn").click(function(){
        var selected = $("#employee-transaction-sms-grid").selGridView("getAllSelection");
     
	      $("#selectedemployeeid").val(selected);
    });
});
</script>
<?php
$this->breadcrumbs=array(
	'Employee Notices'=>array('admin'),
	'Select Employees',
);

?>


<?php
    Yii::app()->clientScript->registerScript(
   'myHideEffect',
   '$(".flash-error").animate({opacity: 1.0}, 5000).fadeOut("slow");',
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
<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title"><span class="box-title">Select Employees</span>
</div>
<?php 
$form=$this->beginWidget('CActiveForm', array(
        'id'=>'book-search-form',
        'htmlOptions'=>array('enctype' => 'multipart/form-data')
));
?>

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
	//'ajaxUpdate'=>false,
	'columns'=>array(
		array(
                'class'=>'CCheckBoxColumn',  
		'header'=>'Check All',  
		'name'=>'check', 		 
                ),
		array('name' => 'employee_no',
	              'value' => '$data->Rel_Emp_Info->employee_no',
                     ),
		array('name' => 'employee_attendance_card_id',
	              'value' => '$data->Rel_Emp_Info->employee_attendance_card_id',
                     ),
		 array('name' => 'employee_first_name',
	              'value' => '$data->Rel_Emp_Info->employee_first_name',
                     ),

		 array('name' => 'employee_last_name',
	              'value' => '$data->Rel_Emp_Info->employee_last_name',
                     ),
		 array('name' => 'employee_transaction_designation_id',
			'filter'=>EmployeeDesignation::items(),
			'value' =>'EmployeeDesignation::model->findByPk($data->employee_transaction_designation_id)->employee_designation_name',

	              //'value' => '$data->Rel_Designation->employee_designation_name',
                     ),
		 array('name' => 'employee_transaction_department_id',
			'filter'=>Department::items(),
	              'value' => 'Department::::model->findByPk($data->employee_transaction_department_id)->deparment_name',
                    ),
	),
	'pager'=>array(
		'class'=>'AjaxList',
	//	'maxButtonCount'=>25,
		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),

)); ?>

<!--<div class="send-sms-email-div">
 <?php echo CHtml::button('Send SMS/Email',array('name'=>'btnsend','class'=>'send-all-button','submit' => array('DoChacked'))); ?>
</div>-->
<?php 
		echo CHtml::hiddenField('selectedemployeeid');
                echo CHtml::button('Compose',array('id'=>'submitbtn','submit' => array('Messageform'),'class'=>'submit'));
		echo CHtml::link('Cancel', array('admin'), array('class'=>'btnCan'));  
?>
<?php $this->endWidget(); ?>

</div>


