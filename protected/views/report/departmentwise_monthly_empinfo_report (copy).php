<?php
$this->breadcrumbs=array('Report',
	'Employee Info',
	
);

$this->menu[]=	array('label'=>'', 'url'=>array('DepartmentwiseEmployeeInfoReport','excel'=>'excel','months'=>$month,'department'=>$dept,'employee_type'=>$type),'linkOptions'=>array('class'=>'export-excel','title'=>'Export to Excel','target'=>'_blank'));

?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employee-form',
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
				)));?>
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
		<?php echo CHtml::submitButton('Search',array('class'=>'submit')); ?>
	</div>

<?php $this->endWidget(); ?>
</div>	

<?php

if($hostelid)
{
 $org_data = Organization::model()->findByPk(Yii::app()->user->getState('org_id'));

echo "<table cellpadding='0' cellspacing='0' border='0' class='table_data'>";
	echo '<div class="table-title"><b> Hostel Room Allocation </b></div>';
	echo "<thead>";
	echo "<tr>  <th  colspan = 60 style=text-align:left;> ".CHtml::image(Yii::app()->controller->createUrl('/site/loadImage', array('id'=>Yii::app()->user->getState('org_id'))),'No Image',array('width'=>80,'height'=>55,'style'=>'float:left;margin-left:400px;')) ."
	 <big> <b>".$org_data->organization_name ."</big><br>". $org_data->address_line1." ".$org_data->address_line2."</br>" . City::model()->findBypk(Organization::model()->findByPk(Yii::app()->user->getState('org_id'))->city)->city_name.", ".State::model()->findBypk(Organization::model()->findByPk(Yii::app()->user->getState('org_id'))->state)->state_name.", ".Country::model()->findBypk(Organization::model()->findByPk(Yii::app()->user->getState('org_id'))->country)->name."." ." </th> <br>	</tr>";

	echo "<tr>";
	echo "<th><b> Hostel Block </b></th>";
	echo "<th><b> Room Name </b></th>";
	echo "<th><b> Room Capacity </b></th>";
	echo "<th><b> Student Name </b></th>";
	echo "<th><b> Branch </b></th>";
	echo "<th><b> Academic Period </b></th>";
	echo "<th><b> Semester </b></th>";
	echo "</tr>";
	echo "</thead>";	
	
	if(!$blockid){

		$roomAllocation = Yii::app()->db->createCommand()
			->select('*')
			->from('hostel_room_master')
			->where('hostel_hostelinfo_id = '.$hostelid)
			->queryAll();
	}
	else{
		$roomAllocation = Yii::app()->db->createCommand()
			->select('*')
			->from('hostel_room_master')
			->where('hostel_hostelinfo_id = '.$hostelid. ' and hostel_block_id = '.$blockid)
			->queryAll();
	}
		
	foreach($roomAllocation as $key=>$data){

		$reg_data = HostelStudentRegistration::model()->findAll(array('condition'=>'hostel_room_id='.$data['hostel_room_master_id']));
		$rowspan=count($reg_data);
		if($blockid)
			echo "<td rowspan=".$rowspan. ">". HostelBlocks::model()->findByPk($blockid)->block_name ."</	td>";			
		else
			echo "<td rowspan=".$rowspan.">".HostelBlocks::model()->findByPk($data['hostel_block_id'])->block_name."</td>";
		echo "<td rowspan=".$rowspan.">". $data['hostel_room_no_or_name'] ."</td>";
		echo "<td rowspan=".$rowspan.">". $data['hostel_room_capacity'] ."</td>";		

		if($reg_data){

		foreach($reg_data as $key=>$val){
			$stud_trans = StudentTransaction::model()->findByPk($val['hostel_student_transaction_id']);	
			echo "<td >". StudentInfo::model()->findByPk($stud_trans->student_transaction_student_id)->student_first_name ."</td>";
			echo "<td >". Branch::model()->findByPk($stud_trans->student_transaction_branch_id)->branch_name ."</td>";
			echo "<td>". AcademicTermPeriod::model()->findByPk($stud_trans->student_academic_term_period_tran_id)->academic_term_period ."</td>";
			echo "<td >". AcademicTerm::model()->findByPk($stud_trans->student_academic_term_name_id)->academic_term_name ."</td>";	
			echo "</tr>";
			}
		}
		else{ 
			echo "<td>  </td>";
			echo "<td>  </td>";
			echo "<td>  </td>";
			echo "<td>  </td>";	
			echo "</tr>";
		}

	}	

echo "</table>";
}
?>

else
{
	print  "<h1 style=\"color:red;text-align:center\">No Record To Display</h1>";
} ?>

