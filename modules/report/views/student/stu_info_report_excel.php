<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use app\models\City;
use app\models\State;
use app\models\Country;
use yii\web\Controller;
use app\modules\student\models\StuInfo;
use app\modules\student\models\StuAddress;
use app\modules\student\models\StuMaster;
use app\modules\course\models\Courses;
use app\modules\course\models\Batches;
use app\modules\course\models\Section;
?>

<?php

if(!empty($student_data))
{
	$s_info = new StuInfo();
	$cnt = count($selected_list)+1;
	echo "<table  border='1'>";	
	echo "<tr><th colspan=".$cnt."> <center> <h4 >Student Info Report </h4> </center></th> </tr> ";
	echo "<tr  class=success ><th >SI No.</th>";
	foreach($selected_list as $s)
	{
		if($s=='batch_name')
			echo "<th style='text-align:center;'>Batch Name</th>";
		else if($s=='stu_cadd')
			echo "<th style='text-align:center;width: 400px;'>Local Address</th>";
		else if($s=='stu_padd')
			echo "<th style='text-align:center;width: 400px;'>International Address</th>";
		else if($s=='stu_email_id')
			echo "<th style='text-align:center;width: 250px;'>Email ID</th>";
		else if($s=='city')
			echo "<th style='text-align:center;'>City</th>";
		else if($s=='stu_bloodgroup')
			echo "<th style='text-align:center;'>Blood Group</th>";
		else if($s=='batch_name')
			echo "<th style='text-align:center;'>Batch</th>";
		else if($s=='course_name')
			echo "<th style='text-align:center;'>Course</th>";
		else if($s=='section_name')
			echo "<th style='text-align:center;'>Section Name</th>";
		else
			echo "<th style='text-align:center;'>".Html::activeLabel($s_info,$s)."</th>";			
	}
	echo "</tr>";
	$i = 1;
	$add_city_c = $add_c =  $add_city = $add_s =$add_co = $add_city_c = '';
	foreach($student_data as $t=>$sd)
	{ 	
		 if(($i%2) == 0)
		 {
			$bgcolor = "#FFFFFF";
		 }
		 else
		 {
			$bgcolor = "#E3E3E3";
		 } 	
		echo '<tr align=center bgcolor='.$bgcolor.'>';
		echo "<td style='text-align:center;'>".$i."</td>";
		foreach($selected_list as $s)
		{
			if($s == 'batch_name')
			{
				if($sd['stu_master_batch_id']==0)
					echo "<td style='text-align:center;'><i>Not Set</i></td>";
				else
				echo "<td style='text-align:center;'>".Batches::findOne($sd['stu_master_batch_id'])->$s."</td>";
			}
			else if($s == 'course_name')
			{
				if($sd['stu_master_course_id']==0 )
					echo "<td></i> Not Set</i></td>";
				else
					echo "<td>".Courses::findOne($sd['stu_master_course_id'])->$s."</td>";
			}
			else if($s == 'section_name')
			{
				if($sd['stu_master_section_id']== 0)
					echo "<td> Not Set </td>";
				else
					echo "<td>". Section::findOne($sd['stu_master_section_id'])->$s."</td>";
			}
			else if($s == 'stu_cadd')
			{	
				if($sd['stu_master_stu_address_id']!=0)
				{
					if(!empty(StuAddress::findOne($sd['stu_master_stu_address_id'])->stu_cadd_city))
					{
						$add_c = City::findOne(StuAddress::findOne($sd['stu_master_stu_address_id'])->stu_cadd_city);
						if(!empty($add_c))
							$add_city=$add_c->city_name." , ";
						else
							$add_city = '';
					}
					else
					{
						$add_city = '';
					}
					
					if(!empty(StuAddress::findOne($sd['stu_master_stu_address_id'])->stu_cadd_state))
					{
						$add_s = State::findOne(StuAddress::findOne($sd['stu_master_stu_address_id'])->stu_cadd_state)->state_name.", ";	
					}
					else
					{
						$add_s = '';
					}

					if(!empty(StuAddress::findOne($sd['stu_master_stu_address_id'])->stu_cadd_country))
					{
						$add_co = Country::findOne(StuAddress::findOne($sd['stu_master_stu_address_id'])->stu_cadd_country)->country_name;	
					}
					else
					{
						$add_co = '';
					}					
					echo "<td style='text-align:center;width:400px;'>".StuAddress::findOne($sd['stu_master_stu_address_id'])->stu_cadd." ".$add_city." ".$add_s." ".$add_co."</td>";
					
				}
				else
					echo "<td style='text-align:center;'>&nbsp;</td>";
			}
			else if($s=='stu_padd')
			{	
				if($sd['stu_master_stu_address_id']!=0)
				{
					if(!empty(StuAddress::findOne($sd['stu_master_stu_address_id'])->stu_padd_city))
					{
						$add_c = City::findOne(StuAddress::findOne($sd['stu_master_stu_address_id'])->stu_padd_city);
						if(!empty($add_c))
							$add_city_c = $add_c->city_name." , ";
						else
							$add_city_c = '';	
					}
					else
					{
						$add_c = '';
					}
					
					if(!empty(StuAddress::findOne($sd['stu_master_stu_address_id'])->stu_padd_state))
					{
						$add_s = State::findOne(StuAddress::findOne($sd['stu_master_stu_address_id'])->stu_padd_state)->state_name.", ";	
					}
					else
					{
						$add_s = '';
					}

					if(!empty(StuAddress::findOne($sd['stu_master_stu_address_id'])->stu_padd_country))
					{
						$add_co = Country::findOne(StuAddress::findOne($sd['stu_master_stu_address_id'])->stu_padd_country)->country_name;	
					}
					else
					{
						$add_co = '';
					}
				echo "<td style='text-align:center; width:400px;'>".StuAddress::findOne($sd['stu_master_stu_address_id'])->stu_padd.$add_city_c." ".$add_s." ".$add_co."</td>";
				}
				else  {
				echo "<td>&nbsp;</td>";
				  }				
			}
			else if($s=='city')
			{
				if($sd['stu_master_stu_address_id']!=0)
				{
					$add = StuAddress::findOne($sd['stu_master_stu_address_id']);
					if(!empty($add))
						$city=City::findOne($add->stu_cadd_city);
					if(!empty($add->stu_cadd_city))
					   echo "<td style='text-align:center;'>".$city['city_name']."</td>";			
					else
					   echo "<td>&nbsp;</td>";				
				}
				else
					echo "<td>&nbsp;</td>";				
			}
			else if($s=='stu_email_id')
			{
				if(StuInfo::findOne($sd['stu_master_stu_info_id'])->$s != null)
					echo "<td style='text-align:center;width:250px;'>".StuInfo::findOne($sd['stu_master_stu_info_id'])->$s."</td>";
				else
					echo "<td style='text-align:center;'>&nbsp;</td>";				
			}
			else if($s=='stu_admission_date')
			{
				$date=StuInfo::findOne($sd['stu_master_stu_info_id'])->$s;
				echo "<td style='text-align:center; width:107px;'>".date('d-m-Y',strtotime($date))."</td>";
 
			}
			else if($s=='stu_dob')
			{
				$dob=StuInfo::findOne($sd['stu_master_stu_info_id'])->$s;
				echo "<td style='text-align:center; width:107px;'>".date('d-m-Y',strtotime($dob))."</td>";
 
			}
			else	
			{	
			   echo "<td style='text-align:center;'>".StuInfo::findOne($sd['stu_master_stu_info_id'])->$s."</td>";
			}
		}
		$i++;
		echo "</tr>";		
	}	
echo "</table>";
}
else
	echo  "<h1 style=\"color:red;text-align:center;margin-top:10%;margin-right:60%\">No Record To Display</h1>";
