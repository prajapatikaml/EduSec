<?php
$this->breadcrumbs=array('Report',
	'Employee Info',
	
);
$dept='';
$type='';
if(isset($_POST['department']))
{

	$dept=$_POST['department'];
	$type=$_POST['employee_type'];
}
//echo $type;exit;
$this->menu[]=	array('label'=>'', 'url'=>array('DepartmentwiseEmployeeInfoReport','excel'=>'excel','months'=>$month,'department'=>$dept,'employee_type'=>$type),'linkOptions'=>array('class'=>'export-excel','title'=>'Export to Excel','target'=>'_blank'));

?>
<?php	
	$months = array();
	$year=date('Y');
	for( $i = 1; $i <= 12; $i++ ) 
	{
	    $months[ $i ] = strftime( '%B', mktime( 0, 0, 0, $i, 1 ));
	}
?>
<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title"><span class="box-title">Select Criterias</span>
</div>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employee-form',
	'enableAjaxValidation'=>true,
)); ?>
	<div class="row">
	<?php echo CHtml::label(Yii::t('demo', 'Month'), 'month'); ?>
	<?php echo CHtml::dropDownList('months', '' , $months, array('prompt'=>'Select 			Month','options' =>array($month=>array('selected'=>true)),)); ?>	
	</div>

	<div class="row">
	<?php echo CHtml::label(Yii::t('demo', 'Department'), 'department'); ?>
	<?php echo CHtml::dropDownList('department', '',CHtml::listData(Department::model()->findAll(), 'department_id','department_name'),array('empty'=>'Select Department','options' =>array($dept=>array('selected'=>true)),));?>
	</div>
	
	<div class="row">
	<?php echo CHtml::label(Yii::t('demo', 'Eemployee Type'), 'employee_type'); ?>
	<?php echo CHtml::dropDownList('employee_type','',array("0"=>"Non Teaching","1"=>"Teaching"),array("prompt"=>"Select Type",'options' =>array($type=>array('selected'=>true))));?>
	</div>		

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit', array('class'=>'submit')); ?>
	</div>

