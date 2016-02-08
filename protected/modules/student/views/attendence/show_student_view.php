<?php
$this->breadcrumbs=array(
	'Attendance',

);?>
<table  border="2px" id="twoColThinTable">
<tr class="row">
	<td class="col1">Division </td>
	<td class="col2"><?php echo Division::model()->findByPk($_REQUEST['division_id'])->division_code;?></td>
</tr>
<tr class="row">
	<td class="col1">Batch</td> 
	<td class="col2"> <?php if($_REQUEST['batch'] != 0) echo Batch::model()->findByPk($_REQUEST['batch'])->batch_code ;?></td>
</tr>
<tr class="row">
	<td class="col1">Subject </td> 
	<td class="col2"> <?php echo SubjectMaster::model()->findByPk($_REQUEST['subject_id'])->subject_master_name ;?></td>
</tr>	
<tr class="row">
	<td class="col1">Date </td> 
	<td class="col2"> <?php echo $_REQUEST['date'] ;?></td>
</tr>
</table>
</br>
<script>
$(function () {
    $('.checkall').click(function () {
        $(this).parents('fieldset:eq(0)').find(':checkbox').attr('checked', this.checked);
    });
});
</script>
<fieldset>
<?php
 $form=$this->beginWidget('CActiveForm', array(
	'id'=>'attendence-form',
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
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
