<head>
	<title>Student Personal Timetable</title>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/timetable.css" />	

<style type="text/css">

.oncol {
height: 55px;

width: 154px;
}
#content{
    width: 95%;
}
  .ravi {  
    display: none; 
    background: #FFF !important; 
    position: absolute;
    width: 155px;
    border:1px solid;
    margin-left:-170px;
    
  }
.karmraj {

position: relative;
width: 150px;
}

#twoColThinTable .row{
 border:#FFF 1px solid !important;
}
#twoColThinTable{
   border:2px solid #F0E68C !important;
}
#twoColThinTable .col2,
#twoColThinTable .col1 {
  border-top:#FFF 1px solid !important;
}
#twoColThinTable .col2{
  width:400px !important;
  color:#666699 !important;
  background:#FFF;
}
#twoColThinTable .col1{
  width:100px !important;
  background:#FFF;
}
#twoColThinTable td{
 
}
</style>

<script>
$(function() {

  $("#datepicker").datepicker({ dateFormat: "dd-mm-yy", onSelect: function(date) {
	//alert(date);
        window.location = "<?php echo Yii::app()->request->baseUrl;?>"+"/parents/parent/studenttimetable?student_id="+"<?php echo $_REQUEST['student_id']; ?>"+"&date="+date;
     }, }).val();
});
</script>
<script>
  function show(id) {
  //  document.getElementById(id).style.visibility = "visible";
    document.getElementById(id).style.display = "block";
  }
  function hide(id) {
//    document.getElementById(id).style.visibility = "hidden";
      document.getElementById(id).style.display = "none";
  }

</script>

	
</head>
<?php
$this->breadcrumbs=array(
	'Student Timetable',

);?>

