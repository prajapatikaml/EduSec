<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/table_js/jquery.dataTables.js'); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/table_js/FixedColumns.js'); ?>

<?php
$this->breadcrumbs=array('Report',
	'Student Info',
);
?>

<?php

echo "&nbsp;";
$_SESSION['query']=$query;
$_SESSION['selected_list']=$selected_list;
?>
<?php
if($stud_data)
{
?>	

<div class="scrollableContainer">
<div class="scrollingArea CSSTableGenerator">

<?php	$student_info=new StudentInfo;

	$add=new StudentAddress;
	$city=new City;
	$org_data = Organization::model()->findByPk(Yii::app()->user->getState('org_id'));
	
?>
 	<div class="portlet box blue view" style="width:100%">
	    <div class="portlet-title"><i class="fa fa-plus"></i><span class="box-title"> Student List</span>
		</div>
	    	<div class="operation">
		  <?php echo CHtml::link('<i class="fa fa-chevron-left"></i>Back', array('Report/StudInfoReport'), array('class'=>'btnyellow'));?>	
		  <?php echo CHtml::link('<i class="fa fa-file-excel-o"></i>Excel',Yii::app()->createUrl('report/SelectedList',array('studentlistexcelexport'=>'studentlistexcel')),array('title'=>'Export to Excel','target'=>'_blank','class'=>'btnblue'));  ?>
		  <?php echo CHtml::link('<i class="fa fa-file-pdf-o"></i>PDF',Yii::app()->createUrl('report/SelectedList',array('studentlistexport'=>'studentlistpdf')),array('title'=>'Export to PDF','target'=>'_blank','class'=>'btn green')); ?>
		</div>
<?php
$org = Organization::model()->findAll();
	$org_data=$org[0];
echo '<div class="grid-view" style="overflow:auto">';
echo '<table class="items" border="0" style="border-collapse: collapse;" >';
	echo "<tr align=center> <th  colspan = 60 style=text-align:center;> ".CHtml::image(Yii::app()->controller->createUrl('/site/loadImage', array('id'=>$org_data->organization_id)),'No Image',array('width'=>80,'height'=>55,'style'=>'float:left;margin-left:200px;')) ."
	 <big> <b>".$org_data->organization_name ."</big><br>". $org_data->address_line1." ".$org_data->address_line2."</br>"  . City::model()->findBypk($org_data->city)->city_name.", ".State::model()->findBypk($org_data->state)->state_name.", ".Country::model()->findBypk($org_data->country)->name."." ." </th></tr>";
	echo "<tr><th colspan=60> Student List</th></tr>";
	echo "<tr><th style='text-align:center;'>SI No.</th>";
	
	foreach($selected_list as $s)
	{
		if($s=='batch_name')
			echo "<th style='text-align:center;'>Batch Name</th>";
		else if($s=='student_address_c_line1')
			echo "<th style='text-align:center;width: 400px;'>Local Address</th>";
		else if($s=='student_address_p_line1')
			echo "<th style='text-align:center;width: 400px;'>International Address</th>";
		else if($s=='student_email_id_1')
			echo "<th style='text-align:center;width: 250px;'>Collge Email ID</th>";

		else if($s=='student_email_id_2')
			echo "<th style='text-align:center;width: 250px;'>Private Email ID</th>";

		else if($s=='category_name')
			echo "<th style='text-align:center;'>Category</th>";
		else if($s=='city')
			echo "<th style='text-align:center;'>City</th>";
		else if($s=='student_bloodgroup')
			echo "<th style='text-align:center;'>Blood Group</th>";
		else if($s=='division_code')
			echo "<th style='text-align:center;'>Division Name</th>";
		else
			echo "<th style='text-align:center;'>".CHtml::activeLabel($student_info,$s)."</th>";	
	}
	echo "</tr>";
	$i = 1;
	$m=1;

	foreach($stud_data as $t=>$sd)
	{ 
		if(($m%2) == 0)
		{
		  $class = "odd";
		}
		else
		{
		  $class = "even";
		}
		
		echo "<tr class=".$class.">";
		
		echo "<td style='text-align:center;'>".$i."</td>";
		foreach($selected_list as $s)
		{
		
			if($s=='batch_name')
			{
				if($sd['student_transaction_batch_id']==0)
					echo "<td style='text-align:center;'><i>Not Set</i></td>";
				else
				echo "<td style='text-align:center;'>".Batch::model()->findByPk($sd['student_transaction_batch_id'])->$s."</td>";
			}
			else if($s=='student_address_c_line1')
			{	
				if($sd['student_transaction_student_address_id']!=0)
				{
					if(!empty(StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_c_city))
					{
						$add_c = "<br/>".City::model()->findByPk(StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_c_city)->city_name.", ";	
					}
					else
					{
						$add_c = '';
					}
					
					if(!empty(StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_c_state))
					{
						$add_s = State::model()->findByPk(StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_c_state)->state_name.", ";	
					}
					else
					{
						$add_s = '';
					}

					if(!empty(StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_c_country))
					{
						$add_co = Country::model()->findByPk(StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_c_country)->name;	
					}
					else
					{
						$add_co = '';
					}					
					echo "<td style='text-align:center;width:400px;'>".StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_c_line1." ".StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_c_line2." ".$add_c." ".$add_s." ".$add_co."</td>";
					
				}
				else
					echo "<td style='text-align:center;'>&nbsp;</td>";
			}
			else if($s=='student_address_p_line1')
			{	
				if($sd['student_transaction_student_address_id']!=0)
				{
					if(!empty(StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_p_city))
					{
						$add_c = "<br/>".City::model()->findByPk(StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_p_city)->city_name.", ";	
					}
					else
					{
						$add_c = '';
					}
					
					if(!empty(StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_p_state))
					{
						$add_s = State::model()->findByPk(StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_p_state)->state_name.", ";	
					}
					else
					{
						$add_s = '';
					}

					if(!empty(StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_p_country))
					{
						$add_co = Country::model()->findByPk(StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_p_country)->name;	
					}
					else
					{
						$add_co = '';
					}
				echo "<td style='text-align:center; width:400px;'>".StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_p_line1." ".StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_p_line2." ".$add_c." ".$add_s." ".$add_co."</td>";
				}
				else  {
				echo "<td>&nbsp;</td>";
				  }
				
			}
			else if($s=='city')
			{
				if($sd['student_transaction_student_address_id']!=0)
				{
					$add = StudentAddress::model()->findByPk($sd['student_transaction_student_address_id']);
					if($add->student_address_c_city != null)
					echo "<td style='text-align:center;'>".City::model()->findByPk($add->student_address_c_city)->city_name."</td>";			
					else
					echo "<td>&nbsp;</td>";				
				}
				else
					echo "<td>&nbsp;</td>";				
			}
			else if($s=='student_email_id_1')
			{
			echo "<td style='text-align:center; width:250px;'>".StudentInfo::model()->findByPk($sd['student_transaction_student_id'])->$s."</td>";
			}
			else if($s=='student_email_id_2')
			{
				if(StudentInfo::model()->findByPk($sd['student_transaction_student_id'])->$s != null)
			echo "<td style='text-align:center; width:250px;'>".StudentInfo::model()->findByPk($sd['student_transaction_student_id'])->$s."</td>";
				else
				echo "<td style='text-align:center; width:250px;'>&nbsp;</td>";	
			
			}
			else if($s=='student_adm_date')
			{
			echo "<td style='text-align:center; width:107px;'>".StudentInfo::model()->findByPk($sd['student_transaction_student_id'])->$s."</td>";
			}

			else	
			{		echo "<td style='text-align:center;'>".StudentInfo::model()->findByPk($sd['student_transaction_student_id'])->$s."</td>";
			}

		}
		$i++;
		echo "</tr>";
		$m++;
	}
	
echo "</table>";
echo "</div>";
echo "</div></div></div>";

}
else
{
?>
	<div class="portlet box blue view" style="width:100%">
	    <div class="portlet-title"><i class="fa fa-plus"></i><span class="box-title"> Student List</span>
		</div>
	    	<div class="operation">
		  <?php echo CHtml::link('<i class="fa fa-chevron-left"></i>Back', array('Report/StudInfoReport'), array('class'=>'btnyellow'));?></div></div>
<?php
	print  "<h1 style=\"color:red;text-align:center;margin-top:10%\">No Record To Display</h1>";
} ?>
