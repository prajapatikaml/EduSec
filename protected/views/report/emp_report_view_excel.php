<style>
table, th, td {
  vertical-align: middle;
}
th, td, caption {
  padding: 4px 0 10px;
  text-align: center;
}

</style>

<?php
	$org = Organization::model()->findAll();
	$org_data=$org[0];
echo '<table class="report-table" border="2" > ';
	echo "<tr align=center> <th  colspan = 15 style=text-align:left;> ".CHtml::image(Yii::app()->controller->createUrl('/site/loadImage', array('id'=>$org_data->organization_id)),'No Image',array('width'=>80,'height'=>55,'style'=>'float:left;margin-left:200px;')) ."
	 <big> <b>".$org_data->organization_name ."</big><br>". $org_data->address_line1." ".$org_data->address_line2."</br>"  . City::model()->findBypk($org_data->city)->city_name.", ".State::model()->findBypk($org_data->state)->state_name.", ".Country::model()->findBypk($org_data->country)->name."." ." </th> <br>	 </tr>";


if($emp_data)
{

	$emp_info=new EmployeeInfo;
	$add=new EmployeeAddress;
	//$cat=new Category;
	$city=new City;
	$dept = new Department;
	
	echo "</br>";
	echo "<tr class=\"table_header\"><th>Sr No.</th>";
	foreach($selected_emp_list as $s)
	{

		if($s=='department_name')
			echo "<th>Department</th>";
		else if($s=='employee_address_c_line1')
			echo "<th>Current Address</th>";
		else if($s=='employee_address_p_line1')
			echo "<th>Permenent Address</th>";
		else if($s=='category_name')
			echo "<th>Category</th>";
		else if($s=='city')
			echo "<th>City</th>";
		else if($s=='employee_bloodgroup_bloodgroup')
			echo "<th>Blood Group</th>";
		else
			echo "<th>".CHtml::activeLabel($emp_info,$s)." </th>";
		
		
		
	}

	echo "</tr>";
	$i = 1;
	
	foreach($emp_data as $t=>$sd)
	{ 
		
		echo "<tr align=center>";
		echo "<td>".$i."</td>";
		foreach($selected_emp_list as $s)
		{
			if($s=='department_name')
				echo "<td>".Department::model()->findByPk($sd['employee_transaction_department_id'])->department_name."</td>";
			else if($s=='category_name')
			{
				if($sd['employee_transaction_category_id'] !=0)
				echo "<td>".Category::model()->findByPk($sd['employee_transaction_category_id'])->category_name."</td>";
				else
				echo "<td>&nbsp;</td>";
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
					echo "<td style='text-align:center;width:400px;'>".EmployeeAddress::model()->findByPk($sd['employee_transaction_emp_address_id'])->employee_address_c_line1."<br>".EmployeeAddress::model()->findByPk($sd['employee_transaction_emp_address_id'])->employee_address_c_line2."<br>".$add_c."<br>".$add_s."<br>".$add_co."</td>";
					
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
				echo "<td style='text-align:center; width:400px;'>".EmployeeAddress::model()->findByPk($sd['employee_transaction_emp_address_id'])->employee_address_p_line1."<br>".EmployeeAddress::model()->findByPk($sd['employee_transaction_emp_address_id'])->employee_address_p_line2."<br>".$add_c."<br>".$add_s."<br>".$add_co."</td>";
				}
				else  {
				echo "<td>&nbsp;</td>";
				  }
				
			}
			else if($s=='city')
			{
				if($sd['employee_transaction_emp_address_id'] !=0)
				{
					$add = EmployeeAddress::model()->findByPk($sd['employee_transaction_emp_address_id']);
					if($add->employee_address_c_city != null)
					echo "<td>".City::model()->findByPk($add->employee_address_c_city)->city_name."</td>";			
					else
					echo "<td>&nbsp;</td>";
				}
				else
				echo "<td>&nbsp;</td>";
			}
			else if($s=='employee_refer_designation')
				echo "<td>".EmployeeDesignation::model()->findByPk($sd['employee_transaction_designation_id'])->employee_designation_name."</td>";
			else if($s=='employee_type'){
				$ty = ($sd[$s]==1) ? "Teaching" : "Non-teaching";
				echo "<td>".$ty."</td>";	
			}
			else	
			{		
				echo "<td>".$sd[$s]."</td>";
			}

		}
		$i++;
		
		echo "</tr>";
	}
	
echo "</table>";
}
else
{
	print  "<h1 style=\"color:red;text-align:center\">No Record To Display</h1>";
} ?>
</div>
