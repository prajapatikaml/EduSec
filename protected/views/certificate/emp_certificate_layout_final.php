<!--By Ravi-->
<?php $imageurl =  Yii::app()->baseUrl."/college_data/organisation_logo/drstc.jpg"; ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
 <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/certificate.css" media="screen, print, projection" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/timetable.css" />
<style>
.watermark-area {
   position: relative;
}

.watermark-area:before {
  background: url(<?php echo $imageurl; ?>) no-repeat scroll center / 300px 300px transparent;
  content: "";
  height: 400px;
  opacity:0.15;
  -moz-opacity: 0.15;
  -webkit-opacity: 0.15;
  position: absolute;
  width: 825px;
  z-index: -1;
  margin:auto;
}
@media print {
.certificate_main{
  border:none !important;
  padding-top:50px;
}
}
</style>
</head>
<title><?php echo Certificate::model()->findByPk($certificate_type)->certificate_title;?>
</title>
<body>

<?php
$emp_info = EmployeeInfo::model()->findByAttributes(array('employee_attendance_card_id'=>$attendence_no));
	
if(!empty($_REQUEST['empid']))
{
echo CHtml::link('GO BACK', array('/employee/employeeTransaction/employeeCertificates','id'=>$_REQUEST['empid']),array('id'=>'printid1'));
}
else {
echo CHtml::link('GO BACK',array('certificate/EmployeeCertificategeneration'),array('id'=>'printid1'));
echo CHtml::button('Save',array('id'=>'printid1','class'=>'submit','submit' => array('certificate/SaveEmployeeCertificatedata','emp_id'=>$emp_info->employee_info_transaction_id,'ctype'=>$certificate_type)));
}

?>
<button style='margin-left:50px;' class='submit' onclick="javascript:window.print()" id="printid1" class="submit">Print</button>
<?php
if($emp_info)
{
	$trans = EmployeeTransaction::model()->findByPk($emp_info->employee_info_transaction_id); 
	$titl = "<b>".$emp_info->title."</b>"; 	
	$name = "<b>".$emp_info->employee_first_name." ".$emp_info->employee_middle_name." ".$emp_info->employee_last_name."</b>"; 
	
	$attendence_no = "<b>".$attendence_no."</b>";
	$gender = "<b>".$emp_info->employee_gender."</b>";
	$emobile = "<b>".$emp_info->employee_private_mobile."</b>";

	if($trans->employee_transaction_department_id !=0)
		$department = "<b>".Department::model()->findByPk($trans->employee_transaction_department_id)->department_name."</b>";
	else 
		$department = "<b>not set</b>";
	
	if($trans->employee_transaction_designation_id !=0)
		$designation = "<b>".EmployeeDesignation::model()->findByPk($trans->employee_transaction_designation_id)->employee_designation_name."</b>";
	else 
		$designation = "<b>not set</b>";
	
	$lin1 = "<b>not set</b>";
	$lin2 = "<b>not set</b>";
	$ct = "<b>not set</b>";
	$stat = "<b>not set</b>";
	$pc = "<b>not set</b>";

	if($trans->employee_transaction_emp_address_id !=0)
	{
		$address = EmployeeAddress::model()->findByPk($trans->employee_transaction_emp_address_id);
		$lin1 = "<b>".$address->employee_address_c_line1."</b>";
		$lin2 = "<b>".$address->employee_address_c_line2."</b>";
		$pc = "<b>".$address->employee_address_c_pincode."</b>";
		if($address->employee_address_c_city != 0)
		   $ct = "<b>".City::model()->findByPk($address->employee_address_c_city)->city_name."</b>";		
		if($address->employee_address_c_state != 0)
		   $stat = "<b>".State::model()->findByPk($address->employee_address_c_state)->state_name."</b>";	
	}


	$cdate = "<b>".date('d/m/Y')."</b>";
	$content = Certificate::model()->findByPk($certificate_type)->certificate_content;
	
	$content = str_replace('{title}',$titl,$content);
	$content = str_replace('{name}',$name,$content);
	$content = str_replace('{gender}',$gender,$content);
	$content = str_replace('{attendencecardno}',$attendence_no,$content);
	$content = str_replace('{department}',$department,$content);
	$content = str_replace('{designation}',$designation,$content);
	$content = str_replace('{emobile}',$emobile,$content);
	$content = str_replace('{date}',$cdate,$content);
	$content = str_replace('{line1}',$lin1,$content);
	$content = str_replace('{line2}',$lin2,$content);
	$content = str_replace('{city}',$ct,$content);
	$content = str_replace('{state}',$stat,$content);
	$content = str_replace('{pin}',$pc,$content);


?>	
<div class="certificate_main">
	<div id="printid1" class="header" style="border-bottom:2px solid">
      		     <div class="logo" >
 			    <?php $org_data = Organization::model()->findAll();
				echo CHtml::image(Yii::app()->controller->createUrl('/site/loadImage', array('id'=>$org_data[0]->organization_id)),'No Image',array('width'=>80,'height'=>55));
    ?>
 	            </div>

    		    <div class="address" style="font-size:12px;">
			    <?php
				
				echo $org_data[0]->organization_name."</br>";
				echo $org_data[0]->address_line1." ";
				echo $org_data[0]->address_line2."</br>";
				echo City::model()->findBypk($org_data[0]->city)->city_name.", ".State::model()->findBypk($org_data[0]->state)->state_name.", ".Country::model()->findBypk($org_data[0]->country)->name.".";
				?>   
    		   </div>
 		</div>
  
	<div class="certificate_content">
		
		<div>
			<div class="content">
			<div class="watermark-area">
			</div><!--Watermark Div end-->
			  
			 <?php
		
		//$updated_cont = str_replace('{name}','Name',$content);
		echo  $content;//Certificate::model()->findByPk($certificate_type)->certificate_content; ?>
			</div>
			
		</div>
	</div><!-- content div close -->
  
	
</div>
<?php } // end of certificate_info
else
{
	print  "<h1 style=\"color:red;text-align:center\">No Record To Display</h1>";
}
?>

</body>
</html>
