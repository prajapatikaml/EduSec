<?php
$imageurl =  Yii::app()->baseUrl."/college_data/organisation_logo/college_logo.jpg";
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
 <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/certificate.css" media="screen, print, projection" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/timetable.css" />

<style>
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
.all-data{
   width:100% !important;
}
 @page { margin: 0 !important;
        margin-left:30px; 
	}
.pgbreak {
  page-break-after:always;
}
}
.org-name {
    font-family: Arial;
    font-size: 24px !important;
}
.org-details {
  float: left;
  width: 29%;
  font-size: 15px;
  font-family: verdana;
  margin-top:10px;
}
.certificate_main{
  max-height:620px!important;
}
</style>


</head>
<title><?php $ct_title = Certificate::model()->findByPk($certi); echo $ct_title->certificate_title; ?>
</title>
<body>
<?php
$this->breadcrumbs=array(
	'Multiple Certificate',	
);
?>

<?php
echo CHtml::link('GO BACK', array('certificate/multiplecertificate'),array('id'=>"printid1"));

if($student_data)
{
$lis = CHtml::listData($student_data,'student_transaction_id','student_transaction_id');
$st_str = implode(',',$lis); 
echo CHtml::button('Save',array('id'=>"printid1",'class'=>'submit','submit' => array('certificate/savemultiplecerti','stid'=>$st_str,'ctype'=>$certi)));
$i=1;
	foreach($student_data as $list)
	{
	$name = "<b>".$list['student_first_name']." ".$list['student_middle_name']." ".$list['student_last_name']."</b>"; 
	$titl = "<b>".$list['title']."</b>";

	$smobile = "<b>".$list['student_mobile_no']."</b>";
	$pmobile = "<b>".$list['student_guardian_mobile']."</b>";
	$branch_model = Branch::model()->findByPk($list['student_transaction_branch_id']);
	$en_no = "<b>".$list['student_enroll_no']."</b>";
	$branch = "<b>".$branch_model->branch_name."</b>";
	$sem = "<b>Sem-".AcademicTerm::model()->findByPk($list['student_academic_term_name_id'])->academic_term_name."</b>";
	$div="notset";
	if($list['student_transaction_division_id']!=0)
	$div = "<b>".Division::model()->findByPk($list['student_transaction_division_id'])->division_name."</b>";
	$gender = "<b>".$list['student_gender']."</b>";

	$cdate = "<b>".date('d/m/Y')."</b>";
	if($list['student_transaction_category_id'] !=0)
		$category = "<b>".Category::model()->findByPk($list['student_transaction_category_id'])->category_name."</b>";
	else 
		$category = "<b>not set</b>";
	$quota = "<b>".Quota::model()->findByPk($list['student_transaction_quota_id'])->quota_name."</b>";
	$content = $ct_title->certificate_content;

	$lin1 = "<b>not set</b>";
	$lin2 = "<b>not set</b>";
	$ct = "<b>not set</b>";
	$stat = "<b>not set</b>";
	$pc = "<b>not set</b>";
	$padd = "<b>not set</b>";
	$pct = "<b>not set</b>";
	$pstat = "<b>not set</b>";

	if($list['student_transaction_student_address_id'] !=0)
	{
		$address = StudentAddress::model()->findByPk($list['student_transaction_student_address_id']);
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
	$ac_pid = $list['student_academic_term_period_tran_id'];	
	$arch = StudentArchiveTable::model()->find(array('condition'=>'student_archive_stud_tran_id='.$list['student_transaction_id'], 'order'=>'student_archive_ac_t_p_id desc'));
	if($arch)
		$ac_pid = $arch->student_archive_ac_t_p_id;
	$year = AcademicTermPeriod::model()->findByPk($ac_pid)->academic_term_period;
	$ref_no = "";
		
	$certi = StudentCertificateDetailsTable::model()->find(array('condition'=>'student_certificate_org_id='.Yii::app()->user->getState('org_id'),'order'=>'student_certificate_details_table_id desc'));
	$autonum = 0;
	if(!empty($certi) && $certi->certificate_reference_number!=""){
	$arr = explode('/',$certi->certificate_reference_number);
	$autonum = $arr[3];
	}
	$autonum +=$i;
	$i++;
	$ref_no = $year."/".$branch_model->branch_code."/".date('Y').'/'.$autonum;
	
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
	$content = str_replace('{paddress}',$padd,$content);
	$content = str_replace('{pcity}',$pct,$content);
	$content = str_replace('{pstate}',$pstat,$content);
	$content = str_replace('{pin}',$pc,$content);

?>
<div class="all-data" style="width:83%;">

<div class="student-certificate-records">
    <div class="logo1" >
 	<?php echo CHtml::image(Yii::app()->controller->createUrl('/site/loadImage', array('id'=>Yii::app()->user->getState('org_id'))),'No Image',array('width'=>90,'height'=>70));
    ?>
   </div>
   <span class="record-info" style="text-align:center;margin-top:55px;"><?php echo $ct_title->certificate_title; ?>
   </span>
   <span class="record-info" style="margin-top:40px;">Name : </br><?php echo $name; ?>
   </span>
   <span class="record-info">En No.:</br> <?php echo $en_no; ?>
   </span>
   <span class="record-info">Branch : </br><?php echo $branch; ?>
   </span>
   <span class="record-info">Semester : </br><?php echo $sem; ?>
   </span>
   <span class="record-info">Issue Date : </br><?php echo date('d-m-Y'); ?>
   </span>
   <span class="record-info s-date">Date : 
   </span>
   <span class="record-info s-sign">Student`s Signature : 
   </span>

</div>
	<div class="bord">&nbsp;</div>
	
<div class="certificate_main" style="margin-right:20px;">
	<div  class="header" style="border-bottom:2px solid">
      		     <div class="logo" >
 			    <?php echo CHtml::image(Yii::app()->controller->createUrl('/site/loadImage', array('id'=>Yii::app()->user->getState('org_id'))),'No Image',array('width'=>90,'height'=>70));
    ?>
 	            </div>
		    <?php
				$org_data = Organization::model()->findByPk(Yii::app()->user->getState('org_id'));

		    ?>		
		    <div class='org-name'>
			<div style=" float:left;text-align:center;width:70%;font-size: 22px; padding-top: 13px;"><?php echo $org_data->name_alias; ?></div>
			<span class="org-details">
			   Phone : <?php echo $org_data->phone; ?>
			</span>
			<span class="org-details">
			   Fax : <?php echo $org_data->fax_no; ?>
			</span>
			<span class="org-details" style="width:27%;">
			   Website : <?php echo $org_data->website; ?>
			</span>

		    </div>
	</div>

  
	<div class="certificate_content">
		<div class="ref-no"><span>Sr No. : <?php echo $ref_no; ?></span><span style="float:right;margin-right:85px;">Date : <?php echo date('d-m-Y');?></span>
		</div>
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
	<div class="certificate-footer" style="width:88%;">
		<?php 
		echo $org_data->address_line1." ";
		echo $org_data->address_line2."-";
		echo $org_data->pin." ";
		?>
	</div>	  
	
</div>
</div>
<div class="pgbreak">&nbsp;</div>
<?php } 
	}// end of certificate_info

else
{
	print  "<h1 style=\"color:red;text-align:center\">No Record To Display</h1>";
}
?>

</body>
</html>


