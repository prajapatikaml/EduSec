<style>
table, th, td {
  vertical-align: middle;
}
th, td, caption {
  padding: 4px 0 10px;
  text-align: center;
}

</style>
<?php if ($model !== null):?>
<?$k=1;?>

	
<table border="1">

	<tr>
		<th align="center" >
		      SN.		</th>
 		<th align="center" >
		      Employee Name	</th>
		<th align="center" >
		      Certificate Name	</th>
		
		<th align="center" >
		     Created By</th>

		<th align="center" >
		     Organization</th>
		
		
 	</tr>
	<?php foreach($model as $m=>$v)
	{
	   if($m <> 0) {
            ?>
	<tr>
       		<td>
			<?php echo $k; ?>
		</td>
		<td>	
			
			<?php echo EmployeeInfo::model()->findByAttributes(array("employee_info_transaction_id"=>$v['employee_certificate_details_table_emp_id']))->employee_first_name;?>
			
		</td>  
		<td>	
			<?php echo Certificate::model()->findByPk($v['employee_certificate_type_id'])->certificate_title;?>
		</td>  
		

		<td>	
			<?php echo User::model()->findByPk($v['employee_certificate_created_by'])->user_organization_email_id;?>
		</td>  
		
	
		<td>	
			<?php echo Organization::model()->findByPk($v['employee_certificate_org_id'])->organization_name;?> 	
		</td>  
</tr>
	<?php $k++;?>
	 <?php  }// end if
	
	}// end for loop?>
     </table>

<?php endif; ?>
