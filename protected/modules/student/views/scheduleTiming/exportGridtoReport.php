<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="80px">
		      schedule_timing_id		</th>
 		<th width="80px">
		      schedule_timing_minute		</th>
 		<th width="80px">
		      schedule_timing_hour		</th>
 		<th width="80px">
		      schedule_timing_date		</th>
 		<th width="80px">
		      schedule_timing_month		</th>
 		<th width="80px">
		      schedule_timing_day		</th>
 		<th width="80px">
		      schedule_timing_created_by		</th>
 		<th width="80px">
		      schedule_timing_creation_date		</th>
 		<th width="80px">
		      schedule_timing_org_id		</th>
 	</tr>
	<?php foreach($model as $row=>$v): 
	 if($row <> 0) {
            ?>
	<tr>
        		<td>
			<?php echo $v['schedule_timing_id']; ?>
		</td>
       		<td>
			<?php echo $v['schedule_timing_minute']; ?>
		</td>
       		<td>
			<?php echo $v['schedule_timing_hour']; ?>
		</td>
       		<td>
			<?php echo $v['schedule_timing_date']; ?>
		</td>
       		<td>
			<?php echo $v['schedule_timing_month']; ?>
		</td>
       		<td>
			<?php echo $v['schedule_timing_day']; ?>
		</td>
       		<td>
			<?php echo $v['schedule_timing_created_by']; ?>
		</td>
       		<td>
			<?php echo $v['schedule_timing_creation_date']; ?>
		</td>
       		<td>
			<?php echo $v['schedule_timing_org_id']; ?>
		</td>
       	</tr>
     <?php } endforeach; ?>
</table>
<?php endif; ?>
