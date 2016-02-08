<?php
$emp_id = $_REQUEST['id'];
$emp_name = EmployeeInfo::model()->findByAttributes(array('employee_info_transaction_id'=>$emp_id));
$this->breadcrumbs=array(
	'Employee Monthly Attendance',
	$emp_name['employee_first_name'],
);
?>

<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title"><span class="box-title">Fill Details</span>
<div class="operation">
<?php echo CHtml::link('Back', Yii::app()->createUrl('/employee/employeeTransaction/update', array('id'=>$_REQUEST['id'])), array('class'=>'btnback'));?>
</div>
</div>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employee-attendence-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true)
)); ?>	
	<?php $months = array();

		for( $i = 1; $i <= 12; $i++ ) 
		{
	    		$months[ $i ] = strftime( '%B', mktime( 0, 0, 0, $i, 1 ) );
		}
	?>

	<div class="row">
		<?php if(isset($_POST['Employee_attendence']['month']))
			$value = $_POST['Employee_attendence']['month'];
		      else
			$value = date('n');	
		?> 
		<?php echo $form->labelEx($model,'month'); ?>
		<?php
		 echo $form->dropDownList($model,'month', $months, array('prompt'=>'Select Month','options'=>array($value=>array('selected'=>'selected'))));
		?>
		<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'month'); ?>	
	  
	</div>

	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Save',array('class'=>'submit')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
<?php

	if(!empty($_POST['Employee_attendence']['month']))
	{
		$month = $_POST['Employee_attendence']['month'];
	}
	else
	{
		$month = date('m');
	}

?>
<html>
<head>
</head>
<body>
<?php echo "<br>";

$emp_id = $_REQUEST['id'];

$currentdate = date('Y-m-d');

$curYear = date('Y');

$total_day = cal_days_in_month(CAL_GREGORIAN, $month, $curYear);

if($emp_id != null)
{
$emp_attendence_data = Employee_attendence::model()->findAll(array('condition'=>'employee_id='.$emp_id.' AND Month(date)='.$month.' AND Year(date)='.$curYear.' AND date <= "'.$currentdate.'"','order'=>'date ASC'));
	
if(!empty($emp_attendence_data))
{
$i=1;
$m=1;
$n=1;
$emp_name = EmployeeInfo::model()->findByAttributes(array('employee_info_transaction_id'=>$emp_id));

?>
<div class="portlet box gray" style="margin-top:10px;">
<i class="icon-reorder"></i>
 <div class="portlet-title"><span class="box-title">Attendance Report Of <?php echo $emp_name['employee_first_name']."&nbsp;".$emp_name['employee_middle_name']."&nbsp".$emp_name['employee_last_name'];?></span>
</div>
<table class="report-table"  style="font-size: 18px; ">
<tr class="table_header" style="width: 100px;">
<th>Sr.No.</th>
<th>Date</th>
<th>Attendence</th>
<th>In Time</th>
<th>Out Time</th>
</tr>
<?php

for($n=1;$n<=$total_day;$n++)
{
$emp_attendence = Employee_attendence::model()->findAll(array('condition'=>'employee_id='.$emp_id.' AND Day(date) ='.$n.' AND Month(date)='.$month.' AND Year(date)='.$curYear,'order'=>'date ASC'));
if(!empty($emp_attendence))
{	
foreach($emp_attendence as $list)
{
	if(($m%2) == 0)
	{
	  $class = "odd";
	}
	else
	{
	  $class = "even";
	}
   $date1 = $list['date'];
   if($date1 < $currentdate)
   {
   print '<tr class='.$class.'><td>'.$i.'</td>';
   
   $date = date("d-m-Y", strtotime($list['date']));
   print '<td>'.$date.'</td>'; 
  
   print '<td>'.$list['attendence'].'</td>'; 
   
   print '<td>'.$list['time1'].'</td>'; 
	
   print '<td>'.$list['time2'].'</td></tr>'; 
   }	    
$i++;
$m++;
 }
}
else
{
	if(($m%2) == 0)
	{
	  $class = "odd";
	}
	else
	{
	  $class = "even";
	}
   
   if($n < 10)
	$d="0".$n;
   else
	$d= $n;

   $len = strlen($month);
   if($len == 1)
	$month1 = "0".$month; 
   else
	$month1 = $month;

   $date1 = $curYear."-".$month1."-".$d;
   
   if($date1 <= $currentdate)
   {
   print '<tr class='.$class.'><td>'.$i.'</td>';

   print '<td>'.$d."-".$month1."-".$curYear.'</td>'; 
     
   print '<td>'."LWP".'</td>'; 
    
   print '<td>'."00:00:00".'</td>'; 
	
   print '<td>'."00:00:00".'</td></tr>'; 
   }	    
$i++;
$m++;
}
}
?>
</table>
<?php
}
else
{
	echo "<h3 style=color:red>No Attendence For This Employee</h3>";
}
}
else
{
	echo "<h3 style=color:red>No Employee Login</h3>"; 
}
?>


