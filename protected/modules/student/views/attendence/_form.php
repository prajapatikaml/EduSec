
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'attendence-form',
	'enableAjaxValidation'=>true,
	 'stateful'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
	//'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); 
?>
<?php
	$org_id=Yii::app()->user->getState('org_id');
	$acd = Yii::app()->db->createCommand()
		->select('*')
		->from('academic_term')
		->where('current_sem=1 and academic_term_organization_id='.$org_id)
		->queryAll();
	$acdterm=CHtml::listData($acd,'academic_term_id','academic_term_name');
	$period=array();
	if(!empty($acdterm)){	
	$pe_data = AcademicTermPeriod::model()->findByPk($acd[0]['academic_term_period_id']);
	$period[$pe_data->academic_terms_period_id] = $pe_data->academic_term_period; 
	}?>


	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="block-error">
		<?php echo Yii::app()->user->getFlash('not-select-attendece'); ?>
	</div>

	
<div class="first-row">
	<div class="row">
		<?php echo $form->labelEx($model,'shift_id'); ?>
		<?php echo $form->dropDownList($model,'shift_id',Shift::items(), array('empty' => 'Select Shift','tabindex'=>1)); ?><span class="status">&nbsp;</span>

		<?php echo $form->error($model,'shift_id'); ?>
	</div>

	<div class="row">

        <?php echo $form->labelEx($model,'sem_id'); ?>
	<?php
			echo $form->dropDownList($model,'sem_id',$period,array('prompt' => 'Select Year'));?>
			<span class="status">&nbsp;</span>
        <?php echo $form->error($model,'sem_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sem_name_id'); ?>
	        <?php //echo $form->dropDownList($model,'student_academic_term_name_id',array()); ?>
		<?php 
			
			if(isset($model->sem_name_id))
				echo $form->dropDownList($model,'sem_name_id', CHtml::listData(AcademicTerm::model()->findAll(array('condition'=>'academic_term_id='.$model->sem_name_id)), 'academic_term_id', 'academic_term_name'));
			else
				echo $form->dropDownList($model,'sem_name_id',$acdterm,array('prompt' => 'Select Semester'),array('tabindex'=>3)); 
		?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'sem_name_id'); ?>
	</div>	

</div>
<div class="first-row">

	<div class="row">
		<?php echo $form->labelEx($model,'branch_id'); ?>
		<?php
			echo $form->dropDownList($model,'branch_id',
				CHtml::listData(Branch::model()->findAll(array('condition'=>'branch_organization_id='.$org_id)),'branch_id','branch_name'),
				array(
				'prompt' => 'Select Branch','tabindex'=>4,
				'ajax' => array(
				'type'=>'POST', 
				'url'=>CController::createUrl('dependent/getAttendenceItemName1'),	 	
				//'update'=>'#Attendence_div_id', //selector to update
				
				'dataType'=>'json',
		        	'success'=>'function(data) {

		                  $("#Attendence_div_id").html(data.div);
				  $("#Attendence_sub_id").html(data.sub);
				  $("#Attendence_batch_id").html(data.batch);
				
		                }',
				)));
			 
			 
		?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'branch_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'div_id'); ?>
		<?php //echo $form->dropDownList($model,'div_id',Division::items(), array('empty' => '---------------Select-------------','tabindex'=>5)); ?>
		<?php 
			
			if(isset($model->div_id))
				echo $form->dropDownList($model,'div_id', CHtml::listData(Division::model()->findAll(array('condition'=>'branch_id='.$model->branch_id.' and division_organization_id='.$org_id)), 'division_id', 'division_code'));
			else
				//echo $form->dropDownList($model,'div_id',array(),array('prompt' => '---------------Select-------------','tabindex'=>5));
				echo $form->dropDownList($model,'div_id',array(),
			array(
			'prompt' => 'Select Division','tabindex'=>5,
			'ajax' => array(
			'type'=>'POST', 
			'url'=>CController::createUrl('dependent/getAttendenceBatch'), 
			'update'=>'#Attendence_batch', //selector to update
			
			))); 
			  
		?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'div_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sub_id'); ?>
		<?php //echo $form->dropDownList($model,'sub_id',SubjectMaster::items(), array('empty' => '---------------Select-------------','tabindex'=>6)); ?>
		<?php 
			
			if(isset($model->sub_id))
				echo $form->dropDownList($model,'sub_id', CHtml::listData(SubjectMaster::model()->findAll(array('condition'=>'subject_master_branch_id='.$model->branch_id.' and subject_master_organization_id='.$org_id)), 'subject_master_id', 'subject_master_name'));
			else
				echo $form->dropDownList($model,'sub_id',array('prompt' => 'Select Subject'),array('tabindex'=>6)); 
		?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'sub_id'); ?>
	</div>

</div>
<div class="first-row" >
	<div class="row">
        <?php echo $form->labelEx($model,'batch_id'); ?>
        <?php //echo $form->dropDownList($model,'batch_id',Batch::items(), array('empty' => '---------------Select-------------','tabindex'=>7)); ?>
	<?php 
			
			if(isset($model->batch_id))
				echo $form->dropDownList($model,'batch_id', CHtml::listData(Batch::model()->findAll(array('condition'=>'div_id='.$model->div_id.' and batch_organization_id='.$org_id)), 'batch_id', 'batch_code'),array('prompt' => 'Select Batch'));
			else
				echo $form->dropDownList($model,'batch_id',array('prompt' => 'Select Batch'),array('tabindex'=>7)); 
	?><span class="status">&nbsp;</span>
        <?php echo $form->error($model,'batch_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'employee_id'); ?>
		<?php	
		//$faculty = array();

$facultytablelist = EmployeeTransaction::model()->findAll('employee_transaction_organization_id='.Yii::app()->user->getState('org_id'));

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
	$facname[$temp]=$temp1['employee_first_name'];
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
			
			$this->widget('zii.widgets.jui.CJuiDatePicker',
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
					'maxDate'=> '0',
				//	'minDate'=>'0',
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
			
			$this->widget('zii.widgets.jui.CJuiDatePicker',
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
					'maxDate'=> '0',
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
			
			$this->widget('zii.widgets.jui.CJuiDatePicker',
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
					'maxDate'=> '0',
				//	'minDate'=>'0',
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
	    <th> Enrollment No </th>
	    <th> Name </th>

	    <th>P/A</th>	   
	    <th> Enrollment No </th>
	    <th> Name </th>

	    <th>P/A</th>	   
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







