<style>
.portlet.box.blue label {
    float: left;
    font-size: 14px;
    font-weight: bold;
    padding-right: 20px;
    text-align: right;
    width: 188px;
}

</style>
         <!-- chosen -->
	<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl?>/css/chosen/chosen.css">
	
	
	<!-- Bootstrap -->
	<script src="<?php echo Yii::app()->baseUrl?>/js/tags/bootstrap.min.js"></script>
    
    <!-- Chosen -->
	<script src="<?php echo Yii::app()->baseUrl?>/js/chosen/chosen.jquery.min.js"></script>
    
	<!-- Theme framework -->
	<script src="<?php echo Yii::app()->baseUrl?>/js/tags/eakroko.min.js"></script>

<?php
$this->breadcrumbs=array(
	'Student'=>array('update', 'id'=>$_REQUEST['id']),
	'Other Info',
);?>

<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title"><span class="box-title">Update Student Details</span>
 </div>

<div class="profile-tab profile-edit ui-tabs ui-widget ui-widget-content ui-corner-all ui-tabs-collapsible">

<ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
<li class="ui-state-default ui-corner-top">
  <?php echo CHtml::link('Personal Profile', array('updateprofiletab1', 'id'=>$_REQUEST['id'])); ?></li>
<li class="ui-state-default ui-corner-top">
  <?php echo CHtml::link('Academic Details', array('updateprofiletab5', 'id'=>$_REQUEST['id'])); ?></li>
<li class="ui-state-default ui-corner-top">
  <?php echo CHtml::link('Gaurdian Info', array('updateprofiletab2', 'id'=>$_REQUEST['id'])); ?></li>
<li class="ui-state-default ui-corner-top  ui-tabs-selected ui-state-active">
   <?php echo CHtml::link('Other Info', array('updateprofiletab3', 'id'=>$_REQUEST['id'])); ?></li>
<li class="ui-state-default ui-corner-top">
   <?php echo CHtml::link('Address Info', array('updateprofiletab4', 'id'=>$_REQUEST['id'])); ?></li>
</ul>

<div class="ui-tabs-panel form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-transaction-form',
	'enableAjaxValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>
	<div class="row">
		<div class="row-left">
		<?php echo $form->labelEx($info,'Emergency Contact Name'); ?>
		<?php echo $form->textField($info,'emergency_cont_name',array('size'=>13,'style'=>'width:auto')); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($info,'emergency_cont_name'); ?>
		</div>
	<div class="row-right">
		<?php echo $form->labelEx($info,'Emergency Contact No'); ?>
		<?php echo $form->textField($info,'emergency_cont_no',array('size'=>13,'style'=>'width:auto')); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($info,'emergency_cont_no'); ?>
	</div>
    </div>
	<div class="row">
        <div class="row-left">
			<?php echo $form->labelEx($info,'passport_no'); ?>
        		<?php echo $form->textField($info,'passport_no',array('size'=>13,'maxlength'=>20)); ?>
			<?php echo $form->error($info,'passport_no'); ?><span class="status">&nbsp;</span>
	</div>
	<div class = "row-right">
	<?php echo $form->labelEx($info,'visa_exp_date'); ?>
	<?php if($info->visa_exp_date != '' && $info->visa_exp_date != 0000-00-00)
		$info->visa_exp_date= date('d-m-Y',strtotime($info->visa_exp_date));
		else
		$info->visa_exp_date='';
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
	    	'model'=>$info,
		'attribute'=>'visa_exp_date',
	    	'options'=>array(
		'dateFormat'=>'dd-mm-yy',
		'changeYear'=>'true',
		'changeMonth'=>'true',
		'showAnim' =>'slide',
		'yearRange'=> '1910:2020',
		
	    	),
		'htmlOptions'=>array(
		'style'=>'width:165px;vertical-align:top',
		
		'size'=>13,
	    	),
		));

	?><span class="status">&nbsp;</span>
	<?php echo $form->error($info,'visa_exp_date'); ?>
</div>
</div>
<div class="row">
<table>
<tr>
<td>	<div >
	<?php
	$data=LanguagesKnown::model()->findAll(array('condition'=>'languages_known_id='.$model->student_transaction_languages_known_id));

	foreach($data as $d=>$row)
	{
		 $langss=$row['languages_known1'];
	}

	$langArr = array();
	$as=explode(',',$langss);

	foreach($as as $ai)
	{
	  $langArr[$ai] =  array('selected'=>true);
	}

    echo $form->labelEx($lang,'Languages Known'); 
	echo "</td><td>";
    echo $form->dropDownList(
    $lang,
    'languages_known1[]',
    CHtml::listData(Languages::model()->findAll(), 'languages_name', 'languages_name'),
    array(
                'class'=>'chosen-select input-xxlarge',
		'multiple'=>'multiple',
                'maxlength'=>200,
                'options' => $langArr,
		
    )
);
	echo "</td></tr></table>";							
?>
	<?php echo $form->error($lang,'languages_known1'); ?><span class="status">&nbsp;</span> 
</div>

</div>


	<div class="row buttons last">
		<?php
		if(Yii::app()->user->checkAccess('StudentTransaction.UpdateStudentData')  && (Yii::app()->user->getState('stud_id') == $_REQUEST['id']) || Yii::app()->user->checkAccess('StudentTransaction.UpdateAllStudentData'))
		 echo CHtml::submitButton('Save', array('class'=>'submit')); ?>
	
		<?php echo CHtml::link('Cancel', array('update','id'=>$_REQUEST['id']), array('class'=>'btnCan')); ?>
   	</div>
<?php  $this->endWidget(); ?>
</div>
</div>
</div>
