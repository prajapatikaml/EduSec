<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="80px">
		      employee_certificate_details_table_id		</th>
 		<th width="80px">
		      employee_certificate_details_table_emp_id		</th>
 		<th width="80px">
		      employee_certificate_type_id		</th>
 		<th width="80px">
		      employee_certificate_created_by		</th>
 		<th width="80px">
		      employee_certificate_creation_date		</th>
 		<th width="80px">
		      employee_certificate_org_id		</th>
 	</tr>
	<?php foreach($model as $row=>$v): 
	 if($row <> 0) {
            ?>
	<tr>
        		<td>
			<?php echo $v['employee_certificate_details_table_id']; ?>
		</td>
       		<td>
			<?php echo $v['employee_certificate_details_table_emp_id']; ?>
		</td>
       		<td>
			<?php echo $v['employee_certificate_type_id']; ?>
		</td>
       		<td>
			<?php echo $v['employee_certificate_created_by']; ?>
		</td>
       		<td>
			<?php echo $v['employee_certificate_creation_date']; ?>
		</td>
       		<td>
			<?php echo $v['employee_certificate_org_id']; ?>
		</td>
       	</tr>
     <?php } endforeach; ?>
</table>
<?php endif; ?>
