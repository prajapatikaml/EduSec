<title>Print ID Card</title>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/printstudentid.css"/>

<?php

echo CHtml::link('GO BACK',Yii::app()->createUrl('report/studentidcard'),array('title'=>'Go Back','id'=>"printnone"))."&nbsp;&nbsp;"; 
?>
<button style="float:right; margin-right:50%;" onclick="javascript:window.print()" id="printnone">Print</button>
</br></br>
<?php
$org_id=Yii::app()->user->getState('org_id');
$org_data = Organization::model()->findByAttributes(array('organization_id'=>$org_id));
$orgcity = City::model()->findByPk($org_data->city)->city_name;
$orgstate = State::model()->findByPk($org_data->state)->state_name;

$i = 0;

if($student_data1 && $selected_list)
{
foreach($student_data1 as $stud)
{
$orglogo = CHtml::image(Yii::app()->controller->createUrl('/site/loadImage', array('id'=>Yii::app()->user->getState('org_id'))),'No Image',array('width'=>80,'height'=>60));

$studphoto = StudentPhotos::model()->findByPk($stud['student_transaction_student_photos_id'])->student_photos_path;
?>
<div class="outer">
<!--main div-->
<div class="main">
	<!--Header div-->
	<div class="idcardheader">
		<div class="logo">
			<?php echo $orglogo;?>
		</div>
		<div class="collegeheader">
			<h3 class="card_title">IDENTITYCARD</h3>
			<h3 class="card_static_header">BAPU GUJARAT KNOWLEDGE VILLEGE</h3>
			<h3 class="card_org_header"><?php echo $org_data->name_alias;?><?php 
			echo ",".$orgcity."-".$org_data->pin;
			?>
			</h3>
		</div>
	</div>
	<!-- End Header div-->
	<?php
	$StudentInfo = StudentInfo::model()->findByPk($stud['student_transaction_student_id']);
	$label=null;
	$field_value=null;
	?>
	<!--Content div-->
	<div class="front_content">
		
		<div class="contentinfo">
		
		<?php
		foreach($selected_list as $key=>$value)
				{				
					$value = $value.":";
					if($key=='quota_name')
						$field_value = Quota::model()->findByPk($stud['student_transaction_quota_id'])->quota_name;
					else if($key=='branch_name')
					{	$field_value = Branch::model()->findByPk($stud['student_transaction_branch_id'])->branch_name;
						$value="";
					}
					else if($key=='division_code')
						$field_value = Division::model()->findByPk($stud['student_transaction_division_id'])->$key;
					else if($key=='sem')
						$field_value = AcademicTerm::model()->findByPk($stud['student_academic_term_name_id'])->academic_term_name;	
					else if($key=='student_first_name')
					{
					$lname = $StudentInfo->student_last_name;
					$fname = $StudentInfo->student_first_name;	
					$mname = substr($StudentInfo->student_middle_name,0,1);	
					if($mname !=null)
					 $mname .= "."; 
					$label =$value;
					$field_value = $lname." ".$fname." ".$mname;
					$value="";
?>
					<div class="value-detail student-name-details">					
					   <?php echo $value;
					   echo $field_value; 
?>
					</div>
<?php					continue; 
				}	
				else	
						$field_value = $stud[$key];
					?>
	
			<?php //$fathername = substr($stud['student_middle_name'], 0, 1);?>
			<div class="value-detail">	
				
					<?php echo $value;?> 
				
				
					<?php echo $field_value; ?>
				
				
			</div>			
				<?php } //for end loop?>
			
				
		</div>
		<div class="contentpic">
			<?php echo CHtml::image(Yii::app()->baseUrl."/college_data/stud_images/".$studphoto,"no-images",array("width"=>"80px","height"=>"60px"));?>
		</div>
	</div>	
	
	<!-- End Content div-->
	<!--Footer barcode div-->
	<div class="footer-sign">
		<div class="footername">
			Authority Sign
		</div>
		<div class="barcode">
				<?php
					echo CHtml::image(Yii::app()->controller->createUrl('/barcode/form.php?data='.$stud['student_enroll_no']),"",array("width"=>"150px"));
				?>
						
		</div>			
		 
	</div>
	<!-- End Footer barcode div-->
</div>
<!-- End  MAin Div -->

</div> <!-- end outer div -->

<?php $i++;
	if($i%8 == 0)
		{?>
		<h2></h2>
<?php	}
}// end foreach loop
}//end if block
else
{
	print  "<h1 style=\"color:red;text-align:center\">No Record To Display</h1>";
}
?>






<style>
@media print{
  .collegeheader h3{
  letter-spacing:1px !important;
}
}

.outer {
    float: left;
    width: 50%;
}

.collegeheader {
    float: left;
    font-family: Arial;
    line-height: 12px;
    margin-top: 5px;
    width: 70%;
}
.collegeheader h3{
  font-family: felipa-font;
  text-align:center;
  letter-spacing:1px;
}
.card_title {
   font-size:14px !important;
   color:#8D44A3;
}
.idcardheader{
   border-bottom:none;
}
.card_static_header {
  color: #FF0000;
  font-size: 8.5px !important;
  margin-top: 8px;
}
.card_org_header{
  font-size:10px;
  margin-top: 8px;
}
.value-detail{
  width:100%;
  color: #045868;
  float: left;
  font-size: 12px;
  margin-left: 5px;
}
.student-name-details {
  color: #CC3315;
  font-family: sans-serif;
  font-size: 13px;
}
.footer-sign {
  float: left;
  width: 100%;
}
.footername {
  font-size: 12px;
  font-weight: bold;
  margin-left: 12px;
  margin-top: 0;
  width:25%;
}
.barcode {
  float: right;
  width: 55%;
}
.barcode {
  bottom: 12px;
  float: right;
  position: relative;
  width: 55%;
}
</style>

