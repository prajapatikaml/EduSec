<title>Print Postal Label</title>
<style>
@media screen {
	.outer {
	    float: left;
	    margin-left: 10px;
	}
	.main {
	   /* border: 1px solid black;
	    border-left: none;*/
	    float: left;
	    height: 80px;
	    margin-bottom: 10px;
	    width: 263px;
	    padding:10px;
	    font-family: Arial;
    	    font-size: 11px;
	}
	.student-details {
	    margin-bottom: 2px;
	    width: 100%;
	    float:left;
	    
	}
	label {
	    width:28%;
	}
	.value-detail {
	    float:right;
	    width:77%;
	}
}
@media print 
{
	.outer {
	    float: left;
	    margin-left: 7px;
	}
	.main {
	    float: left;
	    height: 80px;
	    margin-bottom: 10px;
	    width: 170px;
	    padding:10px;
	    font-family: Arial;
    	    font-size: 9px;
	}
	.student-details {
	    margin-bottom: 2px;
	    width: 100%;
	    float:left;
	    
	}
	label {
	    width:28%;
	}
	.value-detail {
	    float:right;
	    width:77%;
	}
	.print {
	    display:none;
	}
	h2 {
  page-break-after:always;
	}
}
</style>
<?php
//print_r($student_data);

if($student_data)
{
if($selectedlist)
{
?>
<div class="print">
<?php
//echo Yii::app()->request->baseUrl;
$gobackimage = CHtml::image('../images/Goback.png', 'No Image', array('height'=>'40','width'=>40));

echo CHtml::link($gobackimage,Yii::app()->createUrl('report/PostLabelStudent'),array('title'=>'Go Back'))."&nbsp;&nbsp;"; 
?>
<button onclick="javascript:window.print()" id="printid">Print</button>
</div></br></br>
<?php
$i=0;
foreach($student_data as $stud)
{

?>
<!--main div-->
<div class="outer">
	<div class="main">
		<?php
		foreach($selectedlist as $key=>$value)
				{				
					
					if($value=='student_first_name')
					{
					$lname = StudentInfo::model()->findByPk($stud['student_transaction_student_id'])->student_last_name;
					$fname = StudentInfo::model()->findByPk($stud['student_transaction_student_id'])->student_first_name;	
					$mname = StudentInfo::model()->findByPk($stud['student_transaction_student_id'])->student_middle_name;	
					$label = "Name";
					$field_value = $lname." ".$fname." ".$mname;
					}
					if($value=='student_address_c_line1')
					{
					$line1 = StudentAddress::model()->findByPk($stud['student_transaction_student_address_id'])->student_address_c_line1;
					$line2 = StudentAddress::model()->findByPk($stud['student_transaction_student_address_id'])->student_address_c_line2;
					$city = City::model()->findByPk(StudentAddress::model()->findByPk($stud['student_transaction_student_address_id'])->student_address_c_city)->city_name;
					$pin = StudentAddress::model()->findByPk($stud['student_transaction_student_address_id'])->student_address_c_pin;
					$state = State::model()->findByPk(StudentAddress::model()->findByPk($stud['student_transaction_student_address_id'])->student_address_p_state)-> 	state_name;
					$label = "Address";
					$field_value = $line1.",".$line2." ".$city."-".$pin.",".$state;
					}
					if($value=='student_address_p_line1')
					{
					$line1 = StudentAddress::model()->findByPk($stud['student_transaction_student_address_id'])->student_address_p_line1;
					$line2 = StudentAddress::model()->findByPk($stud['student_transaction_student_address_id'])->student_address_p_line2;
					$city = City::model()->findByPk(StudentAddress::model()->findByPk($stud['student_transaction_student_address_id'])->student_address_p_city)->city_name;
					$pin = StudentAddress::model()->findByPk($stud['student_transaction_student_address_id'])->student_address_p_pin;
					$state = State::model()->findByPk(StudentAddress::model()->findByPk($stud['student_transaction_student_address_id'])->student_address_p_state)-> 	state_name;
					$label = "Address";
					$field_value = $line1.",".$line2." ".$city."-".$pin.",".$state;
					
					}
					if($value=='student_mobile_no')
					{
					$label = "Contact";
					$field_value = StudentInfo::model()->findByPk($stud['student_transaction_student_id'])->student_mobile_no;
					}
					if($value=='student_guardian_mobile')
					{
					$label = "Contact";
					$field_value = StudentInfo::model()->findByPk($stud['student_transaction_student_id'])->student_guardian_mobile;
					}
					?>
	
		<div class="student-details">
			<?php echo '<label>'.$label.' : </label>';?> 
			<div class="value-detail"><?php echo $field_value; ?></div>
		</div>
		<?php } //end selected for loop ?>
	</div>
</div>

<?php 
$i++;
	if($i%24 == 0)
		echo "<h2></h2>";
} //end for loop
} //end selectedlist
else
  print  "<h1 style=\"color:red;text-align:center\">Select field first.</h1>";
} //end student data if
else
{
	print  "<h1 style=\"color:red;text-align:center\">No Record To Display</h1>";
}
?>
