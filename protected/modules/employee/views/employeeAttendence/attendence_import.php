<?php
/*
$db_name = Yii::app()->db->connectionString;
$value = substr(strstr(strstr($db_name, 'dbname='),'='),1);
echo $value;
*/

include 'simplexlsx.class.php';
$date = $_REQUEST['date'];
$xlsx = new SimpleXLSX('college_data/csv_docs/sheet'.$date.'.xlsx');
$data1 =$xlsx->rows();
$i=1;
$count = 0;
foreach($data1 as $data)
{
$var1 = null;
$eid = null;
	if($i==1)
	{
		function unixstamp( $excelDateTime ) 
		{
		    $d = floor( $excelDateTime ); // seconds since 1900
		    $t = $excelDateTime - $d;
		    return ($d > 0) ? ( $d - 25569 ) * 86400 + $t * 86400 : $t * 86400;
		}
		
		$unixDateVal = unixstamp($data[2]);
		//var_dump($unixDateVal);
		$exdate=date('Y-m-d',$unixDateVal);
		//echo $exdate; exit;
		$filename = "Book".$exdate.".xlsx";
		$i++;	
	}
	else if($i==2)
	{
		$i++;
	}	
	else 
	{
	$i++;
	//$var = $data[0];  /*Dept*/
	$var1 = $data[0];  /*Emp ID*/
	
	$var2 = $data[1];   /* Name*/
	//$var3 = $data[3];   /* Hol*/
	//$var4 = $data[4];   /* WO*/
	$var6 = $data[3];   /* In*/
	//output="13:37:00"
	$var7 = $data[4];   /* Out1*/
	//$var8 = $data[8];   /* In2*/	
	//$var9 = $data[9];   /* Out2*/
	//$var10 = $data[10];   /* In3*/
	//$var11 = $data[11];   /* Out3*/
	//$var12= $data[12];   /* In4*/	
	//$var13 = $data[13];   /* Out4*/
	//$var14 = $data[14]; /* Out*/
	//$var22 = $data[22];/*Total work*/
	//$var23 = $data[23]; /* Overtime*/

	$in1=date('H:i', round($var6*86400)-19800);
	
	$out1=date('H:i', round($var7*86400)-19800);
	
	$in2 = "00:00:00";
	$out2 = "00:00:00";
	$in3 = "00:00:00";
	$out3 = "00:00:00";
	$in4 = "00:00:00";
	$out4 = "00:00:00";
	$in5 = "00:00:00";
	$out5 = "00:00:00";
	$out = "00:00:00";
	$total = "00:00:00";
	$extra = "00:00:00";

	/*$in2=date('H:i', round($var8*86400)-19800);
	$out2=date('H:i', round($var9*86400)-19800);
	
	$in3=date('H:i', round($var10*86400)-19800);
	
	$out3=date('H:i', round($var11*86400)-19800);
	$in4=date('H:i', round($var12*86400)-19800);
	
	$out4=date('H:i', round($var13*86400)-19800);
	
	$total=date('H:i', round($var22*86400)-19800);
	$in5=date('H:i', round($var12*86400)-19800);
	$out5=date('H:i', round($var13*86400)-19800);
	
	$out = date('H:i', round($var14*86400)-19800);
	$total=date('H:i', round($var22*86400)-19800);
	
	$extra=date('H:i:s', round($var23*86400)-19800);*/
	$employee_attendence_organization_id=Yii::app()->user->getState('org_id');
	
	
	$connection=Yii::app()->db; 
	


	//$result1 = mysql_query("SELECT * FROM employee_attendence where date = '".$exdate."'");

	//$result1 = EmployeeInfo::model()->findByAttributes(array('employee_attendance_card_id'=>$var1));
	if(!empty($var1))
	{
	$result1 = Yii::app()->db->createCommand(
		'SELECT * FROM employee_info ef INNER JOIN employee_transaction et ON ef.employee_info_transaction_id = et.employee_transaction_id WHERE ef.employee_attendance_card_id ='.$var1.' AND et.employee_transaction_organization_id ='.Yii::app()->user->getState('org_id'))
	    ->queryRow();

	//print_r($result1); exit;

	$empid = $result1['employee_info_transaction_id'];
	$tr_id = EmployeeTransaction::model()->findByAttributes(array('employee_transaction_id'=>$empid,'employee_transaction_organization_id'=>Yii::app()->user->getState('org_id')));
	$eid = $tr_id['employee_transaction_id'];
	//print_r($leave_date);
	
	$result2 = Employee_attendence::model()->findByAttributes(array('employee_id'=>$eid,'date'=>$exdate));	
	
	if(empty($result2) && !empty($var1))
	{
		if($var6 == null)
			$atte = 'A';
		else
			$atte = 'P';
		if($eid != 0)
		{
		$sql = "INSERT INTO employee_attendence (employee_id,attendence,date,time1,time2,time3,time4,time5,time6,time7,
 time8, time9,time10,total_hour,overtime_hour,csvfile,employee_attendence_organization_id) VALUES 
('$eid','$atte','$exdate','$in1','$out1','$in2','$out2','$in3','$out3','$in4','$out4','$in5','$out5',
'$total','$extra','$filename','$employee_attendence_organization_id')";	
		
		$command=$connection->createCommand($sql);
		$command->execute(); 
		//$leave_date = EmployeeLeaveApplication::model()->findByAttributes(array('employee_leave_application_employee_code'=>$eid));	
		/*if(!empty($leave_date))
		{
			$start = $leave_date['employee_leave_application_leave_start_date'];
			$end = $leave_date['employee_leave_application_leave_end_date'];
			$status = $leave_date['employee_leave_application_status_2'];
			if($exdate >= $start && $exdate <= $end && $status == 2)
			{
				$sql_update = "UPDATE employee_attendence SET attendence='L' where employee_id = '$eid' AND date = '".$exdate."'";
				
				$command=$connection->createCommand($sql_update);
				$command->execute(); 
			}	
		}
		*/
		/*if($in1 > "00:00")
		{
			if($in1 > "10:00")
			{
					$sql_update1 = "UPDATE employee_attendence SET attendence='HL' where employee_id = '$eid' AND date = '".$exdate."'";
				
					$command=$connection->createCommand($sql_update1);
					$command->execute(); 
			}
			if($out < "16:56")
			{
					$sql_update2 = "UPDATE employee_attendence SET attendence='HL' where employee_id = '$eid' AND date = '".$exdate."'";
				
					$command=$connection->createCommand($sql_update2);
					$command->execute(); 
			}
		}*/
		}				
		}
	}	
	}
}
$this->redirect(array('admin'));
?> 

