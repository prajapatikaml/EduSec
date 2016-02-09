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

$this->title = Yii::t('app', 'Student Info Report');
$this->params['breadcrumbs'][] = $this->title;

$_SESSION['query']=$query;
$_SESSION['selected_list']=$selected_list;
?>

<div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">

        <div class="box-header">
          <h3 class="box-title"><i class="fa fa-info-circle"></i> <?= $this->title ?></h3>
          <div class="box-tools pull-right">
          	<?php echo Html::a('<i class="fa fa-arrow-circle-left"></i> Back', ['student/stuinforeport'],['class'=>'btn btn-back', 'style'=>'color:#fff']);?>
		<?php echo Html::a('<i class="fa fa-file-excel-o"></i> Excel',['student/selected-student-list','studentlistexcelexport'=>'studentlistexcel'],array('title'=>'Export to Excel','target'=>'_blank','class'=>'btn btn-info', 'style'=>'color:#fff'));?>
		<?php echo Html::a('<i class="fa fa-file-pdf-o"></i> PDF',array('student/selected-student-list','studentlistexport'=>'studentlistpdf'),array('title'=>'Export to PDF','target'=>'_blank','class'=>'btn btn-warning', 'style'=>'color:#fff')); ?> 	
          </div>
        </div><!-- /.box-header -->

  <div class="box-body table-responsive no-padding">
<?php
$add_city_c = $add_c =$add_city = $add_s = $add_co = $padd_city_c = $padd_c = $padd_city = $padd_s = 
$padd_co = null;
if(!empty($student_data) && !empty($selected_list))
{
	$s_info = new StuInfo();
	echo "<table class ='table-bordered table table-striped'>";
	echo "<tr><th class='text-center'>SI No.</th>";
	foreach($selected_list as $s)
	{
		if($s=='batch_name')
			echo "<th class='text-center'>Batch </th>";
		else if($s=='stu_cadd')
			echo "<th class='text-center'>Local Address</th>";
		else if($s=='stu_padd')
			echo "<th class='text-center'>International Address</th>";
		else if($s=='stu_email_id')
			echo "<th class='text-center'>Email ID</th>";
		else if($s=='city')
			echo "<th class='text-center'>City</th>";
		else if($s=='stu_bloodgroup')
			echo "<th class='text-center'>Blood Group</th>";
		else if($s=='course_name')
			echo "<th class='text-center'>Course</th>";
		else if($s=='section_name')
			echo "<th class='text-center'>Section</th>";
		else
			echo "<th class='text-center'>".Html::activeLabel($s_info,$s)."</th>";	
		
	}
	echo "</tr>";
	$i = 1;
	foreach($student_data as $t=>$sd)
	{ 		
		echo "<tr>";
		echo "<td class='text-center'>".$i."</td>";
		foreach($selected_list as $s)
		{
			if($s == 'batch_name')
			{
				if($sd['stu_master_batch_id']==0)
					echo "<td class='text-center'><i>Not Set</i></td>";
				else
				echo "<td class='text-center'>".Batches::findOne($sd['stu_master_batch_id'])->$s."</td>";
			}
			else if($s == 'course_name')
			{
				if($sd['stu_master_course_id'] == 0 )
					echo "<td></i> Not Set</i></td>";
				else
					echo "<td>".Courses::findOne($sd['stu_master_course_id'])->$s."</td>";
			}
			else if($s == 'section_name')
			{
				if($sd['stu_master_section_id'] == 0)
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
					echo "<td class='text-center'>".StuAddress::findOne($sd['stu_master_stu_address_id'])->stu_cadd." ".$add_city." ".$add_s." ".$add_co."</td>";
					
				}
				else
					echo "<td class='text-center'>&nbsp;</td>";
			}
			else if($s=='stu_padd')
			{	
				if($sd['stu_master_stu_address_id']!=0)
				{
					if(!empty(StuAddress::findOne($sd['stu_master_stu_address_id'])->stu_padd_city))
					{
						$padd_c = City::findOne(StuAddress::findOne($sd['stu_master_stu_address_id'])->stu_padd_city);
						if(!empty($add_c))
							$padd_city_c = $add_c->city_name." , ";
						else
							$padd_city_c = '';	
					}
					else
					{
						$padd_c = '';
					}
					
					if(!empty(StuAddress::findOne($sd['stu_master_stu_address_id'])->stu_padd_state))
					{
						$padd_s = State::findOne(StuAddress::findOne($sd['stu_master_stu_address_id'])->stu_padd_state)->state_name.", ";	
					}
					else
					{
						$padd_s = '';
					}

					if(!empty(StuAddress::findOne($sd['stu_master_stu_address_id'])->stu_padd_country))
					{
						$padd_co = Country::findOne(StuAddress::findOne($sd['stu_master_stu_address_id'])->stu_padd_country)->country_name;	
					}
					else
					{
						$padd_co = '';
					}
				echo "<td class='text-center'>".StuAddress::findOne($sd['stu_master_stu_address_id'])->stu_padd.$padd_city_c." ".$padd_s." ".$padd_co."</td>";
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
					echo "<td class='text-center'>".StuInfo::findOne($sd['stu_master_stu_info_id'])->$s."</td>";
				else
					echo "<td class='text-center'>&nbsp; </td>";				
			}
			else if($s=='stu_admission_date')
			{
				$date=StuInfo::findOne($sd['stu_master_stu_info_id'])->$s;
				echo "<td class='text-center'>".date('d-m-Y',strtotime($date))."</td>"; 
			}
			else if($s=='stu_dob')
			{
				$dob=StuInfo::findOne($sd['stu_master_stu_info_id'])->$s;
				echo "<td class='text-center'>".date('d-m-Y',strtotime($dob))."</td>"; 
			}
			else	
			{	
			   echo "<td class='text-center'>".StuInfo::findOne($sd['stu_master_stu_info_id'])->$s."</td>";
			}
		}
		$i++;
		echo "</tr>";
			
	}	
echo "</table>";
}
?>
</div>
</div>
</div> <!---./end box-body--->
</div>

 
