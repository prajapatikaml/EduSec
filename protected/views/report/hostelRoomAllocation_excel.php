<?php

if($hostelid)
{
	
 $org_data = Organization::model()->findByPk(Yii::app()->user->getState('org_id'));

	echo "<table border=1>";
	echo "<caption><b> Hostel Room Allocation </b></caption>";
	echo "<thead>";
	echo "<tr>";
	echo "<th><b> Hostel<br> Block </b></th>";
	echo "<th><b> Room Name </b></th>";
	echo "<th><b> Room <br>Capacity </b></th>";
	echo "<th><b> Student <br>Name </b></th>";
	echo "</tr>";
	echo "</thead>";
	echo "<tr align=center>";
	
	
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
		
	foreach($roomAllocation as $key=>$data){
			echo "<tr align=center>";
		$reg_data = HostelStudentRegistration::model()->findAll(array('condition'=>'hostel_room_id='.$data['hostel_room_master_id'].' AND hostel_student_status = 1'));
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
			echo "<td  align=center>". StudentInfo::model()->findByPk($stud_trans->student_transaction_student_id)->student_first_name ."</td>";
			echo "</tr>";
			}
		}
		else{ 
			echo "<td>--</td>";
			echo "</tr>";
		}

	}	

echo "</table>";
}
?>
