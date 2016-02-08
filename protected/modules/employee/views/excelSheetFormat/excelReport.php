<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="80px">
		      excel_sheet_format_id		</th>
 		<th width="80px">
		      excel_sheet_name		</th>
 		<th width="80px">
		      excel_sheet_path		</th>
 		<th width="80px">
		      created_by		</th>
 		<th width="80px">
		      creation_date		</th>
 		<th width="80px">
		      excel_sheet_format_org_id		</th>
 	</tr>
	<?php foreach($model as $row=>$v): 
	 if($row <> 0) {
            ?>
	<tr>
        		<td>
			<?php echo $v['excel_sheet_format_id']; ?>
		</td>
       		<td>
			<?php echo $v['excel_sheet_name']; ?>
		</td>
       		<td>
			<?php echo $v['excel_sheet_path']; ?>
		</td>
       		<td>
			<?php echo $v['created_by']; ?>
		</td>
       		<td>
			<?php echo $v['creation_date']; ?>
		</td>
       		<td>
			<?php echo $v['excel_sheet_format_org_id']; ?>
		</td>
       	</tr>
     <?php } endforeach; ?>
</table>
<?php endif; ?>
