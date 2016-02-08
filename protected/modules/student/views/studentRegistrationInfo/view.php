<?php
$imageurl =  Yii::app()->baseUrl."/college_data/organisation_logo/college_logo.jpg";
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
 <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/certificate.css" media="screen, print, projection" />
<style>
.stud-details{
float:left;
}
.certificate_main{
 width:1000px!important;
 min-height:950px;
 padding:5px;
 border:5px black solid; 
}
.certificate_content{
font-size:18px;
font-weight:bold;
}
@media print
.certificate_main{
 width:1000px!important;
 min-height:850px;
 padding:5px;
 border:5px black solid; 
}
.certificate_main{
 width:1000px!important;
 min-height:950px;
 padding:5px;
 border:5px black solid;
font-size:16px;

}
.certificate_content{
font-size:16px;
font-weight:bold;
}
body {
  margin:0 !important;
  padding:0;
  background-color:#FAFAFA;
}
image{
 height:100px;
 width:150px;
 float:right !important;
}
.page{
 width:397mm;
 min-height:210mm;
 padding:1cm; 
 margin:1cm auto;
 border-radius:white;
 box-shadow: 0 0 0px rgba(0,0,0,0.1);
}
@page{
 size:A4;
 margin:0px;
}
@media print
.grid-view table.items th
{
        width: 40px;
}
.lbl_header {
     color: #990A10;
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
#yw0.grid-view{
margin-left:10px;
width:97.5%;
}
@media print{
  body {
  margin-top:0 !important;
}
.all-data{
   width:100% !important;
}
@page {
  size: 8.5in 11in; 
  size : portrait;
}
.page{
 width:297mm;
 min-height:210mm;
 padding:1cm; 
 margin:1cm auto;
 border-radius:white;
 box-shadow: 0 0 0px rgba(0,0,0,0.1);
 
} 
}
h2
{
background-color:gray;margin-top:5px;margin-left:5px;margin-right:5px;
}
data{
margin-top:5px;margin-left:2px;margin-right:2px;float:left;
}

</style>
<button style='margin-left:50px;' class='submit' onclick="javascript:window.print()" id="printid1" class="submit">Print</button><br>
<b style='margin-left:20px;'>
<?php //echo CHtml::link('GO BACK',Yii::app()->createUrl('/student/studentRegistrationInfo/admin'))."</br>"; ?>
</b>
<?php
$imageurl =  Yii::app()->baseUrl."/college_data/organisation_logo/college_logo.jpg";
?>
<div class="page" style="width: 1070px; padding: 20px;">
<div class="certificate_main">
<div  class="header" style="border-bottom:2px solid">
<div class="logo" >
	    <?php echo CHtml::image(Yii::app()->controller->createUrl('/site/loadImage', array('id'=>Yii::app()->user->getState('org_id'))),'No Image',array('width'=>90,'height'=>70));?>
</div>
<?php
$org_data = Organization::model()->findByPk(Yii::app()->user->getState('org_id'));  ?>		
<div class='org-name'>
<div style=" float:left;text-align:center;width:79%;font-size: 22px; padding-top: 13px;">
	<?php echo $org_data->name_alias; ?></div>
<span class="org-details">
   Phone : <?php echo $org_data->phone; ?>
</span>
<span class="org-details">
   Fax : <?php echo $org_data->fax_no; ?>
</span>
<span class="org-details">
   Website : <?php echo $org_data->website; ?>
</span>

</div>
</div>
		<div class="certificate_content">
<h2>STUDENT INFORMATION</h2>
		<div class="ref-no" ><span style="float:right;margin-right:25px;">Date of Registration : <?php echo date('d-m-Y');?></span>
		</div>
		<div>	
			<div class="content">
			<div class="watermark-area">
		</div>

	<div class="ref-no"><span style="float:left;margin-left:2px;padding:5px;">Name of the Student : <?php echo $model->student_first_name.'   '.$model->student_middle_name.'   '.$model->student_last_name;?></span></div><BR>
	<div class="ref-no"><span style="float:left;margin-left:2px;padding:5px;">Merit No : <?php echo $model->student_merit_no ?></span>
	<span style="float:right;margin-right:41px;padding:5px;">Merit Marks : <?php echo $model->student_merit_marks ?></span></div>
<div> <br> </div><BR>

<div class="ref-no">	
	<span style="float:left;margin-left:2px;padding:5px;">Category : <?php echo Category::model()->findByPK($model->student_category_id)->category_name ?></span>
	<span style="float:right;margin-right:50px;padding:5px;">Gender : <?php echo $model->student_gender ?></span>
	<span style="float:right;margin-right:200px;padding:5px;">Course : <?php echo "______________" ?></span></div>
<div> <br> </div><BR>

<div class="ref-no">	
<span style="float:left;margin-left:2px; padding:5px;">Board : <?php echo $model->student_board ?>
</span>
</div><BR>
<div> <br></br> </div>
<div class="ref-no">	
	<span style="margin-left:9px;">Date of Birth : <?php echo $model->student_dob=($model->student_dob!=0000-00-00)?date_format(new DateTime($model->student_dob), 'd-m-Y'):'Not Set' ?></span>

