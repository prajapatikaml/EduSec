<html>
<head>
 <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/certificate.css" media="screen, print, projection" />
</head>
<body>
<?php if($certificate_stud_info) { ?>	
<div class="certificate_main">
	<div class="certificate_header">
		 <div class="certificate-logo">
			<?php
			$test = Yii::app()->user->getState('org_id');
			if(isset($test))	
			{
			 echo CHtml::image(Yii::app()->controller->createUrl('/site/loadImage', array('id'=>Yii::app()->user->getState('org_id'))),'No Image',array('width'=>114,'height'=>100));

			}
		?>
		</div>
		
		<div id="certificate_title"> <?php $org_data = Organization::model()->findByPk(Yii::app()->user->getState('org_id')); ?><?php echo $org_data->organization_name;?>
		</div>

		

	</div>
  
	<div class="certificate_content">
		<div class="certificate_date">
			
			    <span>Date:</span>
			    <span><u><?php echo date("d-m-Y"); ?></u></span>
	  		
		</div>
		</br>
		<div class="certificate_title"> <?php 
			$certificate_title = Certificate::model()->findByPk($certificate_type)->certificate_title;				
			echo $certificate_title;?>
		</div>
		
		<div>
			<div class="content">
			<?php 
			$student_info=new StudentInfo;
			$quota=new Quota;
			$branch1=new Branch;
			$sem=new AcademicTerm;
			$add=new StudentAddress;
			$cat=new Category;
			$city=new City;
			$label=null;
			$field_value=null;
			$info = array();
			foreach($certificate_stud_info as $c=>$info)
			{
			}
			//print_r($info);exit;
			//echo $info['student_transaction_quota_id'];exit;
			foreach($selected_list as $s)
			{				
				//$name = StudentInfo::model()->findByAttributes(array('student_enroll_no'=>$en_no));?>
			
			    <span id="label_width">
				<?php
					if($s=='quota_name')
						$label = "<b id=\"label_info\">Quota :</b>";
					else if($s=='branch_name')
						$label = "<b id=\"label_info\">Branch :</b>";
					else if($s=='sem')
						$label = "<b id=\"label_info\">Semester :</b>";
					else if($s=='student_address_c_line1')
						$label = "<b id=\"label_info\">Current Address :</b>";
					else if($s=='student_address_p_line1')
						$label = "<b id=\"label_info\">Permenent Address :</b>";
					else if($s=='category_name')
						$label = "<b id=\"label_info\">Category :</b>";
					else if($s=='city')
						$label = "<b id=\"label_info\">City :</b>";
					else if($s=='student_bloodgroup')
						$label = "<b id=\"label_info\">Blood Group :</b>";
					else if($s=='division_code')
						$label = "<b id=\"label_info\">Division Name :</b>";
					else
						$label = CHtml::activeLabel($student_info,$s)." :"; 
									
					echo $label;
				?>
			    </span>
			    <span>
				<?php //echo $name->$s;
					if($s=='quota_name')
						$field_value = Quota::model()->findByPk($info['student_transaction_quota_id'])->quota_name;
					else if($s=='branch_name')
						$field_value = Branch::model()->findByPk($info['student_transaction_branch_id'])->branch_name;
					else if($s=='division_code')
						$field_value = Division::model()->findByPk($info['student_transaction_division_id'])->$s;
					else if($s=='sem')
						$field_value = AcademicTerm::model()->findByPk($info['student_academic_term_name_id'])->academic_term_name;
					else if($s=='student_address_c_line1')
					{	$field_value = StudentAddress::model()->findByPk($info['student_transaction_student_address_id'])->student_address_c_line1." ".StudentAddress::model()->findByPk($info['student_transaction_student_address_id'])->student_address_c_line2;
					}
					else if($s=='student_address_p_line1')
					{	$field_value = StudentAddress::model()->findByPk($info['student_transaction_student_address_id'])->student_address_p_line1." ".StudentAddress::model()->findByPk($info['student_transaction_student_address_id'])->student_address_p_line2;
					}
					else if($s=='category_name')
						$field_value = Category::model()->findByPk($info['student_transaction_category_id'])->category_name;
					else if($s=='city')
						$field_value = City::model()->findByPk(StudentAddress::model()->findByPk($info['student_transaction_student_address_id'])->student_address_c_city)->city_name;
					else	
					{	$field_value = StudentInfo::model()->findByPk($info['student_transaction_student_id'])->$s;
					}
					echo $field_value;
				?>
			    </span>
			    </br>
			  
			 <?php 
			} echo "</br></br>".Certificate::model()->findByPk($certificate_type)->certificate_content; ?>
			</div>
			<div class="content_footer">
			    Principal
			</div>
		</div>
	</div><!-- content div close -->
  
	<div class="certificate_footer">
		<div id="certificate_address"> <?php echo $org_data->address_line1.' '.City::model()->findByPk($org_data->city)->city_name.', '.State::model()->findByPk($org_data->state)->state_name.', '.Country::model()->findByPk($org_data->country)->name; ?> 
		</div>
		
  	</div>
</div>
<?php } // end of certificate_info
else
{
	print  "<h1 style=\"color:red;text-align:center\">No Record To Display</h1>";
}
?>

</body>
</html>
