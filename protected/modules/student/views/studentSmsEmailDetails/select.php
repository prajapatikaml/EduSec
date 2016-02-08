<script>
$(document).ready(function(){
	//alert("hi1");
    $("#submitbtn").click(function(){
        var selected = $("#student-transaction-sms-grid").selGridView("getAllSelection");
     
	      $("#selectedstudentid").val(selected);
			
    });
});
</script>
<?php
$this->breadcrumbs=array(
	'Student Sms-Emails'=>array('admin'),
	'Select Students',
);
?>
<div class="portlet box blue">
<i class="icon-reorder"></i>
<div class="portlet-title"><span class="box-title">Compose Student Sms/Email</span> 
</div>

<?php 
$form=$this->beginWidget('CActiveForm', array(
        'id'=>'book-search-form',
//        'enableAjaxValidation'=>true,
        'htmlOptions'=>array('enctype' => 'multipart/form-data')
));
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

<?php
$dataProvider = $model->smssearch();
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];
$dataProvider->getPagination()->setPageSize($pageSize);
?>


<?php $this->widget('ext.selgridview.SelGridView', array(
	'id'=>'student-transaction-sms-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'selectableRows'=>2,
	//'ajaxUpdate'=>false,
	'columns'=>array(
		 array(
                'class'=>'CCheckBoxColumn',     		 
                ),
		array('name' => 'student_roll_no',
	              'value' => '$data->Rel_Stud_Info->student_roll_no',
                ),

		 array('name' => 'student_first_name',
	              'value' => '$data->Rel_Stud_Info->student_first_name',
                     ),

		array('name' => 'student_last_name',
	              'value' => '$data->Rel_Stud_Info->student_last_name',
                     ),
		 array('name' => 'student_transaction_batch_id',
        	'value' =>'$data->student_transaction_batch_id==0?"Not Set":$data->Rel_Batch->batch_code',
		'filter'=> CHtml::listdata(Batch::model()->findAll(),'batch_id','batch_code'),
             ),
		array('header'=>'Mobile No.',
		      'name' => 'student_mobile_no',
	              'value' => '$data->Rel_Stud_Info->student_mobile_no',
                     ),
		array(
		      'header'=>'Email ID',
		      'name' => 'student_email_id_1',
	              'value' => '$data->Rel_Stud_Info->student_email_id_1',
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
		echo CHtml::hiddenField('selectedstudentid');
                echo CHtml::button('Compose',array('id'=>'submitbtn','submit' => array('DoChacked'),'class'=>'submit'));
?>
<?php $this->endWidget(); ?>