<span  style="margin-left:40px;" > Place of Birth : <?php echo $model->student_place_of_birth ?></span>
</div></BR>
<div class="stud-details">
<div class="ref-no">
	<b style="margin-left:48px;float:left;width:90px;padding-top:20px;">Local Address: </b> 
        &nbsp;&nbsp;<b style="float:left;width:320px;padding-top:20px;"><?php echo $model->student_address_c_line1.' '.$model->student_address_c_line2.', '.City::model()->findByPk($model->student_address_c_city)->city_name.' '.$model->student_address_c_pin.' <br>' ?></b></br>
	
	<b style="margin-left:48px;float:left;width:100px;padding-top:20px;">Permanent Address  : &nbsp;</b><b style="float:left;width:320px;padding-top:20px;"><?php echo $model->student_address_p_line1.' '.$model->student_address_p_line2.',  '.City::model()->findByPk($model->student_address_p_city)->city_name.' '.$model->student_address_p_pin ?></b>	
</div>
</div>
</div>	
<!--  photo code here   -->

	<?php echo CHtml::image(Yii::app()->request->baseUrl.'/college_data/stud_images/'.$model->student_photo,'image',array('width'=>120,'height'=>140,'style'=>' margin-left:325px !important;')); ?>  

<div class="ref-no">	
	<span style="float:left;margin-left:2px;padding:5px;padding-top:20px;">Email ID : <?php echo $model->student_email_id ?></span>
</div>

<div class="ref-no">	
	<span style="float:left;margin-left:2px;padding:5px;">Phone No : <?php echo $model->student_phoneno ?></span>
	<span style="float:right;margin-right:220px;padding:5px;">Mobile No : <?php echo $model->student_mobile?></span>
</div>
<div class="ref-no">	
	<span style="float:left;margin-left:2px;padding:5px;">Parent's Phone No : <?php echo $model->student_guardian_phoneno ?></span>
	<span style="float:right;margin-right:220px;padding:5px;">Parent's Mobile No : <?php echo $model->student_guardian_mobile?></span>
</div>
<div class="ref-no">	
	<span style="float:left;margin-left:2px;padding:5px;margin-top:20px;">Name of the Last School Attended : <?php echo $model->student_last_school_attended ?></span>
      
</div>
<div class="ref-no">	
	<span style="float:left;margin-left:2px;padding:5px;margin-bottom:20px;">Address of the Last School Attended : <?php echo $model->student_last_school_attended ?></span>

</div>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-registration-info-form',
	'focus'=>array($model,'student_first_name'),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
	'enableAjaxValidation'=>false,
)); ?>
<h2>STUDENT ACADEMIC INFORMATION</h2>
<center>
<table border=1>
	<tr>
		<th>Examination</th>
		<th>Year Of Passing</th>
		<th>Name Of Board/Uni.</th>
		<th>Medium</th>
		<th>Class Obtained</th>
		<th>Marks Obtained</th>
		<th>Marks Out Of</th>
		<th>Percentage</th>
	</tr>	
<?php
	$data = StudentRegistrationAcademicInfo::model()->findAll('student_registration_id='.$_REQUEST['id']);
	foreach($data as $val)
	{	
?>
		<tr align=center>
		<td><?php echo ($val->examination); ?></td>
		<td><?php echo ($val->year_of_passing); ?></td>
		<td><?php echo ($val->name_of_board); ?></td>
		<td><?php echo ($val->medium); ?></td>
		<td><?php echo ($val->class_obtained); ?></td>
		<td><?php echo ($val->marks_obtained); ?></td>
		<td><?php echo ($val->marks_out_of); ?></td>
		<td><?php echo ($val->percentage); ?></td>
		</tr>
<?php
	}
?>
</table>
</center>

<?php /*$this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$acdmInfoModel->search(),
	'summaryText'=>'', 
	'enableSorting'=>false,
	'columns'=>array(
		'examination',
		'year_of_passing',
		'name_of_board',
		'medium',
		'class_obtained',
		'marks_obtained',
		'marks_out_of',
		'percentage',
	),
));*/ ?>

<p><b style="margin-left:40px; "> I hereBy declare that:</b></p></div>
<div class="ref-no" style="margin-left:50px;margin-top:10px;">1.All  the informationprovided by me is true to the best of my knowledge and belief.<br> 2. I shall abide by all the rules and regulations of the college.</p>	
</div><br>
<div class="ref-no">	
	<span style="float:left;margin-left:2px;padding:5px; margin-top:10px;">Father's Full Name : <?php echo $model->student_father_name ?></span></br>
</div>
<div class="ref-no">
	<span style="float:left;margin-left:2px;padding:5px;">Mother's Full Name : <?php echo $model->student_mother_name?></span>
</div>	
<div class="ref-no">	
	<span style="float:left;margin-left:2px;padding:5px;margin-top:10px;">Parent's Office Address(if any): <?php echo $model->studnet_father_office_address ?></span>
</div></br>
<div class="ref-no">
<span style="float:left;margin-left:2px;padding:5px;">Parent's Office Address(if any): <?php echo $model->student_mother_office_address ?></span>
</div></br><br>
<div class= "ref-no" style="float:left;margin-left: 610px;margin-top:40px;">
Signature of the Student
</div>
		
<?php $this->endWidget(); ?>


</div><!-- form -->

