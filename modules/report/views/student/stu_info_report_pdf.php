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

<div class="grid-view user-data">
<?php
if(!empty($student_data))
{	
	$i = 1;
	$add_c = $add_s =$add_city = $add_co = $add_city_c = '';
	$student_info = new StuInfo();
	echo "</br></br><h1>Students List</h1>";	
	foreach($student_data as $t=>$sd)
	{ 	
		echo "<h3>".$sd['stu_first_name']." ".$sd['stu_last_name']."</h3>";
		echo "<table>";
		
		echo '<tr >';
		echo "<td class='label'>SI No.</td><td>".$i."</td>";
		foreach($selected_list as $s)
		{
			if($s=='batch_name')
			{			
				echo "<tr><td class='label'>Batch </td>";
				if($sd['stu_master_batch_id']==0)
					echo "<td ><i>Not Set</i></td></tr>";
				else
				echo "<td>".Batches::findOne($sd['stu_master_batch_id'])->$s."</td></tr>";
			}
			else if($s=='course_name')
			{			
				echo "<tr><td class='label'>Course</td>";
				if($sd['stu_master_batch_id']==0)
					echo "<td><i>Not Set</i></td></tr>";
				else
				echo "<td>".Courses::findOne($sd['stu_master_course_id'])->$s."</td></tr>";
			}
			else if($s=='section_name')
			{			
				echo "<tr><td class='label'>Section </td>";
				if($sd['stu_master_section_id']==0)
					echo "<td ><i>Not Set</i></td></tr>";
				else
				echo "<td >".Section::findOne($sd['stu_master_section_id'])->$s."</td></tr>";
			}
			else if($s=='stu_cadd')
			{	
				echo "<tr><td class='label'>Local Address</td>";
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
						$add_c = '';
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
					echo "<td >".StuAddress::findOne($sd['stu_master_stu_address_id'])->stu_cadd." ".$add_city." ".$add_s." ".$add_co."</td></tr>";
					
				}
				else
					echo "<td >&nbsp;</td></tr>";
			}
			else if($s=='stu_padd')
			{	
				echo "<tr><td class='label'>International Address </td>";
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
				echo "<td >".StuAddress::findOne($sd['stu_master_stu_address_id'])->stu_padd." ".$add_city_c." ".$add_s." ".$add_co."</td></tr>";
				}
				else  {
				echo "<td>&nbsp;</td></tr>";
				  }				
			}
			else if($s=='city')
			{
				echo "<tr><td class='label'>City</td>";
				if($sd['stu_master_stu_address_id']!=0)
				{
					$add = StuAddress::findOne($sd['stu_master_stu_address_id']);
					if($add->stu_cadd_city!= null)
					echo "<td>".(!empty(City::findOne($add->stu_cadd_city)->city_name) ? City::findOne($add->stu_cadd_city)->city_name : " Not Set ")."</td></tr>";			
					else
					echo "<td>&nbsp;</td></tr>";				
				}
				else
					echo "<td>&nbsp;</td></tr>";				
			}
			else if($s=='stu_email_id')
			{
				if(StuInfo::findOne($sd['stu_master_stu_info_id'])->$s != null)
					echo "<tr><td class='label'>Email Id</td> <td>".StuInfo::findOne($sd['stu_master_stu_info_id'])->$s."</td> </tr>";
				else
					echo "<tr><td class='label'>Email ID</td> <td >&nbsp;</td></tr>";				
			}
			else if($s=='stu_admission_date')
			{
				$date = StuInfo::findOne($sd['stu_master_stu_info_id'])->$s;
				echo "<tr><td class='label'>Admission Date</td><td >".Yii::$app->formatter->asDate($date)."</td></tr>";
 
			}
			else if($s=='stu_dob')
			{
				$dob = StuInfo::findOne($sd['stu_master_stu_info_id'])->$s;
				echo "<tr><td class='label'>Birth Date</td><td >".Yii::$app->formatter->asDate($dob)."</td></tr>";
 
			}
			else	
			{	echo "<tr><td class='label'>".Html::ActiveLabel($student_info,$s)."</td>";
				echo "<td>".StuInfo::findOne($sd['stu_master_stu_info_id'])->$s."</td></tr>";
			}
		}
		
			echo "</table>";
			
			$i++;
		
	}		

}
else
	echo  "<h1 style=\"color:red;text-align:center;margin-top:10%;margin-right:60%\">No Record To Display</h1>";
?>

</div>
