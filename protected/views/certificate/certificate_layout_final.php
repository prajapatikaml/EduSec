<!--By Ravi-->
<?php //$imageurl = Yii::app()->controller->createUrl('/site/loadImage', array('id'=>Yii::app()->user->getState('org_id')));
$imageurl =  Yii::app()->baseUrl."/college_data/organisation_logo/drstc.jpg";
 ?>
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
$stud_info = StudentInfo::model()->findByAttributes(array('student_enroll_no'=>$en_no));	



if(empty($_REQUEST['eno'])){
echo CHtml::link('GO BACK', array('certificate/certificategeneration'));
echo CHtml::button('Save',array('id'=>"printid1",'class'=>'submit','submit' => array('certificate/SaveStudentCertificatedata','stid'=>$stud_info->student_info_transaction_id,'ctype'=>$certificate_type)));
}
else
{

if(!empty($_REQUEST['studid']))	
echo CHtml::link('GO BACK', array('student/studentTransaction/studentcertificate','id'=>$_REQUEST['studid']));
}
?>
<button style='margin-left:50px;' class='submit' onclick="javascript:window.print()" id="printid1" class="submit">Print</button>
<?php
if($stud_info)
{
	$trans = StudentTransaction::model()->findByPk($stud_info->student_info_transaction_id); 
	$titl = "<b>".$stud_info->title."</b>";
	$name = "<b>".$stud_info->student_first_name." ".$stud_info->student_middle_name." ".$stud_info->student_last_name."</b>"; 
	$smobile = "<b>".$stud_info->student_mobile_no."</b>";
	$pmobile = "<b>".$stud_info->student_guardian_mobile."</b>";

	$en_no = "<b>".$en_no."</b>";
	$branch = "<b>".Branch::model()->findByPk($trans->student_transaction_branch_id)->branch_name."</b>";
	$sem = "<b>Sem-".AcademicTerm::model()->findByPk($trans->student_academic_term_name_id)->academic_term_name."</b>";
        if($trans->student_transaction_division_id != 0)
	$div = "<b>".Division::model()->findByPk($trans->student_transaction_division_id)->division_name."</b>";
	else
	$div = '-';
	$gender = "<b>".$stud_info->student_gender."</b>";
	$cdate = "<b>".date('d/m/Y')."</b>";
	if($trans->student_transaction_category_id !=0)
		$category = "<b>".Category::model()->findByPk($trans->student_transaction_category_id)->category_name."</b>";
	else 
		$category = "<b>not set</b>";
	$lin1 = "<b>not set</b>";
	$lin2 = "<b>not set</b>";
	$ct = "<b>not set</b>";
	$stat = "<b>not set</b>";
	$pc = "<b>not set</b>";

	if($trans->student_transaction_student_address_id !=0)
	{
		$address = StudentAddress::model()->findByPk($trans->student_transaction_student_address_id);
		$lin1 = "<b>".$address->student_address_c_line1."</b>";
		$lin2 = "<b>".$address->student_address_c_line2."</b>";
		$pc = "<b>".$address->student_address_c_pin."</b>";
		if($address->student_address_c_city != 0)
		   $ct = "<b>".City::model()->findByPk($address->student_address_c_city)->city_name."</b>";		
		if($address->student_address_c_state != 0)
		   $stat = "<b>".State::model()->findByPk($address->student_address_c_state)->state_name."</b>";	
	}	
	$quota = "<b>".Quota::model()->findByPk($trans->student_transaction_quota_id)->quota_name."</b>";
	$content = Certificate::model()->findByPk($certificate_type)->certificate_content;
	
	$content = str_replace('{title}',$titl,$content);
	$content = str_replace('{name}',$name,$content);
	$content = str_replace('{branch}',$branch,$content);
	$content = str_replace('{sem}',$sem,$content);	
	$content = str_replace('{division}',$div,$content);
	$content = str_replace('{enrollment}',$en_no,$content);
	$content = str_replace('{gender}',$gender,$content);
	$content = str_replace('{category}',$category,$content);
	$content = str_replace('{quota}',$quota,$content);
	$content = str_replace('{smobile}',$smobile,$content);
	$content = str_replace('{pmobile}',$pmobile,$content);
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
				
		    <?php	
			$org=Organization::model()->findAll(); 
			$org_data=$org[0];
			echo CHtml::image(Yii::app()->controller->createUrl('/site/loadImage', array('id'=>$org_data->organization_id)),'No Image',array('width'=>80,'height'=>55));
    ?>
 	            </div>

    		    <div class="address" style="font-size:12px;">
			    <?php
				$org_data = Organization::model()->findByPk(Yii::app()->user->getState('org_id'));

				echo $org_data->organization_name."</br>";
				echo $org_data->address_line1." ";
				echo $org_data->address_line2."</br>";
				echo City::model()->findBypk($org_data->city)->city_name.", ".State::model()->findBypk($org_data->state)->state_name.", ".Country::model()->findBypk($org_data->country)->name.".";
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