<?php

	
	if($_REQUEST['student_id'])
	{
		echo CHtml::link('GO BACK','studentpersonaltimetable?student_id='.$_REQUEST['student_id'],array('id'=>"printid1")); 
?>
	<button class='submit' style="float:right" onclick="javascript:window.print()" id="printid1">Print</button>
	
<?php
	if(isset($_REQUEST['date']))
    		$date = $_REQUEST['date'];
  	else
    		$date = date('d-m-Y');

	$ts = strtotime($date);
	$week_number = date('W', $ts);
	$year = date('Y');
	for($day=1; $day<7; $day++)
	{
	    $alldate[] = date('d-m-Y', strtotime($year."W".$week_number.$day));
	}
	$day = array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");

?>

<div class="form" id="printid1" >
<label style="width:100px !important;">Select Date: </label><input type="text" id="datepicker" value="<?php echo $date; ?>"/></div><div id='printable'>

<?php

	$inf = StudentInfo::model()->findByAttributes(array('student_info_transaction_id'=>$_REQUEST['student_id']));
        echo "</br>Name : ".$inf->student_first_name." ".$inf->student_last_name;

		$criteria = new CDbCriteria;
		//$criteria->select = 'academic_term_id'; // select fields which you want in output
		$criteria->condition = 'current_sem = 1 AND academic_term_organization_id = '.Yii::app()->user->getState('org_id');

		$semname = AcademicTerm::model()->findAll($criteria);

		$data = CHtml::listData($semname,'academic_term_id','academic_term_id');
		$stud_model=StudentTransaction::model()->findByPk($_REQUEST['student_id']);
		$check_sem = in_array($stud_model->student_academic_term_name_id, $data);
		//var_dump($check_sem); exit;
		$timetableid=0;

		if(!$check_sem)
		{
	
			echo "<h3 align=center style=color:red>Sorry, No timetable available.</h3>";
		}
		else{
			 $check_timetable=TimeTableDetail::model()->findByAttributes(
			array(
			     'acdm_name_id' => $stud_model->student_academic_term_name_id,
			     'division_id' => $stud_model->student_transaction_division_id,
		   ));
		if(empty($check_timetable)) {
			echo "<h3 align=center style=color:red>Sorry, No timetable available.</h3>";
		}
		else {
			$division_id = $stud_model->student_transaction_division_id;
			$timetableid = $check_timetable->timetable_id;
			$model=TimeTable::model()->findByPk($timetableid);
			$nooflec = $model->No_of_Lec;
			$sum = $nooflec;


		$lec_duration=LecDuration::model()->findAllByAttributes(array(),
							$condition  = 'timetable_id = :table_id ', 
							$params     = array(
								':table_id' => $timetableid,
								));
		$lec=array();
		foreach($lec_duration as $l)
			$lec[]=$l['duration'];

		$createdate = date_create($model->creation_date);

		$starti = 1;
		if($model->zero_lec==1)
		{
			$starti = 0;
		}

		$time=$model->clg_start_time;
		$time = date('H:i A',strtotime($time));
		$timestamp = strtotime($time);
		$time = date('g:i A', $timestamp);?>
	
	
			</br> <?php echo "Division: ".Division::model()->findByPk($division_id)->division_code;?></br>
	
		
			w.e.f:<?php echo date_format($createdate,'d-m-Y'); ?>
	
		
		<table class="gradienttable" id="time-table-struc"  border="1" style="font-size:12px; border-collapse:collapse; ">
		<tr>
		   <td colspan=7>
		     <div class="header">
		        <div class="logo" >
		        <?php echo CHtml::image(Yii::app()->controller->createUrl('/site/loadImage', array('id'=>Yii::app()->user->getState('org_id'))),'No Image',array('width'=>80,'height'=>55));
		    ?>
		        </div>

		        <div class="address">
		        <?php
			  $org_data = Organization::model()->findByPk(Yii::app()->user->getState('org_id'));

			  echo $org_data->organization_name."</br>";
			  echo $org_data->address_line1." ";
			  echo $org_data->address_line2."</br>";
			  echo City::model()->findBypk(Organization::model()->findByPk(Yii::app()->user->getState('org_id'))->city)->city_name.", ".State::model()->findBypk(Organization::model()->findByPk(Yii::app()->user->getState('org_id'))->state)->state_name.", ".Country::model()->findBypk(Organization::model()->findByPk(Yii::app()->user->getState('org_id'))->country)->name.".";
			?>   
		       </div>
 	             </div>
		   </td>
		</tr>
		<th  align=center>Day/Time</th>

		<?php
			$i=0;
			while($i < 6)
			{
				echo "<th>".$day[$i]."</br>(".$alldate[$i].")</th>";    
				$i++;
			}
		
		$break="";
		$l=0;
		$count =  array(
		  1=>0,
		  2=>0,
		  3=>0,
		  4=>0,
		  5=>0,
		  6=>0,
		);


		for($i=$starti;$i<=$nooflec;$i++)
		{
			$days=count($day);
			echo "<tr>";
			$duration = NoOfBreakTable::model()->findByAttributes(
							 array(
								'timetable_id' => $timetableid,
								'after_lec_break' => $i,
								));
			$dur = $duration['duration'];
			if($dur)
				$dur1=date('i',strtotime($dur));
				
			if($break)
			{
				echo "<td style=width:100px;>".$time."-</br>".date('g:i A', strtotime($time)+$dur1*60)."</td><td colspan=7 align=center>Break</td></tr>";
				$break="";
				$timestamp = strtotime($time) +$dur1*60;
				$time = date('g:i A', $timestamp);
				$i--;
				continue;
			}
			else
			{
				echo "<td style=width:100px;>".$time."-</br>".date('g:i A', strtotime($time) + 60*$lec[$l])."</td>";
				$timestamp = strtotime($time) + 60*$lec[$l];
				$l++;
				$time = date('g:i A', $timestamp);
			}
	
			for($j=1;$j<=$days;++$j)
			{
				$subname="";
				$room="";
				$faculty="";
				$batch="";
			
				if($count[$j]>0)
				{
					$break=NoOfBreakTable::model()->findAllByAttributes(
						array(),
						$condition  = 'timetable_id = :table_id  AND after_lec_break = :lec',
						$params     = array(
							':table_id' => $timetableid,
				 			':lec' => $i,
							));
					$count[$j]--;
					continue;
				}

				$result=TimeTableDetail::model()->findAllByAttributes(
								array(),
								$condition  = 'timetable_id = :table_id AND day = :day AND lec = :lec AND division_id = :div_id AND lecture_date =:lecdate and proxy_status <> :status',
								$params     = array(
									':table_id' => $timetableid,
									':day' => $j,
						 			':lec' => $i,
									':div_id' =>$division_id,
									':lecdate'=>date('Y-m-d',strtotime($alldate[$j-1])),
									':status'=>2,
									));
				$break=NoOfBreakTable::model()->findAllByAttributes(
						array(),
						$condition  = 'timetable_id = :table_id  AND after_lec_break = :lec',
						$params     = array(
							':table_id' => $timetableid,
				 			':lec' => $i,
							));
		
				if($result)
				{	
					foreach($result as $list)
					{
						if($list['lect_hour']>1)
							$count[$j] = $list['lect_hour']-1;
							echo "<td class='oncol' rowspan=".$list['lect_hour']." align=center 'style=width:100px;' onMouseOver=show('ravi".$i.$j."') onMouseOut=hide('ravi".$i.$j."')>" ;				
					break;
					}
					
				
					foreach($result as $check)
					{
						$sy_date = date('Y-m-d',strtotime($alldate[$j-1]));
						$syll = SubjectSyllabus::model()->findAll(array('condition'=>'sub_id='.$check->subject_id.' and start_date<="'.$sy_date.'" and end_date >="'.$sy_date.'"'));
						$top_str = '';
						$top = $top_desc = '';
						
						foreach($syll as $lst)
						{
							$top_str .= "<h3>".$lst['topic_name'].'</h3>'.$lst['topic_description'];					$top = $lst['topic_name'];
							$top_desc = $lst['topic_description'];
						}
						
						if($check->batch_id != 0 && $check->batch_id !=$stud_model->student_transaction_batch_id)
					        {
						   continue;
					        }
						if($check->batch_id != 0)
						$batch="(".Batch::model()->findByPk($check->batch_id)->batch_code.")";
						$subname = SubjectMaster::model()->findByPk($check->subject_id)->subject_master_name;
						$room="(".RoomDetailsMaster::model()->findByPk($check->room_id)->room_name.")";	
						$emp_row = EmployeeInfo::model()->findByAttributes(array('employee_info_transaction_id'=>$check->faculty_emp_id));
						$faculty="(".$emp_row->employee_name_alias.")";
						
						if($batch)
						$str =  $subname."</br>".$batch."</br>".$room."</br>".$faculty;
						else
						$str = $subname."</br>".$room."</br>".$faculty;

						if($syll)
							echo "<u>".$str."</u>";		
						else
						    echo $str;

					if($top_str == '')
					    echo "</td>";
					else{ 
						echo "<div id='ravi".$i.$j."' class='ravi'>"; ?>
						<table id="twoColThinTable">
						<tr class="row">
						  <td class="col1"><b>Faculty </b></td>
						  <td class="col2"><?php echo $emp_row->employee_first_name." ".$emp_row->employee_middle_name." ".$emp_row->employee_last_name ;?></td>
						</tr>
						<tr class="row">	
						   <td class="col1"><b>Topic/ Lession</b></td> 
						   <td class="col2"><?php echo $top;?></td>
						</tr>	
						<tr class="row">
							<td class="col1"><b>Sub-Topics </b></td> 
							<td class="col2"> <?php echo $top_desc;?></td>
						</tr>
						</table>
					</div>
					<?php }

					}
					   
				}//if($result) END
				else
				{
					echo "<td style=width:100px;>".$subname."</br>".$batch."</br>".$room."</br>".$faculty."</td>";		
			
				}
		
			  }// J LOOP END
			echo "</tr>";
		}// I LOOP END
		echo "</table>";
	     //ELSE (empty($timetableid)) END
?>
<h5>Proxy details</h5>

<table class="gradienttable" id="time-table-struc"  border="1" style="font-size:12px; border-collapse:collapse; ">
<tr>
<th>Sr. No.</th>
<th>Employee Name</th>
<th>Proxy Employee Name</th>
<th>Subject</th>
<th>Lecture No.</th>
<th>Date</th>
</tr>
<?php
      $proxy_data=TimeTableDetail::model()->findAllByAttributes(
	array(),
	$condition  = 'timetable_id = :timetable_id and division_id = :div_id and lecture_date >= :start and lecture_date< :end and proxy_status = :proxy order by lec',
		$params = array(
			':timetable_id' => $timetableid,
			':div_id'=>$stud_model->student_transaction_division_id,
			':start'=>date('Y-m-d',strtotime($alldate[0])),
			':end'=>date('Y-m-d',strtotime($alldate[5])),
			':proxy'=>1,
			));
	$n = 0; 
   foreach($proxy_data as $list) {
	$result = TimeTableDetail::model()->findByPk($list->proxy_id);
?>

<tr>
<td><?php echo ++$n; ?></td>
<td><?php echo EmployeeInfo::model()->findByAttributes(array('employee_info_transaction_id'=>$list->faculty_emp_id))->employee_first_name; ?></td>
<td><?php echo EmployeeInfo::model()->findByAttributes(array('employee_info_transaction_id'=>$result->faculty_emp_id))->employee_first_name; ?></td>
<td><?php echo SubjectMaster::model()->findByPk($result->subject_id)->subject_master_alias; ?></td>
<td><?php echo $result->lec; ?></td>
<td><?php echo date('d-m-Y',strtotime($result->lecture_date)); ?></td>
</tr>
<?php } ?>
</table></div>
<?php
	}

	   }
	}//if $_REQUEST['student_id'] end
	else
	{
		echo CHtml::link('GO BACK',Yii::app()->createUrl('/site/newdashboard')); 
		echo "No student Login";
	}
?>

