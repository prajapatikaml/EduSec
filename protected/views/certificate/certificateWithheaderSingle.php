<?php
$imageurl =  Yii::app()->baseUrl."/college_data/organisation_logo/college_logo.jpg";
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
 <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/certificate.css" media="screen, print, projection" />

<style>
.certificate_content {
    float: left;
    min-height: 620px;
    width:810px!important;    
}
.header {
  float: left;
  margin-bottom: 1px;
  text-align: center;
  width: 100%;
}
.certificate_main {
    border: 6px double #163142;
    border-radius: 5px 5px 5px 5px;
    float: left;
    height: auto;
    margin-left: 12px;
    min-height: 464px;
    position: relative;
    width: 863px!important;
    z-index: 1;
}
.student-certificate-records {
    border: 6px double #163142;
    float: left;
    min-height: 865px!important;
    width: 160px;
}
.bord {
    border-right: 2px dotted;
    float: left;
    height: 870px;
    margin-left: 5px;
}
.watermark-area {
   position: absolute;
   margin-top:20%;
   margin-left:30%;
}

.watermark-area:before {
  background-image: url(<?php echo $imageurl; ?>);
  background-position: center center;
  background-repeat: no-repeat;
  background-size: 300px 300px;
  content: "";
  height: 300px;
  opacity:0.15;
  -moz-opacity: 0.15;
  -webkit-opacity: 0.15;
  position: absolute;
  width: 300px;
  z-index: -1;
}
@media print{
  body {
  margin-top:0 !important;
}
.certificate_content {
    float: left;
    min-height: 620px;
    width:950px!important;  	  
}
.photo{    
    margin-left:880px!important;
   
}
.back{
display:none !important;
}
.student-certificate-records {
    border: 6px double #163142;
    float: left;
    min-height: 800px!important;
    width: 160px;
	font-size: 14px !important;
}
.bord {
    border-right: 2px dotted;
    float: left;
    height: 800px!important;
    margin-left: 5px;
}
.certificate_main {
    border: 6px double #163142;
    border-radius: 5px 5px 5px 5px;
    float: left;
    height: auto;
    margin-left: 12px;
    min-height: 690px !important;
    position: relative;
    width: 1145px!important;
    z-index: 1;
    font-size: 15px !important;
}
.org-details {
    float: left;
    font-family: verdana;
    font-size: 15px;
    margin-top: 20px;
    width: 220px !important;
    margin-left:50px;
}
.all-data{
   width:100% !important;
}
 @page {
	margin: 0 !important;
        margin-left:30px; 
}
}
.org-name {
    font-family: Arial;
    font-size: 24px !important;
}

</style>
</head>
<title><?php echo $t = Certificate::model()->findByPk($certificate_type)->certificate_title;?>
</title>
<body>

<button style='margin-left:50px;' class='submit' onclick="javascript:window.print()" id="printid1" class="submit">Print</button>

<?php
if(Yii::app()->controller->action->id!="certiview"){
echo CHtml::link('GO BACK', array('certificate/certificategeneration'),array('class'=>'back'));

echo CHtml::button('Save',array('id'=>"printid1",'class'=>'submit','submit' => array('certificate/SaveStudentCertificatedata','stid'=>$stud_info->student_info_transaction_id,'ctype'=>$certificate_type)));
}
else
{

if(!empty($_REQUEST['studid']))	
echo CHtml::link('GO BACK', array('student/studentTransaction/studentcertificate','id'=>$_REQUEST['studid']),array('class'=>'back'));
}
if(!isset($stud_info))
$stud_info = StudentInfo::model()->findByAttributes(array('student_enroll_no'=>$en_no));	

