<div class="portlet box blue">
<i class="icon-reorder"></i>
<div class="portlet-title"><span class="box-title"> Fill Details</span>
</div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'attendence-form',
	'enableAjaxValidation'=>true,
	 'stateful'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
	//'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); 
?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="block-error">
		<?php echo Yii::app()->user->getFlash('not-select-attendece'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sub_id'); ?>
		<?php echo $form->dropDownList($model,'sub_id', CHtml::listData(SubjectMaster::model()->findAll(), 'subject_master_id', 'subject_master_name'),array('prompt'=>'Select Subject'));
		?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'sub_id'); ?>
	</div>
</div>
<div class="first-row" >
	<div class="row">
        <?php echo $form->labelEx($model,'batch_id'); ?>
      	<?php echo $form->dropDownList($model,'batch_id', CHtml::listData(Batch::model()->findAll(), 'batch_id', 'batch_code'),array('prompt' => 'Select Batch'));
		;?>
	<span class="status">&nbsp;</span>
        <?php echo $form->error($model,'batch_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'employee_id'); ?>
		<?php	
		//$faculty = array();
$facultytablelist = EmployeeTransaction::model()->findAll();

//$i=0;
$facname=array();
foreach($facultytablelist as $f)
{
	//echo $f['employee_transaction_employee_id'];	
	$res1=EmployeeTransaction::model()->findByAttributes(array('employee_transaction_employee_id'=>$f['employee_transaction_employee_id']));
//	echo $res1[''];
	$temp1=EmployeeInfo::model()->findByAttributes(array('employee_type'=>1,'employee_id'=>$f['employee_transaction_employee_id']));
	if($temp1)
	{
	$temp=$res1['employee_transaction_id'];
	$facname[$temp]=$temp1['employee_first_name'].' '.$temp1['employee_last_name'].' ('.$temp1['employee_name_alias'].')';	
	}	
}

echo $form->dropDownList($model,'employee_id', $facname, array('empty'=>'Select Faculty'));
		?>
		<?php echo $form->error($model,'employee_id'); ?>
	</div>
	<!--<div class="row">
		<?php echo $form->labelEx($model,'timetable_id'); ?>
		<?php echo $form->textField($model,'timetable_id'); ?>
		<?php echo $form->error($model,'timetable_id'); ?>
	</div> -->
<?php // var_dump($row1); ?>
	  <div class="row">
	  <?php 
		$date = date('Y/m/d');		
		echo $form->labelEx($model,'attendence_date'); ?>
		<?php
		
		if(Yii::app()->user->getState('emp_id') && Yii::app()->user->checkAccess('Attendence.AllDate')=='true')
		{
			
			$this->widget('CustomDatePicker',
			    array(
				'model'=>$model,
				'attribute'=>'attendence_date',
				'language' => 'en',
			
				'options' => array(
				    'dateFormat'=>'dd-mm-yy',
				    'changeMonth' => 'true',
				    'changeYear' => 'true',
				    'duration'=>'fast',
				'yearRange'=>'1900:'.(date('Y')+1),	
				    'showAnim' =>'slide',
				),
				'htmlOptions'=>array('tabindex'=>8,
				'style'=>'height:18px;
				 padding-left: 4px;width:160px;',
				'value'=> date('d-m-Y'),
				'readOnly'=>true,
				)
			    )
			);
		}
		else if(Yii::app()->user->getState('emp_id') && Yii::app()->user->checkAccess('Attendence.AllDate')!='true')
		{
			
			$this->widget('CustomDatePicker',
			    array(
				'model'=>$model,
				'attribute'=>'attendence_date',
				'language' => 'en',
			
				'options' => array(
				    'dateFormat'=>'dd-mm-yy',
				    'changeMonth' => 'false',
				    'changeYear' => 'false',
				    'duration'=>'fast',
				'yearRange'=>'1900:'.(date('Y')+1),	
				    'showAnim' =>'slide',
					'minDate'=>'-1',
				),
				'htmlOptions'=>array('tabindex'=>8,
				'style'=>'height:18px;
				    padding-left: 4px;width:160px;',
				'value'=> date('d-m-Y'),
				'readOnly'=>true,
				)
			    )
			);
		}
		else 
		{
			
			$this->widget('CustomDatePicker',
			    array(
				'model'=>$model,
				'attribute'=>'attendence_date',
				'language' => 'en',
			
				'options' => array(
				    'dateFormat'=>'dd-mm-yy',
				    'changeMonth' => 'true',
				    'changeYear' => 'true',
				    'duration'=>'fast',
				'yearRange'=>'1900:'.(date('Y')+1),	
				    'showAnim' =>'slide',

				),
				'htmlOptions'=>array('tabindex'=>8,
				'style'=>'height:18px;
				    padding-left: 4px;width:160px;',
				'value'=> date('d-m-Y'),
				'readOnly'=>true,
				)
			    )
			);
		}
		 
	?>
	<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'attendence_date'); ?>
	</div> 

	<div class="first-row" >
	<div class="row">
        <?php echo $form->labelEx($model,'student_attendence_period_id'); ?>
	<?php 

        echo $form->textField($model,'student_attendence_period_id',array('size'=>7,'maxlength'=>1));?>
	
	<span class="status">&nbsp;</span>
        <?php echo $form->error($model,'student_attendence_period_id'); ?>
	</div>

	
