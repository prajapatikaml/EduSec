<style>
table, th, td {
  vertical-align: middle;
}
th, td, caption {
  padding: 4px 0 10px;
  text-align: center;
}

</style><?php if ($model !== null):?>
<table border="1">
<?php $i=0;?>
	<tr>
		<th >
		      SI No			        </th>
 		<th >
		      Faculty First Name		</th>
 		<th >
		      Surname				</th>
		<th>
		      Designation   			</th>	
 		<th >
		      Branch				</th>

		<th >
		      Schedule Minute			</th>
 		<th >
		      Schedule Hour			</th>

 		<th >
		      Created By			</th>
 		<th >
		      Creation Date			</th>
		<th >
		      Organization			</th>
 		</tr>
	<?php foreach($model as $row=>$v): 
	 if($row <> 0) {
            ?>
	<tr>

        	<td>
			<?php echo ++$i; ?>
		</td>
       		<td>
			<?php echo  EmployeeInfo::model()->findByAttributes(array(
						'employee_info_transaction_id' => $v['student_attendence_email_emp_id']))->employee_first_name; ?>
		</td>
		<td>
			<?php echo  EmployeeInfo::model()->findByAttributes(array(
						'employee_info_transaction_id' => $v['student_attendence_email_emp_id']))->employee_last_name; ?>
		</td>
		<td>
			<?php echo EmployeeDesignation::model()->findByPk(EmployeeTransaction::model()->findByPk($v['student_attendence_email_emp_id'])->employee_transaction_designation_id)->employee_designation_name;?>
		</td>
		<td>
			<?php echo ($v['student_attendence_email_branch_id']==0)?"All Branch":Branch::model()->findByPk($v['student_attendence_email_branch_id'])->branch_name; ?>
		</td>
		<td>
			<?php echo $v['student_attendence_email_minute']; ?>
		</td>
       		<td>
			<?php echo $v['student_attendence_email_hour']; ?>
		</td>

       		       		<td>
			<?php echo User::model()->findByPk($v['student_attendence_email_created_by'])->user_organization_email_id; ?>
		</td>
       		<td>
			<?php echo date_format(new DateTime($v['student_attendence_email_creation_date']), 'd-m-Y'); ?>
		</td>
		<td>
			<?php echo Organization::model()->findByPk($v['student_attendence_email_org_id'])->organization_name; ?>
		</td>

       	       	</tr>
     <?php } endforeach; ?>
</table>
<?php endif; ?>