if($stud_info)
{
	$trans = StudentTransaction::model()->findByPk($stud_info->student_info_transaction_id); 
	$titl = "<b>".$stud_info->title."</b>";
	$name = "<b>".$stud_info->student_first_name." ".$stud_info->student_middle_name." ".$stud_info->student_last_name."</b>"; 
	$smobile = "<b>".$stud_info->student_mobile_no."</b>";
	$pmobile = "<b>".$stud_info->student_guardian_mobile."</b>";

	$branch_model=Branch::model()->findByPk($trans->student_transaction_branch_id);
	$en_no = "<b>".$stud_info->student_enroll_no."</b>";
	$branch = "<b>".$branch_model->branch_name."</b>";
	$sem = "<b>Sem-".AcademicTerm::model()->findByPk($trans->student_academic_term_name_id)->academic_term_name."</b>";
        if($trans->student_transaction_division_id != 0)
	$div = "<b>".Division::model()->findByPk($trans->student_transaction_division_id)->division_name."</b>";
	else
	$div = '-';
	$photos=StudentPhotos::model()->findByPk($trans->student_transaction_student_photos_id)->student_photos_path;
	$photo=CHtml::image(Yii::app()->request->baseUrl.'/college_data/stud_images/'.$photos,'image',array('width'=>120,'height'=>140,'class'=>'photo','style'=>'padding-right:1px;','border'=>1));	
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
	$padd = "<b>not set</b>";
	$pct = "<b>not set</b>";
	$pstat = "<b>not set</b>";	

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
		
		$padd = "<b>".$address->student_address_p_line1.",".$address->student_address_p_line2."</b>";

		if($address->student_address_p_city != 0)
		   $pct = "<b>".City::model()->findByPk($address->student_address_p_city)->city_name."</b>";		
		if($address->student_address_p_state != 0)
		   $pstat = "<b>".State::model()->findByPk($address->student_address_p_state)->state_name."</b>";	
	}	
	$ac_pid = $trans->student_academic_term_period_tran_id;	
	$arch = StudentArchiveTable::model()->find(array('condition'=>'student_archive_stud_tran_id='.$trans->student_transaction_id, 'order'=>'student_archive_ac_t_p_id desc'));
	if($arch)
		$ac_pid = $arch->student_archive_ac_t_p_id;
	$year = AcademicTermPeriod::model()->findByPk($ac_pid)->academic_term_period;
	$ref_no = "";
	if(Yii::app()->controller->action->id=="certiview")
	{
		$certi= StudentCertificateDetailsTable::model()->find(array('condition'=>' 	student_certificate_details_table_student_id='.$trans->student_transaction_id.' and student_certificate_type_id='.$certificate_type,'order'=>'student_certificate_details_table_id desc'));
		$ref_no = $certi->certificate_reference_number;
	}		
	else{
	$certi = StudentCertificateDetailsTable::model()->find(array('order'=>'student_certificate_details_table_id desc'));
	$autonum = 0;
	if(!empty($certi) && $certi->certificate_reference_number!=""){
	$arr = explode('/',$certi->certificate_reference_number);
	$autonum = $arr[3];
	}
	$autonum +=1;
	$ref_no = $year."/".$branch_model->branch_code."/".date('Y').'/'.$autonum;
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
	$content = str_replace('{paddress}',$padd,$content);
	$content = str_replace('{pcity}',$pct,$content);
	$content = str_replace('{pstate}',$pstat,$content);
	$content = str_replace('{pin}',$pc,$content);
	$content = str_replace('{photo}',$photo,$content);

?>
<div class="all-data" style="width: 1070px; padding: 20px;">

<div class="student-certificate-records">
    <div class="logo1" >
 	<?php echo CHtml::image(Yii::app()->controller->createUrl('/site/loadImage', array('id'=>$certi->student_certificate_org_id)),'No Image',array('width'=>90,'height'=>70));
    ?>
   </div>
   <div class="student-info">	
	   <span class="record-info" style="text-align:center;margin-top:25px;"><?php echo $t; ?>
	   </span>
	  <span class="record-info" style="margin-top:25px;">Sr No.:</br><b><?php echo $ref_no; ?></b>
	   </span>
	   <span class="record-info">Name : </br><?php echo $name; ?>
	   </span>
	   <span class="record-info">En No.:</br> <?php echo $en_no; ?>
	   </span>
	   <span class="record-info">Branch : </br><?php echo $branch; ?>
	   </span>
	   <span class="record-info">Semester : </br><?php echo $sem; ?>
	   </span>
	   <span class="record-info">Issue Date : </br>
	     <?php
	     if(Yii::app()->controller->action->id=="certiview")
	     	echo  date('d-m-Y', strtotime($issuedate));
	     else
		echo date('d-m-Y'); 
	     ?>
	   </span>
	   <span class="record-info" style="text-align: center; font-weight: bold;">Mukesh Ved</br>Registrar
	   </span>
	   </div>
	   <span class="record-info s-date">Date : 
	   </span>
	   <span class="record-info s-sign">Student`s Signature : 
	   </span>
</div>
	<div class="bord">&nbsp;</div>
	
<div class="certificate_main">
	<div  class="header" style="border-bottom:2px solid">
      		     <div class="logo" >
		<?php
			$org_data = Organization::model()->findAll();
		 ?>		

 			    <?php echo CHtml::image(Yii::app()->controller->createUrl('/site/loadImage', array('id'=>$org_data[0]->organization_id)),'No Image',array('width'=>90,'height'=>70));
    ?>
 	            </div>
 		    <div class='org-name'>
			<div style="float: left; text-align: center; width: 100%; padding-top: 13px; font-size: 25px; font-family: MTCORSVA ! important;"><?php echo $org_data[0]->name_alias; ?></div>
			<span class="org-details">
			   Phone : <?php echo $org_data[0]->phone; ?>
			</span>
			<span class="org-details">
			   Fax : <?php echo $org_data[0]->fax_no; ?>
			</span>
			<span class="org-details">
			   Website : <?php echo $org_data[0]->website; ?>
			</span>
		    </div>    		    
 		</div>  
	<div class="certificate_content">
	   <div class="ref-no">
	     <span>Sr No. : <?php echo $ref_no; ?></span>
	     <span style="float:right;margin-right:85px;">Date :     
	     <?php
     	      if(Yii::app()->controller->action->id=="certiview")
     	        echo  date('d-m-Y', strtotime($issuedate));
              else
	        echo date('d-m-Y'); 
     	      ?>
             </span>
	    </div>
	<div>		<div class="content">
			<div class="watermark-area">
			</div>
			<!--Watermark Div end-->
			<?php
		//$updated_cont = str_replace('{name}','Name',$content);
		echo  $content;//Certificate::model()->findByPk($certificate_type)->certificate_content; ?>	
			
			</div>
		</div>
	</div><!-- content div close -->
	<div class="certificate-footer" style="width:88%;">
		<?php 
		echo $org_data[0]->address_line1." ";
		echo $org_data[0]->address_line2."-";
		echo $org_data[0]->pin." ";
		?>
	</div>	  	
</div>
</div>
<h3 class="pageBreaker"></h3>
<?php } 
   else
	print  "<h1 style=\"color:red;text-align:center\">No Record To Display</h1>";
  

?>

</body>
</html>
