<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="80px">
		      idcard_id		</th>
 		<th width="80px">
		      stud_emp_type		</th>
 		<th width="80px">
		      idtemplate_name		</th>
 		<th width="80px">
		      selected_field_name		</th>
 		<th width="80px">
		      selected_field_label		</th>
 		<th width="80px">
		      label_priority		</th>
 		<th width="80px">
		      idcard_org_id		</th>
 		<th width="80px">
		      idcard_created_by		</th>
 		<th width="80px">
		      idcard_creation_date		</th>
 	</tr>
	<?php foreach($model as $row=>$v): 
	 if($row <> 0) {
            ?>
	<tr>
        		<td>
			<?php echo $v['idcard_id']; ?>
		</td>
       		<td>
			<?php echo $v['stud_emp_type']; ?>
		</td>
       		<td>
			<?php echo $v['idtemplate_name']; ?>
		</td>
       		<td>
			<?php echo $v['selected_field_name']; ?>
		</td>
       		<td>
			<?php echo $v['selected_field_label']; ?>
		</td>
       		<td>
			<?php echo $v['label_priority']; ?>
		</td>
       		<td>
			<?php echo $v['idcard_org_id']; ?>
		</td>
       		<td>
			<?php echo $v['idcard_created_by']; ?>
		</td>
       		<td>
			<?php echo $v['idcard_creation_date']; ?>
		</td>
       	</tr>
     <?php } endforeach; ?>
</table>
<?php endif; ?>
