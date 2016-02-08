<title>Print ID Card</title>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/printstudentid.css"/>
<?php

$gobackimage = CHtml::image('../images/Goback.png', 'No Image', array('height'=>'40','width'=>40));

echo CHtml::link('GO BACK',Yii::app()->createUrl('report/Studentid'),array('title'=>'Go Back'))."&nbsp;&nbsp;"; 
?>
<button style="float:right; margin-right:50%;" onclick="javascript:window.print()" id="printid">Print</button>
</div></br></br>
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
$orglogo = CHtml::image(Yii::app()->controller->createUrl('/site/loadImage', array('id'=>Yii::app()->user->getState('org_id'))),'No Image',array('width'=>65,'height'=>65));

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
			<h3 class="org_name"><?php echo $org_data->organization_name;?></h3>
			<div class="contact-details">
 			 <?php 
			echo $org_data->address_line1." ".$org_data->address_line2."</br>".$orgcity."-".$org_data->pin." ".$orgstate;
			echo "</br>";
			echo "Ph: ".$org_data->phone.",  Fax: ".$org_data->fax_no;
			echo "</br>";
			echo "Website: ".$org_data->website."</br>";
			echo "Email: ".$org_data->email;			 
			?>
			</div>
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
		<div class="contentpic">
			<?php echo CHtml::image(Yii::app()->baseUrl."/college_data/stud_images/".$studphoto,"no-images",array("width"=>"60px","height"=>"60px"));?>
		</div>
		<div class="contentinfo">
		
		<?php
		foreach($selected_list as $key=>$value)
				{				
					
					if($key=='quota_name')
						$field_value = Quota::model()->findByPk($stud['student_transaction_quota_id'])->quota_name;
					else if($key=='branch_name')
						$field_value = Branch::model()->findByPk($stud['student_transaction_branch_id'])->branch_name;
					else if($key=='division_code')
						$field_value = Division::model()->findByPk($stud['student_transaction_division_id'])->$key;
					else if($key=='sem')
						$field_value = AcademicTerm::model()->findByPk($stud['student_academic_term_name_id'])->academic_term_name;	
					else if($key=='student_first_name')
					{
					$lname = $StudentInfo->student_last_name;
					$fname = $StudentInfo->student_first_name;	
					$mname = $StudentInfo->student_middle_name;	
					$label =$value;
					$field_value = $lname." ".$fname." ".$mname;
					}	
					else	
						$field_value = $stud[$key];
					?>
	
			<?php //$fathername = substr($stud['student_middle_name'], 0, 1);?>
			<div class="student-details">	
				
					<?php echo '<lable>'.$value.' : </lable>';?> 
				
				<div class="value-detail">
					<?php echo $field_value; ?>
				</div>	
				
			</div>			
				<?php } //for end loop?>
				
		</div>
	</div>	
	<!-- End Content div-->
	<!--Footer barcode div-->
	<div class="footer-sign">
		<div class="barcode">
				<?php
					echo CHtml::image(Yii::app()->controller->createUrl('/barcode/form.php?data='.$stud['student_enroll_no']),"",array("width"=>"150px"));
				?>
						
		</div>
		<div class="front_sign">
			<?php
				  if($org_id == 1)
					echo CHtml::image(Yii::app()->baseUrl.'/college_data/org_sign/hansabapricipalsign.png',"",array("width"=>"100px"));
				  if($org_id == 2)
					echo CHtml::image(Yii::app()->baseUrl.'/college_data/org_sign/jasodaba-principal.png',"",array("width"=>"100px"));
			?>
		</div>			
		<div class="footername">
			Principal
		</div> 
	</div>
	<!-- End Footer barcode div-->
</div>
<!-- End  MAin Div -->

<div class="backend_main">
	<div class="backend_header">
		<div class="back_logo">
			<?php echo CHtml::image(Yii::app()->controller->createUrl('/site/loadImage', array('id'=>Yii::app()->user->getState('org_id'))),'No Image',array('width'=>40,'height'=>40));?>
		</div>
		<div class="back_header" align="center">
			<b><?php echo $org_data->organization_name;?></b>
		</div>
	</div>
	<div class="backend-content">
	    <div class="content_inner">	
		<div class='org_branch_data'>
		   <div class='college-name'>
			<b><?php echo $org_data->organization_name;?></b>
		   </div>
		   <ul style = "padding-left: 22px; margin:0px; margin-top:4px;">
		   <li>B.E. Civil Engg.</li>
		   <li>B.E. Mechanical Engg.</li>
		   <li>B.E. Electrical Engg.</li>
		   <li>B.E. Computer Engg.</li>
		   <li>B.E. Electronics & Communication Engg.</li>
		   </ul>
		</div>
		<div class="org_branch_data no-right-border">
		   <div class='college-name'>
			<b><?php echo $org_data->organization_name;?></b>
		   </div>
		   <ul style = "padding-left: 22px; margin:0px; margin-top:4px;">
		   <li>Diploma in Civil Engg.</li>
		   <li>Diploma in Mechanical Engg.</li>
		   <li>Diploma in Electrical Engg.</li>
		   <li>Diploma in Computer Engg.</li>
		   <li>Diploma in Automobile Engg.</li>
		   </ul>
		</div>

		<?php /*$org_list = Organization::model()->findAll(); 
		   foreach($org_list as $list) {
		      print "<div class='org_branch_data'><div class='college-name'><b>".$list->organization_name."</b></div>";
		      $branch = Branch::model()->findAll('branch_organization_id ='.$list->organization_id);
		      print '<ul style = "padding-left: 22px; margin:0px;">';
		      foreach($branch as $result)
			print "<li>".$result->branch_name."</li>";
		    print '</ul></div>';
		   }		
	*/?>

	    </div>		
	</div>
</div>
</div> <!-- end outer div -->

<?php $i++;
	if($i%4 == 0)
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

