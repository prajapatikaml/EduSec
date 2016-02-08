<?php
$this->breadcrumbs=array('Report',
	'Employee Leave Info ',
);
if(isset($_POST['department']))
{
	$dept=$_POST['department'];
}
$this->menu[]=	array('label'=>'', 'url'=>array('EmployeeLeaveInfoReport','excel'=>'excel','months'=>$month,'year'=>$yr,'department'=>$dept),'linkOptions'=>array('class'=>'export-excel','title'=>'Export to Excel','target'=>'_blank'));

	$months = array();
	$year=date('Y');	
	for( $i = 1; $i <= 12; $i++ ) 
	{
	    $months[ $i ] = strftime( '%B', mktime( 0, 0, 0, $i, 1 ));
	}
	for($j=2012;$j<=$year;$j++)
	{
		$yearValue[$j]=$j;
	}
?>
<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title"><span class="box-title">Select Criterias</span>
</div>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employee-leave-info-form',
	'enableAjaxValidation'=>true,
)); ?>
	<div class="row">        
	<?php echo CHtml::label(Yii::t('demo','Year'),'year'); ?>
	<?php echo CHtml::dropdownlist('year','',$yearValue,array('prompt'=>'Select Year','options'=>array($yr=>array('selected'=>true))));
	?>		 	
	</div>
	<div class="row">
	<?php echo CHtml::label(Yii::t('demo', 'Month'), 'month'); ?>
	<?php echo CHtml::dropDownList('months', '' , $months, array('prompt'=>'Select 			Month','options' =>array($month=>array('selected'=>true)))); ?>	
	</div>
	<div class="row">
	<?php echo CHtml::label(Yii::t('demo', 'Department'), 'department'); ?>
	<?php echo CHtml::dropDownList('department', '',CHtml::listData(Department::model()->findAll(), 'department_id','department_name'),array('empty'=>'Select Department','options' =>array($dept=>array('selected'=>true)),));?>
	
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit', array('class'=>'submit')); ?>
	</div>	

<?php $this->endWidget(); ?>
</div>	<!-- div form end--> 
</div>
<?php 
if(isset($yr)&& isset($month))
{
$month_value = $month;
$num = cal_days_in_month(CAL_GREGORIAN, $month_value, date('Y')); 
$colspan=$num+9;
if($employee)
{
	$m=0;
	 $org = Organization::model()->findAll();
	$org_data=$org[0];
?>
	<div class="portlet box yellow" style="width:100%;margin-top:20px;">
    <i class="icon-reorder"></i>
    <div class="portlet-title"><span class="box-title">Monthly All Subject Attendence Report</span>
    	<div class="operation">
	  <?php echo CHtml::link('Back', array('Report/EmployeeLeaveInfoReport'), array('class'=>'btnback'));?>	
	    <?php echo CHtml::link('Excel', array('EmployeeLeaveInfoReport','excel'=>'excel','months'=>$month,'year'=>$yr,'department'=>$dept), array('class'=>'btnblue'));?>	
	</div>
    </div>
<div class="portlet-body" >
	<?php	echo '<table class="report-table" border="2" > ';
	echo "<thead>";
	echo "<tr align=center> <th  colspan = 60 style=text-align:left;> ".CHtml::image(Yii::app()->controller->createUrl('/site/loadImage', array('id'=>$org_data->organization_id)),'No Image',array('width'=>80,'height'=>55,'style'=>'float:left;margin-left:200px;')) ."
	 <big> <b>".$org_data->organization_name ."</big><br>". $org_data->address_line1." ".$org_data->address_line2."</br>"  . City::model()->findBypk($org_data->city)->city_name.", ".State::model()->findBypk($org_data->state)->state_name.", ".Country::model()->findBypk($org_data->country)->name."." ." </th> <br>	 </tr>";
	echo "<tr><th colspan=15 ><big> Employee Leave Report For Month- ".date("F", mktime(0,0,0,$month)).'-'.$yr."</big></th></tr>";	
	echo "<tr><th rowspan=2 > <b>SI No.</b></th>";
	echo "<th rowspan=2> <b> Employee Name </b></th>";
	foreach($leave as $lv)
 	{		
		echo "<th>".$lv['leave_master_category']."</th>";
	}
	
	echo "</tr></thead>";
	foreach($employee as $emp)
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

		echo $emp['title'].''.$emp['employee_first_name'].' '.$emp['employee_last_name'].' ( '.$emp['employee_name_alias'].' )';
	   echo "</td>";
	$org = Yii::app()->user->getState('org_id');
	foreach($leave as $lv)
	{
	$count=0;
	$totalLeave=EmployeeLeaveApplication::model()->findAll(array('condition'=>
	'(month(employee_leave_application_leave_start_date)='.$month_value.' OR month(employee_leave_application_leave_end_date)='.$month_value.') AND (year(employee_leave_application_leave_start_date)='.$yr.' OR year(employee_leave_application_leave_end_date)='.$yr.') AND employee_leave_application_employee_code='.$emp['employee_id'].' AND employee_leave_application_leave_code='.$lv['leave_master_id'].' AND employee_leave_application_status_2=2'
	 ));
	 foreach($totalLeave as $leave_app)
	 {
	       $startdate_month=date_format(new DateTime($leave_app->employee_leave_application_leave_start_date), 'm');
	       $enddate_month=date_format(new DateTime($leave_app->employee_leave_application_leave_end_date), 'm');
		if($startdate_month==$enddate_month)
			$count+=$leave_app->employee_leave_application_days;
		else
                {
		    $month_days=cal_days_in_month(CAL_GREGORIAN,$month_value, $yr);
                    $start_date=date_format(new DateTime($leave_app->employee_leave_application_leave_start_date), 'd');
		    $count+=$month_days-$start_date;		    	 			
		}		
		
	 } 		
		echo"<td>". $count."</td>";
	}	
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






