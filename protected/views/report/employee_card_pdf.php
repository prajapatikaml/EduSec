<?php
$imageurl = Yii::app()->controller->createUrl('/site/loadImage', array('id'=>Yii::app()->user->getState('org_id')));
?>
<style>
.outer {
   float: left;
   margin-left:7px;
   width:40%;    
}     
.main {
   border: 2px solid black;
   border-radius: 5px 5px 5px 5px;
   height: 310px;
   margin-bottom: 20px;
   width: 200px;
}

.idcardheader {
   border-bottom: 1px solid black;
   float: left;
   height: auto;
   min-height: 34px;
   padding: 0 0 5px;
   width: 100%;
}

.logo {
  float: left;
  text-align: center;
  width: 20%;
  margin-top:5px;
}

.collegeheader {
  float: left;
  font-family: Arial Narrow;
  font-size: 12px;
  margin-left: 10px;
  width: 75%;
}

.contact-details {
  float: left;
  width: 230px;
  font-size:7px;
  min-height:50px;
  line-height:12px;
}

h3 { 
  margin:0px;
  line-height:10px;
}

.org_name {
  line-height:18px;
  min-height:18px !important;
  float:right;
  font-size:13px;
}

h4 {
  margin:0px;
  line-height:20px;
}

.front_content {
 float:left;
}

.contentpic {
  text-align:center;
  margin-top:1px;
}

.contentinfo {
 min-height:104px;
 font-size: 9px;
 margin-left: 7px;
 color:#000;
}

.water-image {
  background: url("../images/rs3.png") no-repeat scroll center center transparent;
  float: left;
  height: 88px;
  opacity: 0.6;
  position: relative;
  width: 200px;
  z-index: -10;
  bottom: 58%;
}

.labeldetail {
  float: left;
  font-weight: bold;
  min-width: 50px;
}

.value-detail {
  float: left;
  width: 64.5%;
  word-wrap : break-word;
}

.partition {
  float: left;
  padding-right: 5px;
}

.student-details {
  float: left;
  width: 100%;
}

.footername {
  text-align: center;
  width: 100%;
  font-size:9px;
}

.front_sign img {
  float:right;
}
.footer {
  border-radius: 0 0 5px 5px;
  float: left;
  font-size: 7px;
  background:#ccc;
  text-align:center;
}
.name {
 font-size: 10px;
 font-weight: bold;
 padding-bottom: 5px;
 text-align: center;
}

.front_sign {
 float:right;
}
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

$orglogo = CHtml::image(Yii::app()->baseUrl.'/organisation_logo/Logo.png','No Image',array('width'=>35,'height'=>30));

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
           echo CHtml::image(Yii::app()->baseUrl."/emp_images/" .$empphoto,"No Image",array("width"=>"70px","height"=>"85px"));
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
					echo CHtml::image(Yii::app()->baseUrl.'/org_sign/hansabapricipalsign.png',"",array("width"=>"80"));
				  if($org_id == 2)
					echo CHtml::image(Yii::app()->baseUrl.'/org_sign/jasodaba-principal.png',"",array("width"=>"80"));
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
