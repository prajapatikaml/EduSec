<title>Employee List</title>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/table_js/jquery.dataTables.js'); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/table_js/FixedColumns.js'); ?>
<?php
$this->breadcrumbs=array('Report',
	'Employee Info',
	
);?>
<?php
$_SESSION['query']=$query;
$_SESSION['selected_list']=$selected_emp_list;
?>
<?php
if($emp_data)
{
?>
<div class="scrollableContainer">
  <div class="scrollingArea CSSTableGenerator">
<?php	
	$emp_info=new EmployeeInfo;
	$add=new EmployeeAddress;
	$city=new City;
	$dept = new Department;
?>
	<div class="portlet box yellow">
	    <div class="portlet-title"><i class="fa fa-plus"></i><span class="box-title"> Employee  List</span>
	</div>
	    	<div class="operation">
	<?php echo CHtml::link('<i class="fa fa-chevron-left"></i>Back', array('Report/EmployeeInfoReport'), array('class'=>'btnyellow'));?>
	<?php echo CHtml::link('<i class="fa fa-file-excel-o"></i>Excel',Yii::app()->createUrl('report/SelectedEmployeeList',array('employeelistexcelexport'=>'employeelistexcel')),array('title'=>'Export to Excel','target'=>'_blank','class'=>'btnblue'));?>
	<?php echo CHtml::link('<i class="fa fa-file-pdf-o"></i>PDF',Yii::app()->createUrl('report/SelectedEmployeeList',array('employeelistexport'=>'employeelistpdf')),array('title'=>'Export to PDF','target'=>'_blank','class'=>'btn green')); ?>
	    </div>
<?php
	$org = Organization::model()->findAll();
	$org_data=$org[0];
//echo '<div class="wrapper">';
echo '<div class="grid-view" style="overflow:auto">';
echo '<table class="items" border="0" style="border-collapse: collapse;" >';
	echo "<tr align=center> <th  colspan = 60 style=text-align:left;> ".CHtml::image(Yii::app()->controller->createUrl('/site/loadImage', array('id'=>$org_data->organization_id)),'No Image',array('width'=>80,'height'=>55,'style'=>'float:left;margin-left:200px;')) ."
	 <big> <b>".$org_data->organization_name ."</big><br>". $org_data->address_line1." ".$org_data->address_line2."</br>"  . City::model()->findBypk($org_data->city)->city_name.", ".State::model()->findBypk($org_data->state)->state_name.", ".Country::model()->findBypk($org_data->country)->name."." ." </th> <br>	 </tr>";
	echo "<tr><th style='text-align:center;'>SI No.</th>";
	foreach($selected_emp_list as $s)
	{
		if($s=='department_name')
			echo "<th style='text-align:center;'>Department</th>";
		else if($s=='employee_address_c_line1')
			echo "<th style='text-align:center;width: 400px;'>Local Address</th>";
		else if($s=='employee_address_p_line1')
			echo "<th style='text-align:center;width: 400px;'>International Address</th>";
		else if($s=='category_name')
			echo "<th style='text-align:center;'>Category</th>";
		else if($s=='city')
			echo "<th style='text-align:center;'>City</th>";
		else if($s=='employee_bloodgroup_bloodgroup')
			echo "<th style='text-align:center;'>Blood Group</th>";
		else if($s=='employee_refer_designation')
			echo "<th style='text-align:center;'>Designation</th>";
		else if($s=='employee_private_email')
			echo "<th style='text-align:center;width: 270px;'>".CHtml::activeLabel($emp_info,$s)."</th>";
		else
			echo "<th style='text-align:center;'>".CHtml::activeLabel($emp_info,$s)." </th>";
		
		
		
	}

	echo "</tr>";
	$i = 1;
	$m=1;
	foreach($emp_data as $t=>$sd)
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
		foreach($selected_emp_list as $s)
		{
			if($s=='department_name')
				echo "<td style='text-align:center;'>".Department::model()->findByPk($sd['employee_transaction_department_id'])->department_name."</td>";
			else if($s=='city')
			{
				if($sd['employee_transaction_emp_address_id'] !=0)
				{
					$add = EmployeeAddress::model()->findByPk($sd['employee_transaction_emp_address_id']);
					if($add->employee_address_c_city != null)
					echo "<td style='text-align:center;'>".City::model()->findByPk($add->employee_address_c_city)->city_name."</td>";			
					else
					echo "<td>&nbsp;</td>";
				}
				else
				echo "<td>&nbsp;</td>";
			}
			else if($s=='employee_refer_designation')
				echo "<td style='text-align:center;'>".EmployeeDesignation::model()->findByPk($sd['employee_transaction_designation_id'])->employee_designation_name."</td>";
			else if($s=='employee_type'){
				$ty = ($sd[$s]==1) ? "Teaching" : "Non-teaching";
				echo "<td style='text-align:center;'>".$ty."</td>";	
			}
			
		        else if($s=='employee_address_c_line1')
			{	
				if($sd['employee_transaction_emp_address_id']!=0)
				{
					if(!empty(EmployeeAddress::model()->findByPk($sd['employee_transaction_emp_address_id'])->employee_address_c_city))
					{
						$add_c = "<br/>".City::model()->findByPk(EmployeeAddress::model()->findByPk($sd['employee_transaction_emp_address_id'])->employee_address_c_city)->city_name.", ";	
					}
					else
					{
						$add_c = '';
					}
					
					if(!empty(EmployeeAddress::model()->findByPk($sd['employee_transaction_emp_address_id'])->employee_address_c_state))
					{
						$add_s = State::model()->findByPk(EmployeeAddress::model()->findByPk($sd['employee_transaction_emp_address_id'])->employee_address_c_state)->state_name.", ";	
					}
					else
					{
						$add_s = '';
					}

					if(!empty(EmployeeAddress::model()->findByPk($sd['employee_transaction_emp_address_id'])->employee_address_c_country))
					{
						$add_co = Country::model()->findByPk(EmployeeAddress::model()->findByPk($sd['employee_transaction_emp_address_id'])->employee_address_c_country)->name;	
					}
					else
					{
						$add_co = '';
					}					
					echo "<td style='text-align:center;width:400px;'>".EmployeeAddress::model()->findByPk($sd['employee_transaction_emp_address_id'])->employee_address_c_line1." ".EmployeeAddress::model()->findByPk($sd['employee_transaction_emp_address_id'])->employee_address_c_line2." ".$add_c." ".$add_s." ".$add_co."</td>";
					
				}
				else
					echo "<td style='text-align:center;'>&nbsp;</td>";
			}
			else if($s=='employee_address_p_line1')
			{	
				if($sd['employee_transaction_emp_address_id']!=0)
				{
					if(!empty(EmployeeAddress::model()->findByPk($sd['employee_transaction_emp_address_id'])->employee_address_p_city))
					{
						$add_c = "<br/>".City::model()->findByPk(EmployeeAddress::model()->findByPk($sd['employee_transaction_emp_address_id'])->employee_address_p_city)->city_name.", ";	
					}
					else
					{
						$add_c = '';
					}
					
					if(!empty(EmployeeAddress::model()->findByPk($sd['employee_transaction_emp_address_id'])->employee_address_p_state))
					{
						$add_s = State::model()->findByPk(EmployeeAddress::model()->findByPk($sd['employee_transaction_emp_address_id'])->employee_address_p_state)->state_name.", ";	
					}
					else
					{
						$add_s = '';
					}

					if(!empty(EmployeeAddress::model()->findByPk($sd['employee_transaction_emp_address_id'])->employee_address_p_country))
					{
						$add_co = Country::model()->findByPk(EmployeeAddress::model()->findByPk($sd['employee_transaction_emp_address_id'])->employee_address_p_country)->name;	
					}
					else
					{
						$add_co = '';
					}
				echo "<td style='text-align:center; width:400px;'>".EmployeeAddress::model()->findByPk($sd['employee_transaction_emp_address_id'])->employee_address_p_line1." ".EmployeeAddress::model()->findByPk($sd['employee_transaction_emp_address_id'])->employee_address_p_line2." ".$add_c." ".$add_s." ".$add_co."</td>";
				}
				else  {
				echo "<td>&nbsp;</td>";
				  }
				
			}
			else  {	
				if($s=='employee_private_email')
					echo "<td style='text-align:center;width:250px;'>";
				else
					echo "<td style='text-align:center;'>";
				echo $sd[$s]."</td>";
			}

		}
		$i++;
		$m++;
		echo "</tr>";
	}
	
echo "</table>";
echo "</div>";
echo "</div></div></div>";
}
else
{
?>
<div class="portlet box blue view" style="width:100%">
	    <div class="portlet-title"><i class="fa fa-plus"></i><span class="box-title"> Employee List</span>
		</div>
	    	<div class="operation">
		  <?php echo CHtml::link('<i class="fa fa-chevron-left"></i>Back', array('Report/EmployeeInfoReport'), array('class'=>'btnyellow'));?></div></div>
<?php
	print  "<h1 style=\"color:red;text-align:center;margin-top:10%\">No Record To Display</h1>";
} ?>