</div>
</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Search', array('class'=>'submit','name'=>'search','tabindex'=>9)); ?>
	</div>

<?php $this->endWidget(); ?>
</div>
</div>
<?php if(!empty($row1)) {?>
<script>
$(function () {
    $('.checkall').click(function () {
        $(this).parents('fieldset:eq(0)').find(':checkbox').attr('checked', this.checked);
    });
});
</script>
<fieldset>
    <!-- these will be affected by check all -->
   
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'attendence-form-student-list',
	'htmlOptions'=>array('enctype'=>'multipart/form-data','class'=>'student-attendance'),
	//'enableAjaxValidation'=>false,
	 'stateful'=>true,
	//'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>
<style>
th,td{
   padding-bottom:0px !important;
}
.center
{
margin-left:auto;
margin-right:auto;
width:5%;
background-color:#b0e0e6;
padding-left:19px;
}
.submit-class{
padding-left:125px;
background-color:#F1F6FF;
margin-left:auto;
margin-right:auto;
}
</style>

<table  class="table_data">
<th><input type="checkbox" class="checkall"></th>
<th colspan="10"  style="font-size: 18px; color: rgb(255, 255, 255);">Student List</th>
	 <tr class="table_header">
	    <th>P/A</th>
	    <th> Roll No </th>
	    <th> Enrollment No </th>
	    <th> Name </th>

	    <th>P/A</th>	
	    <th> Roll No </th>   
	    <th> Enrollment No </th>
	    <th> Name </th>

	    <th>P/A</th>	   
	    <th> Roll No </th>
	    <th> Enrollment No </th>
	    <th> Name </th>
	  
	</tr>	
<?php 
			$count = 0;
			$count = count($row1);
			
			for($i=0;$i<count($row1);$i++)
			{
			   $stud_id = $row1[$i]['student_transaction_id'];
			   $name_lable = $row1[$i]['student_first_name'];
			if(($i%2) == 0)
			{
			  $class = "odd";
			}
			else
			{
			  $class = "even";
			}
		if($i%3==0){
?>
		
		<tr class="<?php echo $class; ?>">
		<?php } ?>
			  <td class='center'>
				<?php echo $form->checkBox($model, 'st_id['.$stud_id.']', array('value'=>$stud_id)); ?></td>
			
			<td>
				<?php echo $row1[$i]['student_roll_no']; ?>
               		  </td>
			<td>
				<?php echo $row1[$i]['student_enroll_no']; ?>
               		  </td>
			  <td>
				<?php echo $name_lable; ?>
			  </td>
			<?php if($i%3==2) {?>  
			</tr>


<?php  			}
}

?>
<tr >
	<td colspan=3 class="submit-class"><?php echo CHtml::submitButton('Save', array('class'=>'submit','name'=>'save','tabindex'=>10)); ?></td>
</tr>
</table>
<?php $this->endWidget(); ?>

</div>
</fieldset>
<?php }?>