<?php $this->endWidget(); ?>
</div>	
</div>
<!-- display employee name   -->
<?php
$year = date('Y');
if(isset($month))
{
$month_value = $month;
$num = cal_days_in_month(CAL_GREGORIAN, $month_value, date('Y')); 
$colspan=$num+9;
$col=$num+6;

if($employee_data)
{

	$emp_info=new EmployeeInfo;
		
	$m=0;
	$org = Organization::model()->findAll();
	$org_data=$org[0];
?>
	<div class="portlet box yellow" style="width:100%;margin-top:20px;">
    	<i class="icon-reorder"></i>
    	<div class="portlet-title"><span class="box-title">Attendence Details</span>
	    	<div class="operation">
		  <?php echo CHtml::link('Back', array('Report/DepartmentwiseEmployeeInfoReport'), array('class'=>'btnback'));?>	
		  <?php echo CHtml::link('Excel', array('DepartmentwiseEmployeeInfoReport','excel'=>'excel','months'=>$month,'department'=>$dept,'employee_type'=>$type), array('class'=>'btnblue'));?>	
		</div>
   	 </div>
	<div class="portlet-body" >
	<?php	echo '<table class="report-table" border="2" > ';
	echo "<thead>";
	echo "<tr align=center> <th  colspan = 60 style=text-align:left;> ".CHtml::image(Yii::app()->controller->createUrl('/site/loadImage', array('id'=>$org_data->organization_id)),'No Image',array('width'=>80,'height'=>55,'style'=>'float:left;margin-left:200px;')) ."
	 <big> <b>".$org_data->organization_name ."</big><br>". $org_data->address_line1." ".$org_data->address_line2."</br>"  . City::model()->findBypk($org_data->city)->city_name.", ".State::model()->findBypk($org_data->state)->state_name.", ".Country::model()->findBypk($org_data->country)->name."." ." </th> <br>	 </tr>";
			
	echo "<tr><th colspan=2 ><b> Month </b></th> <th colspan=".$colspan."><b> ".date("F", mktime(0,0,0,$month))."</b></th></tr>";	
	
	echo "<tr><th style='text-align:center;'>SI No.</th>";
	echo "<th> Employee Name </th>";
	
	for($i = 1; $i<=$num; $i++) {
		    print '<th>'.$i.'</th>';
		}
	echo "<th> Total No.of Days </th>";
	echo "<th> Total No.of Days Present </th>";
	echo "<th> Total CL Taken </th>";
	echo "<th> Total DL Taken </th>";
	echo "<th> Total SL Taken </th>";
	echo "<th> Total LWP Taken </th>";
	//echo "<th> Percentage </th>";	
	
	echo "</tr></thead>";
	foreach($employee_data as $emp)
	{
	   if(($m%2) == 0)
	   {
		  $class = "odd";
	   }
	   else
	   {
	         $class = "even";
	   }	
	   echo '<tr class='.$class.'>';
	   echo '<td>';
	   echo ++$m;
	   echo '</td>';
	   echo "<td>";
	        echo $emp['title'].$emp['employee_first_name'].' '.$emp['employee_last_name'];
	   echo "</td>";		
		for($j = 1; $j<=$num; $j++)
		{
			if(strlen($j) == 1)
			$j = "0".$j;
			$date = $j.'-'.$month_value.'-'.date('Y');
			$attend_date = date("Y-m-d", strtotime($date));	
			$emp_no=0;$a = 1;
			$result1 = Employee_attendence::model()->findAll(array('condition'=>'month(date)='.$month_value.' AND employee_id='.$emp['employee_id'].' AND day(date)='.$j.' AND year(date)='.$year));			
			if(count($result1) !=0)		
			{				
				print "<td>";
				foreach($result1 as $result)
				{
				$myclass = $result->attendence == 'P' ? 'green' : 'red'; 
								
					if($a == count($result1))
					
					print "<b style=color:$myclass>".$result->attendence."</br></b>";
					else
					print "<b style=color:$myclass>".$result->attendence."</br></b>";
				$a+=1;
				
				}
				print "</td>";				
			}
			else
			{
				print '<td> - </td>'; 
			}
		$emp_no++;	
		} 	
		// find total attendence of employee
		$all_attendance = Employee_attendence::model()->findAll(array('condition'=>'month(date)='.$month_value.' AND employee_id='.$emp['employee_id'].' AND year(date)='.$year));

		$present_attendance = Employee_attendence::model()->findAll(array('condition'=>'month(date)='.$month_value.' AND employee_id='.$emp['employee_id'].' AND year(date)='.$year.' AND attendence = "P"'));

		$present_cl = Employee_attendence::model()->findAll(array('condition'=>'month(date)='.$month_value.' AND employee_id='.$emp['employee_id'].' AND year(date)='.$year.' AND attendence = "CL"'));
		$present_dl = Employee_attendence::model()->findAll(array('condition'=>'month(date)='.$month_value.' AND employee_id='.$emp['employee_id'].' AND year(date)='.$year.' AND attendence = "DL"'));
		$present_sl = Employee_attendence::model()->findAll(array('condition'=>'month(date)='.$month_value.' AND employee_id='.$emp['employee_id'].' AND year(date)='.$year.' AND attendence = "SL"'));
		$present_lwp = Employee_attendence::model()->findAll(array('condition'=>'month(date)='.$month_value.' AND employee_id='.$emp['employee_id'].' AND year(date)='.$year.' AND attendence = "LWP"'));
		$cl=count($present_cl);
		$dl=count($present_dl);
		$sl=count($present_sl);
		$lwp=count($present_lwp);
		$present=count($present_attendance);
		$total=count($all_attendance);
		$percentage=0;
		if($total!=0)
		   $percentage = ($present*100)/$total;

		print "<td>"; echo $total;  print "</td>";
		print "<td>"; echo $present;  print "</td>";
		print "<td>"; echo $cl; print "</td>";
		print "<td>"; echo $dl;	print "</td>";
		print "<td>"; echo $sl; print "</td>";
		print "<td>"; echo $lwp; print "</td>";
		//print "<td>"; echo round($percentage,2).'%';print "</td>";		
		echo "</tr>";
   }
	echo "</table>";
}

}
else
{
	print  "<h1 style=\"color:red;text-align:center\">No Record To Display</h1>";
} ?>
</div>
</div>
