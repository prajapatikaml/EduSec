<?php
$imageurl = Yii::app()->controller->createUrl('/site/loadImage', array('id'=>Yii::app()->user->getState('org_id')));
?>
<style>

.watermark-area {
   position: relative;
}

.watermark-area:before {
  background: url(<?php echo $imageurl; ?>) no-repeat scroll center top / 100px 100px transparent;
  content: "";
  height: 100px;
  opacity:0.2;
  -moz-opacity: 0.2;
  -webkit-opacity: 0.2;
  position: absolute;
  width: 100px;
  z-index: -1;
  padding-left: 100px;
}
</style>
<title>Print ID Card</title>

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/empprintcard.css"/>

<div class="print">
<?php
$gobackimage = CHtml::image('../images/Goback.png', 'No Image', array('height'=>'40','width'=>40));

echo CHtml::link('GO BACK',Yii::app()->createUrl('report/Employeeid'),array('title'=>'GO BACK'))."&nbsp;&nbsp;"; 
//echo CHtml::link('PDF',Yii::app()->createUrl('report/Employeeid',array('pdf'=>'pdf','departmentid'=>$dept,'employee_card_id'=>$cardno,'temp_name'=>$temp)),array('title'=>'GO BACK'))."&nbsp;&nbsp;"; 
?>
<button style="float:right; margin-right:50%;" onclick="javascript:window.print()" id="printid">Print</button>
</div></br>
<?php
$org_id=Yii::app()->user->getState('org_id');

$org_data = Organization::model()->findByAttributes(array('organization_id'=>$org_id));
$orgcity = City::model()->findByPk($org_data->city)->city_name;
$orgstate = State::model()->findByPk($org_data->state)->state_name;

$emp = array();
$i = 0;
?>

<?php
if($employee_data1)
{

foreach($employee_data1 as $emp)
{

$orglogo = CHtml::image(Yii::app()->controller->createUrl('/site/loadImage', array('id'=>Yii::app()->user->getState('org_id'))),'No Image',array('width'=>35,'height'=>30));

$empphoto = EmployeePhotos::model()->findByPk($emp['employee_transaction_emp_photos_id'])->employee_photos_path; 
?>



<div class="outer">
<div class="main">
	<!--Header div-->
	<div class="idcardheader">
		<div class="logo">
			<?php echo $orglogo;?>
		</div>
		<div class="collegeheader">
			<?php echo $org_data->organization_name;?>
		</div>
	</div>
	<!-- End Header div-->
	<?php

	$label=null;
	$field_value=null;
	?>
	<!--Content div-->
 	<div class="front_content">
   	<div class="contentpic">
	<?php 
           echo CHtml::image(Yii::app()->baseUrl."/college_data/emp_images/" .$empphoto,"No Image",array("width"=>"70px","height"=>"85px"));
	?>
    	</div>
	<div class="watermark-area">
	<div class="contentinfo">		

        <?php
	foreach($selected_list as $key=>$value)
	{
		if($key == "employee_first_name") {
		  $mname = substr($emp['employee_middle_name'], 0, 1);
	          $mname = $mname.".";
		  echo '<div class="name">'.$emp['employee_first_name']." ".$mname." ".$emp['employee_last_name'].'</div>';
		}
	?>

  	<?php
	if($key=='department_name')
		$field_value = Department::model()->findByPk($emp['employee_transaction_department_id'])->department_name;
	else if($key=='employee_designation')
		$field_value = EmployeeDesignation::model()->findByPk($emp['employee_transaction_designation_id'])->employee_designation_name;
	else if($key=='employee_address_c_line1')
	{
	  if(!empty($emp['employee_transaction_emp_address_id'])) {
		$curr_data = EmployeeAddress::model()->findByPk($emp['employee_transaction_emp_address_id']);
		$line1 = $curr_data->employee_address_c_line1;
		$line2 = $curr_data->employee_address_c_line2;

		if(!empty($curr_data->employee_address_c_city)) 
		$city = City::model()->findByPk($curr_data->employee_address_c_city)->city_name;

		$pin = $curr_data->employee_address_c_pincode;

		if(!empty($curr_data->employee_address_c_state))
		$state = State::model()->findByPk($curr_data->employee_address_c_state)->state_name;

		$label = $value;

		$field_value = $line1.", ".$line2." ".$city."-".$pin.",".$state;
		}
	}
	
	else {
		if($key == "employee_dob" || $key == "employee_joining_date") {
		   $field_value = date("d-m-Y",strtotime($emp[$key]));		
		}
		else 
		$field_value = $emp[$key];
	}
	?>
	<?php 

		if($key!='employee_first_name') {
	?>
	
	<div class="student-details">	
		<?php echo "<span class='labeldetail'>".$value."</span>"; ?>
		<?php echo "<span class='partition'> : </span>"; ?>
		<?php echo "<span class='value-detail'>".$field_value."</span>"; ?>
		
	</div>	
					
	<?php  } 
	 } 	//for end loop
	?>

 	</div> <!-- End contentinfo div-->
	</div> <!-- WATERMARK DIV COMPLETED -->
	<div class="front_sign">
			<?php
				  if($org_id == 1)
					echo CHtml::image(Yii::app()->baseUrl.'/college_data/org_sign/hansabapricipalsign.png',"",array("width"=>"80"));
				  if($org_id == 2)
					echo CHtml::image(Yii::app()->baseUrl.'/college_data/org_sign/jasodaba-principal.png',"",array("width"=>"80"));
			?>
		<div class="footername">
			Principal
		</div> 
	</div>		
		
	</div>	<!-- End frontContent div-->
	<!--Footer barcode div-->
	<div class="footer">

	<?php 
		echo $org_data->address_line1." ".$org_data->address_line2." ".$orgcity."-".$org_data->pin." ".$orgstate.", Ph: ".$org_data->phone; ?>
	</div><!-- End Footer barcode div-->

	
</div><!-- End  MAin Div -->
</div><!-- End Outer Div--->
<?php $i++;
	if($i%4 == 0)
	{?>
		<h2>&nbsp;</h2>
<?php	}
 } //foreachloop end
}//end if block
else
{
	print  "<h1 style=\"color:red;text-align:center\">No Record To Display</h1>";
}
?>
