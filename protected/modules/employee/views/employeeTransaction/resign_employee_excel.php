<?php 
	$resign_emp_data = EmployeeTransaction::model()->resetScope()->findAll(array('condition'=>'employee_status= 2 and employee_transaction_organization_id = '.Yii::app()->user->getState('org_id')));
?>
	<table>
	<tr>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Attendence Card</td>
		<td>Designation</td>
		<td>Department</td>
		<td>Shift</td>
		<td>Resign Application Date</td>
		<td>Resign Approve Date</td>
		<td></td>
	</tr>
<?php	
	foreach($resign_emp_data as $list)
	{
		$emp_info = EmployeeInfo::model()->resetScope()->findByAttributes(array('employee_info_transaction_id'=>$list['employee_transaction_id']));
		$emp_level_max = Yii::app()->db->createCommand()
				->select('MAX(reporting_priority),employee_exit_reporting_employee_id')
				->from('employee_exit_reporting')
				->group('employee_exit_employee_id')
				->where('employee_exit_employee_id ='.$list['employee_transaction_id'])
				->queryRow();
		
		$max_priority = $emp_level_max['MAX(reporting_priority)'];
		$reporting_emp_id = EmployeeExitReporting::model()->findByAttributes(array('employee_exit_employee_id'=>$list['employee_transaction_id'],'reporting_priority'=>$max_priority));
		$report_emp = $reporting_emp_id['employee_exit_reporting_employee_id'];
		$exit_details = EmployeeExitDetails::model()->findByAttributes(array('employee_exit_details_employee_id'=>$list['employee_transaction_id'],'reporting_employee_id'=>$report_emp,'reporting_employee_review_status'=>2));
		$app_date = $exit_details['employee_resign_application_date'];
?>
	<tr>
		<td><?php echo $emp_info['employee_first_name']?></td>
		<td><?php echo $emp_info['employee_last_name']?></td>
		<td><?php echo $emp_info['employee_attendance_card_id']?></td>
		<td><?php echo EmployeeDesignation::model()->findByPk($list['employee_transaction_designation_id'])->employee_designation_name;?></td>
		<td><?php echo Department::model()->findByPk($list['employee_transaction_department_id'])->department_name;?></td>
		<td><?php echo Shift::model()->findByPk($list['employee_transaction_shift_id'])->shift_type;?></td>
		<td><?php echo $emp_info['employee_left_transfer_date'];?></td>
		<td><?php echo $app_date;?></td>
	</tr>
		<?php
	}
?>
	</table>
