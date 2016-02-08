<?php
$this->breadcrumbs=array(
	'Attendance',

);?>
<script>
$(function () {
    $('.checkall').click(function () {
        $(this).parents('table:eq(0)').find(':checkbox').attr('checked', this.checked);
    });
});
</script>
<div class="portlet box blue" style="margin-top:20px">
<i class="icon-reorder"></i>
<div class="portlet-title"><span class="box-title">Student List</span>
<div class="operation">
<?php echo CHtml::link('Back',array('/timetable/timetable/FacultyPersonalTimetable'), array('class'=>'btnback'));?>
</div>
</div>
<?php
 $form=$this->beginWidget('CActiveForm', array(
	'id'=>'attendence-form',
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	//'enableAjaxValidation'=>false,
	 'stateful'=>true,
	//'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

</style>
<table  class="report-table" width = 100%>
	<tr>
	<th><input type="checkbox" class="checkall"></th>
	<th  colspan = 3>Batch : <?php if($_REQUEST['batch'] != 0) echo Batch::model()->findByPk($_REQUEST['batch'])->batch_code ;?> </br>
	Subject : <?php echo SubjectMaster::model()->findByPk($_REQUEST['subject_id'])->subject_master_name ;?> </th></tr>
	 <tr class="table_header">
	    <th>P/A</th>
	    <th> Roll No </th>
	    <th> Name </th>

	</tr>	
<?php 
	$count = 0;
	$count = count($row1);
	
	for($i=0;$i<count($row1);$i++)
	{
	   $stud_id = $row1[$i]['student_transaction_id'];
	   $name_lable = $row1[$i]['student_first_name'].' '.$row1[$i]['student_middle_name'].' '.$row1[$i]['student_last_name'];
	   if(($i%2) == 0)
	     $class = "odd";
	  else
	     $class = "even";
?>
	<tr class="<?php echo $class; ?>">
	    <td class='center'>
	    <?php echo $form->checkBox($model, 'st_id['.$stud_id.']', array('value'=>$stud_id)); ?></td>
	    <td><?php echo $row1[$i]['student_roll_no']; ?></td>
	    <td><?php echo $name_lable; ?></td>
	</tr>
	<?php
	}
	?>
<tr align = center><td colspan=3><?php echo CHtml::submitButton('Save', array('class'=>'submit','name'=>'save','tabindex'=>10)); ?></td>
</tr>

</table>
<?php $this->endWidget(); ?>
</div>
