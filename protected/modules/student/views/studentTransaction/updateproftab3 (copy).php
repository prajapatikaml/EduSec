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
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
    <!--script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/js/jquery.tokeninput.js "></script>

    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl?>/css/token-input.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl?>/css/token-input-facebook.css" type="text/css" /-->

  
    <!-- multi select -->
	<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl ?>/css/multiselect/multi-select.css">
	
    <!-- chosen -->
	<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl?>/css/chosen/chosen.css">
	
	<!-- jQuery -->
	<script src="<?php echo Yii::app()->baseUrl?>/js/tags/jquery.min.js"></script>

	<!-- Bootstrap -->
	<script src="<?php echo Yii::app()->baseUrl?>/js/tags/bootstrap.min.js"></script>
    
    <!-- Chosen -->
	<script src="<?php echo Yii::app()->baseUrl?>/js/chosen/chosen.jquery.min.js"></script>
    
    <!-- MultiSelect -->
	<script src="<?php echo Yii::app()->baseUrl?>/js/multiselect/jquery.multi-select.js"></script>

	<!-- Theme framework -->
	<script src="<?php echo Yii::app()->baseUrl?>/js/tags/eakroko.min.js"></script>

<?php //echo Yii::app()->baseUrl; exit; ?>
    <script type="text/javascript">
    $(document).ready(function() {
        $("input[type=button]").click(function () {
            //alert("Would submit: " + $(this).siblings("input[type=text]").val());
		//alert($(this).siblings("#demo-input-local").val());
	var df=document.getElementById("demo-input-local").value;
	alert(df);
        });
    });
    </script>

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
	<?php if($info->visa_exp_date != '')
		$info->visa_exp_date= date('d-m-Y',strtotime($info->visa_exp_date));
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
		'id'=>'visa_exp_date',
		'size'=>13,
	    	),
		));

	?><span class="status">&nbsp;</span>
	<?php echo $form->error($info,'visa_exp_date'); ?>
</div>
</div>
<div class="row">
	<div class="row-left">

	<select name="a[]" id="a[]" multiple="multiple" class="chosen-select input-xxlarge" >
													<option value="English">English</option>
													<option value="Hindi">Hindi</option>
													<option value="Gujarati">Gujarati</option>
													<option value="4">Option-4</option>
													<option value="5">Option-5</option>
													<option value="6">Option-6</option>
													<option value="7">Option-7</option>
			</select>

<?php
 //echo $form->labelEx($lang,'languages_known1'); 
 //echo $form->textField($lang,'languages_known1',array('size'=>13,'maxlength'=>20,'id'=>'demo-input-local')); 
 // echo '<input type="text" id="demo-input-local" name="tegs" /> '; ?>
<?php
// $sal_data = EmployeeSalarySlip::model()->findAll(array('condition'=>'salary_emplyee_id='.$emp_trans_id.' and salary_slip_month='.$month.' and salary_slip_year='.$year));
$data=LanguagesKnown::model()->findAll(array('condition'=>'languages_known_id='.$model->student_transaction_languages_known_id));
//print_r($data);exit;
if(empty($data))
{
?>
	<?php echo $form->error($info,'languages_known1'); ?><span class="status">&nbsp;</span> 

        <script type="text/javascript">
        $(document).ready(function() {
            $("#demo-input-local").tokenInput([
                {id: "English", name: "English"},
                {id: "Hindi", name: "Hindi"},
                {id: "Marathi", name: "Marathi"},
                {id: "Urdu", name: "Urdu"},
                {id: "Gujarati", name: "Gujarati"},
                {id: "English UK", name: "English UK"},
                {id: "English US", name: "English US"},
                {id: "Tamil", name: "Tamil"},
                {id: "Kannad", name: "Kannad"},
                {id: "Udisi", name: "Udisi"},
                {id: "Matiyalam", name: "Matiyalam"},
                {id: "Bagali", name: "Bagali"}
            ]);
        });
        </script>
<?php
}
else
{
echo $form->labelEx($lang,'languages_known1'); 
 echo $form->textField($lang,'languages_known1',array('size'=>13,'maxlength'=>20,'id'=>'demo-input-pre-populated'));
 echo $form->error($info,'languages_known1'); ?><span class="status">&nbsp;</span> 

<script type="text/javascript">
        $(document).ready(function() {
            $("#demo-input-pre-populated").tokenInput(" ", {
                prePopulate: [
                    {id: 123, name: "Slurms MacKenzie"},
                    {id: 555, name: "Bob Hoskins"},
                    {id: 9000, name: "Kriss Akabusi"}
                ]
            });
        });
        </script>
<?php
}


?>
</div>

</div>
<!--<fieldset style="float: left;width:100% !important;">
<legend>Languages Known</legend>
<div class='row'>
	<table border='0'>
	<tr>
		<td> Languages Known</td>		
	</tr>
   <tr class='test'>
	<td class="row-left"><?php echo CHtml::activeTextField($lang,"languages_known1[]",array('size'=>30)); ?></td>
	<td> </td>	
  </tr>	
	</table>
</div>

<?php 
  $this->widget('ext.reCopy.ReCopyWidget', array(
     'targetClass'=>'test',
     'addButtonLabel'=>'Add More',
     'removeButtonLabel'=>'Remove',     
     
  )); 
?>

</fieldset>  -->

    	<!--<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($info,'student_bloodgroup'); ?>
			<?php echo $form->dropdownList($info,'student_bloodgroup',$info->getBloodGroup(), array('empty' => 'Select Blood Group')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($info,'student_bloodgroup'); ?>
		</div>
    	</div> -->
	<!--<div class="row">
		<div class="row-left">
			<?php echo $form->labelEx($lang,'languages_known1'); ?>
			<?php echo $form->dropDownList($lang,'languages_known1',Languages::items(),array('empty'=>'Select Language')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($lang,'languages_known1'); ?>
		</div>
		<div class="row-right">
			<?php echo $form->labelEx($lang,'languages_known2');?>
			<?php echo $form->dropDownList($lang,'languages_known2',Languages::items(),array('empty'=>'Select Language')); ?><span class="status">&nbsp;</span>
		        <?php echo $form->error($lang,'languages_known2'); ?>
		</div>
    	</div>
	

    	<div class="row last">
		<div class="row-left">
			<?php echo $form->labelEx($lang,'languages_known3');?>
			<?php echo $form->dropDownList($lang,'languages_known3',Languages::items(),array('empty'=>'Select Language')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($lang,'languages_known3'); ?>
		</div>
		<div class="row-right">
			<?php echo $form->labelEx($lang,'languages_known4');?>
			<?php echo $form->dropDownList($lang,'languages_known4',Languages::items(),array('empty'=>'Select Language')); ?><span class="status">&nbsp;</span>
			<?php echo $form->error($lang,'languages_known4');?>
		</div>
    	</div> -->

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
