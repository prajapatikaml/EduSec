<?php
$imageurl =  Yii::app()->baseUrl."/college_data/organisation_logo/college_logo.jpg";
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />


<style>
.certificate_content {
    float: left;
    min-height: 620px;
    width:810px!important;    
}
.certificate_main {
      
    float: left;
    margin-left: 12px;
    height: 850px!important;
    position: relative;
    width: 863px!important;
    z-index: 1;
}
.header {
  float: left;
  margin-bottom: 1px;
  text-align: center;
  width: 100%;
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
.ref-no {
    float: left;
    font-weight: bold;
    padding-left: 8%;
    padding-top: 10% !important;
    text-align: left;
    width: 93%;
}

@media print{
  body {
  margin-top:0 !important;
}
.back{
display:none !important;
}
.all-data{
   width:100% !important;
}
.student-certificate-records {
    border: 6px double #163142;
    float: left;
    height: 600px!important;
    width: 160px;
}
.bord {
    border-right: 2px dotted;
    float: left;
    height: 800px!important;
    margin-left: 5px;
}
.photo{    
    margin-left:650px!important;
   }
.ref-no {
    float: left;
    font-weight: bold;
    padding-left: 8%;
    padding-top: 12% !important;
    text-align: left;
    width: 93%;
}
.certificate_main {  
   
    float: left;
    margin-left: 12px;
    position: relative;
    width: 855px!important;
    height:1250px!important;
    font-size: 15px !important;
    z-index: 1;
}
 @page { margin: 0 !important;
        margin-left:30px; 
	}
}
.org-name {
    font-family: Arial;
    font-size: 24px !important;
}


</style>
</head>
<title><?php echo $t = Certificate::model()->findByPk($model->certificatetype)->certificate_title;?>
</title>
<body>
<button style='margin-left:50px;' class='submit' onclick="javascript:window.print()" id="printid1" class="submit">Print</button>
<?php
$lis = CHtml::listData($studModel,'student_transaction_id','student_transaction_id');
$st_str = implode(',',$lis); 
if(Yii::app()->controller->action->id!="certiview") {
  echo CHtml::link('GO BACK', array('certificate/certificategeneration'),array('class'=>'back'));

  echo CHtml::button('Save',array('id'=>"printid1",'class'=>'submit','submit' => array('certificate/savemultiplecerti','stid'=>$st_str,'ctype'=>$model->certificatetype)));
}
else { 
  if(!empty($_REQUEST['studid']))	
    echo CHtml::link('GO BACK', array('student/studentTransaction/studentcertificate','id'=>$_REQUEST['studid']),array('class'=>'back'));
}
foreach($studModel as $list) {
$stud_info = StudentInfo::model()->findByAttributes(array('student_info_transaction_id'=>$list['student_transaction_id']));	
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
	$photo=CHtml::image(Yii::app()->request->baseUrl.'/college_data/stud_images/'.$photos,'image',array('width'=>120,'height'=>120,'style'=>'margin-left:500px!important;','border'=>1));
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
	$certi = StudentCertificateDetailsTable::model()->find(array('condition'=>'student_certificate_org_id='.Yii::app()->user->getState('org_id'),'order'=>'student_certificate_details_table_id desc'));
	$autonum = 0;
	if(!empty($certi) && $certi->certificate_reference_number!=""){
	$arr = explode('/',$certi->certificate_reference_number);
	$autonum = $arr[3];
	}
	$autonum +=1;
	$ref_no = $year."/".$branch_model->branch_code."/".date('Y').'/'.$autonum;
	}
	$quota = "<b>".Quota::model()->findByPk($trans->student_transaction_quota_id)->quota_name."</b>";
	$content = Certificate::model()->findByPk($model->certificatetype)->certificate_content;
	
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
  <div class="certificate_main">
	<div  class="header" >
 	     <div class="logo" >
 		    <?php //echo CHtml::image(Yii::app()->controller->createUrl('/site/loadImage', array('id'=>Yii::app()->user->getState('org_id'))),'No Image',array('width'=>90,'height'=>70));    ?>
            </div>
   <?php
	$org_data = Organization::model()->findByPk(Yii::app()->user->getState('org_id'));
    ?>		
	<div class="certificate_content">
		
	<div>	
	<div class="content">
		<div class="watermark-area">
		</div>
	<!--Watermark Div end-->
	<?php
		//$updated_cont = str_replace('{name}','Name',$content);
		echo  $content;//Certificate::model()->findByPk($certificate_type)->certificate_content; ?>			
	</div>
     </div>
   </div><!-- content div close -->
</div>
</div>
<h3 class="pageBreaker"></h3>
<?php } 
   else
	print  "<h1 style=\"color:red;text-align:center\">No Record To Display</h1>";
  }
?>
</body>
</html>
