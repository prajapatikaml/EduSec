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
use app\modules\employee\models\EmpInfo;
use app\modules\employee\models\EmpAddress;
use app\modules\employee\models\EmpMaster;
use app\modules\employee\models\EmpDepartment;
use app\modules\employee\models\EmpDesignation;

$this->title = Yii::t('app', 'Employee Info Report');
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
          	<?php echo Html::a('<i class="fa fa-arrow-circle-left"></i> Back', ['employee/empinforeport'], ['class'=>'btn btn-back', 'style'=>'color:#fff']);?> &nbsp;
<?php echo Html::a('<i class="fa fa-file-excel-o"></i> Excel',['employee/selected-employee-list','employeelistexcelexport'=>'employeelistexcel'],array('title'=>'Export to Excel', 'target'=>'_blank', 'class'=>'btn btn-info', 'style'=>'color:#fff'));?> &nbsp;
<?php echo Html::a('<i class="fa fa-file-pdf-o"></i> PDF',array('employee/selected-employee-list','employeelistexport'=>'employeelistpdf'),array('title'=>'Export to PDF','target'=>'_blank','class'=>'btn btn-warning', 'style'=>'color:#fff')); ?>	
          </div> <!-- box-tools -->
        </div><!-- /.box-header -->

 <div class="box-body table-responsive no-padding">
 <?php $add_c = $add_city = $add_co = $add_s = null;
if(!empty($employee_data) && !empty($selected_list))
{
	$emp_info = new EmpInfo();
	echo "<table class ='table-bordered table table-striped'>";	
	echo "<tr><th class='text-center'>SI No.</th>";
	foreach($selected_list as $s)
	{
		if($s == 'emp_department_name')
			echo "<th class='text-center'>Department</th>";
		else if($s == 'emp_cadd')
			echo "<th class='text-center'>Local Address</th>";
		else if($s == 'emp_padd')
			echo "<th class='text-center'>International Address</th>";
		else if($s == 'emp_category_name')
			echo "<th class='text-center'>Category</th>";
		else if($s == 'emp_designation_name')
			echo "<th class='text-center'>Designation</th>";
		else if($s == 'city')
			echo "<th class='text-center'>City</th>";
		else if($s == 'emp_bloodgroup')
			echo "<th class='text-center'>Blood Group</th>";
		else if($s == 'emp_joining_date')
			echo "<th class='text-center'>Joining Date </th>";
		else if($s == 'emp_guardian_mobile_no')
			echo "<th class='text-center'>Guardian No</th>";
		else if($s == 'emp_email_id')
			echo "<th class='text-center'>".Html::activeLabel($emp_info,$s)."</th>";
		else
			echo "<th class='text-center'>".Html::activeLabel($emp_info,$s)." </th>";
	}
	echo "</tr>";
	$i = 1;
	$m = 1;	
	foreach($employee_data as $t=>$sd)
	{ 		
		echo "<tr>";
		echo "<td class='text-center'>".$i."</td>";
		foreach($selected_list as $s)
		{
			if($s == 'emp_department_name')
				echo "<td class='text-center'>".EmpDepartment::findOne($sd['emp_master_department_id'])->emp_department_name."</td>";
			else if($s == 'city')
			{
				if($sd['emp_master_emp_address_id'] !=0)
				{
					$add = EmpAddress::findOne($sd['emp_master_emp_address_id']);
					if($add->emp_cadd_city != null)
					echo "<td class='text-center'>".City::findOne($add->emp_cadd_city)->city_name."</td>";			
					else
					echo "<td>&nbsp;</td>";
				}
				else
				echo "<td>&nbsp;</td>";
			}
			else if($s == 'emp_designation_name'){
				if($sd['emp_master_designation_id']!= null)
					echo "<td class='text-center'>".EmpDesignation::findOne($sd['emp_master_designation_id'])->emp_designation_name."</td>";
				else
					echo "<td> &nbsp;</td>";
			}
			else if($s == 'emp_category_name'){
				echo "<td class='text-center'>".EmpCategory::findOne($sd['emp_master_category_id'])->emp_category_name."</td>";	
			}			
		        else if($s == 'emp_cadd')
			{	
				if($sd['emp_master_emp_address_id']!=0)
				{
					if(!empty(EmpAddress::findOne($sd['emp_master_emp_address_id'])->emp_cadd_city))
					{
						$add_c = "<br/>".City::findOne(EmpAddress::findOne($sd['emp_master_emp_address_id'])->emp_cadd_city)->city_name.", ";	
					}
					else
					{
						$add_c = '';
					}					
					if(!empty(EmpAddress::findOne($sd['emp_master_emp_address_id'])->emp_cadd_state))
					{
						$add_s = State::findOne(EmpAddress::findOne($sd['emp_master_emp_address_id'])->emp_cadd_state)->state_name.", ";	
					}
					else
					{
						$add_s = '';
					}
					if(!empty(EmpAddress::findOne($sd['emp_master_emp_address_id'])->emp_cadd_country))
					{
						$add_co = Country::findOne(EmpAddress::findOne($sd['emp_master_emp_address_id'])->emp_cadd_country)->country_name;	
					}
					else
					{
						$add_co = '';
					}					
					echo "<td class='text-center'>".EmpAddress::findOne($sd['emp_master_emp_address_id'])->emp_cadd." ".$add_c." ".$add_s." ".$add_co."</td>";
					
				}
				else
					echo "<td class='text-center'>&nbsp;</td>";
			}
			else if($s == 'emp_padd')
			{	
				if($sd['emp_master_emp_address_id']!=0)
				{
					if(!empty(EmpAddress::findOne($sd['emp_master_emp_address_id'])->emp_padd_city))
					{
						$add_c = "<br/>".City::findOne(EmpAddress::findOne($sd['emp_master_emp_address_id'])->emp_padd_city)->city_name.", ";	
					}
					else
					{
						$add_c = '';
					}					
					if(!empty(EmpAddress::findOne($sd['emp_master_emp_address_id'])->emp_padd_state))
					{
						$add_s = State::findOne(EmpAddress::findOne($sd['emp_master_emp_address_id'])->emp_padd_state)->state_name.", ";	
					}
					else
					{
						$add_s = '';
					}
					if(!empty(EmpAddress::findOne($sd['emp_master_emp_address_id'])->emp_padd_country))
					{
						$add_co = Country::findOne(EmpAddress::findOne($sd['emp_master_emp_address_id'])->emp_padd_country)->country_name;	
					}
					else
					{
						$add_co = '';
					}
				echo "<td class='text-center'>".EmpAddress::findOne($sd['emp_master_emp_address_id'])->emp_padd." ".$add_c." ".$add_s." ".$add_co."</td>";
				}
				else  {
				echo "<td>&nbsp;</td>";
				  }				
			}				
			else if($s == 'emp_joining_date')
			{
				$jdate = EmpInfo::findOne($sd['emp_master_emp_info_id'])->$s;
				echo "<td class='text-center'>".date('d-m-Y',strtotime($jdate))."</td>";	
			}
			else if($s == 'emp_dob')
			{
				$bdate = EmpInfo::findOne($sd['emp_master_emp_info_id'])->$s;
				echo "<td class='text-center'>".date('d-m-Y',strtotime($bdate))."</td>";	
			}
			else
			{
				echo "<td class='text-center'>".EmpInfo::findOne($sd['emp_master_emp_info_id'])->$s."</td>";
			}
		}
		$i++;
		echo "</tr>";
		$m++;		
	}
 echo"</table>";
}
?>
</div></div>
</div> <!---/end box-body--->
</div> <!---/end box--->
