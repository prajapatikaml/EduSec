<style>
tr{
	background:white;	
}
</style>
<?php
$this->breadcrumbs=array('Report',
	'Hostel Room Allocation',
	
);
?>
<div class="form">
<div class="portlet box blue" style = "margin-top:20px;">
<i class="icon-reorder"></i>
<div class="portlet-title"> <span class="box-title">Room Allocation</span>

</div>	
<?php $form=$this->beginWidget('CActiveForm', array('id'=>'room-allocation',
	'enableAjaxValidation'=>true,
)); ?>
<div class="row">        
		<?php echo $form->labelEx($model,'hostel_hostelinfo_id'); ?>

		<?php echo $form->dropDownList($model,'hostel_hostelinfo_id',CHtml::listData(HostelInformation::model()->findAll(), 'hostel_information_id', 'hostel_name'),
				array(
				'prompt' => 'Select Hostel',
				'ajax' => array(
				'type'=>'POST', 
				'url'=>CController::createUrl('dependent/getBlock'),			
				'dataType'=>'json',
				'success'=>'function(data) {
			          $("#HostelRoomMaster_hostel_block_id").html(data.div);
			  	
				}',
				)));?><span class="status">&nbsp;</span>
	</div>
	<div class="row">
	<?php echo $form->labelEx($model,'hostel_block_id'); ?>
        	<?php
	 		if(!empty($model->hostel_block_id))
				  echo $form->dropDownList($model,'hostel_block_id', CHtml::listData(HostelBlocks::model()->findAll(array('condition'=>'blocks_id='.$model->hostel_block_id.' and  block_hostel_id='.$model->hostel_hostelinfo_id)), 'block_id', 'block_name'),array('prompt'=>"Select Batch"));
		 		else	
		 		 echo $form->dropDownList($model,'hostel_block_id', array('empty' => 'Select Block')); ?><span class="status">&nbsp;</span>	
	 </div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Search', array('class'=>'submit'));?>
	</div>

<?php $this->endWidget(); ?>
</div>
<?php
if($hostelid)
{
?>
<?php
if(!$blockid){
	$roomAllocation = Yii::app()->db->createCommand()
		->select('*')
		->from('hostel_room_master')
		->where('hostel_hostelinfo_id = '.$hostelid.' order by hostel_room_no_or_name')
		->queryAll();
}
else{
	$roomAllocation = Yii::app()->db->createCommand()
		->select('*')
		->from('hostel_room_master')
		->where('hostel_hostelinfo_id = '.$hostelid. ' and hostel_block_id = '.$blockid.' order by hostel_room_no_or_name')
		->queryAll();
}
if(!$roomAllocation){
	echo "<h1 style='text-align:center;color:red'> No Records to Display </h1>";
}
else
{
?>
<div class="portlet box yellow" style="margin-top:20px">
<i class="icon-reorder"></i>
<div class="portlet-title"><span class="box-title">Hostel Room Allocation Report</span>
<div class="operation">
<?php echo CHtml::link('Excel', array('HostelRoomAllocatoin','excel'=>'excel','hostelid'=>$hostelid,'blockid'=>$blockid, 'model'=>get_class($model)), array('class'=>'btnblue','target'=>'_blank'));?>
</div>	
</div>
<table  border="2px" class = "report-table">
<?php
	echo "<thead>";
	echo "<tr>";
	echo "<th><b> Hostel Block </b></th>";
	echo "<th><b> Room Name </b></th>";
	echo "<th><b> Room Capacity </b></th>";
	echo "<th><b> Student Name </b></th>";
	echo "</tr>";
	echo "</thead>";
		
	foreach($roomAllocation as $key=>$data){
		echo "<tr align=center>";
		$reg_data = HostelStudentRegistration::model()->findAll(array('condition'=>'hostel_room_id='.$data['hostel_room_master_id'].' AND hostel_student_status = 1'));
		$rowspan=$reg_data?count($reg_data):1;
		if($blockid)
			echo "<td rowspan=".$rowspan. ">". HostelBlocks::model()->findByPk($blockid)->block_name ."</	td>";			
		else
			echo "<td rowspan=".$rowspan.">".HostelBlocks::model()->findByPk($data['hostel_block_id'])->block_name."</td>";
		echo "<td rowspan=".$rowspan.">". $data['hostel_room_no_or_name'] ."</td>";
		echo "<td rowspan=".$rowspan.">". $data['hostel_room_capacity'] ."</td>";		

		if($reg_data){

		foreach($reg_data as $key=>$val){
			$stud_trans = StudentTransaction::model()->findByPk($val['hostel_student_transaction_id']);	

			$stud = StudentInfo::model()->findByPk($stud_trans->student_transaction_student_id);
			echo "<td align=center>". $stud->student_first_name." ".$stud->student_middle_name." ".$stud->student_last_name ."</td>";
			echo "</tr>";
			}
		}
		else{ 
			echo "<td>-</td>";
			echo "</tr>";
		}

	}	

echo "</table>";
}
?>
</div>
<?php
}
?>
</div>
